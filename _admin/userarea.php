<?php

include 'functions.php';

if (!loggedin())
{
header("location: index.php");
exit();
}
 $username = $_SESSION['username'];
				  
				 $get_user_id = mysqli_query("SELECT * FROM users WHERE username='$username'") or die("Error with querry");
				if ($row = mysqli_fetch_assoc($get_user_id))
				{
				$admin = $row['admin_'];
											
				if ($admin==0)
				{
				header("location: index.php");
				exit();
				}
				}										
?>