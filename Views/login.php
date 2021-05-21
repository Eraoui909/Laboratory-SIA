<?php global $GLOBAL_DIR ?>

<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100">
            <div class="retour">
                <a class="loginAnch" href="<?php echo $GLOBAL_DIR ?>/"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="login100-pic js-tilt" data-tilt>
                <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/login.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="<?php echo $GLOBAL_DIR ?>/login">
                <span class="login100-form-title">
                    Member Login
                </span>

                <div class="badLogin" <?= !empty($_SESSION['flash_messages']) ? '' : 'style="padding:0; border:0;"'?> >
                    <span><?= $_SESSION['flash_messages']['error']['value'][0] ?? '' ?></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="loginInput input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
					</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="loginInput input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
					</span>
                </div>

                <div class="container-login100-form-btn">
                    <input class="loginInput login100-form-btn" type="submit" value="login">
                </div>

                <div class="forgetPass">
						<span class="txt1">
							Forgot
						</span>
                    <a class="txt2 loginAnch" href="#">
                        Username / Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="<?php echo $GLOBAL_DIR ?>/js/login.js"></script>

