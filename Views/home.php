<?php global $GLOBAL_DIR ?>
<?php global $lang ?>
<link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/HomeScript.css">
<!--https://via.placeholder.com/750x300-->

<div id="header">
    <!-- <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/svgs/valley-white-static.svg" alt="wave-header"
         style="
                position: absolute;
                z-index: 10;
                left: 0px;
                bottom: -190px;
                width: 100%;
               "
    > -->
    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/svgs/news-wave.svg"
         style="
                    position: absolute;
                    z-index: 10;
                    bottom: 0px;
                    width: 187px;
                    height: 30px;
                    left: 0px;
                   "
         alt="news-wave">
    <div style="
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 1;
        background-color: black;
        opacity: 0.5;
    ">
    </div>
    <div class="pop-up-search-box">
        <p><?= $lang['consulter_plus_de'] ?> <strong style="color: #A8D511"><?= $params['nbrOfArticles'] ?></strong> articles</p>
        <div class="pop-up-search-box-input">
            <div class="div-1">
                <input type="text" class="ha-search-input"  name="search-for-article" style="height: 100%" placeholder="<?= $lang['searchBoxPlaceHolder'] ?>">
            </div>
            <div class="div-2 ha-search-for-article" style="cursor: pointer">
                <span><?= $lang['search'] ?>  </span><i class="fa fa-search"></i>
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

<div style="position: relative">
    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/svgs/news-wave.svg"
         style="
                       position: absolute;
                        z-index: 10;
                        bottom: -70px;
                        width: 100%;
                        height: 30px;
                        transform: scaleY(-1);
                        left: 0px;
                   "
         alt="news-wave">
    <div class="simple-marquee-container" style="position: relative;">

        <div class="marquee-sibling " style="position:relative; font-size: 2vh;background-color: #6BB5CC">
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
</div>

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
                <strong class="ha-modal-doi" style="display: block;margin: 10px"></strong>
                <small class="ha-modal-date"></small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $lang['close'] ?></button>
            </div>
        </div>
    </div>
</div>


<div class="ha-content-and-search">
<!-- Page content-->
<?php include_once "acceuil.php";?>

<?php include "lastArticles.php";?>

<?php include_once "home_evenements.php";?>

</div>

<div class="ha-content-and-search-result" style=" padding:20px;display: none">

    <?php include "searchResult.php";?>


</div>


