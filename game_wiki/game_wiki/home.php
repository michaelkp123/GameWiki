<?php session_start();?>
<?php
	// if not login, it redirect to login page
	if(!isset($_SESSION['employee_id'])){
		header('location:login.php');
		exit();
	}
	$employee_id = $_SESSION['employee_id'];
	include "admin/database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "admin/header_links.php";?>
</head>
<body>
	<?php include "navbar.php";?>
<div class="container">
  <h3 class="text-center" style="color:red !important;margin-top:3px"><?php echo $_SESSION['employee_username'];?>'s Information</h3>
  <div class="table table-responsive">
		<table class="table table-striped table-hover">
		<thead style="background-color:rgb(237,26,52) !important;color:white">
		  <tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Employee Role</th>
			<th>Employee Salary</th>
			<th>Employee Gender</th>
			<th>Employee Username</th>
			<th>Employee Email</th>
			<th>Document</th>
			<th>Edit</th>
		  </tr>
		</thead>
		<?php
			// select all employees from database
			$result=mysqli_query($con,"Select * from employee_user WHERE employee_id=$employee_id"); 
			while($row=mysqli_fetch_array($result)){
		?>
		<tbody>
		  <tr>
			<td><?php echo $row['employee_id'];?></td>
			<td><?php echo $row['employee_name'];?></td>
			<td><?php echo $row['employee_role'];?></td>
			<td><?php echo $row['employee_salary'];?></td>
			<td><?php if($row['employee_gender']==1) echo 'Male'; else echo 'Female'?></td>
			<td><?php echo $row['employee_username'];?></td>
			<td><?php echo $row['employee_email'];?></td>
			<td>
				<a href="employee_document.php?id=<?php echo $row['employee_id']?>">
				<button class="btn btn-small btn-danger"><i class="fa fa-eye"></i> Documents</button>
				</a>
			</td>
			<td>
				<a href="edit_employee.php?id=<?php echo $row['employee_id']?>">
				<button class="btn btn-small btn-danger"><i class="fa fa-pencil"></i> Edit</button>
				</a>
			</td>
		  </tr>
		</tbody>
			<?php } ?>
	  </table>
  </div>
</div>
</body>
</html>


