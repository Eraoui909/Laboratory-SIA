


<div class="container-lg">
    <center style="padding: 10px"><h3>Ajouter diplome</h3></center>
    <form action="<?php echo $GLOBAL_DIR ?>/teacher/diplome" class="add-diplome-form" method="post">

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['diplome_institut'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="institut"  class="form-control"  placeholder="<?= $lang['diplome_institut'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['institut']??"" ?></small>
            </div>
        </div>

         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['diplome_ville'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="ville"  class="form-control"  placeholder="<?= $lang['diplome_ville'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['ville']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['date_deplome_debut'] ?></label>
            <div class="col-sm-10">
                <input type="date" name="date_debut" value="" class="form-control" id="" placeholder="<?= $lang['date_experience_debut'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['date_debut']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['date_deplome_fin'] ?></label>
            <div class="col-sm-10">
                <input type="date" name="date_fin" value="" class="form-control" id="" placeholder="<?= $lang['date_experience_fin'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['date_fin']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['diplome_diplome'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="diplome"  class="form-control"  placeholder="<?= $lang['diplome_diplome'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['diplome']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['diplome_titre'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="titre"  class="form-control"  placeholder="<?= $lang['diplome_titre'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['titre']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label"><?= $lang['diplome_certificat'] ?></label>
            <div class="col-sm-10">
                <input type="text" name="certificat"  class="form-control"  placeholder="<?= $lang['diplome_certificat'] ?>">
                <small style="color: red"><?= $_SESSION['flash_messages']['experience_error']['value']['certificat']??"" ?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-success add-diplome-button"><?= $lang['add'] ?></button>
            </div>
        </div>

    </form>

    <hr>

    <center style="padding: 10px"><h3>Mes diplomes</h3></center>
    <div style="border: 1px solid #bababa;padding: 10px;box-shadow: 0px 0px 15px 0px #9e9e9e">
        <table id="diplome-table" class="display" style="width:100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Institut</th>
                <th>Ville</th>
                <th>DATE</th>
                <th>diplome</th>
                <th>Titre</th>
                <th>Certificat</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <?php if (is_array($diplomes))foreach ($diplomes as $diplome){ ?>
                <tr>
                    <td><?= $diplome['id'] ?></td>
                    <td><?= $diplome['institut']??"vide" ?></td>
                    <td><?= $diplome['ville']??"vide" ?></td>
                    <td><?= $diplome['date_debut']." - " .$diplome['date_fin'] ?></td>
                    <td><?= $diplome['diplome']??"vide" ?></td>
                    <td><?= $diplome['titre']??"vide" ?></td>
                    <td><?= $diplome['certificat']??"vide" ?></td>
                    <td>
                        <button class="btn btn-danger supp-diplome" data-id="<?= $diplome['id'] ?>"  style="background-color: #fe2b2b">
                            <i class="fa fa-trash-alt"></i> supprimer
                        </button>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>

</div>