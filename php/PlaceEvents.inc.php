<?php

  if (isset($_POST['form_submit'])) {

    $connection = mysqli_connect('localhost','root','Sm*22^03%#','organization');
    // $connection = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088");

    $company_name = $_POST['company_name'];
    $name_contact_person = $_POST['name_contact_person'];
    $email_address = $_POST['email_address_person'];
    $phone_number = $_POST['phone_number_person'];

    // cover photo
    $photo_name = $_FILES['cover_photo']['name'];
    $photo_tmp_name = $_FILES['cover_photo']['tmp_name'];
    $photoSize = $_FILES['cover_photo']['size'];
    $photoError = $_FILES['cover_photo']['error'];
    $photoExt = explode('.',$photo_name);
    $photoActualExt = strtolower(end($photoExt));
    $photoExtAllowed = array('jpg','jpeg','png','pdf');

    $title_event = $_POST['title_event'];

    $event_type = '';

    foreach ($_POST['event_type'] as $selected) {
      $event_type .= $selected.",";
    }

    $event_location = '';
    if (!empty($_POST['campus'])) {
      $event_location = $_POST['campus'];
    }
    else if (!empty($_POST['address'])) {
      $event_location = $_POST['event_address'];
    }
    else if (!empty($_POST['address'])) {
      $event_location = $_POST['location_url'];
    }
    foreach ($_POST['location'] as $selected) {
      $event_location .= $selected;
    }

    $event_start_date = $_POST['start_date'];
    $event_start_time = $_POST['start_time'];

    $event_end_date = $_POST['end_date'];
    $event_end_time = $_POST['end_time'];

    $event_description = mysqli_real_escape_string($connection, $_POST['event_description']);
    
    $speakers = '';

    if (!empty($_POST['name_speaker1'])) {
        $speakers .= $_POST['name_speaker1'];
    }
    if (!empty($_POST['name_speaker2'])){
        $speakers .= ",".$_POST['name_speaker2'];
    }
    if (!empty($_POST['name_speaker3'])){
        $speakers .= ",".$_POST['name_speaker3'];
    }

    $how_to_register = '';
    foreach ($_POST['how_to_register'] as $selected) {
      $how_to_register .= $selected;
    }
    if ($how_to_register === '') {
      $how_to_register = 'Event has no registration';
    }

    $start_registration_date = $_POST['start_reg_date'];
    $start_registration_time = $_POST['start_reg_time'];

    $end_of_registration_date = $_POST['end_reg_date'];
    $end_of_registration_time = $_POST['end_reg_time'];

    if (empty($company_name) || empty($name_contact_person) || empty($email_address) || empty($title_event) ||
    empty($event_type) || empty($event_location) || empty($event_start_date) || empty($event_start_time) || empty($event_end_date) ||
    empty($event_end_time) || empty($event_description) || empty($how_to_register)) {
      header("Location: ../pages/place-events.php?error=emptyfields");
      exit();
    }
    else {

      $sql = "SELECT * FROM users WHERE company_name=?";
      $stmt = mysqli_stmt_init($connection);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('Location: ../pages/place-events.php?error=databaseerror');
        exit();
      }
      else {

        mysqli_stmt_bind_param($stmt, 's', $company_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!mysqli_fetch_assoc($result)) {
          header('Location: ../pages/place-events.php?error=userdoesnotexist');
          exit();
        }
        else {
          // cover photo
          if (in_array($photoActualExt, $photoExtAllowed)) {
            if ($photoError === 0) {
              if ($photoSize < 1000000000) {
                $photoNameNew = uniqid('', true).".".$photoActualExt;
                $photoDestination = 'Logos/'.$photoNameNew;
                move_uploaded_file($photo_tmp_name, $photoDestination);
              }
              else {
                header('Location: ../pages/place-events.php?error=imgisbig');
                exit();
              }
            }
            else {
              header('Location: ../pages/place-events.php?error=imgerror');
              exit();
            }
          }
          else {
            header('Location: ../pages/place-events.php?error=imgnotsupported');
            exit();
          }

          $sql = "INSERT INTO placeevents (company_name,name_contact_person,email_address,contact_number,cover_photo,event_title,event_type,event_location,event_start_date,event_start_time,event_end_date,event_end_time,speakers,how_to_register,start_registration_date,start_registration_time,end_of_registration_date,end_of_registration_time,event_description)
          VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

          $stmt = mysqli_stmt_init($connection);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header('Location: ../pages/place-events.php?error=databaseerror');
            exit();
          }
          else {

            mysqli_stmt_bind_param($stmt, 'sssssssssssssssssss', $company_name,$name_contact_person,$email_address,$phone_number,$photo_name,$title_event,$event_type,$event_location,$event_start_date,$event_start_time,$event_end_date,$event_end_time,$speakers,$how_to_register,$start_registration_date,$start_registration_time,$end_of_registration_date,$end_of_registration_time,$event_description);
            mysqli_stmt_execute($stmt);
            header("Location: ../pages/place-events.php?event=success");

          }
        }

      }
      // mysqli_stmt_close($stmt);
    }
    mysqli_close($connection);
    exit();
  }
  else {
    header("Location: ../pages/place-events.php");
  }
