<form class="form-horizontal add-article-form" method="post" action="<?php echo $GLOBAL_DIR ?>/teacher/addArticle" enctype="multipart/form-data">

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
        <label for="" class="col-sm-2 col-form-label"><?= $lang['journal'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="journal" class="form-control add-article-title"  placeholder="<?= $lang['journal'] ?>">
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger"><?= $lang['submit'] ?></button>
        </div>
    </div>
</form>
