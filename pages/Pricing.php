<?php
  session_start();
  require "header.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title> Pricing Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="../css/PricingStyle.css?v=1">
</head>
<body>

  <div class="main-container">

    <div class="main">

      <div class="profile-modal-container">
          <div class="profile">
            <?php
              // $con = mysqli_connect("localhost", "s1830088", "s1830088") or die(mysqli_error($con));
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

      <div class="prices">
        <h1>APPLICABLE FEES</h1>
        <p>Please note that the Unit has changed its fee structure for 2020. The following rates are now applicable.</p>
        <div class="pricing-section">
          <h3 class="price-title">1. Postgraduate Welcome Day: Free</h3>
          <p class="home-header2" style="margin-left: 0">
            This event presents an opportunity to engage with the Postgraduate Association (PGA), registered post
            graduate students and to explore areas for mutual co-operation.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">2. Social Media Postings: R440.00</h3>
          <p class="home-header2" style="margin-left: 0">
            Graduate Recruitment Facebook and Twitter accounts.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">3. Company Presentation only: R4400.00 per presentation</h3>
          <p class="home-header2" style="margin-left: 0">
            ● Evening presentation to students, on either East or West Campus from 17h00 – 19h30 latest. Posters to be
            supplied by companies, advertising their presentation, (Max 25 no bigger than A3 size) will be displayed on
            our notice boards. Companies can get students to rsvp and cater for these presentations, for more info
            contact the GRP Office.<br>
            ● Audio-visual equipment will be available for the presentation however no laptop will
            be provided. A technician will be available to assist with setup and the presentation will be announced on the
            campus radio station.<br>
            ● Each presentation will run from 17h00 (venue dependent) Please note that
            companies will only have access to the venue during the above stated times and not earlier unless lectures
            finish early.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">4. Career Fairs: R13200.00 per single stand</h3>
          <p class="home-header2" style="margin-left: 0">
            ● The Unit will host 4 career fairs this year, An Engineering & Built Environment Fair, IT & Computer Science
            Fair, Accounting Fair which will be spread over 2 days. A General Fair targeting all degrees which will be
            repeated twice.<br>● The career fairs will offer companies the opportunity to market their organisations to
            students. Staff and student assistants will only be available from 07h30 in the morning of the event for
            assistance.<br>● Companies are advised NOT to bring hand-outs that can be used to make loud noises that
            might directly or indirectly interrupt classes as well as cause harm to others.<br>● The fee includes a shell
            scheme, plug point, a light, name on fascia, trestle table, 2 chairs and a hot lunch for a maximum of 3 people
            for a single stand.<br>● Career Fairs run from 08:30 – 15:30.<br>● Set up: Companies have a voluntary option to
            setup the evening before or on the morning of the event. Should companies choose to set up the evening
            before the fair, neither the Counselling and Careers Development Unit nor the University of Witwatersrand will
            be held liable for any damage, loss and/or theft to property and/or belongings.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">5. Emailer: R825 per faculty</h3>
          <p class="home-header2" style="margin-left: 0">
            Companies wanting to have brand awareness and not a physical presence on campus can make use of this
            option in addition to the SMS service and posters (Please refer below for pricing of SMS & posters).
            Companies who participate in more than two GRP events will be entitled to a free once off e-mailer if
            required.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">6. CCDU Interview rooms: R1980.00 per room per day</h3>
          <p class="home-header2" style="margin-left: 0">
            Interview rooms are available from 08:15 – 16:30. Interviewers are strongly advised to schedule their
            interviews within this period as the Unit cannot guarantee staff availability outside of these hours. Booking
            includes a teatime snack and a light lunch.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">7. SMS Facility: 2.20 per SMS/R20 000 unlimited/ p.a.</h3>
          <p class="home-header2" style="margin-left: 0">
            Companies doing a presentation will be entitled to a free SMS message sent to their target audience to
            advertise their campus visit. The unit will send the SMS on your behalf or you can provide text with a
            maximum of 160 characters including spaces.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">8. Posters Only: R1100.00</h3>
          <p class="home-header2" style="margin-left: 0">
            Companies wishing to display posters only are welcome to supply a maximum of 25 posters. Posters should
            not be bigger than A3 size as larger posters are not easily accommodated on our noticeboards.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">9. Foyer Interviews: R13200.00 per organisation</h3>
          <p class="home-header2" style="margin-left: 0">
            Companies wishing to have a presence on campus but do not want to do presentations or be part of a careers
            fair are welcome to do foyer interviews. Foyer interviews are similar to career fairs except that only one
            company is accommodated in the foyer area of the building closest to targeted students. This option comes
            with an optional free presentation slot during student lunchtime. No tea or lunch is included, companies are
            advise to bring own or buy from the cafeterias on campus.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">10. Company Showcase: R11000.00 per organisation</h3>
          <p class="home-header2" style="margin-left: 0">
            Companies wishing to have a presence on campus but do not want to be part of a careers fair are welcome to
            do foyer interviews. Foyer interviews are similar to career fairs except that only one company is
            accommodated in the foyer area of the building closest to targeted students. No tea or lunch is included,
            companies are advised to bring own or buy from the cafeterias on campus.
          </p>
        </div>
        <div class="pricing-section">
          <h3 class="price-title">11. Invoicing and Payment</h3>
          <p class="home-header2" style="margin-left: 0">
            ● Companies should allow 10 days for the processing of an invoice once in receipt of a quotation.<br>●
            Cancellation procedures are applicable once bookings are confirmed.<br><br>
          </p>
          <p class="note" style="color: black">
            NB!! PLEASE NOTE ALL FEES ARE APPLICABLE ONCE AN INVOICED HAS BEEN ISSUED AND NO
            CHANGES WILL BE MADE.
          </p>
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
