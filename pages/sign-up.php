<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title> Home Page</title>
    <link rel="stylesheet" href="../css/SignUpStyle.css">
  </head>
  <body>
    
    <div class="wrapper">
      <br><br><br>
      <h1 class="portal-name">Wits Career Portal</h1>

      <div class="sign-up">
        <h1>Sign Up</h1>
        <?php
          if (isset($_GET["error"])) {

            if ($_GET["error"] == "emptyfields") {
              echo "<p class='signup-error'>Fill in all required fields!</p>";
            }
            else if ($_GET["error"] == "invalidemail&username") {
              echo "<p class='signup-error'>Invalid email and username!</p>";
            }
            else if ($_GET["error"] == "invalidemail") {
              echo "<p class='signup-error'>Invalid email!</p>";
            }
            else if ($_GET["error"] == "username") {
              echo "<p class='signup-error'>Invalid username!</p>";
            }
            else if ($_GET["error"] == "passwordmismatch") {
              echo "<p class='signup-error'>Passwords does not match!</p>";
            }
            else if ($_GET["error"] == "databaseerror") {
              echo "<p class='signup-error'>Some database error occurred, sign up again!</p>";
            }
            else if ($_GET["error"] == "usertaken") {
              echo "<p class='signup-error'>Username is taken!</p>";
            }
            
          }
          else if (isset($_GET["signup"]) == "success") {
            echo "<p class='signup-success'>Sign up successful!</p>";
          }
        ?>
        
        <form action="../php/SignUp.inc.php" method="POST" enctype="multipart/form-data">
          <input type="text" name="company_name" placeholder="Company Name">
          <label for="logo" style="font-size: 15px; color: #fff;">Upload company logo</label>
          <input type="file" name="logo" accept="image/*">
          <input type="text" name="telephone" placeholder="Telephone">
          <input type="text" name="username_company" placeholder="Email">
          <input type="password" name="company_password" placeholder="Create Password">
          <input type="password" name="confirm_password" placeholder="Confirm Password">
          <input type="text" name="registration_no" placeholder="Company Registration Number">
          <input type="text" name="vat_no" placeholder="VAT Number">
          <input type="text" name="address1" placeholder="Address1">
          <input type="text" name="address2" placeholder="Address2">
          <input type="text" name="address3" placeholder="Address3">
          <input type="text" name="province" placeholder="Province">
          <input type="text" name="country_name" placeholder="Country">
          <input type="text" name="country_code" placeholder="Country Code">

          <button type="submit" name="signup_submit">Sign Up</button><br><br>

          <a class="back-to-sign-in" style="color: #fff; font-size: 12px; font-weight: bold;" href="../index.php">Go back to sign in</a>

        </form>
      </div>
     
    </div>

  </body>
</html>