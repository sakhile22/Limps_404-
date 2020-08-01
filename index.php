<!DOCTYPE html>
<!-- saved from url=(0054)https://getbootstrap.com/docs/4.0/examples/offcanvas/# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="image/Wits-University-logo.jpg">

    <title>Student</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/offcanvas/">

    <!-- Bootstrap core CSS -->
    <link href="./Offcanvas template for Bootstrap_files/bootstrap.min.css" rel="stylesheet">
   <!-- <link href="./div styles/div.css" rel="stylesheet" type="text/css"> -->
    <style type="text/css">


            .me{

              text-align: center ;
              width: 580px;
              height: auto;
              margin: 0 auto ;
              margin-top: 40px;
              margin-bottom: 20px;
              background-color: #FFFF;
              border-radius: 10px;
          }
          #logo{

              width: 55px ;
              height: 48px ;
              float:left;
              margin-left: 10px;
              margin-top: 10px;
          }
          #top-part{
              position: relative;


              height: 90px;

          }
          #Organisation_name{
              float: left;
              margin-left: 10px;
              margin-top: 10px;

          }

          #locduration{

              word-wrap: break-word;
              padding-left: 10px;
              float: left;

          }
          #contactica{

              word-wrap: break-word;
              padding-left: 10px;
              float: left;


          }

          #starttime{
             word-wrap:break-word ;

             padding-left: 10px;
              float: left;


          }
          #endtime{
              word-wrap: break-word ;

              padding-left: 30px;

          }
          #emailz{
              word-wrap: break-word;



          }

          #description{



               height:auto;

              word-wrap: break-word;
          }

          #coverphoto{

              width:100%;
              height:250px;
          }

          #titlesize{


              width: auto;
              position: relative;
              top:60px;
              left: -90px;
              word-wrap: break-word;



          }

          #type{
                position: relative;
                top: 10px;
          }
          #speakerdiv{
              word-wrap: break-word ;
              width: auto ;

          }

          #registrationdiv{
              word-wrap: break-word ;
              width: auto ;
          }


          #name{
            float: left;
          }


          #companyname{

              height: auto;
              word-wrap: break-word;
              width: auto;
          }
          #names{

                height: auto;
                float: left;
                position: relative ;
                top: -60px;
                left: 75px;

          }
          #durationstart{
              word-wrap: break-word;
              width: auto ;


          }
          #durationend{
              word-wrap: break-word ;
              width: auto ;
          }
#desc{

    float:left;
}

        .carousel-item{
    height: 500px;
     }
    .carousel-item img{
    height: 500px;
    }





    </style>



    <!-- Custom styles for this template -->
    <link href="./Offcanvas template for Bootstrap_files/offcanvas.css" rel="stylesheet">
    </head>

  <body class="bg-light" data-gr-c-s-loaded="true" cz-shortcut-listen="true">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
      <a class="navbar-brand" href=""><img src="images/wits.png" style="width:100px;"></a>
      <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="offers.php">Offers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://self-service.wits.ac.za/psp/csprod/UW_SELF_SERVICE/HRMS/?&cmd=login&languageCd=ENG">Student Self-Service</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=""><img src="images/usericon.svg" id="usricon" style="width: 30px;"></a>
          </li>
        </ul>
      </div>
    </nav>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img class="d-block w-100" src="image/Face-masks-for-PPE_2200x800px.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/Wits-face-shields_2200x800px.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="image/Wits-heroes_2200x800px.jpg" alt="Third slide">
    </div>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    <main role="main" class="container">

        <?php
        include('./php/place_events.php') ;

        while($row = mysqli_fetch_array($result)){
        echo "<div class='me' style='text-align: center ;'
              'width: 580px;'
              'height: auto;'
              'margin: 0 auto ;'
              'margin-top: 40px;'
              'margin-bottom: 20px;'
              'background-color: #FFFF;'
              'border-radius: 10px;'>" ;

        echo"<div id='top-part' style='position: relative;'


             'height: 90px;'
            >" ;
           echo "<img id='logo' style= 'width: 55px ;'
              'height: 48px ;'
              'float:left;'
              'margin-left: 10px;'
              'margin-top: 10px;'  src='image/".$row['Organisation_logo']."'>" ;
               echo"<div id='companyname' style='height: auto;'
              'word-wrap: break-word;'
              'width: auto;'>";
                echo "<span id='Organisation_name' style ='float: left;'
                 'margin-left: 10px;'
                 'margin-top: 10px;' >","<strong>".$row['Organisation_name']."</strong>","</span>" ;
           echo "</div>";




           echo"<span id='type' style ='position: relative;'
                'top: 10px;'>","<strong>".$row['Event_type']."</strong>","</span>";

       echo "<div id='titlesize' style =
              'width: auto;'
              'position: relative;'
              'top:60px;'
              'left: -90px;'
              'word-wrap: break-word;'>";
                echo "<h6 id='title'>".$row['Event_title']."</h6>";

        echo "</div>" ;








        echo "</div>" ;
            echo "<div id='names' style = 'height: auto;'
                'float: left;'
                'position: relative ;'
                'top: -60px;'
                'left: 75px;'
              >";
                     echo "<span id='name' style='float: left;'>","<strong>".$row['name_contact_person']."</strong>","</span>";
                 echo "</div>" ;

           echo "<hr>" ;

            echo "<div id='locduration' style ='word-wrap: break-word;'
              'padding-left: 10px;'
              'float: left;'>" ;
                echo "<span id='location'>","<strong>","Location:","</strong>".$row['Event_location']."</span>" ;
        echo "</div>" ;

             echo "<div id='emailz' style ='word-wrap: break-word;'>" ;
                echo "<span id='emailaddress'>","<strong>","Email:","</strong>".$row['Email_address']."</span>";
              echo "</div>" ;

              echo "<div id='contactica' style =
              'word-wrap: break-word;'
              'padding-left: 10px;'
              'float: left;'>" ;
                  echo "<span id='contact_no'>","<strong>","ContactNo:","</strong>".$row['Phone_number']."</span>" ;
              echo "</div>" ;


              echo "<div id='starttime' style ='word-wrap:break-word ;'

              'padding-left: 10px;'
              'float: left;'>" ;
                    echo "<span id='start'>","<strong>","Start:","</strong>".$row['Event_start_time']."</span>" ;
              echo "</div>" ;

             echo "<div id='endtime' style='word-wrap: break-word ;'

              'padding-left: 30px;'>" ;
                   echo "<span id='end'>","<strong>","End:","</strong>".$row['Event_End_time']."</span>" ;

               echo "</div>" ;
        echo "<hr>" ;




        echo "<div id='description' style =
              'height:auto;'

             'word-wrap: break-word;'>" ;
            echo "<span id='desc' style ='float:left;'>".$row['Event_description']."</span>" ;


       echo "</div>" ;


       echo "<img id='coverphoto' style =
              'width:100%;'
              'height:250px;' src='image/".$row['Cover_photo']."'>" ;

        echo "<div id='speakerdiv' style = 'word-wrap: break-word ;'
              'width: auto ;'>" ;
            echo "<span id='speaker'>","<strong>","Speaker:","</strong>".$row['speakers']."</span>" ;

        echo "</div>" ;

        echo "<div id='registrationdiv' style='word-wrap: break-word ;'
              'width: auto ;'>" ;
            echo "<span id='register'>".$row['Event_registration']."</span>";

       echo "</div>" ;

        echo "<div id='durationstart' style ='word-wrap: break-word;'
              'width: auto;' >" ;
            echo "<span id='start_registration'>","<strong>","Start Registration:","</strong>".$row['start_registration_date']."</span>" ;



        echo "</div>" ;


        echo "<div id='durationend' style = 'word-wrap: break-word ;'
              'width: auto ;' >" ;
            echo "<span id='end_registration'>","<strong>","End Registration:","</strong>".$row['end_registration_date']."</span>" ;



     echo "</div>" ;

echo "</div>";
     }
    ?>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./Offcanvas template for Bootstrap_files/jquery-3.2.1.slim.min.js.download" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./Offcanvas template for Bootstrap_files/popper.min.js.download"></script>
    <script src="./Offcanvas template for Bootstrap_files/bootstrap.min.js.download"></script>
    <script src="./Offcanvas template for Bootstrap_files/holder.min.js.download"></script>
    <script src="./Offcanvas template for Bootstrap_files/offcanvas.js.download"></script>


<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="2" style="font-weight:bold;font-size:2pt;font-family:Arial, Helvetica, Open Sans, sans-serif">32x32</text></svg></body></html>
