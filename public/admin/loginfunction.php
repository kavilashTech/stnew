<?php
include 'includes/header.php';
// include 'includes/menu.php';
// include 'includes/sidenav.php';


// Initialize variables
$message="";
$email="";
$password="";

// session_start();

// connect to database
// $db = mysqli_connect('localhost', 'root', '', 'stnewversion');
$db = $connection;
// variable declaration
// $username = "";
$email    = "";
$errors   = array(); 



// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error-msg">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

// call the login() function if register_btn is clicked
if (isset($_POST['submit'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = $_POST['password'];
	// $password = md5($password);

// echo "password : " . $password . "<BR>";
	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);
		// echo "Inside About to run query";

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		// echo "Query :" . $query;
// exit(0);
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// echo "Flag 1";
			// exit(0);
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);

			// echo $logged_in_user['user_role'];
			// exit(0); 
			if ($logged_in_user['user_role'] == 4) {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: dashboard.php');		  
			} elseif ($logged_in_user['user_role'] == 1){
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: ../owner/ownerdashboard.php');		  
			}
			else{
				array_push($errors, "You don't have Admin Rights.");
			}
		}else {
			array_push($errors, "Wrong username/password combination");
			// display_error();
			// header('location: login.php');
		}
	}
}


?>