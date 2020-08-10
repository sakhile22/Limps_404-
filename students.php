<?php
session_start();
error_reporting(0);
$link = mysqli_connect('127.0.0.1','s1732967','Tshamano93@','d1732967');//establish connection

if(strlen($_SESSION['username']) == 0){  //check string length

					 ?>
					 <script type="text/javascript">
						 window.location = "login.php";
					 </script>
					 <?php

}
else{
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


	<title>students</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

</head>
<body>

	<div class="brand">
		<img src="img/wits.png" style="height: 50px; margin:0px 0px 0px 20px;">
		<span class="menu-btn">
			<i class="fa fa-bars"></i>
		</span>

			<ul class="ts-profile-nav">
				<li class="ts-account">
					<div class="logout" style="display: inline-flex; align-item: center;">
						<a  href="" class="account" style="padding-right:0px;" >
							<img src="img/person.svg" style="width:18px; height:18px;" class="ts-avatar">&nbsp; <?php echo htmlentities($_SESSION['username']); ?></a>
						<a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:15px;"></i>&nbsp;Logout</a>
					</div>
				</li>
			</ul>
		</div>

		<!-- side navigation bar-->
		<div class="ts-main-content">
			<nav class="ts-sidebar">
				<ul class="ts-sidebar-menu">
	<!-- dashborad items-->

								 <li ><a href="dashboard.php"><i class="fas fa-th-large"></i>&nbsp; Dashboard </a></li>

								 <li><a href="students.php"><i class="fas fa-user-friends"></i>&nbsp;Students</a></li>

								 <li><a href="offers.php"><i class="fa fa-gift"></i>&nbsp;Offers</a></li>

								 <li><a href="organizations.php"><i class="fa fa-briefcase"></i> &nbsp;Organisations</a></li>

								 <li><a href="events.php"><i class="fas fa-calendar-alt"></i>&nbsp;Events</a></li>

								 <li><a href="feedback.php"><i class="fas fa-comments"></i>&nbsp;Feedback</a></li>
				</ul>
			</nav>

		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Students</h2>

						<!-- Table -->
						<div class="panel panel-default">
							<div class="panel-body">

								<table id="zctb" class="display table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>

										<tr>
											<th>Name</th>
											<th>Student Number</th>
											<th>SMSes Recieved</th>
											<th>Emails Recieved</th>
										</tr>

									</thead>
									<tbody>

									<?php
									$result = mysqli_query($link,"select * from student");
									while($row = mysqli_fetch_assoc($result)):
									 ?>

							  	<!--student's info-->
									<tr>
										<td><?php echo $row['Name'] ?></td>
										<td><?php echo $row['Student_No'] ?></td>
										<td><?php echo $row['Number_Of_SMS'] ?></td>
										<td><?php echo $row['Number_Of_EMAIL'] ?></td>
									</tr>


								 <?php endwhile; ?>
									</tbody>
								</table>
					</div>







							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/main.js"></script>


</body>
</html>
<?php } ?>
