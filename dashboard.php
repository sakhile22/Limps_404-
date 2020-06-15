<?php
  session_start();
  error_reporting(0);
   $link = mysqli_connect('127.0.0.1','s1732967','Tshamano93@','d1732967');


  if(strlen($_SESSION['username']) == 0){  //check string length

             ?>
             <script type="text/javascript">
               window.location = "login.php";
             </script>
             <?php

  }else {
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Administration dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/adminStyle.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


  </head>
  <body>

    <div class="brand">
      <img src="img/wits.png" style="height: 50px; margin:0px 0px 0px 20px;">
      <span class="menu-btn">
        <i class="fa fa-bars"></i>
      </span>

            <ul class="ts-profile-nav">
            	<li class="ts-account">
                <a href="#" style="width:250px; background-color: #000000;" >
                  <img src="img/avatar.svg" class="ts-avatar hidden-side"><?php echo htmlentities($_SESSION['username']);
                 ?></a>

            		<!-- account-->
            		<ul>
            			<li><a href="logout.php">logout</a></li>
            		</ul>
            	</li>
            </ul>
    	</div>

    	<!-- side navigation bar-->
    	<div class="ts-main-content">
    		<nav class="ts-sidebar" style="background: #000000;">
    			<ul class="ts-sidebar-menu">
    <!-- dashborad items-->

                   <li ><a href="dashboard.php"><i class="fas fa-th-large"></i>&nbsp; Dashboard </a></li>

                   <li><a href="students.php"><i class="fas fa-user-friends"></i>&nbsp;Students</a></li>

                   <li><a href="organizations.php"><i class="fa fa-briefcase"></i> &nbsp;Organisations</a></li>

                   <li><a href="events.php"><i class="fas fa-calendar-alt"></i>&nbsp;Events</a></li>

                   <li><a href="#"><i class="fa fa-bell"></i>&nbsp;Notifications</a></li>

                   <li><a href="#"><i class="fas fa-comments"></i>&nbsp;Feedback</a></li>

    			</ul>
    		</nav>

    		<div class="content-wrapper">
    			<div class="container-fluid">
    				<div class="row">
    					<div class="col-md-12">
    					<h2 class="page-title">Dashboard</h2>    <!--title-->

    						<div class="row">
    							<div class="col-md-12">
    								<div class="row">

                      <!--first block-->
    								<a href="students.php">
                      <div class="col-md-3">
                        <div class="panel panel-default" style="border-radius: 700px;">
                          <div class="panel-body bk-success text-light">
                            <div class="stat-panel text-center">

                             <?php
                             $result = mysqli_query($link,"SELECT * FROM student");
                             $students = mysqli_num_rows($result);
                             ?>
                            <div class="stat-panel-number h1 "><?php echo htmlentities($students);?></div>
                            <div class="stat-panel-title">Total students</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>
                    <!--second block-->

    								<a href="organizations.php">
                      <div class="col-md-3">
                        <div class="panel panel-default" style="border-radius: 60px;">
                          <div class="panel-body bk-happy text-light">
                            <div class="stat-panel text-center">

                              <?php
                              $result = mysqli_query($link,"SELECT * FROM organisation");
                              $organizations = mysqli_num_rows($result);
                              ?>
                              <div class="stat-panel-number h1 "><?php echo htmlentities($organizations);?></div>
                              <div class="stat-panel-title">Organizations</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>

                    <a href="events.php">
                      <div class="col-md-3">
                        <div class="panel panel-default" style="border-radius: 700px;">
                          <div class="panel-body bk-success text-light">
                            <div class="stat-panel text-center">

                             <?php
                             $result = mysqli_query($link,"SELECT * FROM event");
                             $events = mysqli_num_rows($result);
                             ?>
                            <div class="stat-panel-number h1 "><?php echo htmlentities($events);?></div>
                            <div class="stat-panel-title">Events</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    </a>



    								</div>
    							</div>
    						</div>
    					</div>
    				</div>
    		</div>
    	</div>

  </body>

</html>

<?php
}
?>
