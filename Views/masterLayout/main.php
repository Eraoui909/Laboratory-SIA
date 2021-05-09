<?php global $lang; ?>

<?php
/*
echo "<pre>";
print_r($params);
echo "</pre>";
*/
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/Storage/Statics/images/logoLaboFst(35X35).png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminLTE/plugins/fontawesome-free/css/all.min.css">
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



    <link rel="stylesheet" href="/css/Footer_Style.css">

    <!-- STYLESHEETS FOR CV TEMPLATE-->
    <?php
    if(isset($params['CV'])):
        include_once "CVHeader.php";
    endif;
    ?>


    <link rel="stylesheet" href="/css/marquee.css">
    <link rel="stylesheet" href="/css/Home_Style.css">

    <!-- -------------------------------------------- -->
    <!-- -------------------------------------------- -->
    <!-- -------------------------------------------- -->
    <?php if (isset($params['style'])) foreach ($params['style'] as $style) {?>
        <link rel="stylesheet" href="/css/<?= $style?>">

    <?php }?>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>



    <title>SIA | <?= $title ?></title>

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
<script src="/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>



<?php if (isset($params['script'])) foreach ($params['script'] as $script) {?>
    <script src="/js/<?= $script?>"></script>
<?php }?>

</body>
</html>