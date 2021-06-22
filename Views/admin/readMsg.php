<div class="content-wrapper">

    <div class="container-sm">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Read Mail</h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                    <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="mailbox-read-info">
                    <h5><?= $params['msg'][0]['subject'] ?></h5>
                    <h6> <strong>From    :</strong> <?= $params['msg'][0]['email'] ?>
                        <span class="mailbox-read-time float-right"><?= $params['msg'][0]['date_time'] ?></span></h6>
                </div>
                <!-- /.mailbox-read-info -->

                <div class="mailbox-read-message">
                    <?= $params['msg'][0]['message'] ?>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
            <div class="card-footer">
                <div class="float-right">
                    <a href="mailto:<?= $params['msg'][0]['email'] ?>" class="btn btn-default">
                        <i class="fas fa-reply">  Reply</i>
                    </a>
                </div>
                <a  class="btn btn-default ha-delete-msg" data-id="<?= $params['msg'][0]['contactID'] ?>"><i class="far fa-trash-alt"></i> Delete</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    </div>

</div>