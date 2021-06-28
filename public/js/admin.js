let teamID = '';
let teamTeachers = '';
$(document).ready(function()
{

    $('#enseignant-doctorant-table').DataTable({
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


    $(document).on("click","#show-add-btn", function ()
    {
        $("#add-div").css("display","block");
    });

    $(document).on("click",".show-add-teacher-btn", function ()
    {
        teamID = $(this).attr("data-Id");
        $("#modify-div").css("display","block");
    });

    $(document).on("click",".close", function ()
    {
        $("#add-div").css("display","none");
        $("#modify-div").css("display","none");
    });

    $(document).on("click","#close-btn", function ()
    {
        $("#add-div").css("display","none");
        $("#modify-div").css("display","none");
    });

    ///////////////////////////////////////////////////////////////////////////

    $(document).on("click","#add-team-btn", function (e){
        e.preventDefault();
        addTeam();
    });

    $(document).on("click",".delete-team-btn", function (e){
        e.preventDefault();
        deleteTeam(this);
    });

    $(document).on("click","#add-teacher-to-team-btn", function (e){
        e.preventDefault();
        addTeacherToTeam();
    });

    $(document).on("click","#delete-teacher-frm-team-btn", function (e){
        e.preventDefault();
        deleteTeacherFromTeam();
    });

    ///////////////////////////////////////////////////////////////////////////

    $(document).on("click","#add-enseignant-doctorant-btn", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","block");
    });

    $(document).on("click","#modal-add-enseignant-doctorant-close", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","none");
    });

    $(document).on("click","#modal-add-enseignant-doctorant-close-btn", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","none");
    });

    $(document).on("click","#modal-add-enseignant-add-btn", function (e){
        e.preventDefault();
        addDocEns('enseignant');
    });

    $(document).on("click","#modal-add-doctorant-add-btn", function (e){
        e.preventDefault();
        addDocEns('doctorant');
    });

    /**
     * modifier enseignant
     */

    $(document).on("click",".btn-show-modify-form",function (e)
    {
        e.preventDefault();
        $("#modal-modify-enseignant-doctorant").css("display","block");

        $(".input-modify-prenom").attr("value", $(this).attr("data-prenom"));
        $(".input-modify-nom").attr("value", $(this).attr("data-nom"));
        $(".input-modify-email").attr("value", $(this).attr("data-email"));
        $(".input-modify-id").attr("value", $(this).attr("data-id"));

    });

    $(document).on("click","#modal-modify-enseignant-doctorant-close",function ()
    {
        $("#modal-modify-enseignant-doctorant").css("display","none");
    });

    $(document).on("click","#modal-modify-enseignant-doctorant-close-btn",function ()
    {
        $("#modal-modify-enseignant").css("display","none");
    });

    $(document).on("click",'#modal-modify-enseignant-modify-btn', function (e){
        e.preventDefault();
        modifyResDoc('enseignant');
    });

    $(document).on("click",'#modal-modify-doctorant-modify-btn', function (e){
        e.preventDefault();
        modifyResDoc('doctorant');
    });

    /**
     * delete enseignant
     */

    $(document).on("click",".delete-enseignant-btn", function (e){
        e.preventDefault();
        deleteEnsDoc('enseignant', $(this).attr("data-id"));
    });

    $(document).on("click",".delete-doctorant-btn", function (e){
        e.preventDefault();
        deleteEnsDoc('doctorant', $(this).attr("data-id"));
    });

    ///////////////////////////////////////////////////////////////////////

    $(document).on("click",".show-modify-event-btn",function (e)
    {
        e.preventDefault();
        $("#modify-div").css("display","block");

        $(".input-modify-title").attr("value", $(this).attr("data-title"));
        $(".input-modify-description").attr("value", $(this).attr("data-description"));
        $(".input-modify-lieu").attr("value", $(this).attr("data-lieu"));
        $(".input-modify-picture").attr("value", $(this).attr("data-picture"));
        $(".input-modify-date").attr("value", $(this).attr("data-date"));
        $(".input-modify-id").attr("value", $(this).attr("data-id"));
        $(".input-modify-date").attr("value", $(this).attr("data-date"));
        $(".input-modify-date-event").attr("value", $(this).attr("data-date-event"));
        $(".input-modify-time").attr("value", $(this).attr("data-time"));

    });

    $(document).on("click","#add-event-btn", function (e){
        e.preventDefault();
        addEvent();
    });

    $(document).on("click",".delete-event-btn", function (e){
        e.preventDefault();
        deleteEvent(this);
    });

    $(document).on("click","#modify-event-btn", function (e){
        e.preventDefault();
        modifyEvent();
    });

});

    //////////////////////////////////////////////////////////////////////


function addDocEns (person)
{
    let data = $(".form-add-enseignant-doctorant").serialize();
    let errors ="";

    $.ajax({
        type    : "post",
        url     : "/admin/" + person + "/add",
        data    : data,
        dataType: "json",
        success:function (data)
        {
            if(data === 'success'){
                $("#modal-add-" + person + "-add-btn").attr("disabled", "disabled");
                // $(".msg-add-enseignant-doctorant").html(data);
                //$(".msg-add-enseignant-doctorant").html("<div class='alert alert-success'>" + person + " added with success</div>");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title:  person + " added with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/" + person);
                },2000);
            }else{
                let errors = data.error;
                console.log(errors);
                let result = "";
                for (const key in errors) {
                    result += "<div class='alert alert-danger'>" + errors[key] + "</div>";
                }
                $(".msg-add-enseignant-doctorant").html(result);
            }
        }
    });
}


function modifyResDoc (person)
{
    let errors="";
    let data = $(".form-modify-enseignant-doctorant").serialize();
    //console.log(data);
    $.ajax({
        type:"post",
        url:"/admin/" + person + "/modify",
        data:data,
        dataType:"json",
        success: function (msg)
        {
            console.log(msg);
            if(typeof msg == "object")
            {
                for (const err in msg)
                {
                    errors += "<div class='alert alert-danger' style='padding: 5px'>" + err + "</div>";
                    $(".msg-modify-enseignant-doctorant").html(errors);
                }
            }
            if(typeof msg == "string")
            {
                $("#modal-modify-" + person + "-add-btn").attr("disabled","disabled");
                //$(".msg-modify-enseignant-doctorant").html("<div class='alert alert-success'>" + person + " modified with success</div>");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title:  person + " modified with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/" + person);
                },2000);
            }
        }
    })
}


function deleteEnsDoc (person, id)
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
                url:"/admin/" + person + "/delete",
                data:"id=" + id,
                dataType:"json",
                success:function (data)
                {
                    if(typeof data == "string")
                    {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function (){
                            window.location.replace("/admin/" + person);
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


}

function addTeam ()
{
    let data = $(".add-team-form").serialize();
    console.log(data);
    let errors ="";

    $.ajax({
        type    : "post",
        url     : "/admin/teams/add",
        data    : data,
        success:function (data)
        {
            //data = JSON.parse(data);
            console.log(data);
            if( data === '"success"')
            {
                console.log(data)
                $("#add-team-btn").attr("disabled", "disabled");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Team added with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/teams");
                },2000);

            }else{
                errors += "<div class='alert alert-danger'>" + data.error.thematic + "</div>";
                $(".msg-add-enseignant-doctorant").html(errors);
            }
        }
    });
}

function deleteTeam (teamID)
{
    let data = "equipeID="+$(teamID).attr("data-id");
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
            $.ajax(
    {
                method : "post",
                url    : "/admin/teams/delete",
                data   : data,
                success: function (data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data === "deleted")
                    {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        setTimeout(function (){
                            window.location.replace("/admin/teams");
                        },1000);

                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: "Team is not deleted",
                            showConfirmButton: false,
                            timer: 2000
                        })
                    }
                }
            });

        }
    });


}

function addTeacherToTeam ()
{
    let data = $(".modify-team-form").serialize();
    let errors ="";

    data += "&equipeID=" + teamID;

    $.ajax({
        type    : "post",
        url     : "/admin/teams/add-teacher",
        data    : data,
        success:function (data)
        {
            data = JSON.parse(data);
            console.log(data)

            if( data === "success")
            {
                $("#add-teacher-to-team-btn").attr("disabled", "disabled");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Team added with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/teams");
                },2000);

            }else{
                data.forEach((err) => {
                    errors += "<div class='alert alert-danger'>" + err + "</div>";
                });

                $(".msg-add-enseignant-doctorant").html(errors);
            }
        }
    });
}

function deleteTeacherFromTeam ()
{
    let data = $(".modify-team-form").serialize();
    let errors ="";

    data += "&equipeID=" + teamID;

    $.ajax({
        type    : "post",
        url     : "/admin/teams/delete-teacher",
        data    : data,
        success:function (data)
        {
            data = JSON.parse(data);
            console.log(data)

            if( data === "success")
            {
                $("#add-teacher-to-team-btn").attr("disabled", "disabled");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Teacher deleted with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/teams");
                },2000);

            }else{
                data.forEach((err) => {
                    errors += "<div class='alert alert-danger'>" + err + "</div>";
                });

                $(".msg-add-enseignant-doctorant").html(errors);
            }
        }
    });
}


$("#newsletter-table").DataTable({
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


// *********************************** *********************************** ***********************************
// ***********************************             Events CRUD             ***********************************
// *********************************** *********************************** ***********************************

function addEvent ()
{
    let dataa = new FormData($(".add-event-form")[0]);

    let errors ="";


    $.ajax({
        type        : "post",
        enctype     : "multipart/form-data",
        url         : "/admin/events/add",
        data        : dataa,
        datatype    : "json",
        processData : false,
        contentType : false,
        cache       : false,
        success:function (data)
        {
            if( data === '"success"')
            {
                console.log(data);
                $("#add-event-btn").attr("disabled", "disabled");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Event added with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/events");
                },2000);

            }else{
                //errors += "<div class='alert alert-danger'>" + data.error.thematic + "</div>";
                //$(".msg-add-enseignant-doctorant").html(errors);
                let result = "";
                let errors = JSON.parse(data).error;
                let uploads = JSON.parse(data).uploads;
                for (const key in errors)
                {
                    result += errors[key]+"</br>";
                }
                for (const key in uploads)
                {
                    if(typeof uploads[key] !== 'Object'){
                        result += uploads[key]+"</br>";
                    }
                }
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    html: result,
                    timer: 4000
                })
            }
        }
    });

}

function deleteEvent (event)
{
    let data = "eventID="+$(event).attr("data-id")+"&eventPic="+$(event).attr("data-picture");
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
            $.ajax(
                {
                    method : "post",
                    url    : "/admin/events/delete",
                    data   : data,
                    success: function (data)
                    {
                        data = JSON.parse(data);
                        console.log(data);
                        if(data === "deleted")
                        {
                            Swal.fire(
                                'Deleted!',
                                'The event has been deleted.',
                                'success'
                            )
                            setTimeout(function (){
                                window.location.replace("/admin/events");
                            },1000);

                        }else{
                            Swal.fire({
                                position: 'top-end',
                                icon: 'error',
                                title: "Event is not deleted",
                                showConfirmButton: false,
                                timer: 2000
                            })
                        }
                    }
                });

        }
    });


}

function modifyEvent ()
{
    let data = new FormData($(".modify-event-form")[0]);
    let errors ="";

    $.ajax({
        type        : "post",
        enctype     : "multipart/form-data",
        url         : "/admin/events/modify",
        data        : data,
        datatype    : "json",
        processData : false,
        contentType : false,
        cache       : false,
        success:function (data)
        {
            if( data === '"success"')
            {
                $("#modify-event-btn").attr("disabled", "disabled");
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Event updated with success",
                    showConfirmButton: false,
                    timer: 1500
                })
                setTimeout(function (){
                    window.location.replace("/admin/events");
                },2000);

            }else{
                let errors = JSON.parse( data);
                let result = "";
                for( const  key in errors)
                {
                    result += errors[key]+"</br>";
                }
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    html: result,
                    timer: 3500
                })
            }
        }
    });
}

/* ****************************************************************************************************************** */
/*                                               delete message                                                       */
/* ****************************************************************************************************************** */

$(document).on('click','.ha-delete-msg',function (e) {
    e.preventDefault();
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
                method: "post",
                url: "/admin/msg/delete",
                data: "id="+$(".ha-delete-msg").attr('data-id'),
                datatype: "json",
                success: function (data) {
                    if(data === '"success"')
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Message has been deleted',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(function () {
                            window.location.replace("/admin/inbox");
                        },2001);
                    }else{
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            html: 'Message not deleted',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            })
        }
    })
})