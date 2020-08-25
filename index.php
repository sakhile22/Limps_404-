<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> Login Page </title>
    <link rel="stylesheet" href="css/IndexStyle.css">
  </head>
  <body>
    
    <div class="wrapper">
      <br><br><br>
      <h1 class="portal-name">Wits Career Portal</h1>
      <div class="login">
        <h1>Sign in</h1>
        <?php
          if (isset($_GET['error'])) {
            
            if ($_GET['error'] == "emptyfields") {
              echo "<p class='sign-error'>Fill your email/username and password!</p>";
            }
            else if ($_GET['error'] == "account_not_verified") {
              echo "<p class='sign-error'>Account not activated, verify your account in your email!</p>";
            }
            else if ($_GET['error'] == "wrongpwd") {
              echo "<p class='sign-error'>Incorrect password!</p>";
            }
            else if ($_GET['error'] == "databaseerror") {
              echo "<p class='sign-error'>Some database error occured, try sign in again!</p>";
            }
            else if ($_GET['error'] == "nouser") {
              echo "<p class='sign-error'>Invalid username or email!</p>";
            }
          }
        ?>
        
        <form action="php/Login.inc.php" method="post">
          <input type="text" name="username" placeholder="Email/Username">
          <input type="password" name="pwd" placeholder="Password">
          <input type="submit" name="login_submit" value="LOGIN">
          <span id="error_password" style="color: red; display: none; font-size: 10px;">Please fill in password *</span>
          <span id="error_email_password" style="color: red; display: none; font-size: 10px;">Incorrect email or Password *</span>

          <?php
            if (isset($_GET["newpwd"])) {
              if ($_GET["newpwd"] == "passwordupdated") {
                echo '<p class="success-reset">Your password has been reset successfully!</p>';
              }
            }
          ?>

          <a href="pages/reset-password.php" style="color: #003b5c; font-size: 16px; font-weight: bold;">Forgot your password?</a><br><br>
          <span  style="color: white; font-size: 16px">Need an account? <a class="sign-up-link" href="pages/sign-up.php">Sign up now!</a></span>

          
        </form>
      </div>
    </div>

  </body>
</html>