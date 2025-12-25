<?php

include 'functions.php';

error_reporting(0);

$Message = '';
$error = '';

date_default_timezone_set("Asia/Karachi");


$date = date("d-m-20y");
$time = date("h:i:s A");


$admin = -1;

if (isset($_POST['login'])) {
	//get data
	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($username && $password) {
		$login = $dbcon->query("SELECT * FROM imt_user WHERE username='$username'");
		if ($lrow = $login->fetch_array()) {
			$db_password   = $lrow['password'];
			$admin         = $lrow['admin_'];
			if ($admin == 1) {
				if (md5($password) == $db_password) {

					if (md5($password) == $db_password)
						$loginok = TRUE;
					else
						$loginok = FALSE;

					$_SESSION['username'] = $username;

					header("Location: index.php?view=home");
					exit();
				} else {
					$error = "<div class='alert alert-danger'>Your password doesn't match.</div>";
				}
			} else {
				$error = "<div class='alert alert-danger'>You are not admin. Dont be use your username in this area.</div>";
			}
		} else {
			$error = "<div class='alert alert-danger'>Incorrect your username.</div>";
		}
	} else {
		$error = "<div class='alert alert-danger'>Please enter Username & Password.</div>";
	}
}


$GetCurrency = "SELECT * FROM sm_currency Where cur_default= '1'";
$GetCurrency_Query = mysqli_query($dbcon, $GetCurrency) or die("Error Campaign");
if ($ccd = mysqli_fetch_array($GetCurrency_Query)) {
	$_SESSION['cur_title']   = $ccd['cur_title'];
	$_SESSION['cur_code']   = $ccd['cur_code'];
}



?>
<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" -->
<HTML>

<HEAD>
	<title>Adminstrator - Doche</title>
	<link rel="shortcut icon" href="images/logo.png">


	<!-- CSS Files -->
	<link href="css/theme_css.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/ajax-upload.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<body>



	<?php
	// $admin = $row['admin_'];

	if ($admin == 0) {
		if (loggedin()) {
			echo "	<div class='TopHaed'>
	<div class='container-fluid'>
  <div class='row'>
    <div class='col-xs-12 col-sm-12 col-md-10'><h2><img src='images/icon_01.png' width='3%'> SwisMax</h2></div>
	
    <div class='col-xs-12 col-sm-12 col-md-2'>
	
<div class='dropdown'>
   <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
    <span class='glyphicon glyphicon-cog'></span> Options <span class='caret'></span>
  </button>
  <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
    <li><a class='dropdown-item' href='index.php?view=contact_page'>Contact Page</a></li>
    <li><a class='dropdown-item' href='index.php?view=change_password'>Change Password</a></li>
    <li><a class='dropdown-item' href='index.php?view=logout'>Logout</a></li>
  </div>
</div>

	</div>
  </div>
</div></div>";
	?>
			<div class='HeaderNav'>

				<div class='container-fluid'>
					<div class='row'>
						<div class='col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9'><?php include 'libraries/web_dropdown_menu.php'; ?></div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3'>
							<div class='TimeDate'>
								Date & Time&nbsp;&nbsp; <?php
														echo $today = date('j F ,Y - g:i:s A'); ?>
							</div>
						</div>
					</div>

				</div>
			</div>
	<?php
		}
	} else {
		// echo "You are not admin";
	}
	?>


	<?php


	if ($admin == 0) {
		if (loggedin()) { ?>



	<?php }
	} else {
		// echo "You are not admin";
	}
	?>

	<!------------------------------------------------------------------------------->

	<?php if (isset($_SESSION['username'])) { 
		$Username = $_SESSION['username']; 
		?>

		

		<div class='TopHaed' style="padding: 10px;">
			<div class='container-fluid'>
				<div class='row'>

					<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'><?php include 'libraries/web_dropdown_menu_logout.php'; ?></div>

				</div>
			</div>
		</div>


	<?php  } else {
	} ?>

	<!------------------------------------------------------------------------------->