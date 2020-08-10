<?php

    if (isset($_POST['login_submit'])) {

        $connection = mysqli_connect("localhost", "root", "Sm*22^03%#", "organization");
        // $connection = mysqli_connect("127.0.0.1", "s1830088", "s1830088", "d1830088");

        $userId = $_POST['username'];
        $password = $_POST['pwd'];

        if (empty($userId) || empty($password)) {
            header("Location: ../index.php?error=emptyfields");
            exit();
        }
        else {

            $sql = "SELECT * FROM users WHERE company_name=? OR email_users=?";
            
            $stmt = mysqli_stmt_init($connection);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?error=databaseerror");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "ss", $userId, $userId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($row = mysqli_fetch_assoc($result)) {

                    $pwdCheck = password_verify($password, $row['pwd_users']);
                    if ($pwdCheck === false) {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();
                    }
                    else if ($row['active'] === 0) {
                        header("Location: ../index.php?error=account_not_verified");
                        exit();
                    }
                    else if ($pwdCheck === true) {

                        session_start();
                        $_SESSION['user_id'] = $row['id_users'];
                        $_SESSION['username'] = $row['company_name'];
                        
                        header("Location: ../pages/home.php?login=success&username=$userId");
                        exit();

                    }
                    else {
                        header("Location: ../index.php?error=wrongpwd");
                        exit();    
                    }

                }
                else {
                    header("Location: ../index.php?error=nouser");
                    exit();
                }
            }

        }
    }
    else {
        header("Location: ../index.php");
        exit();
    }