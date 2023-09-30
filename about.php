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

    <title>Pod Talk - About Page</title>

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
                <a class="navbar-brand me-lg-5 me-0" href="home.php">
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
                            <a class="nav-link" href="home.php">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="about.php">About</a>
                        </li>

                    </ul>

                    <div class="ms-4">
                        <a href="signin.php" class="btn custom-btn custom-border-btn smoothscroll">Get started</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- End of Header bar -->

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">About | Nghe nè!</h2>
                    </div>

                </div>
            </div>
        </header>

        <section class="about-section section-padding" id="section_2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-12 mx-auto">
                        <div class="pb-5 mb-5">
                            <div class="section-title-wrap mb-4">
                                <h4 class="section-title">Our story</h4>
                            </div>

                            <p>Advocate for the environment</p>
                            Social audio platform gives you access to thousands environmentally oriented podcasts  and other content from creators all over the world

                            Together, we develop a better environment by spreading the power of unition</p>

                            <p>You are not allowed to redistribute the downloadable template ZIP file on any other
                                website without a permission. Please contact TemplateMo website for further information.
                                Thank you.</p>

                            <img src="images/medium-shot-young-people-recording-podcast.jpg"
                                class="about-image mt-5 img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Meet podcaters</h4>
                        </div>
                    </div>

                    <?php $sql = "SELECT * From User where trending =1";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                            <div class="col-lg-3 col-md-6 col-12 mb-4 mb-lg-0">
                                <div class="team-thumb bg-white shadow-lg">
                                    <img src="images/profile/<?php echo $result->username;?>-portrait.jpg" class="about-image img-fluid" alt="">
                                    <div class="team-info">
                                        <h4 class="mb-2">
                                            <?php echo htmlentities($result->username)?>
                                            <img src="images/verified.png" class="verified-image img-fluid" alt="">
                                        </h4>
                    
                                        <span class="badge">Verifed creator</span>
                                        <!-- <span class="badge">Animal</span> -->
                                    </div>
                    
                                    <div class="social-share">
                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-twitter"></a>
                                            </li>
                    
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-facebook"></a>
                                            </li>
                    
                                            <li class="social-icon-item">
                                                <a href="#" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php $cnt = $cnt + 1;
                        }
                    } ?>

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