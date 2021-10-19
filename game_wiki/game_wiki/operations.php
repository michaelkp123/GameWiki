<?php
	include "admin/api/database.php";
	
	// Chnage Profile Picture
	
	if(isset($_POST['user_pro_image'])){
		// All Post variables
		$user_id = $_POST['user_id'];
		$file_name = $_FILES['image']['name'];
		$target = 'files/'.$file_name;
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		// Insert Query to user table
		mysqli_query($con, "UPDATE user SET 
			image='$file_name'
			WHERE user_id = $user_id
		");
		header("location:profile.php");
		exit();
	}
	
	// User Details updating
	
	if(isset($_POST['user_details'])){
		$user_id = $_POST['user_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		// Updating user
		mysqli_query($con, "UPDATE user SET 
			name='$name',
			email='$email',
			password='$password'
			WHERE user_id = $user_id
		");
		header("location:profile.php");
		exit();
	}
	
	
?>