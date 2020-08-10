
<main>
    <link rel="stylesheet" href="../css/ResetPasswordStyle.css">
    <div class="main-wrapper">
        <section class="default-section">
            <h1>Reset your password</h1>
            <p>An email will be sent to you with instructions on how to reset your password.</p></br>
            <form action="../php/ResetPasswordRequest.php" method="post">
                <input type="text" name="email" placeholder="Enter you email address...">
                <button type="submit" name="submit_request">Receive password reset link by email</button>
            </form>
            <?php
                if (isset($_POST["reset"])) {
                    if ($_POST["reset"] == "success") {
                        echo '<p class="reset-success">Check your email!</p>';
                    }
                }
            ?>
        </section>
    </div>
</main>