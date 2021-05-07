
<?php global $lang; ?>

<div class="container " style="overflow:hidden;" id="myPDF">

    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Header -->
        <header class="header pull-left">

            <!-- Mobile menu -->


            <div class="avatar">
                <img src="<?= '/Storage/uploads/users/' . $avatar;  ?>" alt="avatar">
            </div>

            <div class="name">
                <h3 style="font-size: 18px;font-weight: bold"><?php echo $prenom ." ".$nom;  ?></h3>
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
                            <td><strong><?= $lang['date_naiss'] ?>:</strong></td>
                            <td><?= $date_naissance ?> </td>
                        </tr>
                        <tr>
                            <td><strong><?= $lang['etat_civil'] ?>:</strong></td>
                            <td><?= $etat_civil ;?> </td>
                        </tr>
                        <tr>
                            <td><strong><?= $lang['addresse'] ?>:</strong></td>
                            <td><?= $addresse ?> </td>
                        </tr>
                    </table>

                </div>
                <!-- Intro end -->


            </section>
            <!-- Section About end -->



            <!-- Section Resume -->
            <section id="experience" class="resume">

                <div class="section-header">
                    <h2>Experience</h2>

                </div>

                <div class="row">



                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="top-item resume-item">
                            <h2>Orchid Inc</h2>
                            <span>CREATIVE DIRECTOR  |  JANUARY, 2013 - PRESENT</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit maxime laborum sequi, magni earum quo soluta sint velit numquam, ipsum illum! Nostrum possimus illo architecto praesentium ut aliquam dolorem.</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="resume-item">
                            <h2>VISUAL / UI DESIGNER</h2>
                            <span>CREATIVE DIRECTOR  |  MARCH'11 - DECEMBER'12</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit maxime laborum sequi, magni earum quo soluta sint velit numquam.</p>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="resume-item">
                            <h2>Click Media</h2>
                            <span>SENIOR UX DESIGNER  |  JULY'09 - APRIL'11</span>
                            <p>Odit maxime laborum sequi, magni earum quo soluta sint velit numquam, ipsum illum! Nostrum possimus illo architecto praesentium ut aliquam dolorem.</p>
                        </div>
                    </div>

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

            <!-- Section Testimonials -->
            <section id="testimonials" class="testimonials">

                <div class="section-header">
                    <h2>Testimonials</h2>
                </div>

                <!-- Carousel -->
                <div class="testimonial-carousel">

                    <div class="item">
                        <div class="row">

                            <div class="text col-md-10 col-sm-10 col-xs-12 ">
                                <p>Pri diam soluta molestie at, id melius ponderum mel, nominavi adipisci partiendo per te. No usu doctus dolorem liberavisse, vim nusquam invidunt id.</p>
                                <span class="author">- John Doe -</span>
                            </div>
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
