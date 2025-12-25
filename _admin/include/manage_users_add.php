<?php
				require "libraries/loginchecker.php";
										
?><!-- 
ADMIN DESIGNED AND DEVELOPED BY SWISMAX SOLUTIONS
info@swismax.com | webexpert786@hotmail.co.uk
www.swismax.com
03125190928, 03215001033
-->


<?php


		
				$ur_name 			= $_POST['ur_name'];
	  			$ur_username 		= $_POST['ur_username'];
	  			$ur_password 		= $_POST['ur_password'];
	  			$ur_email 			= $_POST['ur_email'];
	  			$ur_mobile		 	= $_POST['ur_mobile'];
	  			$ur_ph	 			= $_POST['ur_ph'];
	  			$ur_address 		= $_POST['ur_address'];
	  			$ur_company 		= $_POST['ur_company'];
	  			$ur_cp_logourl 		= $_POST['ur_cp_logourl'];
				$ur_cp_tagline		= $_POST['ur_cp_tagline'];
				$ur_cp_ph1		    = $_POST['ur_cp_ph1'];
				$ur_cp_ph2 			= $_POST['ur_cp_ph2'];
	  			$ur_cp_email1 		= $_POST['ur_cp_email1'];
				$ur_cp_email2 		= $_POST['ur_cp_email2'];
	  			$ur_cp_cell 		= $_POST['ur_cp_cell'];
	  			$ur_cp_address 		= $_POST['ur_cp_address'];
	  			$ur_cp_location		= $_POST['ur_cp_location'];
	  			$ur_permission	 	= $_POST['ur_permission'];
	  			$ur_lastlogin 		= $_POST['ur_lastlogin'];
				$ur_regdate			= $_POST['ur_regdate'];
				$ur_allow_drt 		= $_POST['ur_allow_drt'];
				$ur_allow_fw		= $_POST['ur_allow_fw'];



	
if (isset($_POST['save_new'])){
			
	$insert = mysqli_query($login_db, "INSERT INTO sm_users VALUES ('','$ur_name','$ur_username','$ur_password','$ur_email','$ur_mobile','$ur_ph','$ur_address','$ur_company','$ur_cp_logourl','$ur_cp_tagline','$ur_cp_ph1','$ur_cp_ph2','$ur_cp_email1','$ur_cp_email2','$ur_cp_cell','$ur_cp_address','$ur_cp_location','$ur_permission','$ur_lastlogin','$ur_regdate','$ur_allow_drt','$ur_allow_fw')");
		
	echo "<div class='WebPageBoxSuccess'>Directory has been saved.</div>";
}

?>

<div class="account_auctionlist_content">
	<div class="back_icon"><table width="100%" border="0">
  <tr class="back_icon_text">
    <td width="46"><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a></td>
    <td width="20">|</td>
    <td width="98%">New Users</td>
  </tr>
</table></div><form id="form1" name="form1" method="post">
  <table width="100%" border="0">
    <tbody>
      <tr>
        <td width="16%"><label for="ur_name">Full Name:</label></td>
        <td width="84%"><input type="text" name="ur_name" id="ur_name"></td>
      </tr>
      <tr>
        <td><label for="ur_username">Username:</label></td>
        <td><input type="text" name="ur_username" id="ur_username"></td>
      </tr>
      <tr>
        <td><label for="ur_password">Password:</label></td>
        <td><input type="password" name="ur_password" id="ur_password"></td>
      </tr>
      <tr>
        <td><label for="ur_email">Email:</label></td>
        <td><input type="text" name="ur_email" id="ur_email"></td>
      </tr>
      <tr>
        <td><label for="ur_mobile">Mobile No.:</label></td>
        <td><input type="text" name="ur_mobile" id="ur_mobile"></td>
      </tr>
      <tr>
        <td><label for="ur_ph">Ph:</label></td>
        <td><input type="text" name="ur_ph" id="ur_ph"></td>
      </tr>
      <tr>
        <td><label for="ur_address">Address:</label></td>
        <td><input type="text" name="ur_address" id="ur_address"></td>
      </tr>
      <tr>
        <td><label for="ur_permission">Permission:</label></td>
        <td><select name="ur_permission" id="ur_permission">
		<option value="1">Active Account</option>
        <option value="0">Not Active rightnow</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="ur_allow_drt">Data Reocvery Training:</label></td>
        <td><select name="ur_allow_drt" id="ur_allow_drt">
		<option value="1">Allow This Area</option>
        <option value="0">Not Allow This Area</option>
        </select></td>
      </tr>
      <tr>
        <td><label for="ur_allow_fw">Firmware:</label></td>
        <td><select name="ur_allow_fw" id="ur_allow_fw">
		<option value="1">Allow This Area</option>
        <option value="0">Not Allow This Area</option>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="save_new" id="save_new" value="Submit"></td>
      </tr>
    </tbody>
  </table>
</form>


			</div></div>
	
			