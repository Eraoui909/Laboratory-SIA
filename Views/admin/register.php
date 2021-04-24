
<div class="container">

    <?php

        /*
        if(isset($_SESSION['admin_registered']) && !empty($_SESSION['admin_registered'])){

            if(isset($_SESSION['admin_registered']['success_msg']))
            {
                echo '<div class="alert alert-success">'.$_SESSION["admin_registered"]["success_msg"].'</div>';
            }
            if(isset($_SESSION['admin_registered']['error_msg']))
            {
                print_r($_SESSION['admin_registered']['error_msg']);
                //exit();
                foreach ($_SESSION['admin_registered']['error_msg'] as $error)
                {
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }

            }
            unset($_SESSION['admin_registered']);
        }
        */

        $session = new \app\core\Session();
        if($session->hasSession('flash_messages'))
        {
            if(isset($_SESSION['flash_messages']['success_msg']))
            {
                    echo '<div class="alert alert-success">'.$_SESSION['flash_messages']['success_msg']['value'].'</div>';
            }

            if(isset($_SESSION['flash_messages']['error_msg']))
            {
                if(is_array($_SESSION['flash_messages']['error_msg']['value']))
                {
                    foreach ($_SESSION['flash_messages']['error_msg']['value'] as $error)
                    {
                        echo '<div class="alert alert-danger">'.$error.'</div>';
                    }
                }else if(is_string($_SESSION['flash_messages']['error_msg']['value'])){
                    echo '<div class="alert alert-danger">'.$_SESSION['flash_messages']['error_msg']['value'].'</div>';
                }

            }
        }

    ?>

    <form method="POST" action="/public/admin/register">
        <div class="form-group">
            <label for="exampleInputEmail1">User Name</label>
            <input name="username" type="text" class="form-control" id="exampleInputEmail1" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Gender</label>
            </div>
            <select class="custom-select" name="sexe" id="inputGroupSelect01">
                <option value="homme" selected>Men</option>
                <option value="femmme">Women</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>