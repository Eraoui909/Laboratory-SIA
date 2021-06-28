<?php global $GLOBAL_DIR;
        global $lang;
?>

<div class="container-fluid ha-container-respons"  style="margin: 0px auto;
    width: 80%;">
    <div class="home__sector card card--1dp home__margin-block">
        <div class="title-flex-w-img title-flex-w-img__center">
            <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/pictograms-google-material-format-list-bulleted.svg" width="36" alt="" height="36">
            <h2 class="h4-like"><?= $lang['exploreEvents'] ?></h2>
        </div>
        <ul class="sectors">

            <?php if(isset($params['lastEvents'][1]) && !empty($params['lastEvents'][0])): ?>
                <li class="sectors__start-top">
                    <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][0]['picture'] ?>)" >
                        <div>
                            <h3 class="h6-like">
                                <a href="#" >
                                    <span> <?= $params['lastEvents'][0]['title'] ?></span>
                                    <span><?= $params['lastEvents'][0]['date_event']." ". $params['lastEvents'][0]['time_event'] ?></span>
                                </a>
                            </h3>
                        </div>
                    </div>
                </li>
            <?php endif; ?>


            <?php if(isset($params['lastEvents'][1]) && !empty($params['lastEvents'][1])): ?>
                <li class="sectors__start-bottom">
                    <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][1]['picture'] ?>)" >
                        <div>
                            <h3 class="h6-like">
                                <a href="#">
                                    <span><?= $params['lastEvents'][1]['title'] ?></span>
                                    <span><?= $params['lastEvents'][1]['date_event']." ". $params['lastEvents'][1]['time_event'] ?></span>
                                </a>
                            </h3>
                        </div>
                    </div>
                </li>
            <?php endif; ?>

            <?php if(isset($params['lastEvents'][2]) && !empty($params['lastEvents'][2])): ?>
                 <li class="sectors__middle-top">
                <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][2]['picture'] ?>)" >
                    <div>
                        <h3 class="h6-like">
                            <a href="#" >
                                <span><?= $params['lastEvents'][2]['title'] ?></span>
                                <span><?= $params['lastEvents'][2]['date_event']." ". $params['lastEvents'][2]['time_event'] ?></span>
                            </a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <?php if(isset($params['lastEvents'][3]) && !empty($params['lastEvents'][3])): ?>
                <li class="sectors__end-top">
                <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][3]['picture'] ?>)" >
                    <div>
                        <h3 class="h6-like">
                            <a href="#" >
                                <span><?= $params['lastEvents'][3]['title'] ?></span>
                                <span><?= $params['lastEvents'][3]['date_event']." ". $params['lastEvents'][3]['time_event'] ?></span>
                            </a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <?php if(isset($params['lastEvents'][4]) && !empty($params['lastEvents'][4])): ?>
                <li class="sectors__middle-bottom">
                <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][4]['picture'] ?>)" >
                    <div>
                        <h3 class="h6-like">
                            <a href="#" >
                                <span><?= $params['lastEvents'][4]['title'] ?></span>
                                <span><?= $params['lastEvents'][4]['date_event']." ". $params['lastEvents'][4]['time_event'] ?></span>
                            </a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php endif; ?>

            <?php if(isset($params['lastEvents'][5]) && !empty($params['lastEvents'][5])): ?>
                <li class="sectors__end-bottom">
                <div style="background-image:url(<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $params['lastEvents'][5]['picture'] ?>)" >
                    <div>
                        <h3 class="h6-like">
                            <a href="#" >
                                <span><?= $params['lastEvents'][5]['title'] ?></span>
                                <span><?= $params['lastEvents'][5]['date_event']." ". $params['lastEvents'][5]['time_event'] ?></span>
                            </a>
                        </h3>
                    </div>
                </div>
            </li>
            <?php endif; ?>


            <li class="sectors__cta">
                <a href="<?php echo $GLOBAL_DIR ?>/evenements"  class="btn btn--primary" >
                    <div>
                        <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/pictograms-google-material-format-list-bulleted.svg" width="36" alt="" height="36">
                        <span class="btn-label u-bold"><?= $lang['exploreEvents'] ?></span>
                    </div>
                </a>
            </li>

        </ul>
    </div>
</div>