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
<nav class="navbar" style="background-color:rgb(86,61,124) !important;color:white">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">WIKI Games</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
		<li><a href="index.php">Home</a></li>
        <?php if(isset($_SESSION['user_id'])){ ?><li><a href="profile.php"><span class="glyphicon glyphicon-user"></span> name</a></li><?php } ?>
       <?php if(!isset($_SESSION['user_id'])){ ?> <li ><a href="register.php" ><span class="glyphicon glyphicon-log-in" ></span> Register</a></li>
       <?php if(!isset($_SESSION['user_id'])){ ?> <li ><a href="login.php" ><span class="glyphicon glyphicon-log-in" ></span> Login</a></li>
	   <?php } } else { ?>
	   <li ><a href="logout.php" ><span class="glyphicon glyphicon-log-in" ></span> Logout</a></li>
	   <?php } ?>
      </ul>
    </div>
  </div>
</nav>
  