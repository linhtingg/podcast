<?php
session_start();
error_reporting(0);
include('helper/config.php');
if (isset($_POST['submit'])) {
    $campaignname = $_POST['campaignname'];
    $description = $_POST['description'];
    $creator = $_SESSION['uname'];

    $sql = "SELECT userid FROM user WHERE username=:creator;";
    $query = $dbh->prepare($sql);
    $query->bindParam(':creator', $creator, PDO::PARAM_STR);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($users as $user) {
        $uid=$user->userid;
        $sql1 = "INSERT INTO campaign (name,description,creator) VALUES (:campaignname,:description,:uid);";
        $query1 = $dbh->prepare($sql1);
        $query1->bindParam(':campaignname', $campaignname, PDO::PARAM_STR);
        $query1->bindParam(':description', $description, PDO::PARAM_STR);
        $query1->bindParam(':uid', $uid, PDO::PARAM_STR);
        if ($query1->execute()) {
            echo "<script type='text/javascript'> document.location = 'explore.php'; </script>";
        } else {
            echo "<script>alert('Invalid Details');</script>";
        }
    }
}
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

        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&family=Sono:wght@200;300;400;500;700&display=swap" rel="stylesheet">
                        
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
                            <input name="search" type="search" class="form-control" id="search" placeholder="Search Campaign" aria-label="Search">

                            <button type="submit" class="form-control" id="submit">
                                <i class="bi-search"></i>
                            </button>
                        </div>
                    </form>
    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="explore.php">Explore</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="continue.php">Continue</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Create your own</a>
                                <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                    <li><a class="dropdown-item" href="create-campaign.php">Podcast</a></li>
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

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-0">Create your next campaign</h2>
                            <p class="mb-0" style="color:white">Let's start building the movement for tomorrow!</p>
                        </div>
                    </div>
                </div>
            </header>            

            <section class="contact-section section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-12 mx-auto">
                            <form action="#" method="post" class="custom-form contact-form" role="form">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="campaignname" id="campaignname" class="form-control" placeholder="Pick a title" required="">
                                            <label for="floatingInput">Campaign's Title</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                            <label for="file"> <small>&nbsp&nbspGuarantee documents</small></label>
                                            <input type="file" name="file" id="file" class="form-control" 
                                            accept="application/msword application/pdf image/*" style="border-style:none;">
                                    </div>

                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="textarea" name="description" id="description" class="form-control" style="height: 150px;" placeholder="Pick a title">
                                            <label for="floatingInput">Description</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-12 ms-auto">
                                        <button type="submit" name="submit" class="form-control">Submit</button>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <?php include ('helper/footer.php'); ?>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>