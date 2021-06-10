<form class="form-horizontal ha-settings-form" method="post" action="<?php echo $GLOBAL_DIR ?>/teacher/profile" enctype="multipart/form-data">

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['prenom'] ?? '')) ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['firstName'] ?></label>
        <div class="col-sm-10">
            <input type="text" value="<?= $prenom ?>" name="prenom" class="form-control" id="" placeholder="<?= $lang['firstName'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= (($_SESSION['flash_messages']['errors']['value']['nom'] ?? '')) ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['lastName'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="nom" value="<?= $nom ?>" class="form-control" id="" placeholder="<?= $lang['lastName'] ?>">
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
            <input type="text" name="tel" value="<?= $tel ?>" class="form-control" id="" placeholder="<?= $lang['phone'] ?>">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['thematique'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['thematique'] ?></label>
        <div class="col-sm-10">
            <select class="form-control" name="thematique">
                <option selected value="<?= $thematique ?>"><?= $thematique ?></option>
                <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                <option value="Machine Learning">Machine Learning</option>
                <option value="Reconnaissance de formes">Reconnaissance de formes</option>
                <option value="Traitement et Analyse d’images">Traitement et Analyse d’images</option>
                <option value="Systèmes embarqués et Théorie de codes">Systèmes embarqués et Théorie de codes</option>
                <option value="Big Data">Big Data</option>
                <option value="Traitement Automatique de la parole et du locuteur">Traitement Automatique de la parole et du locuteur</option>
                <option value="Traitement des langues naturelles">Traitement des langues naturelles</option>
                <option value="Aide multicritère à la décision">Aide multicritère à la décision</option>
                <option value="E-Learning"> E-Learning</option>
                <option value="E-health">E-health</option>
                <option value="Gestion des connaissances">Gestion des connaissances</option>
                <option value="Data warehouse">Data warehouse</option>
                <option value="Datamining et aide à la décision">Datamining et aide à la décision</option>
                <option value="Réseaux ad hoc">Réseaux ad hoc</option>
                <option value="Sécurité réseau">Sécurité réseau</option>
            </select>
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
            <input style="display: none" type="file" name="pictures[]" class="form-control hiddenInput" id="profileImg" placeholder="$lang['avatar']">
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
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['grade'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"> Grade </label>
        <div class="col-sm-10">
            <input type="text" name="grade" value="<?= $grade ?>" class="form-control"  placeholder=" grade">
        </div>
    </div>


    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['situation_present'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['situation_present'] ?></label>
        <div class="col-sm-10">
            <input type="text" name="situation_present" class="form-control" placeholder="<?= $lang['situation_present'] ?>" style="width: 100%" value="<?= $situation_present ?>">
        </div>
    </div>



    <div class="row">
        <div class="col-sm-2"></div>
        <p class="col-sm-10 error-message"><?= ($_SESSION['flash_messages']['errors']['value']['qualification_principale'] ?? '') ?></p>
    </div>
    <div class="form-group row">
        <label for="" class="col-sm-2 col-form-label"><?= $lang['qualification_principale'] ?></label>
        <div class="col-sm-10">
            <textarea name="qualification_principale" rows="4"  style="width: 100%" rows="15"><?= $qualification_principale ?></textarea>
            <?php //if u want to apply ckeedutor add this class class="qualification_editor" ?>
        </div>
    </div>


    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" class="btn btn-danger btn-modify-settings"><?= $lang['submit'] ?></button>
        </div>
    </div>
</form>
