<?php
 session_start();
 error_reporting(0);
 $link = mysqli_connect('localhost','root','','admin'); //establish connection

 if(isset($_POST['submit'])){

   //read form inputs
   $username = $_POST['username'];
   $password = $_POST['password'];


     if($result = mysqli_query($link,"SELECT * FROM titi WHERE user_id ='$username' and password ='$password'")){

       if(mysqli_num_rows($result) ==1){
         $user = mysqli_fetch_assoc($result);
         $_SESSION['username'] = $user['name'];
         $_SESSION['signedIn'] = True;
         $_SESSION['id'] = $user['user_id'];
         //echo "name :" .$_SESSION['username'];
         //header('dashboard.php');

         ?>
         <script type="text/javascript">
           window.location = "dashboard.php";
         </script>
         <?php

       }else{
         ?>
         <script type="text/javascript">
           alert("incorrect username or password!");
           window.location = "login.php";
         </script>
         <?php
       }
     }

 }

 header('Cache-Control: no cache');
 session_cache_limiter('private_no_expire');
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" href="fontawesome-free-5.13.1-web/css/all.css">

<style>
.background {
background-image: url("img/index.JPG");
height: 100%;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}
</style>

</head>
<body>

<div class="background">

 <div class="logo">
   <img src="img/wits-logo.png">
 </div>
 <div class="login-container" style="border-radius: 50px">

    <img class="avatar" src="img/avatar.svg" >
    <h1>Welcome Back!</h1>

    <form class="form" autocomplete="off" method="post">
        <i class ="fas fa-user input-prefix"></i>
        <input type="text" name="username"  placeholder="Username (staff number)" style="width: 250px; caret-color: white;" required >


        <i class ="fas fa-lock input-prefix"  ></i>
        <input type="password" name="password" placeholder="Password"  id="password" style="width: 250px; caret-color: white;" required>


        <a href="https://www.wits.ac.za/about-wits/visitor-information/visitor-information-access-to-campus/tss-and-your-kudu-card/wits-ict/" target="_blank">Forgot password?</a>
        <input type="submit" name="submit" value="Login">

    </form>
   </div>
  </div>
</body>
</html>
