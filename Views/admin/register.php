


<?php global $lang; ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Framework</title>

    <?php
    include_once "layout/links/headerLinks.php";
    ?>

    <style>
        body{
            background-color: #E9ECEF;
        }
        .register-box{
            margin: 10px auto;
            margin-top: 100px;
        }
    </style>

</head>
<body>

<div class="container-sm" style="margin-top: 30px;">
    <?php

    if(isset($_SESSION['flash_messages']['error']) && !empty($_SESSION['flash_messages']['error']))
    {

        foreach ($_SESSION['flash_messages']['error']['value'] as $error)
        {
                echo "<div class='alert alert-danger'>".$error."</div>";
        }
    }

    if(isset($_SESSION['flash_messages']['success']) && !empty($_SESSION['flash_messages']['success']))
    {
            echo "<div class='alert alert-success'>".$_SESSION['flash_messages']['success']['value']."</div>";
    }

    ?>
</div>


<div class="register-box">

    <div class="register-logo">
        <a href="#"><?= $lang['admin-panel']?> </a>
    </div>

    <div class="card">

        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new Admin</p>

            <form action="<?php dirname(__DIR__) ?>/admin/register" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="prenom" class="form-control" placeholder="First name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="nom" class="form-control" placeholder="Last name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password-retype" class="form-control" placeholder="Retype password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <a href="<?php dirname(__DIR__)?>/Views/admin/login.php" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->


<?php
    include_once "layout/links/footerLinks.php";
?>

</body>
</html>