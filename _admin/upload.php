<?php

	require "../libraries/config.php";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["userImage"]["type"])){
	$msg = '';
	$uploaded = FALSE;
	$extensions = array("jpeg", "jpg", "png"); // file extensions to be checked
	$fileTypes = array("image/png","image/jpg","image/jpeg"); // file types to be checked
	$file = $_FILES["userImage"]['tmp_name'];
	$file_extension = strtolower(end(explode(".", $file["name"])));
	//file size condition can be included here   -- && ($file["size"] < 100000)
	if (in_array($file["type"],$fileTypes) && in_array($file_extension, $extensions)) {
		if ($file["error"] > 0)
		{
			$msg = 'Error Code: ' . $file["error"];
		}
		else
		{
			if (file_exists("../img/images_upload/" . $file["name"])) {
				$msg = $file["name"].' already exist.';				
			}
			else
			{
				$ImageName = $file['name'];
				$sourcePath = $file['tmp_name']; //  source path of the file
				//give the random name genator
				$randomNumber = rand(0000, 99999); 
				//give the random name image
				$newName = $randomNumber . $ImageName;
	
				$insert = mysqli_query($login_db, "INSERT INTO sm_images_upload VALUES ('','$newName')");
				
				$actual_link = 'http://'.$_SERVER['HTTP_HOST']."/img/images_upload/$newName";
				
				$targetPath = "../img/images_upload/$newName"; // Target path where file is to be stored
				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				$msg = "Image Uploaded Successfully...!!<BR>URL: $actual_link";
				$uploaded = TRUE;
			}
		}
	}
	else
	{
		$msg = '***Invalid file Size or Type***';
	}
	echo ($uploaded ? $msg : '<span class="msg-error">'.$msg.'</span>');
}

die();
?>
<!-- ----------- -->