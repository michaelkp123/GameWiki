<?php session_start();?>
<?php
	// if already login, it redirect to index page
	if(isset($_SESSION['user_id'])){
		header('location:profile.php');
		exit();
	}
?>
<?php
	include 'admin/api/database.php';
	
	$login_error = '';
	if (isset($_POST['user_register'])) {
		//print_r($_POST); exit;
		$user_name = $_POST['user_name'];
		$email = $_POST['user_email'];
		$user_password = $_POST['user_password'];
		$user_cpassword = $_POST['user_cpassword'];
		
		$result = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
		if (mysqli_num_rows($result)==0) {
			if ($user_password==$user_cpassword) {
				$stmt = mysqli_prepare($con, "INSERT INTO user SET name=?, email=?, password=?");
				mysqli_stmt_bind_param($stmt, 'sss', $user_name, $email, $user_password);
				mysqli_stmt_execute($stmt);
				$user_id = mysqli_insert_id($con);
				$_SESSION['user_id'] = $user_id;
				header('location:profile.php');
				echo "<script> window.location.href = 'profile.php' </script>";
				exit();
			} else {
				$login_error = "Passwords didn't match!";
			}
		} else {
			$login_error = 'Email already exists!';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "admin/api/header_links.php";?>
  <style>
		p.error {
			color:red;
			font-weight:bold;
			text-align:center;
		}
	</style>
</head>
<body>
	<?php include "navbar.php";?>
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<h2 class="text-center">REGISTER</h2>
				<p class="error"><?php echo $login_error; ?></p>
					<div class="form-group">
					  <label class="control-label col-sm-3">Name:</label>
					  <div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Enter Name" name="user_name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-3">Email Address:</label>
					  <div class="col-sm-9">
						<input type="text" class="form-control" placeholder="Enter Email" name="user_email" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-3" for="pwd">Password:</label>
					  <div class="col-sm-9">          
						<input type="password" class="form-control" placeholder="Enter password" name="user_password" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-3" for="pwd">Confirm Password:</label>
					  <div class="col-sm-9">          
						<input type="password" class="form-control" placeholder="Enter Confirm password" name="user_cpassword" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-3 col-sm-9">
						<button type="submit" name="user_register" class="btn btn-danger">Register User</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>


