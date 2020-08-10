<?php
  session_start();
  require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Events Page</title>
	<link rel="stylesheet" href="../css/PlaceEventsStyle.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    var counter = 0;

    $(document).ready(function() {

      $("input[type='checkbox']").change(function() {
        if ( $(this).val() == "external_website" && $(this).is(":checked") ) {

          $("#external_website_url").show();
          $("#break").show();
          $("#email_for_registration").hide();

        }
        else if ( $(this).val() == "by_email" && $(this).is(":checked")) {

          $("#email_for_registration").show();
          $("#break").show();
          $("#external_website_url").hide();

        }
        else {

          $("#external_website_url").hide();
          $("#email_for_registration").hide();
          $("#break").hide();
        }

        if ($(this).val() == "Address" && $(this).is(":checked")) {
          $("#address").show();
          $("#online").hide();
        }
        else if ($(this).val() == "Online" && $(this).is(":checked")) {
          $("#address").hide();
          $("#online").show();
        }
        else {
          $("#address").hide();
          $("#online").hide();
        }
      });

      $(".speakers").click( function() {

          if (counter == 0) {
            $("#speaker1").show();
            $("#button-speaker1").show();
            $("#break-speaker1").show();
            counter = counter + 1;
          }
          else if (counter == 1) {
            $("#speaker2").show();
            $("#button-speaker2").show();
            $("#break-speaker2").show();
            counter = counter+1;
          }
          else if (counter == 2) {
            $("#speaker3").show();
            $("#button-speaker3").show();
            $("#break-speaker3").show();
            counter = counter+1;
          }
      });

      $("#button-speaker1").click( function() {
        $("#speaker1").hide();
        $("#button-speaker1").hide();
        $("#break-speaker1").hide();
        counter = counter-1;
      });

      $("#button-speaker2").click( function() {
        $("#speaker2").hide();
        $("#button-speaker2").hide();
        $("#break-speaker2").hide();
        counter = counter-1;
      });

      $("#button-speaker3").click( function() {
        $("#speaker3").hide();
        $("#button-speaker3").hide();
        $("#break-speaker3").hide();
        counter = counter-1;
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

        <form action="../php/PlaceEvents.inc.php" method="post" enctype="multipart/form-data">

          <?php
            if (isset($_GET['error'])) {
              if ($_GET['error'] == 'emptyfields') {
                echo "<p class='form-error' style='color: red;'>Fill in all required fields!</p><br>";
              }
              else if ($_GET['error'] == 'databaseerror') {
                echo "<p class='form-error' style='color: red;'>Some database error occurred, try submit your event again!</p><br>";
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
            else if (isset($_GET['event']) == 'success') {
              echo "<p class='form-success' style='color: rgb(75,181,67);'>Your job offer is sent successfully!</p><br>";
            }
          ?>

          <h2> About the organisation </h2>
          <hr style="width:500px"><br>

            <label style="color: #003B5C; font-weight:bold;"> Company name </label><br>
            <input type="text" name = "company_name" size="50"><br><br>

            <label style="color: #003B5C; font-weight:bold;"> Name contact person</label><br>
            <input type="text" id="name_contact_person" name = "name_contact_person" size="50" placeholder="First name and second name"><br><br>

            <label style="color: #003B5C; font-weight:bold;"> Email address contact person</label><br>
            <input type="text" id="email_address_person" name = "email_address_person" size = "50" placeholder="example@email.com"><br><br>

            <label style="color: #003B5C; font-weight:bold;"> Phone number contact person</label><br>
            <input type="text" id="phone_number_person" name = "phone_number_person" size = "50" placeholder="+27..."><br><br>

          <h2> About the event </h2>
          <hr style="width:500px"><br>

            <label for="img">Upload cover photo</label>
            <input type="file" name="cover_photo" accept="image/*"><br><br>

            <label for="title_event" style="color: #003B5C; font-weight:bold;">Title Event</label><br>
            <input type="text" id="title_event" name="title_event" size="40"><br><br>


          <div class="type-of-event">
            <label for="event_type" style="color: #003B5C; font-weight:bold;">Event type</label><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Coaching">Coaching</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Conferencing / Presentation">Conferencing / Presentation</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Contest">Contest</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Job Fair">Job Fair</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Live chat / Webinar">Live chat / Webinar</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Networking">Networking</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Recruitment session">Recruitment session</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Student club">Student club</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Visit">Visit</input><br>
            <input type="checkbox" name="event_type[]" style="margin-right: 5px" value="Workshop">Workshop</input>
          </div><br>

            <div class="event-location">
              <label for = "location" style="color: #003B5C; font-weight:bold;">Location of the event</label><br>

              <input type="checkbox" name="campus" class="location_class" style="margin:0 5px 0 0px" value="Campus">Campus</input>
              <input type="checkbox" name="address" class="location_class" style="margin:0 5px 0 10px" value="Address">Address</input>
              <input type="checkbox" name="online" class="location_class" style="margin:0 5px 0 10px" value="Online">Online</input><br><br>
              <script type="text/javascript">
                $('.location_class').on('change',function() {
                  $('.location_class').not(this).prop('checked', false);
                });
              </script>
              <textarea name="event_address" id="address" style="display: none; width: 30%; height: 8rem; margin-bottom: 20px;" placeholder="Provide your address"></textarea>
              <input type="url" style="display: none; margin-bottom: 20px; width: 30%" id="online" name="location_url" placeholder="url for the event">
            </div>

            <div class="event_dates">
              <label for="event_start_date" display="block" style="color: #003B5C; font-weight:bold;">Start of the event<span style="font-weight:normal"> date and time</span></label>
              <br>
              <input type="date" id="start_date" class="event_start_date" name="start_date">
              <input type="time" id="start_time" class="event_start_date" name="start_time">
              <br><br>
              <label for="event_end_date" display="block" style="color: #003B5C; font-weight:bold;">End of the event<span style="font-weight:normal"> date and time</span></label>
              <br>
              <input type="date" id="end_date" class="event_end_date" name="end_date">
              <input type="time" id="end_time" class="event_end_date" name="end_time">
            </div><br>

            <label for="event_description" style="color: #003B5C; font-weight:bold;">Event description<span style="color: red;">*</span></label>
            <div class="event description">
              <textarea name="event_description" id="event_description"></textarea>
              <br><br>
            </div>

            <div class="add_speakers">

              <label style="color: #003B5C; font-weight:bold;">Click to add speakers<span style="font-weight:normal">(optional)</span></label>
              <br>
              <input type="button" id="speakers" name="speakers" value="Add Speakers" class="speakers">
              <br><br>

              <input style="display:none" type="text" id="speaker1" name="name_speaker1" placeholder="speaker name and surname">
              <input style="display:none" type="button" id="button-speaker1" value="Remove">
              <br style="display:none" id="break-speaker1">

              <input style="display:none" type="text" id="speaker2" name="name_speaker2" placeholder="speaker name and surname">
              <input style="display:none" type="button" id="button-speaker2" value="Remove">
              <br style="display:none" id="break-speaker2">

              <input style="display:none" type="text" id="speaker3" name="name_speaker3" placeholder="speaker name and surname">
              <input style="display:none" type="button" id="button-speaker3" value="Remove">

            </div>

            <div class="registration configuration">
              <label style="color: #003B5C; font-weight:bold;"> Registration Configuration</label><br>
              How to register?<br>
              <input type="checkbox" id="no_registration" name="no_registration" class="registration_configuration_class" style="margin:0 5px 0 0px">
              Event without registration</input>
              <input type="checkbox" id="external_website" name="external_website" value="external_website" class="registration_configuration_class"
              style="margin:0 5px 0 10px">Register via external website</input>
              <input type="checkbox" id="by_email" name="by_email" value="by_email" class="registration_configuration_class"
              style="margin:0 5px 0 10px">Registration by email</input>
              <script type="text/javascript">
                $('.registration_configuration_class').on('change',function() {
                  $('.registration_configuration_class').not(this).prop('checked', false);
                });
              </script>

              <br>
              <input style="display:none" type="url" id="external_website_url" name="how_to_register[]" placeholder="URL of the website" size="40">
              
              <input style="display:none" type="email" id="email_for_registration" name="how_to_register[]" placeholder="example@gmail.com" size="40">
              <br id="break" style="display:none">

              <br>
              <label for="event_start_reg_date" display="block" style="color: #003B5C; font-weight:bold;">Start registration<span style="font-weight:normal"> date and time</span></label>
              <br>
              <input type="date" id="start_reg_date" class="event_start_reg_date" name="start_reg_date">
              <input type="time" id="start_reg_time" class="event_start_reg_date" name="start_reg_time">
              <br><br>
              <label for="event_end_reg_date" display="block" style="color: #003B5C; font-weight:bold;">End of registration<span style="font-weight:normal"> date and time</span></label>
              <br>
              <input type="date" id="end_reg_date" class="event_end_reg_date" name="end_reg_date">
              <input type="time" id="end_reg_time" class="event_end_reg_date" name="end_reg_time">

            </div>
            <button type="submit" class="form-submit" name="form_submit">Submit for validation</button>
      </form>

    </div>

  </div>

  <div class="events-form">

    
  </div>

</body>
</html>

<?php
  include "footer.php";
?>
