<?php session_start();?>
<?php
	// if already login, it redirect to index page
	if(isset($_SESSION['admin_id'])){
		header('location:games.php');
		exit();
	}
?>
<?php
	include 'database.php';
	$login_error = '';
	
	if(isset($_POST['admin_login'])){
	  $admin_name   = $_POST['admin_name'];
	  $admin_password  = $_POST['admin_password'];
	  
	  // checking from database admin's username and password
	  $query = "select * from `admin` where admin_name = '$admin_name' and admin_password = '$admin_password'";
	  $result = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0){ // if found from database
	   $row= mysqli_fetch_assoc($result);
	   
	   // creating session for admin
	   $_SESSION['admin_id'] = $row['admin_id'];
	   $_SESSION['admin_name'] = $row['admin_name'];
	   
	   //redirecting to index
	   header('location:games.php');
	   exit();
	  } 
	  else { // if not found in database
		$login_error = 'Invalid Login!';
	  }
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header_links.php";?>
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
		<div class="col-md-6 col-md-offset-3">
			<div class="well">
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<h2 class="text-center">LOGIN</h2>
				<p class="error"><?php echo $login_error; ?></p>
					<div class="form-group">
					  <label class="control-label col-sm-2">Username:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Username" name="admin_name" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="pwd">Password:</label>
					  <div class="col-sm-10">          
						<input type="password" class="form-control" placeholder="Enter password" name="admin_password" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="admin_login" class="btn btn-danger">Login</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>


