<?php
    include('authentication.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>AppaRent</title>
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a class="navbar-brand text-brand" href="index.php">Appa<span class="color-b">Rent</span></a>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="apartments-grid.php">Apartments</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li> -->
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Intro Start -->
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">Login</h1>
                        <span class="color-text-a"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro End -->

    <!-- Login Form Start -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="login.php" method="post" class="form-a">
                                <div class="row">

                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" placeholder="Username" name="username">
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-lg form-control-a" placeholder="Password" name="userpassword">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-a" name="login">Login</button>
                                    </div>

                                </div>
                                <?php echo display_error(); ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Form End -->

    <!-- Footer Start -->
    <section class="section-footer">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-4">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">AppaRent</h3>
                        </div>
                        <div class="w-body-a">
                            <p class="w-text-a color-text-a">
                                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis sed aute irure.
                            </p>
                        </div>
                        <div class="w-footer-a">
                            <ul class="list-unstyled">
                                <li class="color-a">
                                    <span class="color-text-a">Phone .</span> +639000000000
                                </li>
                                <li class="color-a">
                                    <span class="color-text-a">Email .</span> contact@example.com
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand"></h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <!-- <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#"></a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#"></a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#"></a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#"></a>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 section-md-t3">
                    <div class="widget-a">
                        <div class="w-header-a">
                            <h3 class="w-title-a text-brand">The Company</h3>
                        </div>
                        <div class="w-body-a">
                            <div class="w-body-a">
                                <ul class="list-unstyled">
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Site Map</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Legal</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Affiliate</a>
                                    </li>
                                    <li class="item-list-a">
                                        <i class="fa fa-angle-right"></i> <a href="#">Privacy Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav class="nav-footer">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="apartments-grid.php">Apartments</a>
                            </li>
                            <li class="list-inline-item">
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="socials-a">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-dribbble" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="copyright-footer">
                        <p class="copyright color-text-a">
                            &copy; Copyright
                            <span class="color-a">AppaRent</span> All Rights Reserved.
                        </p>
                    </div>
                    
                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
    
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>
    
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/popper/popper.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/scrollreveal/scrollreveal.min.js"></script>
    
    <script src="contactform/contactform.js"></script>
    
    <script src="js/main.js"></script>
</body>
</php>
