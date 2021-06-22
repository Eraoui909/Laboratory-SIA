


<div class="content-wrapper">
    <pre>
    <?php
        //print_r($_SESSION['flash_messages']);
    ?>
    </pre>

    <div class="card" id="card-ens-doc">
        <div class="card-header">
            <div class="card-title">
                <h3>NewsLetter inscriptions</h3>
            </div>
            <a href="/admin/sendEmails">
                <button class="btn btn-info" id="" style="margin-left: 20px;cursor: pointer;">
                    Envoyer
                </button>
            </a>
        </div>
            <?php
                if(isset($_SESSION['flash_messages']['msg_sent'])){
                    echo '<div class="container alert alert-success">'.$_SESSION['flash_messages']['msg_sent']['value'].'</div>';
                    unset($_SESSION['flash_messages']['msg_sent']);
                }
                if(isset($_SESSION['flash_messages']['msg_not_sent'])){
                    echo '<div class="container-lg alert alert-danger" style="margin-top: 10px">'.$_SESSION['flash_messages']['msg_not_sent']['value'].'</div>';
                    unset($_SESSION['flash_messages']['msg_not_sent']);
                }
            ?>

        <div class="card-body">

            <table class="table" id="newsletter-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($params['inscriptions']) && is_array($params['inscriptions'])) foreach ($params['inscriptions'] as $inscri): ?>
                                <tr>
                                    <td><?= $inscri['id'] ?></td>
                                    <td><?= $inscri['email'] ?></td>
                                    <td><?= $inscri['date_inscri'] ?></td>
                                    <td>
                                        <form action="/admin/newsletter/delete" method="post">
                                            <input type="hidden" name="id" value="<?= $inscri['id'] ?>">
                                            <button type="submit" class="btn btn-warning">supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

        </div>

    </div>

</div>