<div class="ha-single-article">

    <div class="ha-single-article-title">
        <h1>
            <?php echo $params['title'] ?>
        </h1>
    </div>

    <div class="ha-single-article-img">
        <img src="/Storage/uploads/articles/<?= $params['picture'] ?>" alt="article image">
    </div>

    <div class="ha-single-article-date">
        <small><?php echo $params['date'] ?></small>
    </div>

    <div class="ha-single-article-content">
        <p>
            <?php echo $params['description'] ?></p>
        <p>
                <?php echo htmlspecialchars_decode( $params['content'] )?>
        </p>
    </div>

    <div class="ha-single-article-footer">
        <strong>created by : </strong> Hamza Eraoui
    </div>

</div>