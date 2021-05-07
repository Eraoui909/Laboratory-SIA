

<div class="container">
    <?php
        echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
    ?>
    <div class="">
        <table id="article-table" class="display" style="width:100%">

        </table>
    </div>
    <form action="/teacher/experiencePro" method="post">

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['date_experience_debut'] ?></label>
            <div class="col-sm-10">
                <input type="date" name="date_debut" value="" class="form-control" id="" placeholder="<?= $lang['date_experience_debut'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['date_debut']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['date_experience_fin'] ?></label>
            <div class="col-sm-10">
                <input type="date" name="date_fin" value="" class="form-control" id="" placeholder="<?= $lang['date_experience_fin'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['date_fin']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['entreprise'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="entreprise" value="" class="form-control" id="" placeholder="<?= $lang['entreprise'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['entreprise']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['fonction'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="fonction" value="" class="form-control" id="" placeholder="<?= $lang['fonction'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['fonction']??"" ?></small>
            </div>
        </div>

        <div class="form-group row" >
            <label for="" class="col-sm-2 col-form-label"><?= $lang['description'] ?></label>
            <div class="col-sm-10">
                <textarea name="description" class="description_experience_editor" style="width: 100%" rows="10"></textarea>
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['description']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-success experience-pro-button"><?= $lang['add'] ?></button>
            </div>
        </div>

    </form>
</div>
