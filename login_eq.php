<?php
	include_once("db_connect");
	print($db);
	
	print("test");
	
	
	$email = $_POST['email'];
	$pass = $_POST['password'];
	
	print($email);
	print($pass);
	
	$passHash = md5($pass)

	// athlete table
	$queryAth = "SELECT * " 
		   . "FROM athlete "  
		   . "WHERE email='$email' AND passHash='$passHash';";

	$resultAth = $db->query($queryAth);
	
	$rowsAth = $resultAth->rowCount();
	
	// worker table
	$queryW = "SELECT * " 
		   . "FROM worker "  
		   . "WHERE email='$email' AND passHash='$passHash';";

	$resultW = $db->query($queryW);
	
	$rowsW = $resultW->rowCount();
	
	// admin table
	$queryAdmin = "SELECT * " 
		   . "FROM admin "  
		   . "WHERE email='$email' AND passHash='$passHash';";

	$resultAdmin = $db->query($queryAdmin);
	
	$rowsAdmin = $resultAdmin->rowCount();
	
	// checking for each type of user
	if($rowsAth == 1){
		header('Location: athlete_dash.html');
		exit;
	}
	elseif($rowsW == 1){
		header('Location: worker_dash.html');
		exit;
	}
	elseif($rowsAdmin == 1){
		header('Location: admin_home.html');
		exit;
	}
	// otherwise the info is incorrect
	else{
		print("Your login information does not seem to be correct, please try again");
		header('Location: login_test.html');
		exit;
	}
	
	
?>