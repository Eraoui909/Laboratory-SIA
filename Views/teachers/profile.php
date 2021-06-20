<?php
    $data = [];
    global $lang;
    global $GLOBAL_DIR;
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

<div class="content-wrapper" style="margin: 5px auto; background-image: linear-gradient(to bottom,#f3f5fa,#F3F5F8,#F3F5F8,white);">
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
                                     src="<?=  $GLOBAL_DIR .'/Storage/uploads/users/' . $avatar;  ?>"
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

                            <p class="text-muted">Faculté des science est technique</p>

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
                                <li class="nav-item"><a id="c3" class="nav-link storageTheClick " data-toggle="tab" href="#settings" ><?= $lang['settings'] ?></a></li>
                                <li class="nav-item"><a id="c7" class="nav-link storageTheClick " data-toggle="tab" href="#changePass" ><?= $lang['modify'] .' '. $lang['password'] ?></a></li>
                                <li class="nav-item"><a id="c4" class="nav-link storageTheClick " data-toggle="tab" href="#addArticle" ><?= $lang['add'] . ' Acticle' ?></a></li>
                                <li class="nav-item"><a id="c5" class="nav-link storageTheClick " data-toggle="tab" href="#allArticle" ><?= $lang['allArticles'] ?></a></li>
                                <li class="nav-item"><a id="c2" class="nav-link storageTheClick " data-toggle="tab" href="#cv" ><?= $lang['cv'] ?></a></li>
                                <li class="nav-item"><a id="c1" class="nav-link storageTheClick " data-toggle="tab" href="#experience" ><?= $lang['experience_pro'] ?></a></li>
                                <li class="nav-item"><a id="c6" class="nav-link storageTheClick " data-toggle="tab" href="#diplomes" ><?= $lang['diplomes'] ?></a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- #settings-->
                                <div class="tab-pane " id="settings">
                                    <?php include_once "settings.php";?>
                                </div>

                                <!-- #modifyPass-->
                                <div class="tab-pane " id="changePass">
                                    <?php include_once "modifyPassword.php";?>
                                </div>


                                <!-- #addArticle-->
                                <div class="tab-pane" id="addArticle">
                                    <?php include_once "addArticle.php";?>
                                </div>

                                <!-- #allArticle-->
                                <div class=" tab-pane" id="allArticle">
                                    <?php include_once 'All Articles.php';?>
                                </div>

                                <!-- #experience-->
                                <div class="tab-pane" id="experience">
                                    <?php include_once "experience_pro.php";?>
                                </div>

                                <!-- #diplomes -->
                                <div class=" tab-pane" id="diplomes">
                                    <?php include_once 'diplomes.php';?>
                                </div>

                                <!-- /.tab-pane for CV -->
                                <div class="tab-pane" style="overflow: hidden" id="cv">
                                    <a href="<?php echo $GLOBAL_DIR ?>/teacher/cv/downoald?cv=<?= $idd ?>" target="_blank">
                                        <i class="fa fa-download" style="color: #3659c1"></i>
                                    </a>
                                    <?php include_once "cv.php";?>
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
