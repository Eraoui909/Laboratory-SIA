
<?php global $lang; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $lang['dashboard']?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $lang['home']?></a></li>
                        <li class="breadcrumb-item active"><?= $lang['dashboard']?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php if(empty($nbrOfEnseignant)){
                                    echo 0;
                                }else{
                                    echo $nbrOfEnseignant;
                                } ?>
                            </h3>

                            <p><?= $lang['nbrOfEnseignant']?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-tie"></i>
                        </div>
                        <a href="/admin/enseignant" class="small-box-footer"><?= $lang['moreInfo']?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php if(empty($nbrOfDoctorant)){
                                    echo 0;
                                }else{
                                    echo $nbrOfDoctorant;
                                } ?>
                            </h3>

                            <p><?= $lang['nbrOfDoctorant']?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-graduate"></i>
                        </div>
                        <a href="/admin/doctorant" class="small-box-footer"><?= $lang['moreInfo']?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?php if(empty($nbrOfArticles)){
                                    echo 0;
                                }else{
                                    echo $nbrOfArticles;
                                } ?>
                            </h3>

                            <p><?= $lang['nbrArticle'] ?> </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="/articles" class="small-box-footer"><?= $lang['moreInfo']?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php if(empty($nbrMsgNotReadable)){
                                echo 0;
                                }else{
                                echo $nbrMsgNotReadable;
                                } ?>
                            </h3>

                            <p><?= $lang['Message_not_seen'] ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer"><?= $lang['moreInfo']?> <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>