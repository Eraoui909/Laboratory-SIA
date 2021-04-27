
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
                       errors += "<div class='alert alert-danger'>" + err + "</div>";
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
     * modifier enseeignant
     */
    $(".modify-enseignant-btn").on("click",function (){
        $("#modal-modify-enseignant").css("display","block");
    });

    $("#modal-modify-enseignant-close").on("click",function (){
        $("#modal-modify-enseignant").css("display","none");
    });

    $("#modal-modify-enseignant-close-btn").on("click",function (){
        $("#modal-modify-enseignant").css("display","none");
    });

    $('#modal-modify-enseignant-modify-btn').on("click",function (e){
        e.preventDefault();
        alert("cliked");
    });
});