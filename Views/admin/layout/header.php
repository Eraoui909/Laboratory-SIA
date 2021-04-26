<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/Storage/Statics/images/logoLaboFst(35X35).png">

    <title>AdminLTE 3 | Dashboard</title>

    <?php
        include_once "links/headerLinks.php";
    ?>

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
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/adminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>
