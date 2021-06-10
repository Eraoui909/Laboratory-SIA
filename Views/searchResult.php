
<?php
    /*echo "<pre>";
    print_r($_SESSION['article_after_search']);
    echo "</pre>";*/
global $article_after_search;
?>
<div class="container-fluid ha-lastarticles-container">

    <div class="ha-lastarticles">
        <div class="ha-title">
            <strong>Résultat | Manif. scientifique</strong>
        </div>

        <div class="ha-content">
            <?php foreach ($article_after_search as $param):?>
                <div class="ha-article">
                    <a style="cursor: pointer" class="show-article-modal">
                        <p> <?= $param['title']; ?> <span  data-toggle="modal" data-target="#exampleModal"
                                                           data-title="<?= $param['title']; ?>"
                                                           data-abstract="<?= $param['abstract']; ?>"
                                                           data-journal="<?= $param['journal']; ?>"
                                                           data-researchers="<?= $param['researchers']; ?>"
                                                           data-date="<?= $param['date']; ?>"
                                                           data-doi="<?= $param['doi']; ?>"
                            > ...Lire la suite → </span></p>
                    </a>
                    <small class="badge badge-info" style="width: fit-content;padding: 4px"><?= $param['date']; ?></small>
                </div>
            <?php endforeach;?>
        </div>

    </div>

</div>

