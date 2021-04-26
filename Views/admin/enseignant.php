
<?php

use app\models\EnseignantModel;
$enseignant = new EnseignantModel();
$data = $enseignant->getAll();
?>

<div class="content-wrapper">

    <div class="modal fade show" id="modal-add-enseignant" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="modal-add-enseignant">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter Enseignant</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" id="modal-add-enseignant-close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant">

                    </div>
                </div>
                <div class="modal-body">
                        <form action="/admin/enseignant/add" class="form-add-enseignat" method="post">
                            <div class="input-group mb-3">
                                <input type="text" name="prenom" class="form-control" placeholder="First name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="nom" class="form-control" placeholder="Last name">
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
                                <input type="password" name="password" class="form-control" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <!-- /.col -->
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" id="modal-add-enseignant-close-btn" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="modal-add-enseignant-add-btn">Ajouter</button>
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

    <div class="card" id="hamza">
        <div class="card-header">
            <div class="card-title">
                <h3>Enseignants</h3>
            </div>
                <button class="btn btn-info" id="add-enseignant-btn" style="margin-left: 20px;cursor: pointer;">
                    Ajouter enseignant
                </button>
        </div>
        <div class="card-body">
            <table id="enseignant-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Tel</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $ens){ ?>
                    <tr>
                        <td><?php echo $ens['prenom'] ?></td>
                        <td><?php echo $ens['nom'] ?></td>
                        <td><?php echo $ens['email'] ?></td>
                        <td><?php echo $ens['tel'] ?></td>
                        <td><img width="45px" height="40px" src="\Storage\uploads\users\<?php echo $ens['avatar'] ?>" alt="ensignant picture"> </td>
                        <td>
                            <button class="btn-sm btn-success ">
                                <i class="fa fa-edit"></i>
                                <span> Modify</span>
                            </button>
                            <button class="btn-sm btn-danger btn-sm">
                                <i class="fa fa-trash"></i>
                                <span> Delete</span>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>