<?php
 session_start();
 error_reporting(0);
 $link = mysqli_connect('127.0.0.1','s1732967','Tshamano93@','d1732967');//establish connection

 if(isset($_POST['submit'])){

   //read form inputs
   $username = $_POST['username'];
   $password = $_POST['password'];

   if($username =='' || $password ==''){
     ?>
     <script type="text/javascript">
       alert("username or password cannot be empty!");
       window.location = "login.php";
     </script>
     <?php
   }else {

     if($result = mysqli_query($link,"SELECT * FROM admin WHERE Employee_No ='$username' and Password ='$password'")){

       if(mysqli_num_rows($result) ==1){
         $user = mysqli_fetch_assoc($result);
         $_SESSION['username'] = $user['Name'];
         $_SESSION['signedIn'] = True;
         $_SESSION['id'] = $user['Employee_No'];
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
 }
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

<div class="background">

 <div class="logo">
   <img src="img/wits-logo.png">
 </div>
 <div class="login-container" style="border-radius: 50px">

    <img class="avatar" src="img/ui.png" >
    <h1>Welcome Back!</h1>

    <form class="form" method="post">
        <i class ="fas fa-user input-prefix"></i>
        <input type="text" name="username"  placeholder="Username (staff number)" style="width: 250px; caret-color: white;" >


        <i class ="fas fa-lock input-prefix"  ></i>
        <input type="password" name="password" placeholder="Password"  id="password" style="width: 250px; caret-color: white;">


        <a href="https://www.wits.ac.za/about-wits/visitor-information/visitor-information-access-to-campus/tss-and-your-kudu-card/wits-ict/" target="_blank">Forgot password?</a>
        <input type="submit" name="submit" value="Login">

    </form>
   </div>
  </div>
</body>
</html>
