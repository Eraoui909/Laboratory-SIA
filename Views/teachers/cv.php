

<div class="container " style="overflow:hidden;" id="myPDF">

    <!-- Main Wrapper -->
    <main class="wrapper">

        <!-- Header -->
        <header class="header pull-left">

            <!-- Mobile menu -->
            <div class="mobile-bar visible-sm visible-xs">
                <div class="hamburger-menu">
                    <div class="bar"></div>
                </div>
            </div>
            <!-- Mobile menu end -->

            <div class="avatar">
                <img src="<?= '/Storage/uploads/users/' . $avatar;  ?>" alt="avatar">
            </div>

            <div class="name">
                <h3><?php echo $prenom ." ".$nom;  ?></h3>
                <span>UX/UI Designer</span>
            </div>

            <!-- Navigation bar -->
            <nav class="main-nav">
                <ul class="navigation">

                    <li><a href="#about">About Me</a></li>
                    <li><a href="#experience">Expereince</a></li>
                    <li><a href="#works">Works</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
            <!-- Navigation bar end -->

            <!-- Footer Copyright -->
            <div class="copyright">
                <span>© Copyright 2018 Designstub</span>
            </div>
            <!-- Footer Copyright end -->

        </header>
        <!-- Header end -->

        <!-- Main Content -->
        <div class="main-content pull-right">


            <!-- Section About -->
            <section id="about" class="about">

                <div class="section-header">
                    <h2>About Me</h2>

                </div>

                <!-- Intro -->
                <div class="intro">

                    <p>Hello, My name is <?php echo $prenom ." ".$nom ;?>. Lorem ipsum dolor sit amet, usu sumo dicant vulputate in. Quando fabellas adipiscing nam an. An vis congue oporteat, no eros facer suavitate eos. An debet affert aliquid ius. Veritus placerat est ea, est ne nominavi suscipit maluisset.</p>

                    <ul class="info">
                        <li><strong>Birthday:</strong> August 14, 1982</li>
                        <li><strong>Location:</strong> Central Main Rd, Australia</li>
                        <li><strong>Email:</strong> <?php echo $email ;?></li>
                        <li><strong>Phone:</strong> <?php echo $tel ;?></li>
                    </ul>



                </div>
                <!-- Intro end -->

                <!-- Skills -->
                <div class="skills">

                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <div class="skill-info clearfix">
                                <h3 class="pull-left">Photoshop</h3>
                                <span class="pull-right">90%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="90"
                                     aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <div class="skill-info clearfix">
                                <h3 class="pull-left">Illustrator</h3>
                                <span class="pull-right">80%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="80"
                                     aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <div class="skill-info clearfix">
                                <h3 class="pull-left">Indesign</h3>
                                <span class="pull-right">45%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="45"
                                     aria-valuemin="0" aria-valuemax="100" style="width:45%">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 item">
                            <div class="skill-info clearfix">
                                <h3 class="pull-left">Corel Draw</h3>
                                <span class="pull-right">60%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                     aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- Skills end -->
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








            <!-- Section Works -->
            <section id="works" class="works clearfix">

                <div class="section-header">
                    <h2>Portfolio</h2>
                </div>

                <!-- Control -->
                <div class="control">
                    <ul>
                        <li class="active"><a class="filter" data-filter="all">All Projects</a></li>
                        <li><a class="filter" data-filter="1">Logo</a></li>
                        <li><a class="filter" data-filter="2">Vector</a></li>
                        <li><a class="filter" data-filter="3">Audio</a></li>
                        <li><a class="filter" data-filter="4">Video</a></li>
                    </ul>
                </div>

                <!-- Items Outer -->
                <div class="item-outer row clearfix">
                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="1" data-sort="value">
                        <div class="item">
                            <a href="/assets/images/work1.jpg" class="work-image">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work1.jpg" alt="portfolio">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="2" data-sort="value">
                        <div class="item">
                            <a href="/hassets/images/work2.jpg" class="work-image">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work2.jpg" alt="portfolio">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="1" data-sort="value">
                        <div class="item">
                            <a href="/assets/images/work3.jpg" class="work-image">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work3.jpg" alt="portfolio">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="2" data-sort="value">
                        <div class="item">
                            <a href="/assets/images/work4.jpg" class="work-image">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work4.jpg" alt="portfolio">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="3" data-sort="value">
                        <div class="item">
                            <a href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/237603952&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true" class="work-video">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work5.jpg" alt="portfolio">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="4" data-sort="value">
                        <div class="item">
                            <a href="https://www.youtube.com/watch?v=fZdkJKFwDE0" class="work-video">
                                <div class="title">
                                    <div class="inner">
                                        <h2>Project Name</h2>
                                        <span>View Details</span>
                                    </div>
                                </div>
                            </a>
                            <div class="overlay"></div>
                            <img src="/assets/images/work6.jpg" alt="portfolio">
                        </div>
                    </div>
                </div>

            </section>
            <!-- Section Works end -->

            <!-- Section Testimonials -->
            <section id="testimonials" class="testimonials">

                <div class="section-header">
                    <h2>Testimonials</h2>
                </div>

                <!-- Carousel -->
                <div class="testimonial-carousel">

                    <div class="item">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <div class="thumb">
                                    <img src="/assets/images/testimonial-img1.jpg" alt="testimonial-customer">
                                </div>
                            </div>
                            <div class="text col-md-10 col-sm-10 col-xs-12">
                                <p>Pri diam soluta molestie at, id melius ponderum mel, nominavi adipisci partiendo per te. No usu doctus dolorem liberavisse, vim nusquam invidunt id.</p>
                                <span class="author">- John Doe -</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <div class="thumb">
                                    <img src="/assets/images/testimonial-img2.jpg" alt="testimonial-customer">
                                </div>
                            </div>
                            <div class="text col-md-10 col-sm-10 col-xs-12">
                                <p>Pri diam soluta molestie at, id melius ponderum mel, nominavi adipisci partiendo per te. No usu doctus dolorem liberavisse, vim nusquam invidunt id.</p>
                                <span class="author">- John Doe -</span>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="row">
                            <div class="col-md-2 col-sm-2 hidden-xs">
                                <div class="thumb">
                                    <img src="/assets/images/testimonial-img3.jpg" alt="testimonial-customer">
                                </div>
                            </div>
                            <div class="text col-md-10 col-sm-10 col-xs-12">
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