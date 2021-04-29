<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $title ?></title>
    <meta name="description" content="Blvck - Personal vCard & Resume Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/owl.carousel.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/owl.theme.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css" type="text/css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" media="all">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <script src="/js/html2pdf.bundle.js"></script>

    <style>
        .downoald-btn{
            position: relative;
            margin: 10px auto;
            width: fit-content;
            padding: 10px;
        }
    </style>

    <script>
        function generetePDF()
        {

            const element = document.getElementById("myPDF");
            let opt = {
                margin:       1,
                filename:     'myfile.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'tabloid', orientation: 'landscape' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>


</head>

<body >

<div class="downoald-btn">
    <a href="#" onclick="generetePDF()" class="resume-download" data-toggle="tooltip" data-placement="bottom" title="Download">
        <i class="fa fa-download" aria-hidden="true"> </i>  Download Resume
    </a>
</div>
<?php include_once "cv.php";?>

<!-- SCRIPTS -->
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