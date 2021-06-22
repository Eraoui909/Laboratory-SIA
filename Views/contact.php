<?php global $GLOBAL_DIR ?>

<div class="container-lg ha-contact-container">
    <center style="margin: 15px auto">
        <h2>
            <strong>
                Contacter Nous
            </strong>
        </h2>
    </center>
    <form method="post" class="ha-contact-form" action="<?php echo $GLOBAL_DIR ?>/contact">
        <div class="form-row">
            <div class="col">
                <label >First name</label>
                <input type="text" name="prenom" class="form-control ha-prenom" >
            </div>
            <div class="col">
                <label >Last name</label>
                <input type="text" name="nom" class="form-control ha-nom" >
            </div>
        </div>
        <div class="form-group">
            <label >Email address</label>
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

        <button type="submit" class="btn btn-primary ha-contact-btn">Submit</button>
    </form>
</div>

