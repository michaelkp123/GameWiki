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
	
	if(isset($_POST['user_login'])){
	  $username   = $_POST['username'];
	  $password  = $_POST['password'];
	  
	  // checking from database username and password
	  $query = "select * from `user` where name = '$username' and password = '$password'";
	  $result = mysqli_query($con,$query);
		if(mysqli_num_rows($result) > 0){ // if found from database
	   $row= mysqli_fetch_assoc($result);
	   
	   // creating session for user
	   $_SESSION['user_id'] = $row['user_id'];
	   
	   //redirecting to index
	   header('location:profile.php');
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
				<h2 class="text-center">LOGIN</h2>
				<p class="error"><?php echo $login_error; ?></p>
					<div class="form-group">
					  <label class="control-label col-sm-2">Username:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Username" name="username" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="pwd">Password:</label>
					  <div class="col-sm-10">          
						<input type="password" class="form-control" placeholder="Enter password" name="password" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="user_login" class="btn btn-danger">Login</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>


