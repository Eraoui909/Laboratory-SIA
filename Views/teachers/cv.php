
<?php global $lang;
global $GLOBAL_DIR;
//echo "<pre>";
    //print_r($experiences);
    //echo "</pre>";
?>

<div class="container ha-cv-container" style="" id="myPDF">

    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Header -->
        <header class="header pull-left">

            <!-- Mobile menu -->


            <div class="avatar">
                <img src="<?=  $GLOBAL_DIR .'/Storage/uploads/users/' . $avatar;  ?>" alt="avatar">
            </div>

            <div class="name">
                <center>
                    <h3 style="font-size: 18px;font-weight: bold"><?php echo $prenom ." ".$nom;  ?></h3>
                </center>
            </div>

            <!-- Navigation bar -->
            <nav class="main-nav">
                <ul class="navigation">
                        <li style="font-size: 15px"><strong>Email:</strong> <?php echo $email ;?></li>
                        <li style="font-size: 15px"><strong>Phone:</strong> <?php echo $tel ;?></li>
                </ul>
            </nav>
            <!-- Navigation bar end -->


        </header>
        <!-- Header end -->

        <!-- Main Content -->
        <div class="main-content pull-right">


            <!-- Section About -->
            <section id="about" class="about">

                <div class="section-header">
                    <h2><?= $lang['aboutMe'] ?></h2>

                </div>

                <!-- Intro -->
                <div class="intro">

                    <table class="table">
                        <tr>
                            <td><strong><?= $lang['firstName'] ?>:</strong></td>
                            <td><?= $prenom ?> </td>
                        </tr>
                        <tr>
                            <td><strong><?= $lang['lastName'] ?>:</strong></td>
                            <td><?= $nom ?> </td>
                        </tr>
                        <tr>
                            <td><strong>Grade</strong></td>
                            <td><?= $grade ?> </td>
                        </tr>
                        <tr>
                            <td><strong>Thématique</strong></td>
                            <td><?= $thematique ?> </td>
                        </tr>


                    </table>

                </div>
                <!-- Intro end -->


            </section>
            <!-- Section About end -->

            <!-- Section Diplomes -->
            <section id="experience" class="resume">

                <div class="section-header">
                    <h2>Diplomes</h2>

                </div>

                <div class="row">


                    <?php
                    if(isset($diplomes) && !empty($diplomes)){
                        foreach ($diplomes as $diplome){ ?>
                            <table class="table">
                                <tr>
                                    <td style="width: 60%">
                                        <strong style="font-size: 16px"><?= $diplome['diplome'] ?></strong>
                                        <p>
                                            <span><?= $diplome['titre']." ".$diplome['certificat']." ". $diplome['institut'].", ". $diplome['ville'] ?></span>
                                        </p>
                                    </td>
                                    <td style="width: 40%">
                                        <center><?= $diplome['date_debut']." - ". $diplome['date_fin'] ?></center>
                                    </td>
                                </tr>
                            </table>
                    <?php }} ?>

                    <!-- Page 1 End -->



                </div>

            </section>
            <!-- Section Diplomes end -->

            <!-- Section Resume -->
            <section id="experience" class="resume">

                <div class="section-header">
                    <h2>Experience</h2>

                </div>

                <div class="row">


                    <?php
                    if(isset($experiences) && !empty($experiences)){
                    foreach ($experiences as $exp){ ?>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="top-item ">
                                <h2><?= $exp['entreprise'] ?></h2>
                                <span><?= $exp['fonction'] ?>  |  <?= $exp['date_debut']." - ". $exp['date_fin'] ?></span>
                                <p>
                                    <?= htmlspecialchars_decode($exp['description']) ?>
                                </p>
                            </div>
                        </div>
                        <br>
                    <?php }} ?>

                    <!-- Page 1 End -->



                </div>

            </section>
            <!-- Section Resume end -->








            <!-- Situation present-->
            <section id="works" class="works clearfix">

                <div class="section-header">
                    <h2><?= $lang['situation_present'] ?></h2>
                </div>

                <!-- Control -->
                <div class="control">
                    <ul>
                        <li class="active">
                            <?= $situation_present ?>
                        </li>
                    </ul>
                </div>

            </section>
            <!-- Situation present end -->

            <!-- Nombre d’années d’expérience-->
            <section id="works" class="works clearfix">

                <div class="section-header">
                    <h2><?= $lang['nbr_annee_experience'] ?></h2>
                </div>

                <!-- Control -->
                <div class="control">
                    <ul>
                        <li class="active">
                            <?= $nbr_annee_experience ."  années" ?>
                        </li>
                    </ul>
                </div>

            </section>
            <!-- Nombre d’années d’expérience end -->
            <!-- Qualifications principales-->
                <section id="works" class="works clearfix">

                    <div class="section-header">
                        <h2><?= $lang['qualification_principale'] ?></h2>
                    </div>

                    <!-- Control -->
                    <div class="control">
                        <ul>
                            <li class="active">
                                <?= htmlspecialchars_decode($qualification_principale)  ?>
                            </li>
                        </ul>
                    </div>

                </section>
            <!-- Qualifications principales end -->

             <!-- Section of Articles  -->
            <section id="testimonials" class="testimonials">

                <div class="section-header">
                    <h2>Les articles</h2>
                </div>

                <div class="testimonial-carousel">

                    <div class="item">
                        <div class="row">


                            <?php
                            if(!empty($params['articles'])):
                                foreach ($params['articles'] as $article): ?>
                                    <div class="text col-md-10 col-sm-10 col-xs-12 ">
                                        <p> &#9654 <?= $article['title'] ?></p>
                                        <span class="author">- <?= $article['doi'] ?> -</span>
                                    </div>
                            <?php endforeach;
                            endif;?>

                        </div>
                    </div>



                </div>
                <!-- Carousel end -->

            </section>
            <!-- Section Testimonials end -->

        </div>
        <!-- Main Content end -->

    </main>
    <!-- Main Wrapper end -->

</div>
