<?php

if (isset($_POST["submit_request"])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32); // to authentcate user

    // $url = "https://lamp.ms.wits.ac.za/~s1830088/wits-career-portal/pages/create-new-password.php?selector=" . $selector . '&validator=' . bin2hex($token);
    $url = "http://localhost/wits-career-portal/pages/create-new-password.php?selector=" . $selector . '&validator=' . bin2hex($token);

    $expires = date("U") + 1800;

    $connection = mysqli_connect("localhost", "root", "Sm*22^03%#", "organization");
    // $connection = mysqli_connect("localhost", "s1830088", "s1830088", "d1830088");


    if (!$connection) {
        die("Connection error: " . mysqli_connect_error());
    }

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($connection);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    }
    else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    // mysqli_close();

    $to = $userEmail;

    $subject = "Reset your password for wits career portal";

    $message = '<p>We received a password reset request. Click or copy the link to go to the reset password page. If you did not request password 
    reset,kindly ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '" >' . $url . '</a> <p>';

    $headers = "From: CCDU <22sakhile@gmail.com>\r\n";
    // $headers .= "Reply-To: \r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../pages/reset-password.php?reset=success");
}
else {
    header("Location: ../index.php");
}

?>