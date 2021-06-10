<?php global $GLOBAL_DIR; ?>

<nav class="flex my-navbar">
    <div class="links flex">
        <ul>
            <li class="keep icone" id="menu-btn-icon"><i class="fas fa-bars"></i></li>
            <li><a href="<?php echo $GLOBAL_DIR ?>/"><?= $lang['home'] ?></a></li>
            <li class="account-link">
                <a href="#"><?= $lang['presentation'] ?></a>
                <div class="drop-down">
                    <a href="<?php echo $GLOBAL_DIR ?>/motDePresident"><?= $lang['moDePresident'] ?></a>
                    <a href="<?php echo $GLOBAL_DIR ?>/presentation"> presentation de labo </a>
                    <a href="<?php echo $GLOBAL_DIR ?>/conditionSoutnance"><?= $lang['conditionDeSoutnance'] ?></a>
                </div>
            </li>

            <li><a href="<?php echo $GLOBAL_DIR ?>/teachers"><?= $lang['enseignants'] ?></a></li>
            <li><a href="<?php echo $GLOBAL_DIR ?>/doctorants"><?= $lang['doctorants'] ?></a></li>
        </ul>
    </div>
    <div class="logo">
        <a class="navbar-brand" href="<?php echo $GLOBAL_DIR ?>/"><img width="140px" height="50px"  src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/logo.jpg" alt=""></a>
    </div>
    <div class="links flex">
        <ul>
            <li><a href="/presentation"><?= $lang['aboutUs']?></a></li>
            <li><a href="<?php echo $GLOBAL_DIR ?>/contact"><?= $lang['contact'] ?></a></li>
            <li class="account-link keep lang">
                <?php
                    if (isset($_SESSION['token'])){ ?>
                            <a href="#"><span class="hide"><?php echo $lang['account'] ?> </span> <span class="show"><i class="fas fa-user"></i></span></a>
                            <div class="drop-down">
                                <a href="<?php echo $GLOBAL_DIR ?>/teacher/profile">profile</a>
                                <a href="<?php echo $GLOBAL_DIR ?>/logout"><?php echo $lang['logout'] ?></a>
                            </div>
                <?php
                    }else
                        echo '<a href="'.$GLOBAL_DIR .'/login"><span class="hide">'.  $lang["login"] .' </span> <span class="show"><i class="fa fa-sign-in-alt"></i></span></a>';
                ?>

            </li>
            <li class="account-link keep lang">
                <a href="#"><i class="fas fa-globe"></i> <span class="hide">lang</span> <i class="fas fa-caret-down"></i></a>
                <div class="drop-down">
                    <a href="<?php echo $GLOBAL_DIR ?>/lang/fr"><?= $lang['fr']?></a>
                    <a href="<?php echo $GLOBAL_DIR ?>/lang/en"><?= $lang['en']?></a>
                </div>
            </li>
        </ul>
    </div>

    <div class="menu" id="menuRespBar">
        <ul>
            <li><a href="<?php echo $GLOBAL_DIR ?>/"><?= $lang['home'] ?></a></li>

            <li class="presentation"><a href="#"><?= $lang['presentation'] ?> <i style="padding: 8px 0 0 4px; font-size: 25px" class="fas fa-angle-down"></i></a></li>
            <li class="presentation-drop-down hidden drop"><a href="<?php echo $GLOBAL_DIR ?>/motDePresident"><?= $lang['moDePresident'] ?> </a></li>
            <li class="presentation-drop-down hidden drop"><a href="<?php echo $GLOBAL_DIR ?>/presentation"> presentation de labo </a></li>
            <li class="presentation-drop-down hidden drop"><a href="<?php echo $GLOBAL_DIR ?>/conditionSoutnance"><?= $lang['conditionDeSoutnance'] ?></a></li>

            <li><a href="<?php echo $GLOBAL_DIR ?>/teachers"><?= $lang['enseignant'] ?></a></li>
            <li><a href="<?php echo $GLOBAL_DIR ?>/doctorants"><?= $lang['doctorant'] ?></a></li>
            <li><a href="#"><?= $lang['aboutUs']?></a></li>
            <li><a href="<?php echo $GLOBAL_DIR ?>/contact"><?= $lang['contact'] ?></a></li>

        </ul>
    </div>
</nav>