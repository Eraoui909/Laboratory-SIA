
$(document).ready(function(){



    $('#enseignant-table').DataTable({
        "processing": true,
        "responsive": true,
        "lengthChange": false,
        buttons: [
            { extend: 'copy', className: 'datatableButton' },
            { extend: 'csv', className: 'datatableButton' },
            { extend: 'excel', className: 'datatableButton' },
            { extend: 'pdf', className: 'datatableButton' },
            { extend: 'print', className: 'datatableButton' },
        ]
    }).buttons().container().appendTo('#hamza .col-md-6:eq(0)');

    $("#add-enseignant-btn").on("click",function (){
        $("#modal-add-enseignant").css("display","block");
    });

    $("#modal-add-enseignant-close").on("click",function (){
        $("#modal-add-enseignant").css("display","none");
    });

    $("#modal-add-enseignant-close-btn").on("click",function (){
        $("#modal-add-enseignant").css("display","none");
    });

    /**
     * ajouter enseignant
     */

    $("#modal-add-enseignant-add-btn").on("click",function (e){
       e.preventDefault();
       let data = $(".form-add-enseignat").serialize();
       let errors ="";
       $.ajax({
           type:"post",
           url:"/admin/enseignant/add",
           data:data,
           dataType:"json",
           success:function (data){
               console.log(data);
               if(typeof data == "object") {
                   data.error.forEach(function (err) {
                       errors += "<div class='alert alert-danger' style='padding: 5px'>" + err + "</div>";
                       $(".msg-add-enseignant").html(errors);
                   });
               }
               if(typeof data == "string")
               {
                   $("#modal-add-enseignant-add-btn").attr("disabled","disabled");
                   $(".msg-add-enseignant").html(data);
                   $(".msg-add-enseignant").html("<div class='alert alert-success'>Enseignant added with success</div>");
                   setTimeout(function (){
                       window.location.replace("/admin/enseignant");
                   },2000);
               }
           }
       });
    });

    /**
     * modifier enseignant
     */
    $(".modify-enseignant-btn").on("click",function (){
        $("#modal-modify-enseignant").css("display","block");
        $(".input-modify-prenom").attr("value",$(this).attr("data-prenom"));
        $(".input-modify-nom").attr("value",$(this).attr("data-nom"));
        $(".input-modify-email").attr("value",$(this).attr("data-email"));
        $(".input-modify-id").attr("value",$(this).attr("data-id"));
    });

    $("#modal-modify-enseignant-close").on("click",function (){
        $("#modal-modify-enseignant").css("display","none");
    });

    $("#modal-modify-enseignant-close-btn").on("click",function (){
        $("#modal-modify-enseignant").css("display","none");
    });

    $('#modal-modify-enseignant-modify-btn').on("click",function (e){
        e.preventDefault();
        let errors="";
        let data    = $(".form-modify-enseignat").serialize();
        $.ajax({
            type:"post",
            url:"/admin/enseignant/modify",
            data:data,
            dataType:"json",
            success: function (msg)
            {
                console.log(msg);
                if(typeof msg == "object")
                {
                    Object.values(msg.error).forEach(function (err) {
                        errors += "<div class='alert alert-danger' style='padding: 5px'>" + err + "</div>";
                        $(".msg-modify-enseignant").html(errors);
                    });
                }
                if(typeof msg == "string")
                {
                    $("#modal-modify-enseignant-add-btn").attr("disabled","disabled");
                    $(".msg-modify-enseignant").html("");
                    $(".msg-modify-enseignant").html("<div class='alert alert-success'>Enseignant modified with success</div>");
                    setTimeout(function (){
                        window.location.replace("/admin/enseignant");
                    },2000);
                }
            }
        })
    });

    /**
     * delete enseignant
     */

    $(".delete-enseignant-btn").on("click",function (e){
        e.preventDefault();
        let bool = confirm("are u sire ?");
        let data = "id="+$(this).attr("data-id");
        if(bool)
        {
            $.ajax({
                type:"post",
                url:"/admin/enseignant/delete",
                data:data,
                dataType:"json",
                success:function (data){
                    if(typeof data == "string")
                    {

                        setTimeout(function (){
                            window.location.replace("/admin/enseignant");
                        },1000);
                    }
                }
            })
        }
    });
});