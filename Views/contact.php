<?php global $GLOBAL_DIR; global $lang?>

<div class="container-lg ha-contact-container">
    <center style="margin: 15px auto">
        <h2>
            <strong>
                <?= $lang['contact'].' '.$lang['us'] ?>
            </strong>
        </h2>
    </center>
    <form method="post" class="ha-contact-form" action="<?php echo $GLOBAL_DIR ?>/contact">
        <div class="form-row">
            <div class="col">
                <label ><?= $lang['firstName'] ?></label>
                <input type="text" name="prenom" class="form-control ha-prenom" >
            </div>
            <div class="col">
                <label ><?= $lang['lastName'] ?></label>
                <input type="text" name="nom" class="form-control ha-nom" >
            </div>
        </div>
        <div class="form-group">
            <label >Email </label>
            <input type="email" name="email" class="form-control ha-email" >
        </div>
        <div class="form-group">
            <label >Subject</label>
            <input type="text" name="subject" class="form-control ha-subject" >
        </div>
        <div class="form-group">
            <label >Message</label>
            <textarea name="message"  class="form-control" id="ha-message" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary ha-contact-btn"><?= $lang['send'] ?></button>
    </form>
</div>

