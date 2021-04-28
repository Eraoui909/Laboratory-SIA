

<nav class="flex my-navbar">
    <div class="links flex">
        <ul>
            <li class="keep icone" id="menu-btn-icon"><i class="fas fa-bars"></i></li>
            <li><a href="/"><?= $lang['home'] ?></a></li>
            <li><a href="/contact"><?= $lang['contact'] ?></a></li>
            <li><a href=""><?= $lang['enseignant'] ?></a></li>
            <li><a href=""><?= $lang['doctorant'] ?></a></li>
        </ul>
    </div>
    <div class="logo">
        <a class="navbar-brand" href="#"><img width="140px" height="50px" src="/Storage/Statics/images/logo.jpg" alt=""></a>
    </div>
    <div class="links flex">
        <ul>
            <li><a href=""><?= $lang['aboutUs']?></a></li>
            <li><a href=""><?= $lang['search']?></a></li>
            <li class="account-link keep">
                <?php
                    if (isset($_SESSION['token']))
                        echo '
                            <a href="">' . $lang['account'] . '</a>
                            <div class="drop-down">
                                <a href="">' . $lang['logout'] . '</a>
                                <a href="">' . $lang['settings'] . ' </a>
                            </div>
                        ';
                    else
                        echo '<a href="/login">' . $lang['login'] . '</a>';
                ?>

            </li>
            <li class="account-link keep">
                <a href=""><i class="fas fa-globe"></i> lang <i class="fas fa-caret-down"></i></a>
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
            <li><a href="/contact"><?= $lang['contact'] ?></a></li>
            <li><a href=""><?= $lang['enseignant'] ?></a></li>
            <li><a href=""><?= $lang['doctorant'] ?></a></li>
            <li><a href=""><?= $lang['aboutUs']?></a></li>
        </ul>
    </div>
</nav>