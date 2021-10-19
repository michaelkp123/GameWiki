<?php session_start();?>
<?php
	include "admin/api/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "admin/api/header_links.php";?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php include "navbar.php";?>
<div class="container"><br>
	<div class="row">
  <div class="col-md-12">
    <div class="row">&nbsp;</div>
    <div class="row">
	<?php
		$result = mysqli_query($con, "SELECT * FROM games");
		while($row=mysqli_fetch_array($result)){
			$game_id = $row['game_id'];
	?>
      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="text-center">
            <div class="position-relative">
              <img src="admin/api/files/<?php echo $row['image']?>" style="width:100%;height:250px;" />
            </div><br>
            <h4 id="thumbnail-label"><b><?php echo $row['title']?></b></h4>
            <div class="thumbnail-description smaller">
				<?php echo $row['short_description']?>
			</div>
          </div>
		  <?php
			$star_value = 0;
			if (isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				$star_res = mysqli_query($con, "SELECT * FROM favorite WHERE game_id = $game_id AND user_id=$user_id");
				if (mysqli_num_rows($star_res)>0) {
					$star_value = 1;
				}
			}
		?>
		<div style="position:absolute;top:0;right:0;left:328px;padding:15px;cursor:pointer" onclick="favorite(<?php echo $game_id ?>, <?php if ($star_value==1) echo '0'; else echo '1'; ?>)">
			<span id="fav-star-<?php echo $game_id ?>" style="color:<?php if ($star_value==1) echo 'gold'; else echo 'white'; ?> !important;text-shadow:1px 1px 2px black">
				<span class="fa fa-star" style="color:inherit !important"><span>
			</span>
		</div>
          <div class="caption card-footer text-center">
			<a href="game_details.php?gameid=<?php echo $row['game_id']?>"><button type="button" class="btn btn-primary" style="background:#007bff !important;border-color:#007bff !important">View Details</button></a>
          </div>
        </div>
      </div>
	  <?php } ?>
    </div>
  </div>
</div>
</div>
</body>

<script>
	function favorite(game_id, value) {
		$.ajax({
			url : 'ajax.php',
			type : 'post',
			data : {
				'add_to_fav' : 1,
				'game_id' : game_id,
				'value' : value,
			},
			success : function(res) {
				if (res==1) {
					$('#fav-star-'+game_id).html('<span class="fa fa-star" style="color:gold !important"><span>');
				} else {
					$('#fav-star-'+game_id).html('<span class="fa fa-star" style="color:white !important"><span>');
				}
			}
		});
	}
</script>


</html>


