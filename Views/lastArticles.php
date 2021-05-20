

<div class="container-fluid ha-lastarticles-container">

    <div class="ha-lastarticles">
        <div class="ha-title">
            <strong>Dern. actiualité  / Manif. scientifique</strong>
        </div>

        <div class="ha-content">
            <?php foreach ($params['marquee'] as $param):?>
            <div class="ha-article">
                <a href="#">
                    <p> <?= $param['title']; ?> <span> ...Lire la suite → </span></p>
                </a>
                <small><?= $param['date']; ?></small>
            </div>
            <?php endforeach;?>
        </div>

    </div>

</div>