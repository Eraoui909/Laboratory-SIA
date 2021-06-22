<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="/Storage/Statics/images/logoLaboFst(35X35).png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $lang['dashboard_title']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="\Storage\uploads\users\<?= $_SESSION['token']['admin']['avatar'] ?>" class="img-circle elevation-2" alt="User Image">

            </div>
            <div class="info">
                <a href="/admin/profile" class="d-block"><?=  $_SESSION['token']['admin']['prenom'] ." ". $_SESSION['token']['admin']['nom'] ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
      with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="/admin/dashboard" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?= $lang['dashboard']; ?>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            <?= $lang['searchers']?>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="/admin/enseignant" class="nav-link">
                                <i class="fa fa-user-tie nav-icon"></i>
                                <p><?= $lang['enseignant']?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/doctorant" class="nav-link">
                                <i class="fa fa-user-graduate nav-icon"></i>
                                <p><?= $lang['doctorant']?></p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/teams" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?= $lang['team']; ?>s
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/events" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?= $lang['event']; ?>s
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/newsletter" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            <?= $lang['newsletter']; ?>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/inbox" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Inbox
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>