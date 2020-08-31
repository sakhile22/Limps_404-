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
	include('add-event.php');
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


	<title>Events</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">
	<link href="css/datatables.min.css" rel="stylesheet">

	<style>
	.btn-event{

		margin-bottom: 20px;
		padding: 8px 16px;
		font-size: 15px;
		color: #002f4a;
		font-weight: bold;
		background-color:inherit;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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

	<style>
	.dialog {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 6; /* Sit on top */
padding-top: 50px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.dialog-content {
background-color: #fefefe;
margin: auto;
padding: 20px;
border: 1px solid #888;
width: 80%;
}

/* The Close Button */
.close {
color: #002f4a;
float: right;
font-size: 28px;
font-weight: bold;
}

.dialog-header{
	padding: 2px 16px;
	background:inherit;
	color: inherit;
}
.dialog-body{
	padding: 4px 16px;
}

.close:hover,
.close:focus {
color: #000;
text-decoration: none;
cursor: pointer;
}
	</style>

	</head>
	<body>

	<div class="brand">
		<img src="img/wits.png" style="height: 50px; margin:0px 0px 0px 20px; display: inline-flex;">
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

						<h2 class="page-title">Upcoming events</h2>

						<div class="form-group">
							<button name="button" id = "dialog-btn" class="btn-event"><i class="fas fa-plus" style="color:#85714D;"></i>&nbsp;Add Event</button>

              <div class="dialog" id="mydialog">
							<div class="dialog-content">
									<div class="dialog-header">
										<span class="close">&times;</span>
										<h2>Event details</h2>
									</div>
									<div class="dialog-body">
										<div class="row">
											<div class="col-md-12">
												<div class="panel panel-default">


										<div class="panel-body">
										<form method="post" class="form-horizontal">

										<div class="form-group">
										<label class="col-sm-2 control-label">Organisation Name</label>
										<div class="col-sm-4">
										<input type="text" name="name" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Email</label>
										<div class="col-sm-4">
										<input type="email" name="email" class="form-control" required>
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Phone Number</label>
										<div class="col-sm-4">
										<input type="number" name="phone_number" class="form-control">
										</div>
										<label class="col-sm-2 control-label">Event Manger</label>
										<div class="col-sm-4">
										<input type="text" name="event_manager" class="form-control" >
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Title</label>
										<div class="col-sm-4">
										<input type="text" name="title" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Type Of Event</label>
										<div class="col-sm-4">
										<input type="text" name="type" class="form-control">
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Location</label>
										<div class="col-sm-4">
										<input type="text" name="location" class="form-control" required>
										</div>
										<label class="col-sm-2 control-label">Time</label>
										<div class="col-sm-4">
										<input type="time" name="time" class="form-control" required>
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Date</label>
										<div class="col-sm-4">
										<input type="date" name="date" class="form-control" required>
										</div>
										</div>

										<div class="form-group">
										<label class="col-sm-2 control-label">Speaker</label>
										<div class="col-sm-4">
										<input type="text" name="speaker" class="form-control">
										</div>
										<label class="col-sm-2 control-label">Event Description</label>
										<div class="col-sm-4">
										<input type="text" name="description" class="form-control">
										</div>
										</div>


										<div class="form-group">
										<label class="col-sm-2 control-label">Image</label>
										<div class="col-sm-4">
										<input type="file" name="image" class="form-control" style="border:none">
										</div>

										<label class="col-sm-2 control-label">Organisation Logo</label>
										<div class="col-sm-4">
										<input type="file" name="org_logo" class="form-control" style="border:none">
										</div>
									</div>
												<div class="form-group">
													<div class="col-sm-8 col-sm-offset-2">
														<button class="btn-event" name="submit" type="submit" style="width:100px">Save</button>

													</div>
												</div>
												</form>
												</div>
											</div>
										</div>

									</div>
									</div>
								</div>
              </div>
						</div>

								<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
									<thead>

										<tr>
										<th class="th-sm">Organization</th>
										<th class="th-sm">Title</th>
										<th class="th-sm">Email</th>
										<th class="th-sm">Contact</th>
										<th class="th-sm">Venue</th>
										<th class="th-sm">Date</th>
										<th class="th-sm">Time</th>

										</tr>

									</thead>
									<tbody>

									<?php
									$result = mysqli_query($link,"select * from events where day >= CURDATE()");
									while($row = mysqli_fetch_assoc($result)):
									 ?>
										 <tr>
											<td><?php echo $row['org_name'] ?></td>
											<td><?php echo $row['title'] ?></td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['phone'] ?></td>
											<td><?php echo $row['location'] ?></td>
											<td><?php echo $row['day'] ?></td>
											<td><?php echo $row['time'] ?></td>
										 </tr>


								 <?php endwhile; ?>
									</tbody>
									<tfoot>
										<tr>
										<th>Organisation</th>
										<th>Title</th>
										<th>Email</th>
										<th>Contact</th>
										<th>Venue</th>
										<th>Date</th>
										<th>Time</th>
									</tfoot>
								</table>

						</div>
					</div>

					<div class="row">
						<div class="col-md-12">

							<h2 class="page-title">Past events</h2>

									<table id="dtBasicExample2" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
										<thead>

											<tr>
											<th class="th-sm">Organization</th>
											<th class="th-sm">Title</th>
											<th class="th-sm">Email</th>
											<th class="th-sm">Contact</th>
											<th class="th-sm">Venue</th>
											<th class="th-sm">Date</th>
											<th class="th-sm">Time</th>

											</tr>

										</thead>
										<tbody>

										<?php
										$result = mysqli_query($link,"select * from events WHERE day < CURDATE()");
										while($row = mysqli_fetch_assoc($result)):
										 ?>
										 <tr>
											<td><?php echo $row['org_name'] ?></td>
											<td><?php echo $row['title'] ?></td>
											<td><?php echo $row['email'] ?></td>
											<td><?php echo $row['phone'] ?></td>
											<td><?php echo $row['location'] ?></td>
											<td><?php echo $row['day'] ?></td>
											<td><?php echo $row['time'] ?></td>

										 </tr>


									 <?php endwhile; ?>
										</tbody>
										<tfoot>
											<tr>
											<th>Organisation</th>
											<th>Title</th>
											<th>Email</th>
											<th>Contact</th>
											<th>Venue</th>
											<th>Date</th>
											<th>Time</th>

										</tfoot>
									</table>

							</div>
						</div>



				</div>

			</div>
		</div>

		<!-- Footer -->
<footer class="page-footer bottom font-small">
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
<script type="text/javascript">
	var dialog = document.getElementById("mydialog");
	var button = document.getElementById("dialog-btn");
	var span = document.getElementsByClassName("close")[0];

	button.onclick = function(){
		dialog.style.display = "block";
	}
	window.onclick = function(event){
		if(event.target == dialog)
		   dialog.style.display = "none";
	}

	span.onclick = function(){
		dialog.style.display = "none";
	}

</script>
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
	$('#dtBasicExample2').DataTable();
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
