<?php
    include('authentication.php');
    
    if(!isAdmin()){
		$_SESSION['msg'] = "You must log in first";
		header('Location: login.php');
    }
    
    if($con){
        // echo "<script type='text/javascript'>alert('Connection To Database Successful!')</script>";
    }else{
        echo "<script type='text/javascript'>alert('Connection To Database Failed.')</script>";
        die(mysqli_connect_error());
    }
    
    $contactid = $_GET['contactid'];
    
    $retrievesql = "SELECT * FROM contactstable WHERE contactid = $contactid";
    $contactslist = mysqli_query($con, $retrievesql);
    $contactstable = mysqli_fetch_assoc($contactslist);

    mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Messages Single</title>
	</head>

	<body>
        <p><?php echo $contactstable['contactmessage'] ?></p>
        <a href="messages-list.php">Back</a>
    </body>
</html>