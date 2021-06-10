
<?php  global $lang; ?>


<style>

    tr td:last-of-type{
        min-width: 194px;
    }

    .card-body .btn{
        background-color: #007bff;
    }

    .card-body .btn:hover{
        background-color: #2f3e4e;
    }

    .btn span, .btn-sm span {
        color: #fff;
    }
</style>

<div class="content-wrapper " style="margin-left: 0">
    <!-- image modification pop up -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo $GLOBAL_DIR ?>/teacher/modifyArticleImg" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" name="pictures[]" id="">
                        <input type="hidden" class="articleIDHidden" name="articleID" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary edit-article-image">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- article modification pop up -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container tab-pane active" id="addArticle">
                    <form class="form-horizontal" id="modify-article-form" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['title'] ?></label>
                            <div class="col-sm-10">

                                <input type="text" value="" name="title" class="form-control article-title" id="" placeholder="<?= $lang['title'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group row descriptionEdit">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['abstract'] ?></label>
                            <div class="col-sm-10">
                                <textarea name="abstract" class="article-abstract form-control" cols="70" rows="8" ></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                        </div>
                        <div class="form-group row contentEdit">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['journal'] ?></label>
                            <div class="col-sm-10">
                                <input type="text" value="" name="journal" class="form-control article-journal" id="" placeholder="<?= $lang['journal'] ?>">
                            </div>
                        </div>

                        <div class="form-group row contentEdit">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['researchers'] ?></label>
                            <div class="col-sm-10">
                                <input type="text" value="" name="researchers" class="form-control article-researchers" id="" placeholder="<?= $lang['researchers'] ?>">
                            </div>
                        </div>

                        <div class="form-group row contentEdit">
                            <label for="" class="col-sm-2 col-form-label">Doi</label>
                            <div class="col-sm-10">
                                <input type="text" value="" name="doi" class="form-control article-doi" id="" placeholder="Doi>">
                            </div>
                        </div>


                        <input type="hidden" name="articleID" class="article-id">
                        <div class="row">
                            <div class="col-sm-2"></div>
                        </div>
                        <!--
                        <div class="form-group row">
                            <label for="ArticleImg" class="col-sm-2 col-form-label"><?= $lang['avatar'] ?></label>
                            <div class="col-sm-10 ">
                                <label for="ArticleImg" class="col-sm-2 col-form-label UploadLabel"><?= $lang['add picture'] ?></label>
                                <input  type="file" name="file[]" class="form-control hiddenInput article-modify-img" id="modify-file" >
                            </div>
                        </div>
                        -->

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger modify-article-btn"><?= $lang['submit'] ?></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="card" id="card-ens-doc">
        <div class="card-header">
            <div class="card-title">
                <h3>Articles</h3>
            </div>
        </div>
        <div class="card-body">
            <table id="article-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th><?=$lang['title']?></th>
                    <th><?=$lang['abstract']?></th>
                    <th><?=$lang['journal']?></th>
                    <th><?=$lang['researchers']?></th>
                    <th>Doi</th>
                    <th><?= 'date'?></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (!empty($articles))
                    foreach ($articles as $article){
                    ?>
                        <tr>
                            <td><?= $article['title'] ?></td>
                            <td><?= $article['abstract'] ?></td>
                            <td><?= $article['journal']?></td>
                            <td><?= $article['researchers']?></td>
                            <td><?= $article['doi']?></td>
                            <td><?= $article['date'] ?></td>
                            <td>
                                <button class="btn-sm btn-success btn-article-modify-form"
                                        data-toggle="modal"
                                        data-target=".bd-example-modal-lg"
                                        data-title="<?= $article['title'] ?>"
                                        data-id="    <?= $article['articleID'] ?>"
                                        data-abstract="   <?= $article['abstract']    ?>"
                                        data-journal="   <?= $article['journal']    ?>"
                                        data-doi="   <?= $article['doi']    ?>"
                                        data-researchers="   <?= $article['researchers']    ?>"
                                >
                                    <i class="fa fa-edit"></i>
                                    <span> <?=$lang['modify']?></span>
                                </button>
                                <button class="btn-sm btn-danger btn-sm delete-article-btn" data-id="<?= $article['articleID'] ?>">
                                    <i class="fa fa-trash"></i>
                                    <span> <?=$lang['delete']?></span>
                                </button>
                            </td>
                        </tr>
                <?php   }?>
                </tbody>
            </table>
        </div>
    </div>
</div>



