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

$(document).on('click',".btn-article-modify-form",function (e){
    e.preventDefault();

    let id          = $(this).attr("data-id");
    let title       = $(this).attr("data-title");
    let desc        = $(this).attr("data-abstract");
    let journal     = $(this).attr("data-journal");
    let researchers = $(this).attr("data-researchers");
    let doi         = $(this).attr("data-doi");

    $(".article-id").val(id);
    $(".article-title").val(title);
    $(".article-journal").val(journal);
    $(".article-abstract").text(desc);
    $(".article-researchers").text(researchers);
    $(".article-doi").text(doi);


});

$(document).on("click",'.modify-article-btn',function (e)
    {
        e.preventDefault();

        let form = $("#modify-article-form")[0];
        let data  = new FormData(form);


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

$(document).on("click",'.delete-article-btn',function (e)
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


$(document).on("click",".add-article-button",function (e){

    e.preventDefault();

    //let desc = MyEditor.getData();

    let dataa  = new FormData($(".add-article-form")[0]);

    //dataa.set('content',desc);

    //console.log(dataa);

        $.ajax({
            type:"post",
            enctype:"multipart/form-data",
            url:globalDIR+"/teacher/addArticle",
            data:dataa,
            datatype: "json",
            contentType: false,
            cache: false,
            processData: false,
            success:function (data)
            {

                if(data === '"success"'){

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data Added with success',
                        showConfirmButton: false,
                    })
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/teacher/profile");
                    },1000);

                }else {

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: "Some field are emty",
                        showConfirmButton: false,
                    });
                    setTimeout(function (){
                        //window.location.replace(globalDIR+"/teacher/profile");
                    },1000);
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

    $(document).on("click",".storageTheClick",function (e){

        $(this).parent().siblings().attr("class","nav-item ");
        $(this).parent().siblings().children().attr("class","nav-link ");
        localStorage.setItem("lastClick", $(this).attr("id"));

    });


    /*******************************************************************************************************************
     *******************************************************************************************************************
     *  delete article
     *******************************************************************************************************************
     ********************************************************************************************************************/


    $(document).on("click",".supp-experience",function (e) {
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
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...'
                            })
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

    $(document).on("click",".supp-diplome",function (e) {
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
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...'
                            })
                            setTimeout(function (){
                                window.location.replace(globalDIR+"/teacher/profile");
                            },1000);
                        }
                    }
                })

            }
        })
    });

    // *********************************** *********************************** ***********************************
    // ***********************************         Settings of profile         ***********************************
    // *********************************** *********************************** ***********************************

    $(document).on("click",".btn-modify-settings",function (e) {
        e.preventDefault();
        let dataa = new FormData($(".ha-settings-form")[0]);

        $.ajax({
            type:"post",
            enctype:"multipart/form-data",
            url:globalDIR+"/teacher/profile",
            data:dataa,
            dataType:"json",
            contentType: false,
            cache: false,
            processData: false,
            success:function (data){
                console.log(typeof data);
                if(data === "success"){
                    Swal.fire(
                        'Updated!',
                        'Your account has been updated.',
                        'success',
                    )
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/teacher/profile");
                    },1000);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...'
                    })
                    setTimeout(function (){
                        window.location.replace(globalDIR+"/teacher/profile");
                    },800);
                }
            }
        });
    });

// *********************************** *********************************** ***********************************
// ***********************************        Experience of profile        ***********************************
// *********************************** *********************************** ***********************************

$("#experience-table").dataTable({
    "processing": true,
    "responsive": true,
    "lengthChange": false,
});

$(document).on("click",".experience-pro-button",function (e) {
    e.preventDefault();

    let dataa = new FormData($(".experience-pro-form")[0]);
    let desc    = DescriptionExperienceEditor.getData();
    dataa.set("description",desc);

    $.ajax({
        method:"post",
        url: globalDIR+"/teacher/experiencePro",
        data:dataa,
        datatype: "json",
        contentType: false,
        cache: false,
        processData: false,
        success:function (data) {
            if(data === '"success"')
            {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Experience Added with success',
                    showConfirmButton: false,
                })
                setTimeout(function (){
                    window.location.replace(globalDIR+"/teacher/profile");
                },1000);
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    showConfirmButton: false
                })
                setTimeout(function (){
                    window.location.replace(globalDIR+"/teacher/profile");
                },800);
            }
        },


    });
})