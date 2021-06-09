<?php global $lang;?>
<!-- Content Wrapper. Contains profile content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $lang['profile'] ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $lang['home'] ?></a></li>
                        <li class="breadcrumb-item active"><?= $lang['profile'] ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="<?= '/Storage/uploads/users/' . $avatar;  ?>"
                                     alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $prenom . " " . $nom;  ?></h3>

                            <p class="text-muted text-center"><?= $lang['admin_specialite'] ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <br> <a class="float-right"><?= $email;  ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b><?= $lang['phone'] ?></b> <br> <a class="float-right"><?= $tel;  ?></a>
                                </li>

                            </ul>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><?= $lang['aboutMe'] ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> <?= $lang['education'] ?></strong>

                            <p class="text-muted">
                                <?= $lang['degree'] ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> <?= $lang['location'] ?></strong>

                            <p class="text-muted"><?= $lang['locationCity'] ?></p>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab"><?= $lang['settings'] ?></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['prenom'] ?? '')) ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['firstName'] ?></label>
                                            <div class="col-sm-10">

                                                <input type="text" value="<?= $prenom ?>" name="prenom" class="form-control" id="" placeholder="First Name">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['nom'] ?? '')) ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['lastName'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nom" value="<?= $nom ?>" class="form-control" id="" placeholder="Last Name">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['email'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" value="<?= $email ?>" class="form-control" id="" placeholder="Email">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['phone'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="tel" value="<?= $tel ?>" class="form-control" id="" placeholder="Tel">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?=  ($_SESSION['flash_messages']['errors']['value']['uploads'][0] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="profileImg" class="col-sm-2 col-form-label"><?= $lang['avatar'] ?></label>
                                            <div class="col-sm-10 ">
                                                <label for="profileImg" class="col-sm-2 col-form-label UploadLabel"><?= $lang['updatePic'] ?></label>
                                                <input type="file" name="pictures[]" class="form-control hiddenInput" id="profileImg" placeholder="Avatar">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <a href="/admin/deletePic" class="delete-path"> <?= $lang['deletePic'] ?></a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger"><?= $lang['submit'] ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->