<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db   = 'apparentdb';

	session_start();
	$con = mysqli_connect($host, $user, $pass, $db);

	$username  = '';
	$useremail = '';
	$errors    = array();

	if(isset($_POST['register'])){
		register();
	}

	function register(){
		global $con, $errors, $username, $useremail;

		$username            = e($_POST['username']);
		$useremail           = e($_POST['useremail']);
		$userpassword        = e($_POST['userpassword']);
		$userconfirmpassword = e($_POST['userconfirmpassword']);

		if(empty($username)){
			array_push($errors, "<script type='text/javascript'>alert('Username is required')</script>");
		}
		if(empty($useremail)){
			array_push($errors, "<script type='text/javascript'>alert('Email is required')</script>");
		}
		if(empty($userpassword)){
			array_push($errors, "<script type='text/javascript'>alert('Password is required')</script>");
		}
		if($userpassword != $userconfirmpassword){
			array_push($errors, "<script type='text/javascript'>alert('Passwords do not match')</script>");
		}

		if(count($errors) == 0){
			$password = md5($userpassword);

			if(isset($_POST['usertype'])){
				$usertype = e($_POST['usertype']);
				$query = "INSERT INTO usertable (username, useremail, userpassword, usertype) VALUES ('$username', '$useremail', '$password', '$usertype')";
				mysqli_query($con, $query);

				$_SESSION['success'] = "<script type='text/javascript'>alert('New User Successfully Created!')</script>";
				header('Location: index.php');
			}else{
				$query = "INSERT INTO usertable (username, useremail, userpassword, usertype) VALUES ('$username', '$useremail', '$password', 'user')";
				mysqli_query($con, $query);

				$logged_in_user_id = mysqli_insert_id($con);

				$_SESSION['user'] = getUserById($logged_in_user_id);
				$_SESSION['success'] = "<script type='text/javascript'>alert('Logged In Successfully!')</script>";
				header('Location: index.php');
			}
		}
	}

	function getUserById($id){
		global $con;
		$query = "SELECT * FROM usertable WHERE userid = ".$id;
		$result = mysqli_query($con, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	function e($val){
		global $con;
		return mysqli_real_escape_string($con, trim($val));
	}

	function display_error(){
		global $errors;

		if(count($errors) > 0){
			echo "<div class='error'>";
				foreach ($errors as $error){
					echo $error . '<br>';
				}
			echo "</div>";
		}
	}

	function isLoggedIn(){
		if(isset($_SESSION['user'])){
			return true;
		}else{
			return false;
		}
	}

	if (isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION['user']);
		header("Location: login.php");
	}

	if (isset($_POST['login'])){
		login();
	}

	function login(){
		global $con, $username, $errors;

		$username     = e($_POST['username']);
		$userpassword = e($_POST['userpassword']);

		if (empty($username)){
			array_push($errors, "<script type='text/javascript'>alert('Username is required')</script>");
		}
		if (empty($userpassword)){
			array_push($errors, "<script type='text/javascript'>alert('Password is required')</script>");
		}

		if (count($errors) == 0){
			$password = md5($userpassword);

			$query = "SELECT * FROM usertable WHERE username='$username' AND userpassword='$password' LIMIT 1";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1){
				$logged_in_user = mysqli_fetch_assoc($results);
					if ($logged_in_user['usertype'] == 'admin') {
						$_SESSION['user'] = $logged_in_user;
						$_SESSION['success']  = "<script type='text/javascript'>alert('Logged In Successfully')</script>";

						header('Location: index.php');		  
					}else{
						$_SESSION['user'] = $logged_in_user;
						$_SESSION['success']  = "<script type='text/javascript'>alert('Logged In Successfully')</script>";

						header('Location: index.php');
					}
			}else {
				array_push($errors, "<script type='text/javascript'>alert('Wrong username/password combination. Please Try Again!')</script>");
			}
		}
	}

	function isAdmin(){
		if(isset($_SESSION['user']) && $_SESSION['user']['usertype'] == 'admin'){
				return true;
		}else{
				return false;
		}
	}
?>