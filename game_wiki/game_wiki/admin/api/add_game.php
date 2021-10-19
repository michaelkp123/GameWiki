<?php session_start();?>
<?php
	include "database.php";
	// if not login, it redirect to login page
	if(!isset($_SESSION['admin_id'])){
		header('location:login.php');
		exit();
	}
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
		<div class="col-md-10 col-md-offset-1">
			<div class="well">
				<h3 class="text-center" style="margin-top:3px">Add Game</h3>
				<form class="form-horizontal" action="operations.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
					  <label class="control-label col-sm-2">Image:</label>
					  <div class="col-sm-10">
						<input type="file" class="form-control" name="image" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2" for="email">Title:</label>
					  <div class="col-sm-10">
						<input type="text" class="form-control" placeholder="Enter Title" name="title" required>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2">Short Description:</label>
					  <div class="col-sm-10">
						<textarea class="form-control" rows="5" name="short_description" placeholder="Enter Description.."></textarea>
					  </div>
					</div>
					<div class="form-group">
					  <label class="control-label col-sm-2">Long Description:</label>
					  <div class="col-sm-10">
						<textarea class="form-control" rows="10" name="long_description" placeholder="Enter Description.."></textarea>
					  </div>
					</div>
					<div class="form-group">        
					  <div class="col-sm-offset-2 col-sm-10">
						<button type="submit" name="add_game" class="btn btn-danger">Save</button>
					  </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>


