<?php global $GLOBAL_DIR ?>
<div class="container">
    <form method="post" action="<?php echo $GLOBAL_DIR ?>/contact">
        <div class="form-group">
            <label >Email address</label>
            <input type="email" name="email" class="form-control" >
        </div>
        <div class="form-group">
            <label >Message</label>
            <textarea name="message"  class="form-control" cols="30" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

