<?php
session_start();
error_reporting(0);
include('helper/config.php');
if ($_GET['pid']) {
    $podcastid = $_GET['pid'];
    $sql = "SELECT * From podcast where podcastid = :podcastid";
    $query = $dbh->prepare($sql);
    $query->bindParam(':podcastid', $podcastid, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($results as $result) {
        ?>

        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <meta name="description" content="">
            <meta name="author" content="">

            <title>NGHE NÈ! Advocate for the environment</title>

            <!-- CSS FILES -->
            <link rel="preconnect" href="https://fonts.googleapis.com">

            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

            <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap"
                rel="stylesheet">

            <link rel="stylesheet" href="css/bootstrap.min.css">

            <link rel="stylesheet" href="css/bootstrap-icons.css">

            <link rel="stylesheet" href="css/owl.carousel.min.css">

            <link rel="stylesheet" href="css/owl.theme.default.min.css">

            <link href="css/templatemo-pod-talk.css" rel="stylesheet">

        </head>
        <aside>
                <p> Menu </p>
                <a href="javascript:void(0)">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                    My drive
                </a>
                <a href="javascript:void(0)">
                    <i class="fa fa-laptop" aria-hidden="true"></i>
                    Computers
                </a>
                <a href="javascript:void(0)">
                    <i class="fa fa-clone" aria-hidden="true"></i>
                    Shared with me
                </a>
                <a href="javascript:void(0)">
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    Starred
                </a>
                <a href="javascript:void(0)">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                    Trash
                </a>
            </aside>
        <body>
            <main>
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand me-lg-5 me-0" href="explore.php">
                            <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                        </a>

                        <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                            <div class="input-group input-group-lg">
                                <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                                    aria-label="Search">

                                <button type="submit" class="form-control" id="submit">
                                    <i class="bi-search"></i>
                                </button>
                            </div>
                        </form>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ms-lg-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="explore.php">Explore</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="continue.php">Continue</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">Create your own</a>
                                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                        <li><a class="dropdown-item" href="create-podcast.php">Podcast</a></li>
                                        <li><a class="dropdown-item active" href="create-campaign.php">Campaign</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <div class="ms-4 dropdown">
                                <a href="#section_3" class="btn custom-btn custom-border-btn smoothscroll">My Account</a>
                            </div>
                        </div>
                    </div>
                </nav>

                <section class="site-header latest-podcast-section section-padding pb-0" style="padding-top: 176px;"
                    id="section_2">
                    <div class="container">
                        <div class="row justify-content-center">

                            <div class="col-lg-10 col-12">


                                <div class="row">
                                    <div class="col-lg-3 col-12">
                                        <div class="custom-block-icon-wrap">
                                            <div class="custom-block-image-wrap custom-block-image-detail-podcast">
                                                <img src="images/podcast/<?php echo $result->podcastid; ?>.jpg"
                                                    class="custom-block-image img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-12">
                                        <div class="custom-block-info">
                                            <div class="custom-block-top d-flex mb-1">
                                                <small class="me-4">
                                                    <a href="#" style="color:white">
                                                        <i class="bi-play" style="color:white"></i>
                                                        Play now
                                                    </a>
                                                </small>

                                                <small style="color:white">
                                                    <i class="bi-clock-fill custom-icon" style="color:white"></i>
                                                    <?php echo htmlentities($result->duration); ?> minutes
                                                </small>

                                                <small class="ms-auto"><span class="badge">Campaign ↗</span></small>
                                            </div>

                                            <h2 class="mb-2">
                                                <?php echo htmlentities($result->name); ?>
                                            </h2>

                                            <p style="color:white">
                                                <?php echo htmlentities($result->description); ?>
                                            </p>

                                        </div>

                                    </div>
                                    <div class="profile-block profile-detail-block d-flex flex-wrap align-items-center mt-5"
                                        style="background-color:white">
                                        <div class="d-flex mb-3 mb-lg-0 mb-md-0">
                                            <img src="images/profile/lyly-portrait.jpg" class="profile-block-image img-fluid"
                                                alt="">
                                            <p>
                                                Elsa
                                                <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                                <strong>Creator</strong>
                                            </p>
                                        </div>

                                        <ul class="social-icon ms-lg-auto ms-md-auto">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-instagram"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-whatsapp"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                <section class="related-podcast-section section-padding">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-12 col-12">
                                <div class="section-title-wrap mb-5">
                                    <h4 class="section-title">Related campaigns</h4>
                                </div>
                            </div>

                            <?php $sql = "SELECT * From podcast_campain join campaign
                                        on campaign.campaignid=podcast_campain.campainid
                                        where podcastid = :podcastid";
                            $query = $dbh->prepare($sql);
                            $query->bindParam(':podcastid', $podcastid, PDO::PARAM_STR);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            foreach ($results as $result) {
                                ?>
                                <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                                    <div class="custom-block custom-block-full">
                                        <div class="custom-block-image-wrap">
                                            <a href="#">
                                                <img src="images/campaign/<?php echo ($result->campaignid); ?>.jpg"
                                                    class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>

                                        <div class="custom-block-info">
                                            <h5 class="mb-2">
                                                <a href="#">
                                                    <?php echo htmlentities($result->name); ?>
                                                </a>
                                            </h5>

                                            <p class="mb-0">Lorem Ipsum dolor sit amet consectetur</p>

                                            <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                                <a href="#" class="bi-headphones me-1">
                                                    <span>100k</span>
                                                </a>

                                                <a href="#" class="bi-heart me-1">
                                                    <span>2.5k</span>
                                                </a>

                                                <a href="#" class="bi-chat me-1">
                                                    <span>924k</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="social-share d-flex flex-column ms-auto">
                                            <a href="#" class="badge ms-auto">
                                                <i class="bi-heart"></i>
                                            </a>

                                            <a href="#" class="badge ms-auto">
                                                <i class="bi-bookmark"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </section>
            </main>


            <footer class="site-footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                            <div class="subscribe-form-wrap">
                                <h6>Subscribe. Every weekly.</h6>

                                <form class="custom-form subscribe-form" action="#" method="get" role="form">
                                    <input type="email" name="subscribe-email" id="subscribe-email" pattern="[^ @]*@[^ @]*"
                                        class="form-control" placeholder="Email Address" required="">

                                    <div class="col-lg-12 col-12">
                                        <button type="submit" class="form-control" id="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12 mb-4 mb-md-0 mb-lg-0">
                            <h6 class="site-footer-title mb-3">Contact</h6>

                            <p class="mb-2"><strong class="d-inline me-2">Phone:</strong> 010-020-0340</p>

                            <p>
                                <strong class="d-inline me-2">Email:</strong>
                                <a href="#">inquiry@pod.co</a>
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-12">
                            <h6 class="site-footer-title mb-3">Download Mobile</h6>

                            <div class="site-footer-thumb mb-4 pb-2">
                                <div class="d-flex flex-wrap">
                                    <a href="#">
                                        <img src="images/app-store.png" class="me-3 mb-2 mb-lg-0 img-fluid" alt="">
                                    </a>

                                    <a href="#">
                                        <img src="images/play-store.png" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>

                            <h6 class="site-footer-title mb-3">Social</h6>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-instagram"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-whatsapp"></a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="container pt-5">
                    <div class="row align-items-center">

                        <div class="col-lg-2 col-md-3 col-12">
                            <a class="navbar-brand" href="explore.php">
                                <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                            </a>
                        </div>

                        <div class="col-lg-7 col-md-9 col-12">
                            <ul class="site-footer-links">
                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Homepage</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Browse Podcasts</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Help Center</a>
                                </li>

                                <li class="site-footer-link-item">
                                    <a href="#" class="site-footer-link">Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-12">
                            <p class="copyright-text mb-0">Copyright © 2036 Talk Pod Company
                                <br><br>
                                Design: <a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">TemplateMo</a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>


            <!-- JAVASCRIPT FILES -->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.bundle.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/custom.js"></script>

        </body>

        </html>
    <?PHP
    }
} ?>