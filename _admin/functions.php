<?php

//session start
session_start();

 include "../libs/dbconfig.php";
	
	//login check function
	function loggedin()
	{
	if (isset($_SESSION['username'])||isset($_COOKIE['username']))
	{
		$loggedin = TRUE;
		return $loggedin;
	}
	
	}
?>