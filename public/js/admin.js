
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

    $("#add-enseignant-doctorant-btn").on("click", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","block");
    });

    $("#modal-add-enseignant-doctorant-close").on("click", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","none");
    });

    $("#modal-add-enseignant-doctorant-close-btn").on("click", function ()
    {
        $("#modal-add-enseignant-doctorant").css("display","none");
    });

    $("#modal-add-enseignant-add-btn").on("click", function (e){
        e.preventDefault();
        addDocEns('enseignant');
    });

    $("#modal-add-doctorant-add-btn").on("click", function (e){
        e.preventDefault();
        addDocEns('doctorant');
    });

    /**
     * modifier enseignant
     */
    $(".btn-show-modify-form").on("click",function ()
    {
        $("#modal-modify-enseignant-doctorant").css("display","block");

        $(".input-modify-prenom").attr("value", $(this).attr("data-prenom"));
        $(".input-modify-nom").attr("value", $(this).attr("data-nom"));
        $(".input-modify-email").attr("value", $(this).attr("data-email"));
        $(".input-modify-id").attr("value", $(this).attr("data-id"));

    });

    $("#modal-modify-enseignant-doctorant-close").on("click",function ()
    {
        $("#modal-modify-enseignant-doctorant").css("display","none");
    });

    $("#modal-modify-enseignant-doctorant-close-btn").on("click",function ()
    {
        $("#modal-modify-enseignant").css("display","none");
    });

    $('#modal-modify-enseignant-modify-btn').on("click", function (e){
        e.preventDefault();
        modifyResDoc('enseignant');
    });

    $('#modal-modify-doctorant-modify-btn').on("click", function (e){
        e.preventDefault();
        modifyResDoc('doctorant');
    });

    /**
     * delete enseignant
     */

    $(".delete-enseignant-btn").on("click", function (e){
        e.preventDefault();
        deleteEnsDoc('enseignant', $(this).attr("data-id"));
    });

    $(".delete-doctorant-btn").on("click", function (e){
        e.preventDefault();
        deleteEnsDoc('doctorant', $(this).attr("data-id"));
    });

});


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
            if(typeof data == "object") {

                for (const err in data.error) {
                    errors += "<div class='alert alert-danger'>" + err + "</div>";
                    $(".msg-add-enseignant-doctorant").html(errors);
                }
            }
            if(typeof data == "string")
            {
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
