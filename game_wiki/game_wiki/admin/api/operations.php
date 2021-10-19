<?php
	include "database.php";
	
	// add Game
	
	if(isset($_POST['add_game'])){
		// All Post variables
		$title = $_POST['title'];
		$short_description = $_POST['short_description'];
		$long_description = $_POST['long_description'];
		
		$file_name = $_FILES['image']['name'];
		$target = 'files/'.$file_name;
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		
		// Insert Query to employee_user table
		mysqli_query($con, "INSERT INTO games SET 
			title='$title', 
			short_description='$short_description', 
			long_description='$long_description', 
			image='$file_name'
		");
		header("location:games.php");
		exit();
	}
	
	// Edit Game
	
	if(isset($_POST['edit_game'])){
		//print_r($_POST); exit;
		// All Post variables
		$game_id = $_POST['game_id'];
		$title = $_POST['title'];
		$short_description = $_POST['short_description'];
		$long_description = $_POST['long_description'];
		
		$filename = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		move_uploaded_file($post_image_temp, "files/$filename");
		
		
		if (empty($filename)) {
			$query = "SELECT * FROM games WHERE game_id=$game_id";
			$image_query = mysqli_query($con, $query);
			while ($row = mysqli_fetch_array($image_query)) {
				$filename = $row['image'];
			}
		} 
		
		// Insert Query to employee_user table
		mysqli_query($con, "UPDATE games SET 
			title='$title', 
			short_description='$short_description', 
			long_description='$long_description', 
			image='$filename'
			WHERE game_id = $game_id
		");
		header("location:games.php");
		exit();
	}
	
	// Update Employee 
	
	if(isset($_POST['update_employee'])){
		$employee_id = $_POST['employee_id'];
		$employee_name = $_POST['employee_name'];
		$employee_username = $_POST['employee_username'];
		$employee_role = $_POST['employee_role'];
		$employee_salary = $_POST['employee_salary'];
		$employee_gender = $_POST['employee_gender'];
		$employee_email = $_POST['employee_email'];
		$employee_password = $_POST['employee_password'];
		
		
		// Updating employee by employee id
		mysqli_query($con, "UPDATE employee_user SET 
			employee_name='$employee_name', 
			employee_username='$employee_username', 
			employee_role='$employee_role', 
			employee_gender=$employee_gender, 
			employee_salary='$employee_salary', 
			employee_email='$employee_email', 
			employee_password='$employee_password'
			WHERE employee_id = $employee_id
		");
		header("location:index.php");
		exit();
	}
	
	// delete game
	
	if(isset($_POST['delete_game'])){
		$game_id = $_POST['game_id'];
		$image_name = $_POST['image_name'];
		// deleting document from folder
		unlink('files/'.$image_name);
		
		//deleting game from database
		mysqli_query($con, "DELETE FROM games WHERE game_id=$game_id");
		header("location:games.php");
		exit();
	}
	
	// Chnage Profile Picture
	
	if(isset($_POST['admin_pro_image'])){
		// All Post variables
		$file_name = $_FILES['admin_image']['name'];
		$target = 'files/admin_image/'.$file_name;
		move_uploaded_file($_FILES['admin_image']['tmp_name'],$target);
		
		// Insert Query to employee_user table
		mysqli_query($con, "UPDATE admin SET 
			image='$file_name'
		");
		header("location:profile.php");
		exit();
	}
	
	
	if(isset($_POST['admin_details'])){
		$admin_name = $_POST['admin_name'];
		$admin_email = $_POST['admin_email'];
		$admin_password = $_POST['admin_password'];
		
		
		// Updating admin
		mysqli_query($con, "UPDATE admin SET 
			admin_name='$admin_name',
			admin_email='$admin_email',
			admin_password='$admin_password'
		");
		header("location:profile.php");
		exit();
	}
	
	
?>