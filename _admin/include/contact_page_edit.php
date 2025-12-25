<?php
				require "libraries/loginchecker.php";
										
?><!-- 
ADMIN DESIGNED AND DEVELOPED BY SWISMAX SOLUTIONS
info@swismax.com | webexpert786@hotmail.co.uk
www.swismax.com
03125190928, 03215001033
-->

<div class="Heightfix">
<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Contact Page</h1>
  </div>
</div></div>


	<?php 
		
	$EditContact = $_GET['contactid'];

	
	
	if (isset($_POST['contact_page'])){
		
			$ctn_id 			= $_POST['ctn_id'];
			$ctn_officename		= $_POST['ctn_officename'];
			$ctn_address		= $_POST['ctn_address'];
			$ctn_mail			= $_POST['ctn_mail'];
			$ctn_ph				= $_POST['ctn_ph'];
			$ctn_cell			= $_POST['ctn_cell'];
			$ctn_officetime	    = $_POST['ctn_officetime'];
			$ctn_map			= $_POST['ctn_map'];
			$ctn_enable			= $_POST['ctn_enable'];
			
			if ($ctn_id){
			$change = mysqli_query($login_db, "UPDATE sm_contact SET 
			ctn_officename='$ctn_officename',
			ctn_address='$ctn_address',
			ctn_mail='$ctn_mail',
			ctn_ph='$ctn_ph',
			ctn_cell='$ctn_cell',
			ctn_officetime='$ctn_officetime',
			ctn_map='$ctn_map',
			ctn_enable='$ctn_enable'
			WHERE ctn_id='$ctn_id'") or die ("Error with query 00232");
			echo "<div class='alert alert-success'><p>UPDATE - contact has been updated.</p></div>";
			}
	}

		
		
		$GETContactDetails = mysqli_query($login_db, "SELECT * FROM sm_contact WHERE ctn_id='$EditContact'") or die ("Error with query 00232");
		if ($row = mysqli_fetch_assoc($GETContactDetails))
		{
		$ctn_id					 			= $row['ctn_id'];
		$ctn_officename					 	= $row['ctn_officename'];
		$ctn_address		 				= $row['ctn_address'];
		$ctn_mail				 			= $row['ctn_mail'];
		$ctn_ph					 			= $row['ctn_ph'];
		$ctn_cell				 			= $row['ctn_cell'];
		$ctn_officetime				 		= $row['ctn_officetime'];
		$ctn_map				 			= $row['ctn_map'];
		$ctn_enable				 			= $row['ctn_enable'];
		?>

<div class="wrapper">
<div class="container form">
  <div class="row">
    <div class="col-sm-8">
    <form class="form-horizontal" method="post">
  <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_id"></label>
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="ctn_id" value="<?php echo $ctn_id; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_officename">Office Name:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="ctn_officename" value="<?php echo $ctn_officename; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_address">Address:</label>
    <div class="col-sm-9"> 
      <input type="text" class="form-control" name="ctn_address" value="<?php echo $ctn_address; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_mail">Email/s:</label>
    <div class="col-sm-9">
      <input class="form-control" name="ctn_mail" value="<?php echo $ctn_mail; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_ph">Ph/s:</label>
    <div class="col-sm-9">
      <input class="form-control" name="ctn_ph" value="<?php echo $ctn_ph; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_cell">Cell/s:</label>
    <div class="col-sm-9">
      <input class="form-control" name="ctn_cell" value="<?php echo $ctn_cell; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_officetime">Office Timings:</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="ctn_officetime"><?php echo $ctn_officetime; ?></textarea>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="ctn_map">Google Map Code:</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="ctn_map" rows="5"><?php echo $ctn_map; ?></textarea>
    </div>
  </div>
  <div class="form-group"> 
   <label class="control-label col-sm-3" for="ctn_enable"></label>
    <div class="col-sm-9">
	<label>
	<input type="radio" name="ctn_enable" value="1" id="ctn_enable_0" <?php if ($ctn_enable==1){ echo "Checked"; }?> >Enable</label>
	<label>
	<input type="radio" name="ctn_enable" value="2" id="ctn_enable_1" <?php if ($ctn_enable==2){ echo "Checked"; }?> >Disable</label>
    </div></div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="contact_page" id="btn" value="Submit" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>	

		<?php } ?>


			</div></div>
	
			