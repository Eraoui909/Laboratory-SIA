<?php global $GLOBAL_DIR ?>
<div class="cards-container">
    <!--    <div class="teachers-title">-->
    <!--        <h1>Liste des enseignants</h1>-->
    <!--    </div>-->
    <?php foreach ($params['person'] as $param){ ?>
        <div class="card">
            <div class="header-card">
                <div class="profile-img">
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/users/<?= $param['avatar'] ?>" height="100px" style="border-radius: 50%">
                </div>
                <div class="header-content">
                    <h3><?= $param['prenom'] ." ". $param['nom'] ?></h3>
                    <p>software engineer</p>
                </div>
                <br>
                <div class="buttons">
                    <span class="more">more <i class="fas fa-chevron-circle-down"></i></span>
                </div>

                <div class="style"></div>
            </div>
            <div class="description">
                <table>
                    <tr>
                        <td>E-mail: </td>
                        <td><?= $param['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Thematique: </td>
                        <td><?= $param['thematique'] ?></td>

                    </tr>
                </table>
                <a href="<?php echo $GLOBAL_DIR ?>/teacher/cv/downoald?cv=<?= $param['id'] ?>" target="_blank">
					<span class="show-cv">
						Show CV
					</span>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
