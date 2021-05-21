<?php global $GLOBAL_DIR ?>
<div class="ha-single-article">

    <div class="ha-single-article-title">
        <h1>
            <?php echo $params[0]['title'] ?>
        </h1>
    </div>

    <div class="ha-single-article-img">
        <img src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/articles/<?= $params[0]['picture'] ?>" alt="article image">
    </div>

    <div class="ha-single-article-date">
        <small><?php echo $params[0]['date'] ?></small>
    </div>

    <div class="ha-single-article-content">
        <?= htmlspecialchars_decode( $params[0]['content'] )?>
    </div>

    <div class="ha-single-article-footer">
        <strong>created by : </strong> <?= $params[0]['nom'] . ' ' . $params[0]['prenom'] ?>
    </div>

</div>