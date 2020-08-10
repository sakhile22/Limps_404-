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

  }else {
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Feedback</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
  	<link rel="stylesheet" href="css/style.css">
  	<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">
  	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">

    <style>
      .container{
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 30px;
        border-color:#4dff88;
        width: 100%;
      }
      .darker{
        background-color: #ddd;
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
    					<h2 class="page-title">Feedback Messages</h2>    <!--title-->

              <div class="panel-body">

              <!--Messages-->

                <?php
                 $result = mysqli_query($link,"select * from feedback");
                 while($row = mysqli_fetch_assoc($result)):
                 ?>
                <div class="container darker" style="margin-top:10px" >
                <h4 style="color:#000000;">
                  <b><?php echo $row['sender'] ?></b>
                  <br>
                  <?php echo $row['message'] ?>

                </h4>
                <span class="time-right" style="float:right;"><?php echo $row['date'] ?></span>
                </div>
              <?php endwhile; ?>


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
