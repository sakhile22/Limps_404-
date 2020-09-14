<?php

    if (isset($_POST["signup_submit"])) {

        // $connection = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088");
        $connection = mysqli_connect('localhost', 'root', 'Sm*22^03%#', 'organization');

        $company_name = $_POST['company_name'];
        $telephone = $_POST['telephone'];
        $company_email = $_POST['username_company'];
        $password = $_POST['company_password'];
        $passwordRepeat = $_POST['confirm_password'];
        $reg_num = $_POST['registration_no'];
        $vat_num = $_POST['vat_no'];
        $address = $_POST['address1'].",".$_POST['address2'].",".$_POST['address3'];
        $province = $_POST['province'];
        $country = $_POST['country_name'];
        $country_code = $_POST['country_code'];

        $logoName = $_FILES['logo']['name'];
        $logo_tmp_name = $_FILES['logo']['tmp_name'];
        $logoSize = $_FILES['logo']['size'];
        $logoError = $_FILES['logo']['error'];

        $logoExt = explode('.',$logoName);
        $logoActualExt = strtolower(end($logoExt));

        $extAllowed = array('jpg','jpeg','png','pdf');

        if (empty($company_name) || empty($company_email) || empty($password) || empty($passwordRepeat) || empty($reg_num)
        || empty($vat_num) || empty($address) || empty($country) || empty($country_code) || empty($logoName)) {
            header("Location: ../pages/sign-up.php?error=emptyfields");
            exit();
        }
        else if (!filter_var($company_email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $company_name)) {
            header("Location: ../pages/sign-up.php?error=invalidemail&username");
            exit();
        }
        else if (!filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../pages/sign-up.php?error=invalidemail");
            exit();
        }
        // else if (!preg_match("/^[-a-zA-Z0-9]*$/", $company_name)) {
        //     header("Location: ../pages/sign-up.php?error=username");
        //     exit();
        // }
        else if (strlen($password) < 8) {
            header("Location: ../pages/sign-up.php?error=passwordisshort");
            exit();
        }
        else if ($password !== $passwordRepeat) {

            header("Location: ../pages/sign-up.php?error=passwordmismatch&uid=".$company_name."&email=".$company_email."&regnum=".
            $reg_num."&vatnum=".$vat_num."&address=".$address."&country=".$country."countrycode=".$country_code);
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
                    header('Location: ../pages/post-offer.php?error=logoisbig');
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

            $sql = "SELECT company_name FROM users WHERE company_name=?";
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../pages/sign-up.php?error=databaseerror");
                exit();
            }
            else {

                mysqli_stmt_bind_param($stmt, "s", $company_name);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if ($resultCheck > 0) {
                    header("Location: ../pages/sign-up.php?error=usertaken");
                    exit();
                }
                else {

                    $sql = "INSERT INTO users (company_name, email_users, pwd_users, company_reg_num, company_vat_num, company_address,
                    country, country_code, active, account_verify, telephone, province, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $hash = md5( rand(0,1000) );
                    $active = 0;

                    $to      = $company_email;
                    $subject = 'Signup | Verification';
                    $message = '
                     
                    Thanks for signing up!
                    Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                     

                     
                    Please click this link to activate your account:
                    http://localhost/wits-career-portal/php/Verify.php?email='.$company_email.'&account_verify='.$hash.'
                    ';
                    //http://lamp.ms.wits.ac.za/~s1830088/wits-career-portal/php/Verify.php?email='.$company_email.'&account_verify='.$hash.'
                    
                    //http://localhost/wits-career-portal/php/Verify.php?email='.$company_email.'&account_verify='.$hash.'
                    $headers = 'From:noreply@yourwebsite.com' . "\r\n";
                    mail($to, $subject, $message, $headers);
                    
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../pages/sign-up.php?error=databaseerror");
                        exit();
                    }
                    else {
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sssssssiissss", $company_name,$company_email,$hashedPwd,$reg_num,$vat_num,$address,$country,$country_code,$active,$hash,$telephone,$province,$logoName);

                        mysqli_stmt_execute($stmt);
                        header("Location: ../pages/sign-up.php?signup=success");
                        exit();
                    
                    }

                }

            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($connection);


    }
    else {
        header("Location: ../pages/sign-up.php");
        exit();
    }

