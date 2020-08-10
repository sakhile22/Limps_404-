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


	<title>Events</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

	<style>
	.btn-event{

		margin-bottom: 20px;
		padding: 8px 16px;
		font-size: 15px;
		color: #002f4a;
		font-weight: bold;
		background-color:inherit;
		border: 2px solid #85714D;
		border-radius: 25px;
	}
   input:focus,a:focus,.btn:focus{
		 outline: none;
	 }

	.name{
		display: none;
		text-align: center;
	}
	.account:hover{
      color: red;
	}
	</style>

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

						<h2 class="page-title">Events</h2>

						<div class="form-group">
							<a href="add-event.php"><input type="submit" value="Add Event" class="btn-event">
							</a>

						</div>


						<div class="panel panel-default">
							<div class="panel-body">

								<table id="zctb" class="display table table-striped table-bordered" cellspacing="0" width="100%">
									<thead>

										<tr>
										<th>Organisation Name</th>

										<th>Title</th>
										<th>Event Manger</th>
										<th>Email</th>
										<th>Contact Number</th>
										<th>Venue</th>
										<th>Time</th>
										<th>Date</th>

										</tr>

									</thead>
									<tbody>

									<?php
									$result = mysqli_query($link,"select * from event");
									while($row = mysqli_fetch_assoc($result)):
									 ?>
										 <tr>
											<td><?php echo $row['Organisation_name'] ?></td>
											<td><?php echo $row['Event_title'] ?></td>
											<td><?php echo $row['name_contact_person'] ?></td>
											<td><?php echo $row['Email_address'] ?></td>
											<td><?php echo $row['Phone_number'] ?></td>
											<td><?php echo $row['Event_location'] ?></td>
											<td><?php echo $row['Event_start_time'] ?></td>
											<td><?php echo $row['start_registration_date'] ?></td>
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
