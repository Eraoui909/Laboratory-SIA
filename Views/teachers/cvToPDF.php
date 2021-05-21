<?php
/*
echo "<pre>";
print_r($params);
echo "</pre>";
*/
global $GLOBAL_DIR;
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title><?php echo $title ?></title>
    <meta name="description" content="Blvck - Personal vCard & Resume Template">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/logoLaboFst(35X35).png">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/assets/bootstrap/css/bootstrap.min.css" type="text/css" media="all">

    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/assets/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/assets/css/font-awesome.min.css" type="text/css" media="all">


    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    <script src="<?php echo $GLOBAL_DIR ?>/js/html2pdf.bundle.js"></script>

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


</body>
</html>