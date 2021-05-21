<form class="form-horizontal" method="post" action="<?php echo $GLOBAL_DIR ?>/teacher/profile" enctype="multipart/form-data">

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['prenom'] ?? '')) ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['firstName'] ?></label>
        <div class="col-sm-10">
            <input type="text" value="<?= $prenom ?>" name="prenom" class="form-control" id="" placeholder="First Name">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['nom'] ?? '')) ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['lastName'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="nom" value="<?= $nom ?>" class="form-control" id="" placeholder="Last Name">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['email'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" value="<?= $email ?>" class="form-control" id="" placeholder="Email">
        </div>
    </div>


    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['phone'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="tel" value="<?= $tel ?>" class="form-control" id="" placeholder="Tel">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['thematique'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['thematique'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="thematique" value="<?= $thematique ?>" class="form-control" id="" placeholder="Tel">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['nbr_annee_experience'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['nbr_annee_experience'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="nbr_annee_experience" class="form-control"  value="<?= $nbr_annee_experience ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?=  ($_SESSION['flash_messages']['errors']['value']['uploads'][0] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="profileImg" class="col-sm-2 col-form-label"><?= $lang['avatar'] ?></label>
        <div class="col-sm-10 ">
            <label for="profileImg" class="col-sm-2 col-form-label UploadLabel"><?= $lang['updatePic'] ?></label>
            <input style="display: none" type="file" name="pictures[]" class="form-control hiddenInput" id="profileImg" placeholder="Avatar">
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <a href="<?php echo $GLOBAL_DIR ?>/teacher/deletePic" class="delete-path"> <?= $lang['deletePic'] ?></a>
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['date_naissance'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['date_naiss'] ?></label>
        <div class="col-sm-10">
            <input type="date" name="date_naissance" value="<?= $date_naissance ?>" class="form-control" id="" placeholder="Tel">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['etat_civil'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['etat_civil'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="etat_civil" value="<?= $etat_civil ?>" class="form-control" id="" placeholder="Tel">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['addresse'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['addresse'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="addresse" value="<?= $addresse ?>" class="form-control" id="" placeholder="Tel">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['situation_present'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['situation_present'] ?></label>
        <div class="col-sm-10">
            <textarea name="situation_present" style="width: 100%" rows="10"><?= $situation_present ?></textarea>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['qualification_principale'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['qualification_principale'] ?></label>
        <div class="col-sm-10">
            <textarea name="qualification_principale" class="qualification_editor" style="width: 100%" rows="15"><?= $qualification_principale ?></textarea>
        </div>
    </div>


    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger"><?= $lang['submit'] ?></button>
        </div>
    </div>
</form>
