<?php $data = []; global $lang;?>

<style>
    .contentEdit p{
        height: 250px;
    }

    .descriptionEdit p{
        height: 100px;
    }
</style>
<div class="content-wrapper" style="margin: 5px auto;">
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
                                <li class="nav-item"><a id="c1" class="nav-link storageTheClick " href="#activity" >Activity</a></li>
                                <li class="nav-item"><a id="c2" class="nav-link storageTheClick  " href="#timeline" >Mon CV</a></li>
                                <li class="nav-item"><a id="c3" class="nav-link storageTheClick " href="#settings" ><?= $lang['settings'] ?></a></li>
                                <li class="nav-item"><a id="c4" class="nav-link storageTheClick " href="#addArticle" ><?= $lang['add'] . ' Acticle' ?></a></li>
                                <li class="nav-item"><a id="c5" class="nav-link storageTheClick " href="#allArticle" ><?= 'all articles'?></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class=" tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="/adminLTE/dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                              <a href="#">Jonathan Burke Jr.</a>
                                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Shared publicly - 7:30 PM today</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                              <a href="#" class="link-black text-sm">
                                                <i class="far fa-comments mr-1"></i> Comments (5)
                                              </a>
                                            </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="/adminLTE/dist/img/user7-128x128.jpg" alt="User Image">
                                            <span class="username">
                                              <a href="#">Sarah Ross</a>
                                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                            </span>
                                            <span class="description">Sent you a message - 3 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Lorem ipsum represents a long-held tradition for designers,
                                            typographers and the like. Some people hate it and argue for
                                            its demise, but others ignore the hate as they create awesome
                                            tools to help create filler text for everyone from bacon lovers
                                            to Charlie Sheen fans.
                                        </p>

                                        <form class="form-horizontal">
                                            <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="/adminLTE/dist/img/user6-128x128.jpg" alt="User Image">
                                            <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                            <span class="description">Posted 5 photos - 5 days ago</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid" src="/adminLTE/dist/img/photo1.png" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="/adminLTE/dist/img/photo2.png" alt="Photo">
                                                        <img class="img-fluid" src="/adminLTE/dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3" src="/adminLTE/dist/img/photo4.jpg" alt="Photo">
                                                        <img class="img-fluid" src="/adminLTE/dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                            <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                        </p>

                                        <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                    </div>
                                    <!-- /.post -->
                                </div>

                                <!-- /.tab-pane for CV -->
                                <div class="tab-pane" style="overflow: hidden" id="timeline">
                                    <a href="/teacher/cv/downoald">
                                        <i class="fa fa-download" style="color: #3659c1"></i>
                                    </a>
                                    <?php include_once "cv.php";?>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane " id="settings">
                                    <form class="form-horizontal" method="post" action="/teacher/profile" enctype="multipart/form-data">

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
                                                <input style="display: none" type="file" name="pictures[]" class="form-control hiddenInput" id="profileImg" placeholder="Avatar">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <a href="/teacher/deletePic" class="delete-path"> <?= $lang['deletePic'] ?></a>
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

                                <!-- #addArticle-->

                                <div class="tab-pane" id="addArticle">
                                    <form class="form-horizontal" method="post" action="/teacher/addArticle" enctype="multipart/form-data">

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['title'] ?? '')) ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['title'] ?></label>
                                            <div class="col-sm-10">

                                                <input type="text" name="title" class="form-control add-article-title"  placeholder="<?= $lang['title'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['description'] ?? '')) ?></p>
                                        </div>
                                        <div class="form-group row descriptionEdit">
                                            <label for="" class="col-sm-2 col-form-label">description</label>
                                            <div class="col-sm-10">
                                                <textarea name="description" class="add-article-description" style="width: 100%" rows="8"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['content'] ?? '')) ?></p>
                                        </div>
                                        <div class="form-group row contentEdit">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['content'] ?></label>
                                            <div class="col-sm-10">
                                                <textarea name="content" class="editor add-article-content" cols="30" rows="30"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?=  ($_SESSION['flash_messages']['errors']['value']['uploads'][0] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="ArticleImg" class="col-sm-2 col-form-label"><?= $lang['avatar'] ?></label>
                                            <div class="col-sm-10 ">
                                                <label for="ArticleImg" class="col-sm-2 col-form-label UploadLabel"><?= $lang['add picture'] ?></label>
                                                <input style="display: none" type="file" name="ArticlePic[]" class="form-control hiddenInput" id="ArticleImg" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-dange add-article-button"><?= $lang['submit'] ?></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class=" tab-pane" id="allArticle">
                                    <?php include_once 'All Articles.php';?>
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

<script>
    items = document.querySelectorAll( '.editor' );
    items.forEach(function(item){
        ClassicEditor
            .create( item )
            .then(editor => {
                window.editor = editor;
                YourEditor = editor;
            })
            .catch( error => {
                console.error( error );
            });
    })

</script>
