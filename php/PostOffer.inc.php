<?php

  if (isset($_POST['form_submit'])) {

    $connection = mysqli_connect('localhost', 'root', 'Sm*22^03%#', 'organization');
    // $connection = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088");

    $offer_title = $_POST['offer_title'];

    $company_name = $_POST['company_name'];

    $company_logo = $_FILES['organisationlogo'];
    $logoName = $_FILES['organisationlogo']['name'];
    $logo_tmp_name = $_FILES['organisationlogo']['tmp_name'];
    $logoSize = $_FILES['organisationlogo']['size'];
    $logoError = $_FILES['organisationlogo']['error'];
    $logoType = $_FILES['organisationlogo']['type'];

    $logoExt = explode('.',$logoName);
    $logoActualExt = strtolower(end($logoExt));

    $extAllowed = array('jpg','jpeg','png','pdf');

    $location = $_POST['location'];

    $offer_type = '';
    if (!empty($_POST['other_offer_type'])) {
      $offer_type = $_POST['other_offer_type'];
    }
    else {
      if (!empty($_POST['offer_type1'])) {
        $offer_type = $_POST['offer_type1'];
      }
      else if (!empty($_POST['offer_type2'])) {
        $offer_type = $_POST['offer_type2'];
      }
      else if (!empty($_POST['offer_type3'])) {
        $offer_type = $_POST['offer_type3'];
      }
      else if (!empty($_POST['offer_type4'])) {
        $offer_type = $_POST['offer_type4'];
      }
      else if (!empty($_POST['offer_type5'])) {
        $offer_type = $_POST['offer_type5'];
      }
    }

    $salary_minimum = $_POST['salary_minimum'];
    $salary_maximum = $_POST['salary_maximum'];

    $salary_period = '';
    $salary_item = $_POST['payment_period'];
    if ($salary_item == 'per year') {
      $salary_period = 'per year';
    }
    else if ($salary_item == 'per month') {
      $salary_period = 'per month';
    }
    else if ($salary_item == 'per week') {
      $salary_period = 'per week';
    }
    else if ($salary_item == 'per day') {
      $salary_period = 'per day';
    }
    else if ($salary_item == 'per hour') {
      $salary_period = 'per hour';
    }

    $checkboxSelected = $_POST['benefits'];
    $offer_benefits = '';
    if (!empty($_POST['other_benefits'])) {
      foreach ($checkboxSelected as $selected) {
        $offer_benefits .= $selected.",";
      }
      $offer_benefits = $_POST['other_benefits'];
    }
    else {
      foreach ($checkboxSelected as $selected) {
        $offer_benefits .= $selected.",";
      }
    }

    $vacancy_details = mysqli_real_escape_string($connection, $_POST['vacancy_details']);
    $required_skills = mysqli_real_escape_string($connection, $_POST['required_skills']);
    $candidate_requirements = mysqli_real_escape_string($connection, $_POST['candidate_requirements']);

    $email ='';
    $application_link = '' ;
    $application_form = '' ;
    if (!empty($_POST['email']) && !empty($_POST['hyperlink'])) {
      $email = $_POST['email'];
      $application_form = $_FILES['application_form']['name'];
      $application_link = $_POST['hyperlink'];
    }
    else if (!empty($_POST['hyperlink'])) {
      $application_link = $_POST['hyperlink'];
    }
    else if (!empty($_POST['email'])) {
      $email = $_POST['email'];
      $application_form = $_FILES['application_form']['name'] ;
    }
    print_r($email);

    $offer_closing_date = $_POST['due_date'];
    $offer_closing_time = $_POST['due_time'];

    if (empty($offer_title) || empty($company_name) || empty($logoName) || empty($location) || empty($offer_type) || empty($offer_closing_date) || empty($vacancy_details) || empty($required_skills) || empty($candidate_requirements && ((empty($email) && empty($application_form)) || empty($application_link)))) {
      header('Location: ../pages/post-offer.php?error=emptyfields');
      exit();
    }
    else {

      $sql = "SELECT * FROM users WHERE company_name=?";
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../pages/post-offer.php?error=databaseerror');
        exit();
      }
      else {

        mysqli_stmt_bind_param($stmt, 's', $company_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!mysqli_fetch_assoc($result)) {
          header('Location: ../pages/post-offer.php?error=userdoesnotexist');
          exit();
        }
        else {

          if (in_array($logoActualExt, $extAllowed)) {
            if ($logoError === 0) {
              if ($logoSize < 1000000000) {
                $logoNameNew = uniqid('', true).".".$logoActualExt;
                $logoDestination = 'Logos/'.$logoNameNew;
                move_uploaded_file($logo_tmp_name, $logoDestination);
              }
              else {
                header('Location: ../pages/post-offer.php?error=imgisbig');
                exit();
              }
            }
            else {
              header('Location: ../pages/post-offer.php?error=imgerror');
              exit();
            }
          }
          else {
            header('Location: ../pages/post-offer.php?error=imgnotsupported');
            exit();
          }

          $sql = "INSERT INTO joboffers (offer_title,company_name,company_logo,company_location,offer_type,salary_minimum,salary_maximum,salary_period,offer_benefits,vacancy_details,required_skills,candidate_requirements,email,application_form,application_link,offer_closing_date,offer_closing_time,offer_posted_date) 
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now());";
          
          $stmt = mysqli_stmt_init($connection);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../pages/post-offer.php?error=databaseerror');
            exit();
          }
          else {

            mysqli_stmt_bind_param($stmt,'sssssssssssssssss', $offer_title,$company_name,$logoName,$location,$offer_type,$salary_minimum,$salary_maximum,$salary_period,$offer_benefits,$vacancy_details,$required_skills,$candidate_requirements,$email,$application_form,$application_link,$offer_closing_date,$offer_closing_time);

            mysqli_stmt_execute($stmt);
            header('Location: ../pages/post-offer.php?offer=success');
            
          }
          // mysqli_stmt_close($stmt);
        }
      }
      
    }

    mysqli_close($connection);
    exit();
  }
  else {
    header("Location: ../pages/post-offer.php");
    exit();
  }