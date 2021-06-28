<?php global $GLOBAL_DIR ?>
<div class="ha-footer" style="margin-top:100px;padding-top:200px;background-image: url('<?php echo $GLOBAL_DIR ?>/Storage/Statics/svgs/cloud-dark.svg')"><!--  -->

    <div class="ha-waves-left">
        <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/svgs/valley-white.svg"
             style="width: 100%;width: 100%;position: absolute;left: 0px;top: -121px;"
             alt="waves">
    </div>



    <div class="ha-footer-head" >

        <div class="ha-footer-head-sec ha-footer-head-sec1" style="width: 150%">
            <h3>SIA LAB</h3>
            <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/logoLaboFst.png" alt="logoLaboFst" width="200px" height="100px">
            <h4>Le laboratoire LSIA (Laboratoire des Systèmes Intelligents & Applications) a été accrédité la première fois en 2011 au sein de la Faculté des Sciences et Techniques de Fès, CED Sciences et Techniques de l’Ingénieur,
                Université Sidi Mohammed Ben Abdellah. Il est composé de 18 enseignants chercheurs permanents et 40 doctorants.</h4>

        </div>
        <div class="ha-footer-head-sec ha-footer-head-sec2">
            <h3><?= $lang['presentation'] ?></h3>
            <ul>
                <li>
                    <a href="<?php echo $GLOBAL_DIR ?>/motDePresident"><?= $lang['moDePresident'] ?></a>
                </li>
                <li>
                    <a href="<?php echo $GLOBAL_DIR ?>/presentation"><?= $lang['desc&historique'] ?></a>
                </li>
                <li>
                    <a href="<?php echo $GLOBAL_DIR ?>/conditionSoutnance"><?= $lang['conditionDeSoutnance'] ?></a>
                </li>
            </ul>
            <hr>

            <h3><?=  $lang['adminSide']?? 'Admin side' ?></h3>
            <ul>
                <li>
                    <a target="_blank" href="<?php echo $GLOBAL_DIR ?>/admin"><?= $lang['dashboard'] ?></a>
                </li>
            </ul>
        </div>
        <div class="ha-footer-head-sec ha-footer-head-sec3">
            <h3>Langue</h3>
            <ul>
                <li>
                    <a href="<?php echo $GLOBAL_DIR ?>/lang/en">English</a>
                </li>
                <li>
                    <a href="<?php echo $GLOBAL_DIR ?>/lang/fr">French</a>
                </li>
            </ul>
        </div>
        <div class="ha-footer-head-sec ha-footer-head-sec4">
            <h3>Collaboration</h3>
            <ul>
                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/u-picardie.png" alt="u-picardie"  width="30px" height="30px" style="border-radius: 50%">
                    <a href="https://www.u-picardie.fr/"  target="_blank">  UPJV, Amiens France</a>
                </li>
                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/umonpellier.png" alt="umonpellier"  width="30px" height="30px" style="border-radius: 50%">
                    <a href="https://www.umontpellier.fr/en/"  target="_blank">  Université de Montpelier</a>
                </li>
                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/CNR-ILC_Logo.png" alt="CNR-ILC_Logo"  width="30px" height="30px" style="border-radius: 50%">
                    <a href="http://www.ilc.cnr.it/"  target="_blank">  ILC-CNR de Pise en Italie</a>
                </li>

                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/Logo_CHU-final.png" alt="Logo_CHU-final" width="30px" height="30px" style="border-radius: 50%">
                    <a href="http://www.chu-fes.ma/en/home-en/"  target="_blank">  CHU de FES</a>
                </li>

                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/ul-logo.jpg" alt="ul-logo" width="30px" height="30px" style="border-radius: 50%">
                    <a href="https://www.ul.ie/"  target="_blank">  Université de Limerick Irlande</a>
                </li>

                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/fsdm-logo.png" alt="fsdm-logo" width="30px" height="30px" style="border-radius: 50%">
                    <a href="http://www.fsdmfes.ac.ma/"  target="_blank"> Laboratoire IMS de FSDM de Fes</a>
                </li>

                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/BL_logo.png" alt="BL_logo" width="30px" height="30px" style="border-radius: 50%">
                    <a href="https://www.berger-levrault.com/ma/"  target="_blank"> Entreprise Berger-Levrault Montpelier</a>
                </li>

                <li>
                    <img src="<?php echo $GLOBAL_DIR ?>/Storage/Statics/images/amis-logo.png" alt="amis-logo" width="30px" height="30px" style="border-radius: 50%">
                    <a href="http://ww2.fmp-usmba.ac.ma/blog/amiis/"  target="_blank"> Association Marocaine d’Ingénierie et d’Innovation en Santé (AMIIS).</a>
                </li>


            </ul>
        </div>

    </div>


    <div class="ha-footer-foot">
        <div class="ha-footer-foot-left">
            Copyright <?php echo date("Y")?> | LabSIA
        </div>
        <div class="ha-footer-foot-right">
            Developed by <span style="font-weight: bold;color: #d7d7d7;font-size: 18px">Hamza Eraoui</span> & <span style="font-weight: bold;color: #dbdbdb;font-size: 18px">Achraf Zaim</span>
        </div>

    </div>

</div>