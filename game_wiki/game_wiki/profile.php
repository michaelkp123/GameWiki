<?php session_start();?>
<?php
	//session_start();
	include "admin/api/database.php";
	// if not login, it redirect to login page
	if(!isset($_SESSION['user_id'])){
		header('location:login.php');
		exit();
	}
	
	$user_id = $_SESSION['user_id'];
	
	$result = mysqli_query($con, "SELECT * FROM user WHERE user_id=$user_id");
	$row = mysqli_fetch_array($result);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "admin/api/header_links.php";?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
					<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id?>">
					<div class="form-group">
					  <label class="control-label col-sm-2">Image:</label>
					  <div class="col-sm-10">
						<img src="files/<?php echo $row['image']?>" onerror="this.src='admin/api/img/default.png';" width="30%"><br><br>
						<input type="file" class="form-control" name="image">
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="user_pro_image" class="btn btn-danger">Save</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-7">
			<div class="well">
				<h3 class="text-center" style="margin-top:3px">General Settings</h3><hr>
				<form class="form-horizontal" action="operations.php" method="POST" enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id?>">
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Name:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Name" name="name" value="<?php echo $row['name']?>" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Email:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $row['email']?>" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Password:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Password" name="password" value="<?php echo $row['password']?>" required>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="user_details" class="btn btn-danger">Save</button>
					  </div>
					</div>
				</form>
			</div>
	<h3 class="text-center" style="margin-top:3px">Favorite Games</h3><hr>
	<div class="table table-responsive">
		<table class="table table-striped table-hover">
		<thead style="background-color:rgb(86,61,124) !important;color:white">
		  <tr>
			<th>Image</th>
			<th>Title</th>
			<th>Favorite</th>
		  </tr>
		</thead>
		<?php
			// select all employees from database
			$result=mysqli_query($con,"Select * from favorite WHERE user_id=$user_id"); 
			while($row=mysqli_fetch_array($result)){
				$id = $row['game_id'];
				
			$result2=mysqli_query($con,"Select * from games WHERE game_id=$id");
				while($row2=mysqli_fetch_array($result2)){
		?>
		<tbody>
		  <tr>
			<td>
				<div style="">
					<a href="admin/api/files/<?php echo $row2['image'] ?>" target="_blank"><img src="admin/api/files/<?php echo $row2['image']?>" width="200px" class="img-responsive img-thumbnail"></a>
				</div>
			</td>
			<td><?php echo $row2['title'];?></td>
			<td><span class="fa fa-star" style="color:gold !important;font-size:25px"></span></td>
		  </tr>
		</tbody>
			<?php } } ?>
	  </table>
  </div>
			
			
		</div>
	</div>
</div>
</body>
</html>


