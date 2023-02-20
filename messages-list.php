<?php
    include ('authentication.php');
    
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
    
    $retrievesql = "SELECT * FROM contactstable";
    $contactslist = mysqli_query($con, $retrievesql);

    mysqli_close($con);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Messages List</title>
	</head>

	<body>
        <div>
            <div>
                <div>
					<h4>Manage Messages</h4>
						<table>
							<head>
								<th>Contact ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>Subject</th>
								<th>Message</th>
							</head>
							<tbody>
								<?php
									while($contactstable = mysqli_fetch_assoc($contactslist)){
										echo "<tr>";
											echo "<td>".$contactstable['contactid']."</td>";
											echo "<td>".$contactstable['contactname']."</td>";
											echo "<td>".$contactstable['contactemail']."</td>";
                                            echo "<td>".$contactstable['contactsubject']."</td>";
                                            echo "<td>".
                                                    "<form action='messages-single.php?contactid=".$contactstable['contactid']."' method='post'>
                                                        <button class='btn btn-b-n'>
                                                            <span aria-hidden='true'>View</span>
                                                        </button>
                                                    </form>".
                                                "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
						</table>
                </div>
            </div>
            <a href="contact.php">Back</a>
        </div>
    </body>
</html>

