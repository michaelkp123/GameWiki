<style>
	.navbar {
		border-radius:0;
	}
	.navbar-nav>li>a, a.navbar-brand {
		color:#fff;
	}
	.navbar-nav>li>a:hover {
		background:#fff;
		color:#000;
	}
	.icon-bar {
		background:#fff;
	}
</style>
<?php
	$res = mysqli_query($con, "SELECT * FROM admin");
	$row = mysqli_fetch_array($res);
?>
<nav class="navbar" style="background-color:rgb(86,61,124) !important;color:white">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="games.php">Admin Panel</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
	  <?php if(isset($_SESSION['admin_id'])){ //display only if session will created after login ?>
      <ul class="nav navbar-nav">
		<li><a href="add_game.php" >Add Game</a></li>
      </ul>
	  <?php } ?>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION['admin_id'])){ ?><li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $row['admin_name']?></a></li><?php } ?>
       <?php if(!isset($_SESSION['admin_id'])){ ?> <li ><a href="login.php" ><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
	   <?php } else { ?>
	   <li ><a href="logout.php" ><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	   <?php } ?>
      </ul>
    </div>
  </div>
</nav>
  