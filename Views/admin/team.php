
<?php $teams = empty($params['teams']) ? [] : $params['teams']; $ens = empty($params['ens']) ? [] : $params['ens']; global $lang;?>

<div class="content-wrapper">

    <div class="modal fade show" id="add-div" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $lang['add'] . ' ' . $lang['team']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="/admin/team/add" class="add-team-form" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="thematic" class="form-control" placeholder="<?=$lang['thematic']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- /.col -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" id="close-btn" data-dismiss="modal"><?=$lang['close']?></button>
                                <button type="submit" class="btn btn-primary" id="add-team-btn"><?= $lang['add'] ?></button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade show" id="modify-div" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $lang['modify'] . ' ' . $lang['team']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="/admin/team/modify" class="modify-team-form" method="post">
                        <div class="input-group mb-3">
                            <select name="enseignant" id="">
                                <option value="" disabled selected>Select Teacher</option>
                                <?php foreach ($ens as $enseignant) {?>
                                    <option value="<?= $enseignant['id']?>"> <?= $enseignant['nom'] . ' ' . $enseignant['prenom'] ?> </option>
                                <?php }?>
                            </select>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-users"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- /.col -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" id="close-btn" data-dismiss="modal"><?=$lang['close']?></button>
                                <button type="submit" class="btn btn-primary" id="add-teacher-to-team-btn"><?= $lang['add'] . ' ' . $lang['enseignant'] ?></button>
                                <button type="submit" class="btn btn-primary" id="delete-teacher-frm-team-btn"><?= $lang['delete'] . ' ' . $lang['enseignant'] ?></button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="card" id="card-ens-doc">
        <div class="card-header">
            <div class="card-title">
                <h3><?=$lang['team']?>s</h3>
            </div>
            <button class="btn btn-info" id="show-add-btn" style="margin-left: 20px;cursor: pointer;">
                <?=$lang['add'] . ' ' . $lang['team']?>
            </button>
        </div>
        <div class="card-body">
            <table id="enseignant-doctorant-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th><?=$lang['thematic']?></th>
                    <th><?=$lang['enseignant']?>s</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($teams as $team){ ?>
                    <tr>
                        <td><?= $team['thematic'] ?></td>
                        <td><?= $team['teacher'] ?></td>
                        <td>
                            <button class="btn-sm btn-success show-add-teacher-btn"
                                    data-Id="<?= $team['equipeID'] ?>"
                                <i class="fa fa-edit"></i>
                                <span> <?=$lang['modify'] . ' ' . $lang['team']?></span>
                            </button>
                            <button class="btn-sm btn-danger btn-sm delete-team-btn" data-id="<?= $team['equipeID'] ?>">
                                <i class="fa fa-trash"></i>
                                <span> <?=$lang['delete']?></span>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


</script>
