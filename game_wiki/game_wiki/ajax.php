<?php session_start();?>
<?php
	include "admin/api/database.php";
	
	if (isset($_POST['add_to_fav'])) {
		if (isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$game_id = $_POST['game_id'];
			$value = $_POST['value'];
			if ($value==1) {
				$ins = mysqli_query($con, "INSERT INTO favorite SET game_id = $game_id, user_id = $user_id");
				if ($ins) echo 1; else echo 0;
			} else {
				$del = mysqli_query($con, "DELETE FROM favorite WHERE game_id=$game_id AND user_id=$user_id");
				if ($del) echo 0; else echo 1;
			}
		} else {
			echo 0;
		}
		exit();
	}
?>