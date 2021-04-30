
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/teacher/modifyArticleImg" method="post" enctype="multipart/form-data">
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

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="container tab-pane active" id="addArticle">
                    <form class="form-horizontal" id="modify-article-form" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['title'] ?? '')) ?></p>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['title'] ?></label>
                            <div class="col-sm-10">

                                <input type="text" value="" name="title" class="form-control article-title" id="" placeholder="<?= $lang['title'] ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['description'] ?? '')) ?></p>
                        </div>
                        <div class="form-group row descriptionEdit">
                            <label for="" class="col-sm-2 col-form-label">description</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="article-description" cols="70" rows="8" ></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2"></div>
                            <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['content'] ?? '')) ?></p>
                        </div>
                        <div class="form-group row contentEdit">
                            <label for="" class="col-sm-2 col-form-label"><?= $lang['content'] ?></label>
                            <div class="col-sm-10">
                                <textarea name="content"  class="editor" id="article-content" cols="30" rows="30"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="articleID" class="article-id">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <p class="col-sm-10 error-message"><?=  ($_SESSION['flash_messages']['errors']['value']['uploads'][0] ?? '') ?></p>
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
                    <th><?= 'date'?></th>
                    <th><?=$lang['avatar']?></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /* echo "<pre>";
                    print_r($articles);
                echo "</pre>"; */
                foreach ($articles as $article){
                ?>
                    <tr>
                        <td><?= $article['title'] ?></td>
                        <td><?= $article['date'] ?></td>
                        <td class="edit-article-img" data-id="<?= $article['articleID'] ?>" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-edit"></i>
                            <img width="45px" height="40px" src="\Storage\uploads\articles\<?= $article['picture'] ?>" alt="article picture"> </td>
                        <td>
                            <button class="btn-sm btn-success btn-article-modify-form"
                                    data-toggle="modal"
                                    data-target=".bd-example-modal-lg"
                                    data-title="<?= $article['title'] ?>"
                                    data-id="    <?= $article['articleID'] ?>"
                                    data-description="   <?= $article['description']    ?>"
                                    data-content="   <?= $article['content']    ?>"
                                    data-teacher=" <?= $article['teacher']  ?>"
                                    data-date=" <?= $article['date']  ?>"
                                    data-picture=" <?= $article['picture']  ?>"
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
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>



