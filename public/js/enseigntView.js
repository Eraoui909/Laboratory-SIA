
$(document).ready(function(){



    $('#enseignant-table').DataTable({
        "processing": true,
        "responsive": true,
        "lengthChange": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"],
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

});