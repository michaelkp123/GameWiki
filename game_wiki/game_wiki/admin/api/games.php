<?php session_start();?>
<?php
	// if not login, it redirect to login page
	if(!isset($_SESSION['admin_id'])){
		header('location:login.php');
		exit();
	}
	include "database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "header_links.php";?>
</head>
<body>
	<?php include "navbar.php";?>
<div class="container">
  <h3 class="text-center" style="color:black !important;margin-top:3px">All Games</h3><hr>
  <div class="table table-responsive">
		<table class="table table-striped table-hover">
		<thead style="background-color:rgb(86,61,124) !important;color:white">
		  <tr>
			<th>ID</th>
			<th>Image</th>
			<th>Title</th>
			<th>Short Description</th>
			<th>Long Description</th>
			<th>Edit</th>
			<th>Delete</th>
		  </tr>
		</thead>
		<?php
			// select all employees from database
			$result=mysqli_query($con,"Select * from games"); 
			while($row=mysqli_fetch_array($result)){
		?>
		<tbody>
		  <tr>
			<td><?php echo $row['game_id'];?></td>
			<td>
				<div style="">
					<a href="files/<?php echo $row['image'] ?>" target="_blank"><img src="files/<?php echo $row['image']?>" width="500px" class="img-responsive img-thumbnail"></a>
				</div>
			</td>
			<td><?php echo $row['title'];?></td>
			<td style="text-align:justify"><?php echo $row['short_description'];?></td>
			<td style="text-align:justify"><?php echo $row['long_description'];?></td>
			<td>
				<a href="edit_game.php?gameid=<?php echo $row['game_id']?>">
				<button class="btn btn-small btn-danger"><i class="fa fa-pencil"></i> Edit</button>
				</a>
			</td>
			<td>
				<a data-toggle="modal" data-target="#delete<?=$row['game_id'];?>">
				<button class="btn btn-small btn-danger" style="background:#dc3545 !important;border-color:#dc3545 !important"><i class="fa fa-trash"></i> Delete</button>
				</a>
					<!-- Modal for Deleting employee-->
					<div class="modal fade in" id="delete<?=$row['game_id'];?>"  role="dialog" aria-hidden="true">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-body">
							<h3>Are you sure you want to delete this?</h3>
						  </div>
						  <div class="modal-footer">
							<form method="post" action="operations.php">
								<input type="hidden" name="game_id" value="<?=$row['game_id']?>"> 
								<input type="hidden" class="form-control" value="<?php echo $row['image']?>" name="image_name">
								<button type="submit" class="btn btn-danger" name="delete_game">Delete</button>
								<button type="button" class="btn btn-default" data-dismiss="modal" style="background:#f8f9fa !important;color:black !important">Close</button>
							</form>
						  </div>
						</div>
					  </div>
					</div>
			</td>
		  </tr>
		</tbody>
			<?php } ?>
	  </table>
  </div>
</div>
</body>
</html>


