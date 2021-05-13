

<nav class="flex my-navbar">
    <div class="links flex">
        <ul>
            <li class="keep icone" id="menu-btn-icon"><i class="fas fa-bars"></i></li>
            <li><a href="/"><?= $lang['home'] ?></a></li>
            <li class="account-link">
                <a href="#"><?= $lang['presentation'] ?></a>
                <div class="drop-down">
                    <a href="/motDePresident"><?= $lang['moDePresident'] ?></a>
                    <a href="/presentation"> presentation de labo </a>
                    <a href="/conditionSoutnance"><?= $lang['conditionDeSoutnance'] ?></a>
                </div>
            </li>

            <li><a href="/teachers"><?= $lang['enseignants'] ?></a></li>
            <li><a href="/doctorants"><?= $lang['doctorants'] ?></a></li>
        </ul>
    </div>
    <div class="logo">
        <a class="navbar-brand" href="/"><img width="140px" height="50px" src="/Storage/Statics/images/logo.jpg" alt=""></a>
    </div>
    <div class="links flex">
        <ul>
            <li><a href=""><?= $lang['aboutUs']?></a></li>
            <li><a href="/contact"><?= $lang['contact'] ?></a></li>
            <li class="account-link keep lang">
                <?php
                    if (isset($_SESSION['token']))
                        echo '
                            <a href="#"><span class="hide">' . $lang['account'] . '</span> <span class="show"><i class="fas fa-user-alt"></i></span></a>
                            <div class="drop-down">
                                <a href="/logout">' . $lang['logout'] . '</a>
                                <a href="/teacher/profile">' . $lang['settings'] . ' </a>
                            </div>
                        ';
                    else
                        echo '<a href="/login">' . $lang['login'] . '</a>';
                ?>

            </li>
            <li class="account-link keep lang">
                <a href="#"><i class="fas fa-globe"></i> <span class="hide">lang</span> <i class="fas fa-caret-down"></i></a>
                <div class="drop-down">
                    <a href="/lang/fr"><?= $lang['fr']?></a>
                    <a href="/lang/en"><?= $lang['en']?></a>
                </div>
            </li>
        </ul>
    </div>

    <div class="menu" id="menuRespBar">
        <ul>
            <li><a href="/"><?= $lang['home'] ?></a></li>

            <li class="presentation"><a href="#"><?= $lang['presentation'] ?> <i style="padding: 8px 0 0 4px; font-size: 25px" class="fas fa-angle-down"></i></a></li>
            <li class="presentation-drop-down hidden drop"><a href="/motDePresident"><?= $lang['moDePresident'] ?> </a></li>
            <li class="presentation-drop-down hidden drop"><a href="/presentation"> presentation de labo </a></li>
            <li class="presentation-drop-down hidden drop"><a href="/conditionSoutnance"><?= $lang['conditionDeSoutnance'] ?></a></li>

            <li><a href="/teachers"><?= $lang['enseignant'] ?></a></li>
            <li><a href="/doctorants"><?= $lang['doctorant'] ?></a></li>
            <li><a href=""><?= $lang['aboutUs']?></a></li>
            <li><a href="/contact"><?= $lang['contact'] ?></a></li>

        </ul>
    </div>
</nav>