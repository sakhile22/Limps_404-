<?php
session_start();
error_reporting(0);
$link = mysqli_connect('localhost','root','','admin');

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


	<title>Organizations</title>


	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">
	<link href="css/datatables.min.css" rel="stylesheet">


</head>
<body>

	<div class="brand">

			<img src="img/wits.png" style="display: inline-flex;
			  margin:0px 0px 0px 20px; height: 50px;
			 ">


		<span class="menu-btn" style="float:right;">
			<i class="fa fa-bars"></i>
		</span>

			<ul class="ts-profile-nav">
				<li class="ts-account">
					<div style="display: inline-flex; align-item: center;">
						<a  href="" class="account" style="padding-right:0px;" >
							<img src="img/person.svg" style="width:18px; height:18px;" class="ts-avatar">&nbsp; <?php echo htmlentities($_SESSION['username']); ?></a>
						<a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:15px;"></i>&nbsp;Logout</a>
					</div>
				</li>
			</ul>
		</div>

		<!-- side navigation bar-->
		<div class="ts-main-content">
			<nav class="ts-sidebar" >
				<ul class="ts-sidebar-menu">
	<!-- dashborad items-->

								 <li ><a href="dashboard.php"><i class="fas fa-th-large"></i>&nbsp; Dashboard </a></li>

								 <li><a href="students.php"><i class="fas fa-user-friends"></i>&nbsp;Students</a></li>

								 <li><a href="offers.php"><i class="fa fa-gift"></i>&nbsp;Offers</a></li>

								 <li><a href="organizations.php"><i class="fa fa-briefcase"></i> &nbsp;Organizations</a></li>

								 <li><a href="events.php"><i class="fas fa-calendar-alt"></i>&nbsp; Events</a></li>

								 <li><a href="feedback.php"><i class="fas fa-comments"></i>&nbsp;Feedback</a></li>

								 <li class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt" style="font-size:15px;"></i>&nbsp;Logout</a></li>
				</ul>
			</nav>

		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Organizations</h2>

								<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
									<thead>

										<tr>

										<th class="th-sm">Name</th>
										<th class="th-sm">Employee Number</th>
										<th class="th-sm">Registration Number</th>
										<th class="th-sm">Email</th>
										<th class="th-sm">Registration Date</th>

										</tr>

									</thead>
									<tbody>

									<?php
									$result = mysqli_query($link,"select * from organisations");
									while($row = mysqli_fetch_assoc($result)):
									 ?>

									 <tr>
										<td><?php echo $row['Organisation_Name'] ?></td>
										<td><?php echo $row['Employee_No'] ?></td>
										<td><?php echo $row['Registration_Number'] ?></td>
										<td><?php echo $row['Organisation_email']?></td>
										<td><?php echo $row['Date_registered'] ?></td>



									 </tr>


										<!--td> <a href="org-view.php"><i class="fa fa-eye" style="float:left">&nbsp;view</i></a>
											 <i class="fa fa-trash" style="float:right">&nbsp;delete</i></td-->


								 <?php endwhile; ?>
									</tbody>
									<tfoot>
										<tr>

										<th>Name</th>
										<th>Employee Number</th>
										<th>Registration Number</th>
										<th>Email</th>
										<th>Registration Date</th>

										</tr>
									</tfoot>
								</table>

				    </div>
					</div>
				</div>
			</div>

			<!-- Footer -->
	<footer class="page-footer font-small">
	  <!-- Copyright -->
	  <div class="footer-copyright text-center py-3">Copyright © 2000-2019 - University of the Witwatersrand, Johannesburg.
	  </div>
	  <!-- Copyright -->

	</footer>
	<!-- Footer -->

	<!-- Loading Scripts -->

	<!-- jQuery -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- Bootstrap tooltips -->

	<!-- Your custom scripts (optional) -->
	<script type="text/javascript"></script>
		<script type="text/javascript" src="js/datatables.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function () {
		$('#dtBasicExample').DataTable();
		$('.dataTables_length').addClass('bs-select');
		});
		</script>

		<script type="text/javascript">
		$(document).ready(function () {
				$('.menu-btn').click(function () {
					$('nav.ts-sidebar').toggleClass('menu-open');
				});
		});
		</script>

</body>
</html>
<?php } ?>
