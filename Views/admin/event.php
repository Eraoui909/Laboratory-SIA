
<?php
    $events = empty($params['events']) ? [] : $params['events']; global $lang;
?>

<div class="content-wrapper">

<!--    add event-->
    <div class="modal fade show" id="add-div" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $lang['add'] . ' ' . $lang['event']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="" class="add-event-form" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="title" class="form-control" placeholder="<?=$lang['title']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="description" class="form-control" placeholder="<?='description'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="lieu" class="form-control" placeholder="<?='lieu'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" name="date" class="form-control" placeholder="<?='la date'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="time" name="time" class="form-control" placeholder="<?='le temp'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" name="pictures[]" accept="image/*" class="form-control">
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
                                <button type="submit" class="btn btn-primary" id="add-event-btn"><?= $lang['add'] ?></button>
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

<!--    modify event-->
    <div class="modal fade show" id="modify-div" style="display: none;background-color: #00000094; padding-right: 16px;" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg" id="">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $lang['modify'] . ' ' . $lang['event']?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="close">×</span>
                    </button>
                </div>
                <div class="contanier" style="width: 80%;margin: 10px auto;">
                    <div class="msg-add-enseignant-doctorant">

                    </div>
                </div>
                <div class="modal-body">
                    <form action="" class="modify-event-form" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="title" class="form-control input-modify-title" placeholder="<?=$lang['title']?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="description" class="form-control input-modify-description" placeholder="<?='description'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="text" name="lieu" class="form-control input-modify-lieu" placeholder="<?='lieu'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" name="date_event" class="form-control input-modify-date-event" placeholder="<?='la date'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="time" name="time" class="form-control input-modify-time" placeholder="<?='le temp'?>">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="hidden" name="picture" class="form-control input-modify-picture" >
                        </div>

                        <div class="input-group mb-3">
                            <input type="hidden" name="date" class="form-control input-modify-date" >
                        </div>

                        <div class="input-group mb-3">
                            <input type="hidden" name="id" class="form-control input-modify-id" placeholder="<?='lieu'?>">
                        </div>

                        <div class="input-group mb-3">
                            <input type="file" name="pictures[]" accept="image/*" class="form-control">
                        </div>

                        <div class="row">

                            <!-- /.col -->
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" id="close-btn" data-dismiss="modal"><?=$lang['close']?></button>
                                <button type="submit" class="btn btn-primary" id="modify-event-btn"><?= $lang['modify'] . ' ' . $lang['event'] ?></button>
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

<!--    show events-->
    <div class="card" id="card-ens-doc">
        <div class="card-header">
            <div class="card-title">
                <h3><?=$lang['event']?>s</h3>
            </div>
            <button class="btn btn-info" id="show-add-btn" style="margin-left: 20px;cursor: pointer;">
                <?=$lang['add'] . ' ' . $lang['event']?>
            </button>
        </div>
        <div class="card-body">
            <table id="enseignant-doctorant-table" class="display" style="width:100%">
                <thead>
                <tr>
                    <th><?=$lang['title']?></th>
                    <th><?=$lang['description']?>s</th>
                    <th><?='lieu' ?></th>
                    <th><?='date' ?></th>
                    <th><?='temps' ?></th>
                    <th><?='date d\'ajout' ?></th>
                    <th><?=$lang['avatar'] ?></th>
                    <th style="min-width: 261px">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php if (is_array($events)) foreach ($events as $event){ ?>
                    <tr>
                        <td><?= $event['title']?></td>
                        <td><?= $event['description']?>s</td>
                        <td><?= $event['lieu'] ?></td>
                        <td><?= $event['date_event'] ?></td>
                        <td><?= $event['time_event'] ?></td>
                        <td><?= $event['date'] ?></td>
                        <td><img src="/Storage/uploads/events/<?= $event['picture'] ?>" height="50px" alt=""></td>
                        <td>
                            <button class="btn-sm btn-success show-modify-event-btn"
                                    data-Id="<?= $event['eventID'] ?>"
                                    data-title="<?= $event['title'] ?>"
                                    data-description="<?= $event['description'] ?>"
                                    data-lieu="<?= $event['lieu'] ?>"
                                    data-date="<?= $event['date'] ?>"
                                    data-date-event="<?= $event['date_event'] ?>"
                                    data-time="<?= $event['time_event'] ?>"
                                    data-picture="<?= $event['picture'] ?>"

                            <i class="fa fa-edit"></i>
                            <span> <?=$lang['modify'] . ' ' . $lang['event']?></span>
                            </button>
                            <button class="btn-sm btn-danger btn-sm delete-event-btn"
                                    data-id="<?= $event['eventID'] ?>"
                                    data-picture="<?= $event['picture'] ?>"
                                    >
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

