<?php
  session_start();
  require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title> Home Page</title>
	<link rel="stylesheet" href="../css/HomeStyle.css?v=1.1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
  <div class="main-container">

    <div class="main">

      <img class="home-cover-img" src="home_cover.jpg" style="margin-top: 65.25px;">
        <h1>Counselling and Careers Development Unit (CCDU)</h1>
        <h2 class="define-ccdu">The CCDU offers a welcoming and safe space for students, with a focus on well being,
          academic success and carrer readiness.</h2>

      <div class="profile-modal-container">
        <div class="profile">
          <?php
            // $con = mysqli_connect("127.0.0.1", "s1830088", "s1830088") or die(mysqli_error($con));
            // mysqli_select_db($con,"d1830088") or die(mysqli_error($con));

            $con = mysqli_connect("localhost", "root", "Sm*22^03%#") or die(mysqli_error($con));
            mysqli_select_db($con,"organization") or die(mysqli_error($con));

            if (isset($_SESSION['username'])) {
              $username = $_SESSION['username'];
            }
            else if (isset($_SESSION['email'])) {
              $username = $_SESSION['email'];
            }
            
            $result = mysqli_query($con,"SELECT company_name,email_users,company_address,country,telephone, province FROM users WHERE company_name = '$username' OR email_users = '$username' ") or die(mysqli_error($con)); 
            if ($result->num_rows === 1) {

            $row = $result->fetch_assoc();
          ?>
            <span class="user-details-heading"><?php echo $row['company_name'] ?></span>
            <p  class='title'>Email Address : <span class="user-details"><?php echo $row['email_users'] ?></span> </p><br>
            <p class='title'>Telephone : <span class="user-details"><?php echo $row['telephone'] ?></span> </p><br>
            <p class='title'>Address : <span class="user-details"><?php echo $row['company_address'] ?></span> </p><br>
            <p class='title'>Province : <span class="user-details"><?php echo $row['province'] ?></span> </p><br>
            <p class='title'>Country : <span class="user-details"><?php echo $row['country'] ?></span> </p><br>
            <span class="close-profile">X</span>

          <?php
            }
          ?>
        </div>
      </div>

      <div class="feature-card-container">
        <div class="feature-card">
          <span class="card-heading">CCDU Services</span><br>
          <span class="card-description">
            • Individual and group counselling<br>
            • Career counselling and development<br>
            • Life coaching<br>
            • Psycho-educative workshops, training and advocacy programmes<br>
            • HIV education, advocacy and support<br>
            • Volunteer peer advocacy on social justice, mental health, and HIV<br>
            • Peer mentorship training<br>
            • Graduate recruitment <br>
            • The Journey to Employability<br>
            • Professional internships
          </span>
        </div>

        <div class="feature-card">
          <span class="card-heading">How do I post an offer on CCDU Career Portal?</span><br>
          <span class="card-description">
            • Go to <a class="unique-links" href="post-offer.php">post offers</a> in the menu above.<br>
            • Add details about your offer posting.<br>
            • Review the offer posting.<br>
            • Add your account information.<br>
            • Submit for validation.<br><br>
            Once your post is validated it will be accessable to students.
          </span>
        </div>

        <div class="feature-card">
          <span class="card-heading">How do I place an event on CCDU Career Portal?</span><br>
          <span class="card-description">
            • Go to <a class="unique-links" href="place-events.php">place events</a> page<br>
            • Feel in the form.<br>
            • Submit for validation.<br><br>
            Once your event is validated it will be accessable to students.
          </span>
        </div>
      </div>
      
      
    </div>
  
  </div>
  
  <script type="text/javascript" src="../js/Home.js"></script>
</body>
</html>

<?php
  include "footer.php";
?>
