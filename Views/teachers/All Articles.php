
<?php  global $lang; ?>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">-->
<!-- Ionicons -->
<!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
<!-- Tempusdominus Bootstrap 4 -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">-->
<!-- iCheck -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">-->
<!-- JQVMap -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/jqvmap/jqvmap.min.css">-->
<!-- Theme style -->
<link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">-->
<!-- Daterange picker -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/daterangepicker/daterangepicker.css">-->
<!-- summernote -->
<!--<link rel="stylesheet" href="/adminLTE/plugins/summernote/summernote-bs4.min.css">-->
<!-- DataTables -->
<link rel="stylesheet" href="/js/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="/public/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
<link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="/adminLTE/plugins/summernote/summernote-bs4.min.css">

<style>

    tr td:last-of-type{
        min-width: 194px;
    }

    .card-body .btn{
        background-color: #007bff;
    }

    .card-body .btn:hover{
        background-color: #2f3e4e;
    }

    .btn span, .btn-sm span {
        color: #fff;
    }
</style>

<div class="content-wrapper" style="margin-left: 0">






    <div class="card" id="card-ens-doc">
        <div class="card-header">
            <div class="card-title">
                <h3>Articles</h3>
            </div>
        </div>
        <div class="card-body">
            <table id="enseignant-doctorant-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th><?=$lang['title']?></th>
                    <th><?= 'date'?></th>
                    <th><?=$lang['avatar']?></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                echo "<pre>";
                print_r($articles);
                echo "</pre>";
                foreach ($articles as $article){
                ?>
                    <tr>
                        <td><?= $article['title'] ?></td>
                        <td><?= $article['date'] ?></td>
                        <td><img width="45px" height="40px" src="\Storage\uploads\articles\<?= $article['picture'] ?>" alt="ensignant picture"> </td>
                        <td>
                            <button class="btn-sm btn-success btn-show-modify-form"
                                    data-prenom="<?= $article['prenom'] ?>"
                                    data-id="    <?= $article['id']     ?>"
                                    data-nom="   <?= $article['nom']    ?>"
                                    data-tel="   <?= $article['tel']    ?>"
                                    data-email=" <?= $article['email']  ?>">
                                <i class="fa fa-edit"></i>
                                <span> <?=$lang['modify']?></span>
                            </button>
                            <button class="btn-sm btn-danger btn-sm delete-enseignant-btn" data-id="<?= $ens['id'] ?>">
                                <i class="fa fa-trash"></i>
                                <span> <?=$lang['delete']?></span>
                            </button>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="/adminLTE/plugins/jquery/jquery.min.js"></script>
<script src="/js/jquery.comjquery-3.5.1.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/adminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/adminLTE/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/adminLTE/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap
<script src="/adminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/adminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
-->
<!-- jQuery Knob Chart -->
<!--<script src="/adminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>-->
<!-- daterangepicker -->
<!--<script src="/adminLTE/plugins/moment/moment.min.js"></script>-->
<!--<script src="/adminLTE/plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- Tempusdominus Bootstrap 4 -->
<!--<script src="/adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>-->
<!-- Summernote -->
<!--<script src="/adminLTE/plugins/summernote/summernote-bs4.min.js"></script>-->
<!-- overlayScrollbars -->
<!--<script src="/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>-->
<!-- AdminLTE App -->
<script src="/adminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!--<script src="/adminLTE/dist/js/demo.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="/adminLTE/dist/js/pages/dashboard.js"></script>-->
<!-- DataTables  & Plugins -->
<script src="/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="/adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- this script is for enseignant page -->
<script src="/js/admin.js"></script>
<script src="/adminLTE/dist/js/pages/dashboard.js"></script>

<script>
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
</script>