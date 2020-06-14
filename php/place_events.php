<?php
  // Create connection
  $database = mysqli_connect("localhost:3308", "root", "", "display");
  $result = mysqli_query($database, "SELECT * FROM event order by Event_Id DESC") or die( mysqli_error($database)) ; 
?>