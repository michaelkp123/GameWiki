<?php session_start();?>
<?php
	//session_start();
	include "admin/api/database.php";
	$game_id = 0;
	if(isset($_GET['gameid'])){
		$game_id = $_GET['gameid'];
	}
	
	// getting employee data by employee id
	$result = mysqli_query($con, "SELECT * FROM games WHERE game_id=$game_id");
	$row = mysqli_fetch_array($result);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "admin/api/header_links.php";?>
  <style>
  .hero-image {
	width: 100%;
	height: 250px;
	background-color: purple;
	background-position: center;
  }
  </style>
</head>
<body>
	<?php include "navbar.php";?>
<br>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well">
				<img src="admin/api/files/<?php echo $row['image']?>" class="hero-image">
				<h2 id="thumbnail-label"><b><?php echo $row['title']?></b></h2>
				<div class="thumbnail-description smaller">
					<p style="font-size:16px;text-align:justify"><?php echo $row['short_description']?></p>
					<p style="font-size:16px;text-align:justify"><?php echo $row['long_description']?></p>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


