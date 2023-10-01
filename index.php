<?php
session_start();
error_reporting(0);
include('helper/config.php');
// if ($_GET['stid']) {
//     $stid = $_GET['stid'];
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

<body>
    <main>

        <!-- Header bar -->
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand me-lg-5 me-0" href="index.php">
                    <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                </a>
                <!-- Search bar -->
                <form action="#" method="get" class="custom-form search-form flex-fill me-3" role="search">
                    <div class="input-group input-group-lg">
                        <input name="search" type="search" class="form-control" id="search" placeholder="Search Podcast"
                            aria-label="Search">
                        <button type="submit" class="form-control" id="submit">
                            <i class="bi-search"></i>
                        </button>
                    </div>
                </form>
                <!-- End of search bar -->

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>

                    </ul>

                    <div class="ms-4">
                        <a href="signin.php" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End of Header bar -->

        <section class="hero-section">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="text-center mb-5 pb-2">
                            <h1 class="text-white">Listen to all the talks</h1>

                            <p class="text-white"><b>Nghe nè!</b> is everywhere. Every sound remind you of us.</p>

                            <a href="#section_2" class="btn custom-btn smoothscroll mt-3">Start listening</a>
                        </div>

                        <!-- Trending creators -->
                        <div class="owl-carousel owl-theme">
                            <?php $sql = "SELECT * From user where trending =1";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);
                            $cnt = 1;
                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) { ?>
                                    <div class="owl-carousel-info-wrap item">
                                        <img src="images/profile/<?php echo $result->username;?>-portrait.jpg"
                                            class="owl-carousel-image img-fluid" alt="">
                                        <div class="owl-carousel-info">
                                            <h4 class="mb-2">
                                                <?php echo htmlentities($result->username)?>
                                                <img src="images/verified.png" class="owl-carousel-verified-image img-fluid" alt="">
                                            </h4>
                                            <span class="badge">Verified Podcaster</span>
                                        </div>
                                        <div class="social-share">
                                            <ul class="social-icon">
                                                <li class="social-icon-item">
                                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                                </li>
                        
                                                <li class="social-icon-item">
                                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <?php $cnt = $cnt + 1;
                                }
                            } ?>
                        </div>
                        <!-- End of trending creators -->
                    </div>
                </div>
            </div>
        </section>
                        
        <!-- Latest podcast section -->
        <section class="latest-podcast-section section-padding pb-0" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Lastest podcasts</h4>
                        </div>
                    </div>

                    <?php $sql = "SELECT * FROM podcast join user
                                on user.userid = podcast.creator
                                order by podcastid DESC limit 2";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block d-flex">
                            <div class="">
                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="signin.php" class="custom-block-image-wrap">
                                        <img src="images/podcast/<?php echo $result->podcastid;?>.jpg"
                                            class="custom-block-image img-fluid" alt="">
                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                                <div class="mt-2">
                                    <a href="#" class="btn custom-btn">
                                        Subscribe
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        <?php echo htmlentities($result->duration)?> minutes
                                    </small>

                                    <small><span class="badge">Campaign ↗</span></small>
                                </div>

                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        <?php echo htmlentities($result->name)?>
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/<?php echo $result->username;?>-portrait.jpg"
                                        class="profile-block-image img-fluid" alt="">
                                    <p>
                                        <?php echo htmlentities($result->username)?>
                                        <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>Verified Podcaster</strong>
                                    </p>
                                </div>

                                <p class="mb-0"><?php echo htmlentities($result->description)?></p>

                                <div class="custom-block-bottom d-flex justify-content-between mt-3">
                                    <a href="#" class="bi-headphones me-1">
                                        <span>120k</span>
                                    </a>

                                    <a href="#" class="bi-heart me-1">
                                        <span>42.5k</span>
                                    </a>

                                    <a href="#" class="bi-chat me-1">
                                        <span>11k</span>
                                    </a>

                                    <a href="#" class="bi-download">
                                        <span>50k</span>
                                    </a>
                                </div>
                            </div>

                            <div class="d-flex flex-column ms-auto">
                                <a href="#" class="badge ms-auto">
                                    <i class="bi-heart"></i>
                                </a>

                                <a href="#" class="badge ms-auto">
                                    <i class="bi-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php $cnt = $cnt + 1;
                        }
                    } ?>
                </div>
            </div>
        </section>
        <!-- End of Latest podcast section -->

        <!-- Hot topic section -->
        <section class="topics-section section-padding pb-0" id="section_3">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Hot topics</h4>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="signin.php" class="custom-block-image-wrap">
                                <img src="images/topics/truck.jpg"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="signin.php">
                                        Air pollution
                                    </a>
                                </h5>

                                <p class="badge mb-0">50 Podcasts</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="signin.php" class="custom-block-image-wrap">
                                <img src="images/topics/water.jpg"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="signin.php">
                                        Water pollution
                                    </a>
                                </h5>

                                <p class="badge mb-0">12 Podcasts</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="signin.php" class="custom-block-image-wrap">
                                <img src="images/topics/ho.jpg"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="signin.php">
                                        Biodiversity loss
                                    </a>
                                </h5>

                                <p class="badge mb-0">35 Podcasts</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-overlay">
                            <a href="signin.php" class="custom-block-image-wrap">
                                <img src="images/topics/sanho.jpg"
                                    class="custom-block-image img-fluid" alt="">
                            </a>

                            <div class="custom-block-info custom-block-overlay-info">
                                <h5 class="mb-1">
                                    <a href="signin.php">
                                        Natural resource
                                    </a>
                                </h5>

                                <p class="badge mb-0">12 Podcasts</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End of Hot topic section -->

        <!-- Trending podcast section -->
        <section class="trending-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Trending Podcasts</h4>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/podcast/1.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Vintage Show
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/lyly-portrait.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>Elsa
                                        <strong>Influencer</strong>
                                    </p>
                                </div>

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

                    <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/podcast/5.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Environment Soil
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/lyly-portrait.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        Taylor
                                        <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>Creator</strong>
                                    </p>
                                </div>

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

                    <div class="col-lg-4 col-12">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="signin.php">
                                    <img src="images/podcast/4.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="signin.php">
                                        Daily Talk
                                    </a>
                                </h5>

                                <div class="profile-block d-flex">
                                    <img src="images/profile/taylor-portrait.jpg"
                                        class="profile-block-image img-fluid" alt="">

                                    <p>
                                        William
                                        <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        <strong>Vlogger</strong>
                                    </p>
                                </div>

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

                </div>
            </div>
        </section>
    </main>

    <?php include('helper/footer.php'); ?>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
<?php
// }
?>