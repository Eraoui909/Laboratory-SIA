

<div class="container-fluid ha-lastarticles-container">



    <div class="ha-lastarticles">
        <div class="ha-title">
            <strong>Dern. actiualité  / Manif. scientifique</strong>
        </div>

        <div class="ha-content">
            <?php foreach ($params['articles'] as $param):?>
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

    <center style="margin: 10px auto">
        <nav aria-label="Page navigation example" style="width: fit-content" >
            <ul class="pagination" style="width: max-content;">
                <li class="page-item">
                    <a class="page-link"
                       href="<?php $p=1; (isset($_GET['n'])&&$_GET['n']!=1)?$p=($_GET['n']-1) :$p=1; echo "\?n=".$p; ?>"
                       aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only"><?= $lang['previous'] ?></span>
                    </a>
                </li>
                <?php  for($i=1;$i<=$params['nbrPage'];$i++): ?>
                    <?php if($i > 4):
                        if($i == $params['nbrPage']-1){
                            echo '<li class="page-item"><a class="page-link" href="#">...</a></li>';
                            echo '<li class="page-item"><a class="page-link" href="/?n='. ($i+1) .'">'.  ($i+1) .'</a></li>';
                        }
                        continue;
                    endif; ?>
                    <li class="page-item"><a class="page-link" href="/?n=<?php echo $i ?>"><?php echo $i ?></a></li>

                <?php  endfor; ?>
                <li class="page-item" >
                    <a class="page-link"
                       href="<?php $p=$params['nbrPage']; (isset($_GET['n'])&&$_GET['n']!=$params['nbrPage'])?$p=($_GET['n']+1) :$p=$params['nbrPage']; echo "\?n=".$p; ?>"
                       aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only"><?= $lang['next'] ?></span>
                    </a>
                </li>
            </ul>
        </nav>
    </center>

</div>

