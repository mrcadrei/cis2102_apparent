<?php
    include('authentication.php');

	if($con){
		// echo "<script type='text/javascript'>alert('Connection To Database Successful!')</script>";
	}else{
		echo "<script type='text/javascript'>alert('Connection To Database Failed!')</script>";
		die (mysqli_connect_error());
	}

	if(isset($_POST['sendmessage'])){
        $contactname    = $_POST['contactname'];
        $contactemail   = $_POST['contactemail'];
        $contactsubject = $_POST['contactsubject'];
        $contactmessage = $_POST['contactmessage'];

		$insertsql = "INSERT INTO contactstable (
            contactname, 
            contactemail, 
            contactsubject, 
            contactmessage) VALUES (
                '$contactname', 
                '$contactemail', 
                '$contactsubject', 
                '$contactmessage')";

		$query = mysqli_query($con, $insertsql);

		if($query){
			echo "<script type='text/javascript'>alert('Message Sent Successfully!')</script>";
		}else{
			echo "<script type='text/javascript'>alert('Message Sent Unsuccessfully.')</script>";
			echo "Error: " . $insertsql . "<br>" . mysqli_error($con);
		}	
    }

    mysqli_close($con);
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
                        <a class="nav-link active" href="contact.php">Contact</a>
                    </li>
                    
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li> -->
                    
                    <?php if(isset($_SESSION['user'])) : ?>
                        <?php
	                        if(isAdmin()){
                                echo '<li class="nav-item">
                                        <a class="nav-link" href="login.php?logout="1"" class="logout">Logout</a>
                                    </li>';
                            }
                        ?>
                    <?php endif ?>
                
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
                        <h1 class="title-single">Contact Us</h1>
                        <span class="color-text-a">Want to have your apartment featured? Fill in the form below and we'll get back to you.</span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                        <?php
	                        if(isAdmin()){
                                echo '<li class="breadcrumb-item">
                                    <a href="messages-list.php">See all messages</a>
                                </li>';
                            }
                        ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro End -->

    <!-- Contact Start -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-7">
                            <form method="post" class="form-a">
                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="contactname" class="form-control form-control-lg form-control-a" placeholder="Your Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <input name="contactemail" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" name="contactsubject" class="form-control form-control-lg form-control-a" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <textarea name="contactmessage" class="form-control" cols="45" rows="8" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-a" name="sendmessage">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-paper-plane"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">Say Hello</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">Email.
                                            <span class="color-a">contact@example.com</span>
                                        </p>
                                        <p class="mb-1">Phone.
                                            <span class="color-a">+639000000000</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-pin"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">Find us in</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">
                                            Cebu City, Philippines, 6000
                                            <br> 
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box">
                                <div class="icon-box-icon">
                                    <span class="ion-ios-redo"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">Social networks</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <div class="socials-footer">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->

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
