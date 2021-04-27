
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

    $("#add-enseignant-btn").on("click", function ()
    {
        $("#modal-add-enseignant").css("display","block");
    });

    $("#modal-add-enseignant-close").on("click", function ()
    {
        $("#modal-add-enseignant").css("display","none");
    });

    $("#modal-add-enseignant-close-btn").on("click", function ()
    {
        $("#modal-add-enseignant").css("display","none");
    });

    $("#modal-add-enseignant-add-btn").on("click", function (e){
        e.preventDefault();
        addDocEns('enseignant');
    });

    $("#modal-add-doctorant-add-btn").on("click", function (e){
        e.preventDefault();
        addDocEns('doctorant');
    });

    function addDocEns (person)
    {
        let data = $(".form-add-enseignat").serialize();
        let errors ="";
        console.log(data);

        $.ajax({
            type    : "post",
            url     : "/admin/" + person + "/add",
            data    : data,
            dataType: "json",
            success:function (data)
            {
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
                    $(".msg-add-enseignant").html("<div class='alert alert-success'>" + person + " added with success</div>");
                    setTimeout(function (){
                        window.location.replace("/admin/" + person);
                    },2000);
                }
            }
        });
    }

});