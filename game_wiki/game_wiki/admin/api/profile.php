<?php session_start();?>
<?php
	include "database.php";
	// if not login, it redirect to login page
	if(!isset($_SESSION['admin_id'])){
		header('location:login.php');
		exit();
	}
	
	$result = mysqli_query($con, "SELECT * FROM admin");
	$row = mysqli_fetch_array($result);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header_links.php";?>
</head>
<body>
	<?php include "navbar.php";?>
<br>

<div class="container">
	<div class="row">
		<div class="col-md-5">
			<div class="well">
				<h3 class="text-center" style="margin-top:3px">Profile Picture</h3><hr>
				<form class="form-horizontal" action="operations.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <label class="control-label col-sm-2">Image:</label>
					  <div class="col-sm-10">
						<img src="files/admin_image/<?php echo $row['image']?>" onerror="this.src='img/default.png';" width="30%"><br><br>
						<input type="file" class="form-control" name="admin_image">
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="admin_pro_image" class="btn btn-danger">Save</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-7">
			<div class="well">
				<h3 class="text-center" style="margin-top:3px">General Settings</h3><hr>
				<form class="form-horizontal" action="operations.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Name:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Name" name="admin_name" value="<?php echo $row['admin_name']?>" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Email" name="admin_email" value="<?php echo $row['admin_email']?>" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Password:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Password" name="admin_password" value="<?php echo $row['admin_password']?>" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="admin_details" class="btn btn-danger">Save</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>


