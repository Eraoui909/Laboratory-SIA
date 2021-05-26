<?php global $GLOBAL_DIR ?>
<link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/HomeScript.css">
<!--https://via.placeholder.com/750x300-->

<div id="header">

    <div class="pop-up-search-box">
        <p>Consulter plus de <strong style="color: #A8D511">200</strong> articles</p>
        <div class="pop-up-search-box-input">
            <div class="div-1">
                <input type="text" name="search-for-article" style="height: 100%" placeholder="le titre d'article..">
            </div>
            <div class="div-2">
                <span>Recherche  </span><i class="fa fa-search"></i>
            </div>
        </div>
    </div>

    <div class="slider1 slider active"></div>
    <div class="slider2 slider"></div>
    <div class="slider3 slider"></div>

    <div class="pagination">
        <ul>
            <li class="active"></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>


<div class="simple-marquee-container">
    <div class="marquee-sibling " style="font-size: 2vh;">
        News
    </div>
    <div class="marquee">

        <ul class="marquee-content-items">
            <?php
            $count = 0;
            foreach ($params['articles'] as $param):?>
            <li>
                <a href="#" data-toggle="modal" data-target="#exampleModal"
                   data-title="<?= $param['title']; ?>"
                   data-abstract="<?= $param['abstract']; ?>"
                   data-journal="<?= $param['journal']; ?>"
                   data-researchers="<?= $param['researchers']; ?>"
                   data-date="<?= $param['date']; ?>"
                   data-doi="<?= $param['doi']; ?>"
                ><?= $param['title']; ++$count; ?></a>
            </li>
            <?php
            if($count === 3)
                break;
            endforeach; ?>

        </ul>
    </div>
</div>
<!-- Page content-->
<?php include_once "acceuil.php";?>


<?php include_once "lastArticles.php";?>


<?php include_once "home_evenements.php";?>




