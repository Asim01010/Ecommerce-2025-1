<?php
				require "libraries/loginchecker.php";
									
?>

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> |  Change Password</h1>
  </div>
</div></div>



  
		<?php

//--------------------------------------------------------------------- Change Password --------------------------------------------------------//

if (isset($_POST['change_tms_password']))
{
// check fields

   $current_password 			= md5($_POST['current_password']);
   $new_password 				= md5($_POST['new_password']);
   $again_new_password 			= md5($_POST['again_new_password']);

   // check password against db
   
 
   
   $queryget = mysqli_query($login_db, "SELECT password FROM imt_user WHERE id='1'") or die("Query didnt work");
   $row = mysqli_fetch_assoc($queryget);

   $oldpassworddb = $row['password'];
   
   //check passwords
   if ($current_password==$oldpassworddb)
   {
      // check two new password
      if ($new_password==$again_new_password)
      {
         //success
         //change password in db
         
         $querychange = mysqli_query($login_db, "
         UPDATE imt_user SET password='$new_password' WHERE id='1'
         ");
         session_destroy();
         echo "<div class='WebPageBoxSuccess'><p>SUCCESS - Your password successfully change.</p></div>	 
		 <script language='javascript'>
		  window.location = 'logout.php';
		</script>";


      }
      else{
		  echo "<div class='Danger'><p>NOT MATCH - New passwords don't match please try again.</p></div>";
	  }

   }
   else{
	   echo "<div class='Danger'><p>OLD PASSWORD - Old password dosent match! please try again.</p></div>";
	  }

}
//--------------------------------------------------------------------- Change Password --------------------------------------------------------//

		
?>

	
<div class="SpacingBox"></div>	

<div class="wrapper">
<div class="container form">
  <div class="row">
    <div class="col-sm-6">
    <form class="form-horizontal" method="post">
  <div class="form-group">
    <label class="control-label col-sm-4" for="current_password">Current Password:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Type your current password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="new_password">New Password:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Retype new password">
    </div>
  </div>
    </div>
    <div class="col-sm-6">
	 <div class="form-group">
    <label class="control-label col-sm-4" for="again_new_password">Again New Password:</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" name="again_new_password" id="again_new_password" placeholder="Retype new password">
    </div>
  </div>
    </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="change_tms_password" id="btn" value="change password" style="float: right;">
    </div>
  </div>
</form>
  </div>
</div></div>	

			
<div class="SpacingBox"></div>				
<div class="SpacingBox"></div>			
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>			

			