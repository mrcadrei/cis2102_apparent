<?php
    include('authentication.php');
    
    if($con){
        // echo "<script type='text/javascript'>alert('Connection To Database Successful!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Connection To Database Failed.')</script>";
        die(mysqli_connect_error());
    }
    
    $apartmentid     = $_GET['apartmentid'];
    
    $retrievesql     = "SELECT * FROM apartmentsTable WHERE apartmentid = $apartmentid";
    $apartmentslist  = mysqli_query($con, $retrievesql);
    $apartmentsTable = mysqli_fetch_assoc($apartmentslist);
    
    if(isset($_POST['update'])){
        $apartmentbuildingname               = $_POST['apartmentbuildingname'];
        $apartmentspecificaddress            = $_POST['apartmentspecificaddress'];
        $apartmenttype                       = $_POST['apartmenttype'];
        
        $apartmenttenantunitarea             = $_POST['apartmenttenantunitarea'];
        $apartmenttenantunitbedrooms         = $_POST['apartmenttenantunitbedrooms'];
        $apartmenttenantunitbeds             = $_POST['apartmenttenantunitbeds'];
        $apartmenttenantunitbathrooms        = $_POST['apartmenttenantunitbathrooms'];
        
        $apartmenttenantunitamenities1       = $_POST['apartmenttenantunitamenities1'];
        $apartmenttenantunitamenities2       = $_POST['apartmenttenantunitamenities2'];
        $apartmenttenantunitamenities3       = $_POST['apartmenttenantunitamenities3'];
        $apartmenttenantunitamenities4       = $_POST['apartmenttenantunitamenities4'];
        $apartmenttenantunitamenities5       = $_POST['apartmenttenantunitamenities5'];
        
        $apartmentgarageavailability         = $_POST['apartmentgarageavailability'];
        
        $apartmentimage1                     = $_POST['apartmentimage1'];
        $apartmentimage2                     = $_POST['apartmentimage2'];
        $apartmentimage3                     = $_POST['apartmentimage3'];
        
        $apartmenttenantunitmonthlyrentprice = $_POST['apartmenttenantunitmonthlyrentprice'];
        $apartmentcontactlandlord            = $_POST['apartmentcontactlandlord'];

		$updatesql = "UPDATE apartmentsTable SET
            apartmentbuildingname               = '$apartmentbuildingname', 
            apartmentspecificaddress            = '$apartmentspecificaddress', 
            apartmenttype                       = '$apartmenttype', 

            apartmenttenantunitarea             = '$apartmenttenantunitarea', 
            apartmenttenantunitbedrooms         = '$apartmenttenantunitbedrooms', 
            apartmenttenantunitbeds             = '$apartmenttenantunitbeds', 
            apartmenttenantunitbathrooms        = '$apartmenttenantunitbathrooms', 

            apartmenttenantunitamenities1       = '$apartmenttenantunitamenities1', 
            apartmenttenantunitamenities2       = '$apartmenttenantunitamenities2', 
            apartmenttenantunitamenities3       = '$apartmenttenantunitamenities3', 
            apartmenttenantunitamenities4       = '$apartmenttenantunitamenities4', 
            apartmenttenantunitamenities5       = '$apartmenttenantunitamenities5', 

            apartmentgarageavailability         = '$apartmentgarageavailability', 

            apartmentimage1                     = '$apartmentimage1', 
            apartmentimage2                     = '$apartmentimage2', 
            apartmentimage3                     = '$apartmentimage3', 

            apartmenttenantunitmonthlyrentprice = '$apartmenttenantunitmonthlyrentprice', 
            apartmentcontactlandlord            = '$apartmentcontactlandlord' 
            
            WHERE apartmentid = $apartmentid";

        $query = mysqli_query($con, $updatesql);
        
        if($query){
            echo "<script type='text/javascript'>alert('Data Updated Successfully!')</script>";
		}else{
            echo "<script type='text/javascript'>alert('Data Updated Unsuccessfully.')</script>";
            echo "Error: " . $updatesql . "<br>" . mysqli_error($con);
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
            <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-expanded="false">
                <span aria-hidden="true">Add Listing</span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active" href="apartments-grid.php">Apartments</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
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
                        <h1 class="title-single">Update Listing</h1>
                        <span class="color-text-a"></span>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="apartments-grid.php">Apartments</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Update Listing
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro End -->

    <!-- Add Listing Form Start -->
    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-7">
                            <form method="post" class="form-a" >
                                <div class="row">
                                
                                    <div class="col-md-12 mb-2">
                                        <h6>Apartment Information</h6><br>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentbuildingname'] ?>" name="apartmentbuildingname">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentspecificaddress'] ?>" name="apartmentspecificaddress">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <select class="form-control form-control-lg form-control-a" id="Type" name="apartmenttype">
                                                <option><?php echo $apartmentsTable['apartmenttype'] ?></option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <br><h6>Tenant Unit Information</h6><br>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitarea'] ?>" name="apartmenttenantunitarea">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="Bedrooms">Bedrooms</label>
                                            <select class="form-control form-control-lg form-control-a" name="apartmenttenantunitbedrooms">
                                                <option><?php echo $apartmentsTable['apartmenttenantunitbedrooms'] ?></option>
                                                <option>00</option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="Beds">Beds</label>
                                            <select class="form-control form-control-lg form-control-a" name="apartmenttenantunitbeds">
                                                <option><?php echo $apartmentsTable['apartmenttenantunitbeds'] ?></option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="Bathrooms">Bathrooms</label>
                                            <select class="form-control form-control-lg form-control-a" name="apartmenttenantunitbathrooms">
                                                <option><?php echo $apartmentsTable['apartmenttenantunitbathrooms'] ?></option>
                                                <option>01</option>
                                                <option>02</option>
                                                <option>03</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="Amenities">Amenities</label>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitamenities1'] ?>" name="apartmenttenantunitamenities1"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitamenities2'] ?>" name="apartmenttenantunitamenities2"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitamenities3'] ?>" name="apartmenttenantunitamenities3"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitamenities4'] ?>" name="apartmenttenantunitamenities4"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitamenities5'] ?>" name="apartmenttenantunitamenities5">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 mb-2">
                                        <div class="form-group">
                                            <label for="Garage">Garage Availability</label>
                                                <select class="form-control form-control-lg form-control-a" name="apartmentgarageavailability">
                                                    <option><?php echo $apartmentsTable['apartmentgarageavailability'] ?></option>
                                                    <option>Unavailable</option>
                                                    <option>Available</option>
                                                </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="Images">Images</label>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentimage1'] ?>" name="apartmentimage1"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentimage2'] ?>" name="apartmentimage2"><br>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentimage3'] ?>" name="apartmentimage3">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <div class="form-group">
                                            <label for="Price">Monthly Rent Price</label>
                                                <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmenttenantunitmonthlyrentprice'] ?>" name="apartmenttenantunitmonthlyrentprice">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-2">
                                        <br><h6>Contact Information</h6><br>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-lg form-control-a" value="<?php echo $apartmentsTable['apartmentcontactlandlord'] ?>" name="apartmentcontactlandlord">
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-b" name="update">Update Listing</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Add Listing Form End -->

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
