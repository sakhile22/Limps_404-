<?php
  session_start();
  require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8" />
  <title> Post Offer</title>
	<link rel="stylesheet" href="../css/PostOffersStyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script>
    
    $(document).ready(function() {
      $("input[type='checkbox']").change(function() {

        if( $(this).val() == "email" && $(this).is(":checked") ) {
          $("#email_to_apply").show();
          $("#to-upload").show();
          $("#application_form").show();
          $("#break1").show();
          $("#break2").show();
        }
        else if ( $(this).val() == "email" && $(this).prop("checked") == false) {
          $("#email_to_apply").hide();
          $("#to-upload").hide();
          $("#application_form").hide();
          $("#break1").hide();
          $("#break2").hide();
        }
        else if ( $(this).val() == "hyperlink" && $(this).is(":checked") ) {
          $("#application-url").show();
          $("#break3").show();
        }
        else if ($(this).val() == "hyperlink" && $(this).prop("checked") == false) {
          $("#application-url").hide();
          $("#break3").hide();
        }
      });

      $(".type-of-job").click( function() {
        $(".type-of-job").not(this).prop("checked", false);
      });

    });

  </script>

</head>
<body>

  <div class="main-container">

    <div class="main">

      <div class="profile-modal-container">
        <div class="profile">
          <?php
            // $con = mysqli_connect("127.0.0.1", "s1830088", "s1830088") or die(mysqli_error($con));
            // mysqli_select_db($con,"d1830088") or die(mysqli_error($con));
            $con = mysqli_connect("localhost", "root", "Sm*22^03%#") or die(mysqli_error($con));
            mysqli_select_db($con,"organization") or die(mysqli_error($con));

            $username = mysqli_escape_string($con,$_GET['username']);

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

      <form name="offer_form" action="../php/PostOffer.inc.php" method="post" enctype="multipart/form-data">
        
        <?php
          if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptyfields') {
              echo "<p class='form-error' style='color: red;'>Fill in all required fields!</p><br>";
            }
            else if ($_GET['error'] == 'databaseerror') {
              echo "<p class='form-error' style='color: red;'>Some database error occurred, resubmit offer!</p><br>";
            }
            else if ($_GET['error'] == 'imgisbig') {
              echo "<p class='form-error' style='color: red;'>Your cover photo size is greater than a required size of 900000kb!</p><br>";
            }
            else if ($_GET['error'] == 'imgerror') {
              echo "<p class='form-error' style='color: red;'>An error occured from cover photo uploaded, try upload again!</p><br>";
            }
            else if ($_GET['error'] == 'imgnotsupported') {
              echo "<p class='form-error' style='color: red;'>Image is not supported, image should be a jpg, jpeg, png or pdf!</p><br>";
            }
            else if ($_GET['error'] == 'userdoesnotexist') {
              echo "<p class='form-error' style='color: red;'>Company name is not registered for the portal!</p><br>";
            }
          }
          else if (isset($_GET['offer']) == 'success') {
            echo "<p class='form-success' style='color: rgb(75,181,67);'>Your job offer is sent successfully!</p><br>";
          }
        ?>

        <div class="getting-started">
          <h2>Getting Started</h2>
          <hr style="width: 500px">
          <br><br>

          <label for="offer-title" style="color: #003B5C; font-weight:bold;">Offer Title<span style="color:red; font-weight:bold">*</span></label><br>
          <input type="text" name="offer_title" size="40px" placeholder="Specific title">
          <br><br>

          <label for="company-name" style="color: #003B5C; font-weight:bold;">Company<span style="color:red; font-weight:bold">*</span></label><br>
          <input type="text" name="company_name" size="40px" placeholder="Name of company for job post"><br><br>
          
          <label for="organisationlogo">Upload company logo</label>
          <input type="file" name="organisationlogo"><br><br>

          <label for="location" style="color: #003B5C; font-weight:bold;">Location<span style="color:red; font-weight:bold">*</span></label><br>
          <input type="text" name="location" id="location" size="40px" placeholder="Place where the organisation/company is located">
        </div>
        <br>

        <div class="offer-details">
          <h2>Offer Details</h2>
          <hr style="width: 500px">
          <br><br>

          <label for="type-of-job" style="color: #003B5C; font-weight:bold;">What type of offer is it?<span style="color:red; font-weight:bold">*</span></label><br>
          <input type="checkbox" class="type-of-job" name="offer_type1" style="margin: 0 5px 0 0" value="Full-time Job">Full-time Job</input>
          <input type="checkbox" class="type-of-job" name="offer_type2" style="margin: 0 5px 0 10px" value="Part-time Job">Part-time Job</input>
          <input type="checkbox" class="type-of-job" name="offer_type3" style="margin: 0 5px 0 10px" value="Contract">Contract</input>
          <input type="checkbox" class="type-of-job" name="offer_type4" style="margin: 0 5px 0 10px" value="Internship">Internship</input>
          <input type="checkbox" class="type-of-job" name="offer_type5" style="margin: 0 5px 0 10px" value="Traineeships">Traineeships</input>
          <br>
          <input type="text" placeholder="Other" name="other_offer_type">
          <br><br>
          <label for="salary" style="color: #003B5C; font-weight:bold;">What is the salary for this offer?</label><br>
          <label>R</label>
          <input type="text" class="salary" id="from" name="salary_minimum" placeholder="Example: 5,000">
          <label>to</label>
          <input type="text" class="salary" id="to" name="salary_maximum" placeholder="Example: 10,000">
          <select id="payment-period" name="payment_period">
            <option value="per year">per year</option>
            <option value="per month">per month</option>
            <option value="per week">per week</option>
            <option value="per day">per day</option>
            <option value="per hour">per hour</option>
          </select>
          <br><br>
          <label for="benefits" style="color: #003B5C; font-weight:bold;">Which benefits does the offer have?</label><br>
          <input type="checkbox" style="margin: 0 5px 0 0" value="Renters Insurance" name="benefits[]">Renters Insurance</input>
          <input type="checkbox" style="margin: 0 5px 0 10px" value="Life Insurance" name="benefits[]">Life Insurance</input>
          <input type="checkbox" style="margin: 0 5px 0 45px" value="Health Insurance" name="benefits[]">Health Insurance</input>
          <br>
          <input type="checkbox" style="margin: 0 5px 0 0" value="Car Insurance" name="benefits[]">Car Insurance</input>
          <input type="checkbox" style="margin: 0 5px 0 38px" value="Disability Insurance" name="benefits[]">Disability Insurance</input>
          <input type="checkbox" style="margin: 0 5px 0 10px" value="Dental Insurance" name="benefits[]">Dental Insurance</input>
          <br>
          <input type="text" placeholder="Other" name="other_benefits">
          <br><br>
          <label for="event_start_reg_date" display="block" style="color: #003B5C; font-weight:bold;">When is the offer closing date? <span style="color:red; font-weight:bold">*</span><span style="font-weight:normal"> date and time</span></label>
          <br>
          <input type="date" id="due_date" class="due_date_class" name="due_date">
          <input type="time" id="due_time" class="due_date_class" name="due_time">
        </div>
        <br>

        <div class="offer-description">
          <h2>Offer Description</h2>
          <hr style="width: 500px">
          <br><br>

          <label style="color: #003B5C; font-weight:bold;">Vacancy Details<span style="color:red">*</span></label>
          <div class="vacancy-details-container">
            <textarea name="vacancy_details" id="vd_mwmw46e4"></textarea>
          </div>
          <br>
          <label style="color: #003B5C; font-weight:bold;">Required Skills<span style="color:red">*</span></label>
          <div class="required_skills-container">
            <textarea name="required_skills" id="vd_wwrfe4"></textarea>
          </div>
          <br>
          <label style="color: #003B5C; font-weight:bold;">Candidate Requirements<span style="color:red">*</span></label>
          <div class="candidate_requirements-container">
            <textarea name="candidate_requirements" id="cr_mfv6e4"></textarea>
          </div>

          <br>

        </div>
        <br>

        <div class="application-settings">
          <h2>Application Settings</h2>
          <hr style="width: 500px">
          <br><br>

          <label for="receive-application" style="color: #003B5C; font-weight:bold;">How do you want to recieve applications?<span style="color:red;  font-weight:bold">*</span></label><br>

          <input type="checkbox" class="receive-application" id="email" value="email" name="form_of_application[]" style="margin: 0 5px 0 0">Email</input>

          <input type="checkbox" class="receive-application" id="hyperlink" value="hyperlink" name="form_of_application[]" style="margin: 0 5px 0 10px">
          Online Application</input>

          <br id="break1" style="display:none">
          <input style="display:none" type="text" name="email" id="email_to_apply" size="30px" placeholder="Email for applications submission">
          <br id="break2" style="display:none">
          <label for="upload" style="display:none" id="to-upload">Upload application form</label>
          <input type="file" name="application_form" id="application_form" style="display:none">

          <br id="break3" style="display:none">
          <input type="url" name="hyperlink" id="application-url" style="display:none" placeholder="url for online applications" size="30px">

        </div>
        <br>
        <button type="submit" class="form-submit" name="form_submit">Send offer for validation</button>

      </form>

    <div>
    
  </div>
  
  <script type="text/javascript" src="../js/Home.js"></script>
</body>
</html>

<?php
  include "footer.php";
?>
