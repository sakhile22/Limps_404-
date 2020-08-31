<?php
	 if(isset($_POST['submit'])){

		 $org_name = $_POST['name'];
		 $email = $_POST['email'];
		 $phone = $_POST['phone_number'];
		 $title = $_POST['title'];
		 $time = $_POST['time'];
		 $speaker = $_POST['speaker'];
		 $event_type = $_POST['type'];
		 $date = $_POST['date'];
		 $location = $_POST['location'];
		 $event_manager = $_POST['event_manager'];
		 $description = $_POST['description'];
		 $image = $_POST['image'];
		 $logo = $_POST['org_logo'];

		 if(mysqli_query($link,"insert into events values('$description','$org_name','$event_manager','$email','$phone',
		 '$image','$title','$event_type','$location','$time','$speaker','$date','$logo')")){

     echo "<script type='text/javascript'>alert('Event Added Sucessfully!');</script>";
	 }else {
	 	 echo "<script type='text/javascript'>alert('Something went wrong!');</script>";
	 }
 }
?>
