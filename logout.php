<?php
session_start();
  session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['id']);


  ?>
  <script type="text/javascript">
    window.location = "login.php";
  </script>
  <?php


?>
