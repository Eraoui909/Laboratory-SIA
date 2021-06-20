

<div class="container-lg">
    <center style="padding: 10px"><h3>Ajouter experience</h3></center>
    <form class="experience-pro-form" action="<?php echo $GLOBAL_DIR ?>/teacher/experiencePro" method="post">

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

    <hr>

    <center style="padding: 10px"><h3>Mes experiences</h3></center>
    <div style="border: 1px solid #bababa;padding: 10px;box-shadow: 0px 0px 15px 0px #9e9e9e">
        <table id="experience-table" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>DATE</th>
                <th>Entreprise</th>
                <th>Fonction</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php if (is_array($experiences))foreach ($experiences as $experienc){ ?>
                <tr>
                    <td><?= $experienc['id'] ?></td>
                    <td><?= $experienc['date_debut']." - " .$experienc['date_fin'] ?></td>
                    <td><?= $experienc['entreprise'] ?></td>
                    <td><?= $experienc['fonction'] ?></td>
                    <td style="max-height: 100px;overflow: hidden;"><?= htmlspecialchars_decode($experienc['description']) ?></td>
                    <td>
                        <button class="btn btn-danger supp-experience" data-id="<?= $experienc['id'] ?>"  style="background-color: #fe2b2b">
                            <i class="fa fa-trash-alt"></i> supprimer
                        </button>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

</div>
