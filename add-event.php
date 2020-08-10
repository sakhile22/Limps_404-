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

	 if(isset($_POST['submit'])){

		 $org_name = $_POST['name'];
		 $email = $_POST['email'];
		 $phone = $_POST['phone_number'];
		 $title = $_POST['title'];
		 $time = $_POST['time'];
		 $speaker = $_POST['speaker'];
		 $event_type = $_POST['type'];
		 $date = $_POST['date'];
		 $location = $_POST['location'];
		 $event_manager = $_POST['event_manager'];
		 $description = $_POST['description'];
		 $image = $_POST['image'];
		 $logo = $_POST['org_logo'];

     $sql = "INSERT into event values('','$description','$org_name','$event_manager','$email','$phone','$image','$title','$event_type','$location','$time','','$speaker','','$date','','$logo')";
		 if(mysqli_query($link,$sql)){
            echo "<script type='text/javascript'>alert('Event Added Sucessfully!');</script>";

		 }else {
		 	 //echo "<script echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); type='text/javascript'>alert('Something went wrong!');</script>";

				echo "<script type='text/javascript'>alert('Something went wrong! Please try again');</script>";

		 }


	 }


?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">


	<title>Add Event</title>

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

						<h2 class="page-title">Add Event</h2>
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
						<input type="file" name="image" class="form-control">
						</div>

						<label class="col-sm-2 control-label">Organisation Logo</label>
						<div class="col-sm-4">
						<input type="file" name="org_logo" class="form-control">
						</div>
					</div>
								<div class="form-group">
									<div class="col-sm-8 col-sm-offset-2">
										<button class="btn btn-primary" name="submit" type="submit">Save</button>
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
		</div>
	</div>
</body>
</html>
<?php } ?>
