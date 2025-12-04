<?php
				require "libraries/loginchecker.php";
									
?>
<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=manage_users"><img src="images/back_icon.png" border="0"></a> | Edit Users</h1>
  </div> </div>
</div></div>

<div class="SpacingBox"></div>	
<?php

$uid = $_GET['uid'];
if(isset($uid)){
  $GetProductDetails = mysqli_query($login_db, "SELECT * FROM sm_users WHERE ur_id='$uid'") or die("Error with querry");		
   if ($row = mysqli_fetch_assoc($GetProductDetails))
				{

			
$ur_id          = $row['ur_id'];
$ur_name        = $row['ur_name'];
$ur_username    = $row['ur_username'];
$ur_password    = $row['ur_password'];
$ur_email       = $row['ur_email'];
$ur_mobile      = $row['ur_mobile'];
$ur_ph          = $row['ur_ph'];
$ur_address     = $row['ur_address'];
$ur_company     = $row['ur_company'];
$ur_cp_logourl  = $row['ur_cp_logourl'];
$ur_cp_tagline  = $row['ur_cp_tagline'];
$ur_cp_ph1      = $row['ur_cp_ph1'];
$ur_cp_ph2      = $row['ur_cp_ph2'];
$ur_cp_email1   = $row['ur_cp_email1'];
$ur_cp_email2   = $row['ur_cp_email2'];
$ur_cp_cell     = $row['ur_cp_cell'];
$ur_cp_address  = $row['ur_cp_address'];
$ur_cp_location = $row['ur_cp_location'];
			

?>


		<div class="wrapper">	
	
<div class="container form">
  <div class="row">
    <div class="col-sm-8">
    <form class="form-horizontal" action="index.php?view=manage_users" method="post">
   <div class="form-group">
    <label class="control-label col-sm-3" for="ur_id"></label>
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="ur_id" value="<?php echo $ur_id; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ur_name">Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_name" value="<?php echo $ur_name; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ur_username">User Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_username" value="<?php echo $ur_username; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_password">Password:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_password" value="<?php echo $ur_password; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_email">Email:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_email" value="<?php echo $ur_email; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_mobile">Mobile:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_mobile" value="<?php echo $ur_mobile; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_ph">Phone:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_ph" value="<?php echo $ur_ph; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_address">Address:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_address" value="<?php echo $ur_address; ?>">
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="ur_company">Company:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="ur_company" value="<?php echo $ur_company; ?>">
    </div>
  </div>
	
      <tr>
        <td><label for="ur_company">Company:</label></td>
        <td><input type="text" name="ur_company" id="ur_company" value="<?php echo $ur_company; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_logourl">Logo Url:</label></td>
        <td><input type="text" name="ur_cp_logourl" id="ur_cp_logourl" value="<?php echo $ur_cp_logourl; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_tagline">Company Tagline:</label></td>
        <td><input type="text" name="ur_cp_tagline" id="ur_cp_tagline" value="<?php echo $ur_cp_tagline; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_ph1">Phone:</label></td>
        <td><input type="text" name="ur_cp_ph1" id="ur_cp_ph1" value="<?php echo $ur_cp_ph1; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_ph2">Phone:</label></td>
        <td><input type="text" name="ur_cp_ph2" id="ur_cp_ph2" value="<?php echo $ur_cp_ph2; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_email1">Email:</label></td>
        <td><input type="text" name="ur_cp_email1" id="ur_cp_email1" value="<?php echo $ur_cp_email1; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_email2">Email:</label></td>
        <td><input type="text" name="ur_cp_email2" id="ur_cp_email2" value="<?php echo $ur_cp_email2; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_cell">Cell:</label></td>
        <td><input type="text" name="ur_cp_cell" id="ur_cp_cell" value="<?php echo $ur_cp_cell; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_address">Address:</label></td>
        <td><input type="text" name="ur_cp_address" id="ur_cp_address" value="<?php echo $ur_cp_address; ?>"></td>
      </tr>
      <tr>
        <td><label for="ur_cp_location">Location:</label></td>
        <td><textarea type="text" rows="5" name="ur_cp_location" id="ur_cp_location" value="<?php echo $ur_cp_location; ?>"></textarea></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="submit" name="submit" id="submit" value="submit"></td>
      </tr>
    </tbody>
  </table>
		</form><?php } } ?>
		
<BR><BR><BR>

			</div></div>
	
			