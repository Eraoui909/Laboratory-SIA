<?php global $GLOBAL_DIR ;
//echo "<pre>";
//print_r($params['events']);
//echo "<pre>";

?>
<style>
    body{
        background-image: linear-gradient(to bottom,#ECEFF1,#ECEFF1,#ECEFF1,#ECEFF1,white);
    }
</style>

<div class="container-fluid ha-events-container"  style="margin: 0px auto; ">

    <div class="ha-events">
        <?php
        if(isset($params['events']) && !empty($params['events'])):
        foreach ($params['events'] as $event): ?>
            <section class="ha-event-card">
                <div class="ha-header">
                    <div class="img">
                        <img src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/events/<?= $event['picture'] ?>" alt="">
                    </div>
                    <div class="title">
                        <a href="#">
                            <h2> <?= $event['title'] ?>  </h2>
                        </a>
                    </div>
                    <hr>
                </div>
                <div class="ha-body">
                    <p>
                        la date de l'evenement : <?= $event['date_event']." ".$event['time_event'] ?>
                    </p>
                </div>
                <div class="ha-footerr">
                    <hr>
                    <span style="cursor: pointer;" class="ha-drop-down">voir l'évenement <i class="fa fa-chevron-down"></i></span>

                </div>
                <div class="ha-event-drop-down" style="display: none">
                    <strong>description de l'évenement : </strong>
                    <center>
                        <p>
                            <?= $event['description'] ?>
                        </p>
                    </center>
                    <strong>lieu de l'évenement : </strong>
                    <center>
                        <p>
                            <?= $event['lieu'] ?>
                        </p>
                    </center>
                </div>
        </section>
        <?php endforeach; endif; ?>
    </div>

    <div class="ha-gift">
        <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/evenement-gift.gif" alt="evenement gift">
    </div>

</div>

