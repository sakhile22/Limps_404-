<?php

    if (isset($_POST["reset_password_submit"])) {
        $selector = $_POST["selector"];
        $validator = $_POST["validator"];
        $password = $_POST["pwd"];
        $passwordRepeat = $_POST["pwd_repeat"];

        if (empty($selector) || empty($validator)) {
            header("Location: ../pages/create-new-password.php?newpwd=empty");
            exit();
        }
        elseif ($password != $passwordRepeat) {
            header("Location: ../pages/create-new-password.php?newpwd=pwdnotsame");
            exit();
        }

        $currentDate = date("U");

        $connection = mysqli_connect("localhost", "root", "Sm*22^03%#", "organization");
        // $connection = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088");


        $sql = "SELECT * FROM pwdReset WHERE pwsResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($connection);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);
            if (!$row = mysqli_fetch_assoc($result)) {
                echo "You need to re-submit you reset request";
                exit();
            }
            else {

                $tokenBin = hex2bin($validator);
                $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

                if ($tokenCheck === false) {
                    echo "You need to re-submit you reset request";
                    exit();
                }
                elseif ($tokenCheck === true) {

                    $tokenEmail = $row["pwdResetEmail"];

                    $sql = "SELECT * FROM users WHERE email_users=?;";  // need to be fixed in database
                    $stmt = mysqli_stmt_init($connection);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error";
                        exit();
                    }
                    else {
                        mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $result = mysqli_stmt_get_result($stmt);
                        if (!$row = mysqli_fetch_assoc($result)) {
                            echo "There was an error!";
                            exit();
                        }
                        else {

                            $sql = "UPDATE users SET pwd_users=? WHERE email_users=?";
                            $stmt = mysqli_stmt_init($connection);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error";
                                exit();
                            }
                            else {

                                $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                                mysqli_stmt_execute($stmt);

                                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                                $stmt = mysqli_stmt_init($connection);
                                if (!mysqli_stmt_prepare($stmt, $sql)) {
                                    echo "There was an error";
                                    exit();
                                }
                                else {

                                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                    mysqli_stmt_execute($stmt);
                                    header("Location: ../index.php");
                                    
                                }
                            }

                        }
                    }

                }

            }
        }
    }
    else {
        header("Location: ../index.html");
    }

?>