<?php
    global $GLOBAL_DIR;

use app\models\ContactModel;

$nbrMsgNotReadable  = ContactModel::getCountTable("WHERE readable=0");
$messages           = ContactModel::getAll("WHERE readable=0 ORDER BY contactID DESC");

?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link"><?php echo $lang['home']?></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/contact" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


        <!-- Profile Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-person-booth"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <img src="\Storage\uploads\users\<?php echo $_SESSION['token']['admin']['avatar'] ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?php echo  $_SESSION['token']['admin']['prenom'] ." ". $_SESSION['token']['admin']['nom'] ?>
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm"><?php echo $lang['admin_status'] ?></p>
                                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> online</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>


                <div class="dropdown-divider"></div>
                <a href="/admin/logout" class="dropdown-item dropdown-footer"><?php echo $lang['logout'] ?></a>
            </div>
        </li>
        <!-- End Profile Dropdown Menu -->

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-globe"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?php echo $lang['lang'] ?></span>
                <div class="dropdown-divider"></div>
                <a href="/lang/en" class="dropdown-item">
                    <i class="fas fa-language mr-2"></i> <?php echo $lang['en'] ?>
                </a>
                <div class="dropdown-divider"></div>
                <a href="/lang/fr" class="dropdown-item">
                    <i class="fas fa-language mr-2"></i> <?php echo $lang['fr'] ?>
                </a>
            </div>
        </li>


        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge"><?= $nbrMsgNotReadable; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <?php
                if(isset($messages) && !empty($messages)):
                  foreach ($messages as $msg):
                    ?>
                    <a href="/admin/readMsg?m=<?= $msg['contactID']; ?>" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="<?= $GLOBAL_DIR ?>/Storage/uploads/users/avatar.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    <?= $msg['prenom']." ".$msg['nom'] ?>
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm"><?= $msg['subject'] ?></p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= $msg['date_time'] ?></p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                <?php
                  endforeach;
                  endif;
                  ?>

                <a href="/admin/inbox" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!--
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
        -->
    </ul>
</nav>