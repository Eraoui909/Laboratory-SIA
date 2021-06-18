<div class="container-lg">
    <center>
        <h2>Changement de password</h2>
    </center>
    <form method="post" action="" class="form-horizontal ha-change-pass-form">
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['password'] ?></label>
            <div class="col-sm-10">
                <input type="password"  name="pass1" class="form-control ha-pass1"  placeholder="<?= $lang['password'] ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">repeat <?= $lang['password'] ?></label>
            <div class="col-sm-10">
                <input type="password"  name="pass2" class="form-control ha-pass2"  placeholder="repeat <?= $lang['password'] ?>">
            </div>
        </div>
    </form>

    <button class="btn btn-danger ha-modify-pass">
        <?= $lang['modify'] ?>
    </button>
</div>