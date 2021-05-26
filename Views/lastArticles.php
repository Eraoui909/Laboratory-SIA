
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                    <h4 class="ha-modal-title" style="font-weight: bold"></h4>
            </div>
            <div class="modal-body">
                <span class="ha-modal-journal" style="display: none"></span>
                <p class="ha-modal-researchers">
                <hr>
                <p class="ha-modal-abstract" style="text-indent: 50px;text-align: justify;color: black;"></p>
                <strong class="ha-modal-doi" style="display: block"></strong>
                <small class="ha-modal-date"></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid ha-lastarticles-container">

    <div class="ha-lastarticles">
        <div class="ha-title">
            <strong>Dern. actiualité  / Manif. scientifique</strong>
        </div>

        <div class="ha-content">
            <?php foreach ($params['articles'] as $param):?>
            <div class="ha-article">
                <a href="#" class="show-article-modal">
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

