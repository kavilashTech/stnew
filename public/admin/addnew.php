<?php
	include('conn.php');
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$address=$_POST['address'];
	
	mysqli_query($conn,"insert into user (firstname, lastname, address) values ('$firstname', '$lastname', '$address')");
	header('location:index.php');

?>