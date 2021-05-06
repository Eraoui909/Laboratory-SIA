
<?php global $lang; ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Storage/Statics/images/logoLaboFst(35X35).png">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/js/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="/adminLTE/plugins/summernote/summernote-bs4.min.css"> -->



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <link rel="stylesheet" href="/css/Footer_Style.css">
    <link rel="stylesheet" href="/css/article.css">

    <!-- STYLESHEETS FOR CV TEMPLATE-->
    <link rel="stylesheet" href="/assets/css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/owl.theme.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">

    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">


    <link rel="stylesheet" href="/css/marquee.css">
    <link rel="stylesheet" href="/css/Home_Style.css">

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>



    <title><?= $title ?></title>

    <style>
        .hiddenInput{
            display: none;
        }

        label.UploadLabel {
            padding: 6px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            display: table-cell;
            cursor: pointer;
        }

        label.UploadLabel:hover{
            box-shadow: 2px 2px 10px #b1afaf;
        }

        .error-message{
            color: red;
            font-size: .9em;
            margin-bottom: 0;
        }

        .delete-path:hover{
            color: #dc3545;
        }
    </style>

</head>
<body>
<?php
    if($null != true)
    {
        echo '<div class="head">
            <p>Decouvrez les recherches de nos <b>professeurs</b> sur notre siteweb du laboratoire <b>LSIA</b> .</p>
        </div>';
        include_once "navBar.php";
    }
?>


{{ content }}

<?php
if($null != true)
    include_once "footer.php";
?>

<script src="/js/jquery.comjquery-3.5.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/font-awesome-4.7.0/all.min.js"></script>


<!-- overlayScrollbars -->
<script src="/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/adminLTE/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/adminLTE/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/adminLTE/dist/js/pages/dashboard.js"></script>

<!-- SCRIPTS FOR CV TEMPLATE -->
<script type="text/javascript" src="/assets/js/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.onepage-scroll.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.filterizr.js"></script>
<script type="text/javascript" src="/assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/js/custom.js"></script>
<script type="text/javascript" src="/assets/js/smoothscroll.min.js"></script>

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

<!-- AdminLTE App -->
<script src="/adminLTE/dist/js/adminlte.js"></script>
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

<!-- SweetAlert2 -->
<script src="/js/marquee.js"></script>


<!-- SweetAlert2 -->
<script src="/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>


<!-- this script is for enseignant page -->
<script src="/adminLTE/dist/js/pages/dashboard.js"></script>
<script src="/js/admin.js"></script>
<script src="/js/article.js"></script>
<script src="/js/HomeScript.js"></script>

</body>
</html>