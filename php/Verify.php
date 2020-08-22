<?php
         
    // $con = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088") or die(mysql_error($con)); // Connect to database server(localhost) with username and password.
    // mysqli_select_db($con,"d1830088") or die(mysqli_error($con)); // Select registration database.

    $con = mysqli_connect("localhost", "root", "Sm*22^03%#", "organization") or die(mysql_error($con)); // Connect to database server(localhost) with username and password.
    mysqli_select_db($con,"organization") or die(mysqli_error($con)); // Select registration database.
                
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['account_verify']) && !empty($_GET['account_verify'])){
        // Verify data
        $email = mysqli_escape_string($con,$_GET['email']); // Set email variable
        $account_verify = mysqli_escape_string($con, $_GET['account_verify']); // Set account_verify variable
                    
        $search = mysqli_query($con,"SELECT email_users, account_verify, active FROM users WHERE email_users='".$email."' AND account_verify='".$account_verify."' AND active='0'") or die(mysqli_error($con)); 
        $match  = mysqli_num_rows($search);
                    
        if($match > 0){
            // We have a match, activate the account
            mysqli_query($con,"UPDATE users SET active='1' WHERE email_users='".$email."' AND account_verify='".$account_verify."' AND active='0'") or die(mysqli_error($con));
            echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
            header("Location:../index.php?signup=success");
            exit();
        }else{
            // No match -> invalid url or account has already been activated.
            echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
            exit();
           // header("Location:../index.php?signup=success");
        }

                        
    }else{
        // Invalid approach
        echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
    }