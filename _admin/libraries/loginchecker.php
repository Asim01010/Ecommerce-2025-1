<?php

if (!loggedin()) {
	include "include/login.php";
	exit();
}
$username = $_SESSION['username'];

$get_user_id = mysqli_query($dbcon, "SELECT * FROM imt_user WHERE username='$username'") or die("Error with querry");
if ($row = mysqli_fetch_assoc($get_user_id)) {
	$admin = $row['admin_'];

	if ($admin == 0) {
		include "include/login.php";
		exit();
	}
}
