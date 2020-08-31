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


	<title>Admin Dashboard</title>


  <link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">


      <style>
        .z-depth-1{
          box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important;
        }
        .media{
          display: flex;
          align-items: flex-start;
        }
        .rounded{
          border-radius: .25rem !important;
        }

        .blue{
          background:#007bff;
        }
        .green{
          background: #28a745;
        }
        .brown{
          background: #85714D;
        }
        .wits-blue{
          background: #002f4a;
        }

				@media screen only and (max-width:315px){
				  .ts-main-content{
				    margin-top: 50%;
				  }
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

						<h2 class="page-title">Dashboard</h2>

            <div class="row py-2">
            <div class="col-md-12 py-1" style="max-height: 206px; max-width:410px;">
                <div class="card" style="border: none">
                    <div class="card-body">

                          <canvas id="chDonut1"></canvas>

                    </div>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">

                <div class="container my-5 py-5">
                  <!-- Section: Block Content -->
                  <section>

                  <!--Grid row-->
                  <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4">

                      <div class="media white z-depth-1 rounded">
                        <i class="fas fa-user-friends fa-lg blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                        <p class="text-uppercase text-muted mb-1"><small>Students</small></p>
                          <?php
                          $result = mysqli_query($link,"SELECT * FROM students");
                          $students = mysqli_num_rows($result);
                          ?>
                          <h5 class="font-weight-bold mb-0"><?php echo htmlentities($students+0); ?></h5>
                        </div>
                      </div>


                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4">

                      <div class="media white z-depth-1 rounded">
                        <i class="fa fa-calendar-alt fa-lg green z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                        <p class="text-uppercase text-muted mb-1"><small>Upcoming events</small></p>
                          <?php
                          $result = mysqli_query($link,"SELECT * FROM events");
                          $events = mysqli_num_rows($result);
                          ?>
                          <h5 class="font-weight-bold mb-0"><?php echo htmlentities($events+0); ?></h5>
                        </div>
                      </div>


                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4">

                      <div class="media white z-depth-1 rounded">
                        <i class="fas fa-briefcase fa-lg wits-blue z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                          <p class="text-uppercase text-muted mb-1"><small>Organizations</small></p>
                          <?php
                          $result = mysqli_query($link,"SELECT * FROM organisations");
                          $organisations = mysqli_num_rows($result);
                          ?>
                          <h5 class="font-weight-bold mb-0"><?php echo htmlentities($organisations+0); ?></h5>
                        </div>
                      </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4">

                      <div class="media white z-depth-1 rounded">
                        <i class="fas fa-gift fa-lg brown z-depth-1 p-4 rounded-left text-white mr-3"></i>
                        <div class="media-body p-1">
                          <p class="text-uppercase text-muted mb-1"><small>Offers</small></p>
                          <?php
                          $result = mysqli_query($link,"SELECT * FROM offers");
                          $offers = mysqli_num_rows($result);
                          ?>
                          <h5 class="font-weight-bold mb-0"><?php echo htmlentities($offers+0); ?></h5>
                        </div>
                      </div>

                    </div>
                    <!--Grid column-->

                  </div>
                  <!--Grid row-->

                  </section>
                  <!-- Section: Block Content -->
                 </div>
                </div>
               </div>
              </div>
              <!--ine graph-->
              <div class="row">
                <div class="col-md-12">
                  <canvas id="lineChart"></canvas>
                </div>
              </div>


						</div>
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
<script type="text/javascript" src="js/mdb.min.js"></script>
<script type="text/javascript">
// chart colors
var colors = ['#007bff','#28a745','#002f4a','#85714D'];

/* 3 donut charts */
var donutOptions = {
  responsive:true,
  cutoutPercentage: 85,
  legend: {position:'left', padding:5, labels: {pointStyle:'circle', usePointStyle:true}}
};

// donut 1
var chDonutData1 = {
    labels: ['Students', 'Upcoming events', 'Organizations','Offers'],
    datasets: [
      {
        backgroundColor: colors.slice(0,4),
        hoverBackgroundColor: colors.slice(0.4),
        borderWidth: 0,
        data: [<?php
        echo $students;
        ?>,
        <?php
        echo $events;
        ?>,
        <?php
        echo $organisations;
        ?>,
        <?php
        echo $offers;
        ?>]
      }
    ]
};

var chDonut1 = document.getElementById("chDonut1");
if (chDonut1) {
  new Chart(chDonut1, {
      type: 'pie',
      data: chDonutData1,
      options: donutOptions
  });
}
</script>

<script type="text/javascript">
//line
var ctxL = document.getElementById("lineChart").getContext('2d');
var myLineChart = new Chart(ctxL, {
type: 'line',
data: {
labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","Novermber","December"],
datasets: [{
label: "Applications",
data: [65, 59, 80, 81, 56, 55, 40,3,56,100,4,0,90,45,0],
backgroundColor: [
'rgba(133, 113, 77, .4)',
],
borderColor: [
'rgba(0, 47, 74, .7)',
],
borderWidth: 2
}]
},
options: {
responsive: true
}
});

</script>

<script type="text/javascript">

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
