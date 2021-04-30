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
    console.log();
    let title   = $(this).attr("data-title");
    let desc    = $(this).attr("data-description");
    let content = $(this).attr("data-content");
    $(".article-title").val(title);

    CKEDITOR.instances['article-content'].setData("hello");

})