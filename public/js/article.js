    $('#article-table').DataTable({
    "processing": true,
    "responsive": true,
    "lengthChange": false,
    buttons: [
{ extend: 'copy', className: 'datatableButton' },
{ extend: 'csv', className: 'datatableButton',title: "SIA Laboratory" },
{ extend: 'excel', className: 'datatableButton',title: "SIA Laboratory" },
{ extend: 'pdf', className: 'datatableButton',title: "SIA Laboratory" },
{
    extend: 'print',
    className: 'datatableButton',
    title: "SIA Laboratory"
},
    ]
}).buttons().container().appendTo('#card-ens-doc .col-md-6:eq(0)');


/**
 * Modifier article
 */

$(".btn-article-modify-form").on('click',function (e){
    e.preventDefault();
    console.log($(this).attr("data-id"));
    let id      = $(this).attr("data-id");
    let title   = $(this).attr("data-title");
    let desc    = $(this).attr("data-description");
    let content = $(this).attr("data-content");
    $(".article-id").val(id);
    $(".article-title").val(title);
    $(".article-description").text(desc);
    YourEditor.setData(content);

});

$('.modify-article-btn').on("click",function (e)
    {
        e.preventDefault();

        let content = YourEditor.getData();

        //let files = $('#modify-file')[0].files;

        let form = $("#modify-article-form")[0];
        let data  = new FormData(form);
        data.append("contente", content);
        //jQuery.each(files, function(i, file) {
        //    data.append('file-'+i, file);
        //});

        $.ajax({
            type        : "post",
            enctype     : "multipart/form-data",
            url         : "/teacher/modifyArticle",
            data        : data,
            datatype    : "json",
            processData : false,
            contentType : false,
            cache       : false,
            success:function (data)
            {
                console.log(data + " test : "+(data ==='"success"'));

                if(data ==='"success"')
                {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data modified by success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(function (){
                        window.location.replace("/teacher/profile");
                    },1000);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: "all fields are required",
                    })
                }
            },
            error:function (err)
            {
                console.log(err);
            }
        })
    });

$('.delete-article-btn').on("click",function (e)
{
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let data = "articleID="+$('.delete-article-btn').attr("data-id");
            $.ajax({
                method:"post",
                url:"/teacher/deleteArticle",
                data:data,
                dataType:"json",
                success:function (data)
                {
                    console.log();
                    if(data === "deleted")
                    {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function (){
                            window.location.replace("/teacher/profile");
                        },1000);
                    }else{
                        alert("ERROR");
                        setTimeout(function (){
                            window.location.replace("/teacher/profile");
                        },1000);
                    }
                }
            })

        }
    })
});

$(document).on("click",".edit-article-img",function (){
    $(".articleIDHidden").val($(this).attr("data-id"));
});

/**
 * add article handler
 */

$(".add-article-button").on("click",function (e){
    e.preventDefault();
    let title = $(".add-article-title").val().split();
    let desc    = $(".add-article-description").val().split();
    let content = YourEditor.getData();
    console.log(content);
    //console.log(title === "" || desc === "");
    if(title == "" || desc == "")
    {
        e.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'All fields are required',
        })
    }
});