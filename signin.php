<?php
session_start();
error_reporting(0);
include('helper/config.php');
if ($_SESSION['uname'] != '') {
    $_SESSION['uname'] = '';
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $sql1 = "SELECT username,pass FROM user WHERE username=:username and pass=:pass";
    $query = $dbh->prepare($sql1);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $_SESSION['uname'] = $_POST['username'];
        echo "<script type='text/javascript'> document.location = 'explore.php'; </script>";
    } else {
        echo "<script>alert('Invalid Details');</script>";
    }
}
if (isset($_POST['signup'])) {
    echo "<script type='text/javascript'> document.location = 'signup.php'; </script>";
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
                    <a class="navbar-brand me-lg-5 me-0" href="home.php">
                        <img src="images/pod-talk-logo.png" class="logo-image img-fluid" alt="templatemo pod talk">
                    </a>

    
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-lg-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
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

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h2 class="mb-0">Sign in to your account</h2>
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
                                            <input type="text" name="username" id="username" class="form-control" placeholder="User Name" >
                                            <label for="floatingInput">User Name</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password" required="">
                                            <label for="floatingInput">Password</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-12">
                                        <button type="submit" name="signup" class="form-control" style="background-color: rgb(230, 245, 255); color: rgb(0, 102, 255)">Without an account?</button>
                                    </div>

                                    <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" name="login" class="form-control">Login</button>
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