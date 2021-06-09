
<?php $data = empty($params) ? [] : $params; global $lang; ?>

<div class="content-wrapper">

    <div class="modal fade show" id="modal-add-enseignant-doctorant" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="modal-add-enseignant-doctorant">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $lang['add'] . ' ' . $lang['enseignant']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="modal-add-enseignant-doctorant-close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                        <form action="/admin/enseignant/add" class="form-add-enseignant-doctorant" method="post">
                            <input type="hidden" name="specialite" value="ens">
                            <div class="input-group mb-3">
                                <input type="text" name="prenom" class="form-control" placeholder="<?=$lang['firstName']?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nom" class="form-control" placeholder="<?=$lang['lastName']?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="<?=$lang['password']?>">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- /.col -->
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" id="modal-add-enseignant-doctorant-close-btn" data-dismiss="modal"><?=$lang['close']?></button>
                                    <button type="submit" class="btn btn-primary" id="modal-add-enseignant-add-btn"><?= $lang['add'] ?></button>
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

    <div class="modal fade show" id="modal-modify-enseignant-doctorant" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?=$lang['modify'] . ' ' . $lang['enseignant']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="modal-modify-enseignant-doctorant-close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-modify-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="/" class="form-modify-enseignant-doctorant" method="post">
                        <div class="input-group mb-3">
                            <input type="hidden" name="id" class="form-control input-modify-id" placeholder=>
                            <input type="text" name="prenom" class="form-control input-modify-prenom" placeholder="<?=$lang['firstName']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="nom" class="form-control input-modify-nom"  placeholder="<?=$lang['lastName']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="email" class="form-control input-modify-email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="<?=$lang['password']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <!-- /.col -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" id="modal-modify-enseignant-doctorant-close-btn" data-dismiss="modal"><?=$lang['close']?></button>
                                <button type="submit" class="btn btn-success" id="modal-modify-enseignant-modify-btn"><?=$lang['modify']?></button>
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
                <h3><?=$lang['enseignant']?>s</h3>
            </div>
                <button class="btn btn-info" id="add-enseignant-doctorant-btn" style="margin-left: 20px;cursor: pointer;">
                    <?=$lang['add'] . ' ' . $lang['enseignant']?>
                </button>
        </div>
        <div class="card-body">
            <table id="enseignant-doctorant-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th><?=$lang['firstName']?></th>
                    <th><?=$lang['lastName']?></th>
                    <th>Email</th>
                    <th><?=$lang['phone']?></th>
                    <th><?=$lang['avatar']?></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $ens){ ?>
                    <tr>
                        <td><?= $ens['prenom'] ?></td>
                        <td><?= $ens['nom'] ?></td>
                        <td><?= $ens['email'] ?></td>
                        <td><?= $ens['tel'] ?></td>
                        <td><img width="45px" height="40px" src="\Storage\uploads\users\<?= $ens['avatar'] ?>" alt="ensignant picture"> </td>
                        <td>
                            <button class="btn-sm btn-success btn-show-modify-form"
                                    data-prenom="<?= $ens['prenom'] ?>"
                                    data-id="    <?= $ens['id']     ?>"
                                    data-nom="   <?= $ens['nom']    ?>"
                                    data-tel="   <?= $ens['tel']    ?>"
                                    data-email=" <?= $ens['email']  ?>">
                                <i class="fa fa-edit"></i>
                                <span> <?=$lang['modify']?></span>
                            </button>
                            <button class="btn-sm btn-danger btn-sm delete-enseignant-btn" data-id="<?= $ens['id'] ?>">
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