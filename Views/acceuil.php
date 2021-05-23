<?php global $GLOBAL_DIR ?>
<?php

?>
<div class="ha-acceuil-container">

    <div class="container-fluid">

        <div class="ha-acceuil-statistics">

            <div class="section section-1">
                <span> <i class="fa fa-search"></i> Resultat pour </span>
                <center><p><strong>Laboratoir SIA - FST FES</strong></p></center>
            </div>

            <div class="section section-2">
                <a href="#">
                    <div class="card-teacher">
                        <div class="icon">
                            <i class="fa fa-chalkboard-teacher"></i>
                        </div>
                        <div class="content">
                            <center>
                                <strong><?= $params['nbrOfTeacher'] ?></strong><p><strong>Enseignant</strong></p>
                            </center>
                        </div>
                    </div>
                </a>
            </div>

            <div class="section section-3">
                <a href="#" class="ha-toggle-teams-table">
                    <div class="card-article">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="content">
                            <center>
                                <strong><?= $params['nbrOfTeam'] ?></strong><p><strong>Groupes</strong></p>
                            </center>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="ha-teams-dropdown ha-teams-dropdown-style">
            <table class="table table-hover  table-responsive-lg">
                <thead>
                    <tr>
                        <th>Nom du group</th>
                        <th>Membres du group </th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $calsses = ["badge-info","badge-success","badge-secondary","badge-danger","badge-warning"];
                    foreach ($params['teams'] as $team):?>
                            <tr>
                                <td ><?= $team['thematic'] ?></td>
                                <td>
                                    <?php foreach ($team['enseignant'] as $ens){
                                        echo '<span class="badge '.$calsses[rand(0,4)].'" style="padding: 6px">'.$ens['prenom'].' '.$ens['nom'].'</span>   ';
                                    } ?>
                                </td>
                                <td>
                                    <?php foreach ($team['enseignant'] as $ens): ?>
                                    <img class="ha-teams-images" src="<?php echo $GLOBAL_DIR ?>/Storage/uploads/users/<?php echo $ens['avatar'] ?>" alt="">
                                    <?php endforeach;?>
                                </td>
                            </tr>

                        <?php endforeach;?>


                </tbody>
            </table>
        </div>

    </div>

</div>