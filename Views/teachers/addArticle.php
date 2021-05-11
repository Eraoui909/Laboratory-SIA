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
