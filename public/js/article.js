let globalDIR = window.location.href;

if(globalDIR.includes('public'))
{
    globalDIR = "/public";
}else{
    globalDIR = "";
}


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

    let id      = $(this).attr("data-id");
    let title   = $(this).attr("data-title");
    let desc    = $(this).attr("data-description");
    let journal = $(this).attr("data-journal");

    $(".article-id").val(id);
    $(".article-title").val(title);
    $(".article-journal").val(journal);
    $(".article-description").text(desc);


});

$('.modify-article-btn').on("click",function (e)
    {
        e.preventDefault();

        //let files = $('#modify-file')[0].files;

        let form = $("#modify-article-form")[0];
        let data  = new FormData(form);

        //jQuery.each(files, function(i, file) {
        //    data.append('file-'+i, file);
        //});

        $.ajax({
            type        : "post",
            enctype     : "multipart/form-data",
            url         : globalDIR+"/teacher/modifyArticle",
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
                        window.location.replace(globalDIR+"/teacher/profile");
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
    let data = "articleID=" + $(this).attr("data-id");
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
            $.ajax({
                method:"post",
                url:globalDIR+"/teacher/deleteArticle",
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
                            window.location.replace(globalDIR+"/teacher/profile");
                        },1000);
                    }else{
                        alert("ERROR");
                        setTimeout(function (){
                            window.location.replace(globalDIR+"/teacher/profile");
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
 */

$(document).on("click",".add-article-button",function (e){

    e.preventDefault();

    let desc = MyEditor.getData();

    let dataa  = new FormData($(".add-article-form")[0]);

    dataa.set('content',desc);

    //console.log(dataa);

        $.ajax({
            type:"post",
            enctype:"multipart/form-data",
            url:globalDIR+"/teacher/addArticle",
            data:dataa,
            contentType: false,
            processData: false,
            datatype: "json",
            success:function (data)
            {
                if(data === "success"){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Added with success',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/teacher/profile");
                    },1000);

                }else if(data === "failed")
                {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: "there is an undifined error",
                    })
                }
                else{
                    let elem = "";
                    let obj = JSON.parse(data);
                    for(const prop in obj)
                    {
                        elem+="<p style='color: red'>"+obj[prop]+"</p>";
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: elem,
                    })
                }
            },
            error:function (request,error)
            {
                console.log("request : "+request);
                console.log("error : "+error);
            }
        });

});


    /*******************************************************************************************************************
     *******************************************************************************************************************
     *  save the last profile page
     *******************************************************************************************************************
     ********************************************************************************************************************/



   $(window).on("load",function (){
       setTimeout(function (){
           $("#"+localStorage.getItem("lastClick")).attr("class","nav-item storageTheClick active");
           $("#"+localStorage.getItem("lastClick")).parent().attr("class","nav-link storageTheClick active");
           $(".storageTheClick").attr("data-toggle","tab");
           let id = $("#"+localStorage.getItem("lastClick")).attr("href");
           $(id).attr("class","tab-pane active");
       },1);
   });

    $(".storageTheClick").on("click",function (e){

        $(this).parent().siblings().attr("class","nav-item ");
        $(this).parent().siblings().children().attr("class","nav-link ");
        localStorage.setItem("lastClick", $(this).attr("id"));

    });


    /*******************************************************************************************************************
     *******************************************************************************************************************
     *  delete article
     *******************************************************************************************************************
     ********************************************************************************************************************/

    $("#experience-table").dataTable({
        "processing": true,
        "responsive": true,
        "lengthChange": false,
    });

    $(".supp-experience").on("click",function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
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
                let data = "id="+id;
                $.ajax({
                    method:"post",
                    url:globalDIR+"/teacher/deleteExperiencePro",
                    data:data,
                    dataType:"json",
                    success:function (data)
                    {
                        //console.log(data);
                        if(data === "deleted")
                        {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            setTimeout(function (){
                                window.location.replace(globalDIR+"/teacher/profile");
                            },1000);
                        }else{
                            alert("ERROR");
                            setTimeout(function (){
                                window.location.replace(globalDIR+"/teacher/profile");
                            },1000);
                        }
                    }
                })

            }
        })
    });

    /*******************************************************************************************************************
     *******************************************************************************************************************
     *  diploma datatable && delete diploma
     *******************************************************************************************************************
     ********************************************************************************************************************/


    $("#diplome-table").dataTable({
        "processing": true,
        "responsive": true,
        "lengthChange": false,
    });

    $(".supp-diplome").on("click",function (e) {
        e.preventDefault();
        let id = $(this).attr("data-id");
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
                let data = "id="+id;
                $.ajax({
                    method:"post",
                    url:globalDIR+"/teacher/deleteDiplome",
                    data:data,
                    dataType:"json",
                    success:function (data)
                    {
                        //console.log(data);
                        if(data === "deleted")
                        {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            setTimeout(function (){
                                window.location.replace(globalDIR+"/teacher/profile");
                            },1000);
                        }else{
                            alert("ERROR");
                            setTimeout(function (){
                                window.location.replace(globalDIR+"/teacher/profile");
                            },1000);
                        }
                    }
                })

            }
        })
    });
