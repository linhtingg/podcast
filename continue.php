<?php
session_start();
error_reporting(0);
include('helper/config.php');
if ($_SESSION['uname'] == '') {
    echo "<script>alert('Please sign in to your account');</script>";
    echo "<script type='text/javascript'> document.location = 'signin.php'; </script>";
} else {
    $creator = $_SESSION['uname'];
    $sql = "SELECT userid FROM user WHERE username=:creator;";
    $query = $dbh->prepare($sql);
    $query->bindParam(':creator', $creator, PDO::PARAM_STR);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $user) {
        $uid=$user->userid;
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
                            <a class="nav-link" href="explore.php">Explore</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="continue.php">Continue</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Create your own</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="create-podcast.php">Podcast</a></li>
                                <li><a class="dropdown-item" href="create-campaign.php">Campaign</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="ms-4 dropdown">
                        <a href="#section_3" class="btn custom-btn custom-border-btn smoothscroll">My Account</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-12 text-center">
                        <h2 class="mb-0">Continue where your left off...</h2>
                    </div>

                </div>
            </div>
        </header>

        <section class="latest-podcast-section section-padding" style="padding-top: 0px;" id="section_2">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">Your incomplete podcasts</h4>
                        </div>
                    </div>
                    <?php $sql = "SELECT * From podcast limit 2;";
                    $query = $dbh->prepare($sql);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    $cnt = 1;
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                    <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">

                                <div class="custom-block-icon-wrap">
                                    <div class="section-overlay"></div>
                                    <a href="detail-podcast.php?pid=<?php echo ($result->podcastid)?>" class="custom-block-image-wrap">
                                        <img src="images/podcast/<?php echo ($result->podcastid)?>.jpg"
                                            class="custom-block-image img-fluid" alt="">

                                        <a href="#" class="custom-block-icon">
                                            <i class="bi-play-fill"></i>
                                        </a>
                                    </a>
                                </div>

                            <div class="custom-block-info">
                                <div class="custom-block-top d-flex mb-1">
                                    <small class="me-4">
                                        <i class="bi-clock-fill custom-icon"></i>
                                        <?php echo htmlentities($result->duration)?> minutes
                                    </small>
                                    <span class="badge">Campaign ↗</span>
                                </div>

                                <h5 class="mb-2">
                                    <a href="detail-podcast.php?pid=<?php echo ($result->podcastid)?>">
                                    <?php echo htmlentities($result->name)?>
                                    </a>
                                </h5>

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
                        </div>
                    </div>
                        <?php } } ?>
                    
                    <!-- Pagination -->
                    <div class="col-lg-4 col-12 mx-auto">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-lg justify-content-center mt-5">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <li class="page-item active"><a class="page-link" href="#">1</a></li>

                                <li class="page-item"><a class="page-link" href="#">2</a></li>

                                <li class="page-item"><a class="page-link" href="#">3</a></li>

                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </section>


        <section class="trending-podcast-section section-padding pt-0">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <div class="section-title-wrap mb-5">
                            <h4 class="section-title">In Progress Campaigns</h4>
                        </div>
                    </div>
                    
                    <?php $sql = "SELECT campaign.name, campaign.description, campaign.campaignid
                                From campaignfollow join campaign
                                on campaign.campaignid=campaignfollow.campaignid 
                                where campaignfollow.userid=:uid limit 3";
                    $query = $dbh->prepare($sql);
                    $query->bindParam(':uid', $uid, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ);
                    if ($query->rowCount() > 0) {
                        foreach ($results as $result) { ?>
                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block custom-block-full">
                                <div class="custom-block-image-wrap">
                                    <a href="#">
                                        <img src="images/campaign/<?php echo ($result->campaignid); ?>.jpg" class="custom-block-image img-fluid"
                                            alt="">
                                    </a>
                                </div>

                                <div class="custom-block-info">
                                    <h5 class="mb-2">
                                        <a href="#">
                                            <?php echo htmlentities ($result->name); ?>
                                        </a>
                                    </h5>

                                    <p class="mb-0"><?php echo htmlentities ($result->description); ?>;</p>

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
                    <?php }} ?>

                    <!-- <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                        <div class="custom-block custom-block-full">
                            <div class="custom-block-image-wrap">
                                <a href="detail-podcast.php">
                                    <img src="images/podcast/5.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-podcast.php">
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
                                <a href="detail-podcast.php">
                                    <img src="images/podcast/4.jpg" class="custom-block-image img-fluid"
                                        alt="">
                                </a>
                            </div>

                            <div class="custom-block-info">
                                <h5 class="mb-2">
                                    <a href="detail-podcast.php">
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
                    </div> -->

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
<?php }}?>