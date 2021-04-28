

<nav class="flex">
    <div class="links flex">
        <ul>
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
            <li class="account-link">
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
                        echo '<li><a href="">' . $lang['login'] . '</a></li>';
                ?>

            </li>
            <li class="account-link">
                <a href=""><i class="fas fa-globe"></i> <i class="fas fa-caret-down"></i></a>
                <div class="drop-down">
                    <a href="/lang/fr"><?= $lang['fr']?></a>
                    <a href="/lang/en"><?= $lang['en']?></a>
                </div>
            </li>
        </ul>
    </div>
</nav>