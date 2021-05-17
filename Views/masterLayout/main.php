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
        /**
        ***********************************************************************************************************************
        ***********************************************************************************************************************
        ************************************** inscription in news letter *****************************************************
        ***********************************************************************************************************************
        ***********************************************************************************************************************
        **/


        .ha-global-popup-newsletter{
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: #0a0e14;
            opacity: 0.8;
            z-index: 100000;
        }
        .ha-global-popup-newsletter-active{
            display: none;
        }

        .ha-newletter-container{
            width: 50%;
            background-color: white;
            position: fixed;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
            height: 400px;
            z-index: 100001;
            padding: 40px;
        }
        .ha-newletter-container::before{
            content: "x";
            font-size: 30px;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #0a001f;
            position: absolute;
            right: -18px;
            top: -18px;
            text-align: center;
            line-height: 40px;
        }
        .ha-newletter-container .ha-newsletter-content {
            border: 4px dashed black;
            height: 100%;
            width: 100%;
            padding: 20px;
            overflow: hidden;
        }
        .ha-newletter-container .ha-newsletter-content h1{
            font-weight: bold;
            margin: 30px 0px;
        }
        .ha-newletter-container .ha-newsletter-content p{
            margin: 30px 0px;
            font-size: 20px;
            letter-spacing: 4px;
        }
        .ha-newletter-container .ha-newsletter-content input{
            width: 60%;
            border: 1px solid transparent;
            border-bottom: 1px solid gray;
            margin: 30px 10px;
            line-height: 20px;
            padding: 8px;
            outline: 1px orange;
        }
        .ha-newletter-container .ha-newsletter-content button{
            width: 23%;
            background-color: coral;
            margin:30px 10px;
        }

        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            .ha-newletter-container{
                padding: 10px;
                width: 80%;
            }
            .ha-newletter-container h1{
                font-size: 22px;
                margin: 10px 0px;
            }
            .ha-newletter-container p{
                font-size: 14px;
                letter-spacing: normal;
                margin: 10px 0px;
            }
            .ha-newletter-container input{
                display: block;
                border-top: 1px solid !important;
                width: 100% !important;
                padding: 5px !important;
                margin: 0px auto !important;
            }
            .ha-newletter-container button{
                width: 50% !important;
                padding: 4px !important;
                margin: 10px auto !important;
            }

        }

        /* Small devices (portrait tablets and large phones, 600px and up) */
        @media only screen and (min-width: 600px) {...}

        /* Medium devices (landscape tablets, 768px and up) */
        @media only screen and (min-width: 768px) {...}

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {...}

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {...}


        #load {
            width: 100%;
            //background-image: linear-gradient(to left,white,white, #bdd7e5);
            background-color: white;
            position: fixed;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
            height: 100%;
            z-index: 100001;
            padding: 40px;
        }
        #load img{
            width: 15%;
            position: fixed;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
            height: 250px;
            z-index: 100001;
            padding: 40px;
        }
        .swal2-container {
            z-index: 1000000000000000 !important;
        }
    </style>

</head>
<body>

<div class="ha-global-popup-newsletter ha-global-popup-newsletter-active">
</div>
<div id="load">
    <!-- https://miro.medium.com/max/1600/1*CsJ05WEGfunYMLGfsT2sXA.gif -->
    <img src="https://i.gifer.com/1LBN.gif"  alt="">
</div>
<div class="ha-newletter-container ha-global-popup-newsletter-active">
    <div class="ha-newsletter-content">
        <center>
            <h1>Rejoignez notre news letter</h1>
            <p>Recevez les derniers articles de nos professeurs!</p>
            <div>
                <form action="/newsletter/inscription" method="post">
                    <input type="email" name="email" class="newsletter-email" placeholder="  Entrer votre addresse email">
                    <button type="submit" class="btn btn-secondary ha-abonner-newsletter">S'abonner</button>
                </form>
            </div>
        </center>
    </div>
</div>
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

<script src="/js/navbar.js"></script>

<?php if (isset($params['script'])) foreach ($params['script'] as $script) {?>
    <script src="/js/<?= $script?>"></script>
<?php }?>

<script>
    $("#load").hide();
    /*
    document.onreadystatechange = function () {
        let state = document.readyState;
        if (state === 'interactive') {
            //$(".ha-global-popup-newsletter").removeClass("ha-global-popup-newsletter-active");
        } else if (state === 'complete') {
            $("#load").hide();
        }
    }
    */

</script>

</body>
</html>