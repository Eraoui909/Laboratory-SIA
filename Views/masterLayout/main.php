
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


    <link rel="stylesheet" href="/css/Home_Style.css">

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
            <p>Decouvrez les recherches de nos <b>professeur</b> sur notre siteweb du laboratoire <b>LSIA</b> .</p>
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
</body>
</html>