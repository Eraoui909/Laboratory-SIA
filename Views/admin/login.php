
<?php global $lang; ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIA | Login</title>

    <?php
        include_once "layout/links/headerLinks.php";
    ?>

    <style>
        body{
            background-color: #e9ecef;
        }
        .login-box{
            margin: 10px auto;
            margin-top: 100px;
        }
    </style>

</head>
<body>


<div class="login-box">
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
    <div class="login-logo">
        <a href="#"><b>Admin</b>SIA</a>
    </div>

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="/admin/login" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
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
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block"><?= $lang['login']?></button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="#" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->





<?php
    include_once "layout/links/footerLinks.php";
?>

</body>
</html>