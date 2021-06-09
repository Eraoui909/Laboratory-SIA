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
        <label for="" class="col-sm-2 col-form-label"><?= $lang['abstract'] ?></label>
        <div class="col-sm-10">
            <textarea name="abstract" placeholder="<?= $lang['abstract'] ?>"  class="form-control add-article-description" style="padding: 5px;width: 100%; border-top: 1px solid;" rows="6"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['journal'] ?? '')) ?></p>
    </div>
    <div class="form-group row contentEdit">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['journal'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="journal" class="form-control add-article-title"  placeholder="<?= $lang['journal'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['researchers'] ?? '')) ?></p>
    </div>
    <div class="form-group row contentEdit">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['researchers'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="researchers" class="form-control add-article-title"  placeholder="<?= $lang['researchers'] ?>">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['doi'] ?? '')) ?></p>
    </div>
    <div class="form-group row contentEdit">
        <label for="" class="col-sm-2 col-form-label">doi</label>
        <div class="col-sm-10">
            <input type="text" name="doi" class="form-control add-article-title"  placeholder="doi">
        </div>
    </div>


    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger add-article-button"><?= $lang['add'] ?></button>
        </div>
    </div>
</form>
