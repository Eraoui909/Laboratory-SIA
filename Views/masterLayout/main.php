<?php global $lang; global $GLOBAL_DIR; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/logoLaboFst(35X35).png">
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <?php if (isset($params['adminlte']) && $params['adminlte'] === true): ?>
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/adminLTE/dist/css/adminlte.min.css">
    <?php endif; ?>
    <?php if (isset($params['datatable']) && $params['datatable'] === true): ?>
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/js/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/Footer_Style.css">
    <?php if(isset($params['CV'])):
        include_once "CVHeader.php";
    endif; ?>
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/Home_Style.css">
    <?php if (isset($params['style'])) foreach ($params['style'] as $style) {?>
        <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/<?= $style?>">
    <?php }
        if(isset($params['script']) && in_array('ckeditor.js',$params['script']))
        {
            ?><script src="<?php echo $GLOBAL_DIR ?>/js/ckeditor.js"></script>
    <?php
            unset($params['script']['ckeditor']);
        }
    ?>
    <title>SIA | <?= $title ?></title>
    <link rel="stylesheet" href="<?php echo $GLOBAL_DIR ?>/css/main.css">
</head>

<body >
<div class="to-top">
    <span> <i class="fa fa-arrow-up"></i></span>
</div>
<div class="ha-global-popup-newsletter ha-global-popup-newsletter-active">
</div>
<div id="load">
    <img src="<?= $GLOBAL_DIR ?>/Storage/Statics/images/reload.gif" style="width: 150px;height: 150px;"  alt="">

</div>
<?php /*
********************** ************************************************************************** **********************
********************** ************************** News Letter pop up **************************** **********************
********************** ************************************************************************** **********************
  */ ?>
<div class="ha-newletter-container ha-global-popup-newsletter-active">
    <div class="ha-newsletter-content">
        <center>
            <h1><?= $lang['JoinOurNewsletter'] ?></h1>
            <p><?= $lang['newsLetterMsg'] ?></p>
            <div>
                <form action="/newsletter/inscription" method="post">
                    <input type="email" name="email" class="newsletter-email" placeholder="  Entrer votre addresse email">
                    <button type="submit" class="btn btn-secondary ha-abonner-newsletter">S'abonner</button>
                </form>
            </div>
        </center>
    </div>
</div>
<?php /*
********************** ************************************************************************** **********************
********************** **************************       Nav Bar      **************************** **********************
********************** ************************************************************************** **********************
  */ ?>

<?php
if($null != true)
{
    echo '<div class="head" style="position: relative;">
            <p>Decouvrez les recherches de nos <b>professeurs</b> sur notre siteweb du laboratoire <b>LSIA</b> .</p>
            <div class="ha-close-head">X</div>
        </div>';
    include_once "navBar.php";
}
?>

{{ content }}

<?php /*
********************** ************************************************************************** **********************
********************** **************************       Footer       **************************** **********************
********************** ************************************************************************** **********************
*/ ?>
<?php
if($null != true)
    include_once "footer.php";
?>

<script src="<?php echo $GLOBAL_DIR ?>/js/jquery.comjquery-3.5.1.min.js"></script>
<script src="<?php echo $GLOBAL_DIR ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $GLOBAL_DIR ?>/font-awesome-4.7.0/all.min.js"></script>
<?php if (isset($params['adminlte']) && $params['adminlte'] === true): ?>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/dist/js/adminlte.js"></script>
<?php endif; ?>
<?php if (isset($params['datatable']) && $params['datatable'] === true): ?>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<?php endif; ?>

<script src="<?php echo $GLOBAL_DIR ?>/adminLTE/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="<?php echo $GLOBAL_DIR ?>/js/navbar.js"></script>

<?php if (isset($params['script'])) foreach ($params['script'] as $script) {?>
    <script src="<?php echo $GLOBAL_DIR ?>/js/<?= $script?>"></script>
<?php }?>

<script src="<?php echo $GLOBAL_DIR ?>/js/main.js""></script>

</body >
</html>