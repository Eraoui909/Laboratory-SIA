<?php $data = []; global $lang;
/*echo "<pre>";
print_r($_SESSION['flash_messages']['errors']);
echo "</pre>";*/
?>

<style>
    .contentEdit p{
        height: 250px;
    }

    .descriptionEdit p{
        height: 100px;
    }
    input.form-control.form-control-sm{
        height: auto;
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
                            <strong><i class="fas fa-book mr-1"></i> <?= $lang['thematique'] ?></strong>

                            <p class="text-muted">
                                <?= $thematique ?>
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> <?= $lang['addresse'] ?></strong>

                            <p class="text-muted"><?= $addresse ?></p>

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
                                <li class="nav-item"><a id="c3" class="nav-link storageTheClick " href="#settings" ><?= $lang['settings'] ?></a></li>
                                <li class="nav-item"><a id="c4" class="nav-link storageTheClick " href="#addArticle" ><?= $lang['add'] . ' Acticle' ?></a></li>
                                <li class="nav-item"><a id="c5" class="nav-link storageTheClick " href="#allArticle" ><?= $lang['allArticles'] ?></a></li>
                                <li class="nav-item"><a id="c2" class="nav-link storageTheClick  " href="#timeline" ><?= $lang['cv'] ?></a></li>
                                <li class="nav-item"><a id="c1" class="nav-link storageTheClick " href="#activity" ><?= $lang['experience_pro'] ?></a></li>
                                <li class="nav-item"><a id="c6" class="nav-link storageTheClick " href="#diplomes" ><?= $lang['diplomes'] ?></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class=" tab-pane" id="activity">

                                    <?php include_once "experience_pro.php";?>

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
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['thematique'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['thematique'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="thematique" value="<?= $thematique ?>" class="form-control" id="" placeholder="Tel">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['nbr_annee_experience'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['nbr_annee_experience'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nbr_annee_experience" class="form-control"  value="<?= $nbr_annee_experience ?>">
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

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['date_naissance'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['date_naiss'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="date" name="date_naissance" value="<?= $date_naissance ?>" class="form-control" id="" placeholder="Tel">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['etat_civil'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['etat_civil'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="etat_civil" value="<?= $etat_civil ?>" class="form-control" id="" placeholder="Tel">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['addresse'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['addresse'] ?></label>
                                            <div class="col-sm-10">
                                                <input type="text" name="addresse" value="<?= $addresse ?>" class="form-control" id="" placeholder="Tel">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['situation_present'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['situation_present'] ?></label>
                                            <div class="col-sm-10">
                                                <textarea name="situation_present" style="width: 100%" rows="10"><?= $situation_present ?></textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-sm-2"></div>
                                            <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['qualification_principale'] ?? '') ?></p>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label"><?= $lang['qualification_principale'] ?></label>
                                            <div class="col-sm-10">
                                                <textarea name="qualification_principale" class="qualification_editor" style="width: 100%" rows="15"><?= $qualification_principale ?></textarea>
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
                                    <form class="form-horizontal add-article-form" method="post" action="/teacher/addArticle" enctype="multipart/form-data">

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
                                                <textarea name="content" class="editor1 add-article-content" cols="30" rows="30"></textarea>
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


                                <div class=" tab-pane" id="diplomes">
                                    <?php include_once 'diplomes.php';?>
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
                //console.log( 'Editor was initialized', editor );
                window.editor = editor;
                YourEditor = editor;
            })
            .catch( error => {
                console.error( error );
            });
    });

    iteme = document.querySelectorAll( '.editor1' );
    iteme.forEach(function(item){
        ClassicEditor
            .create( item )
            .then(editor => {
                //console.log( 'Editor was initialized', editor );
                window.editor = editor;
                MyEditor = editor;
            })
            .catch( error => {
                console.error( error );
            });
    });

    iteme = document.querySelectorAll( '.qualification_editor' );
    iteme.forEach(function(item){
    ClassicEditor
        .create( item )
        .then(editor => {
            //console.log( 'Editor was initialized', editor );
            window.editor = editor;
            qualificationEditor = editor;
        })
        .catch( error => {
            console.error( error );
        });
    })

    iteme = document.querySelectorAll( '.description_experience_editor' );
    iteme.forEach(function(item){
        ClassicEditor
            .create( item )
            .then(editor => {
                //console.log( 'Editor was initialized', editor );
                window.editor = editor;
                DescriptionExperienceEditor = editor;
            })
            .catch( error => {
                console.error( error );
            });
    });

</script>
