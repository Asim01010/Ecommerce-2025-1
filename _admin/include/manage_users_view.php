<?php
				require "libraries/loginchecker.php";
	$GETOrderID = $_GET['OrderType'];								
?>



<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=manage_users"><img src="images/back_icon.png" border="0"></a> | View Users</h1>
  </div> </div>
</div></div>

<div class="SpacingBox"></div>	


<style type="text/css" title="currentStyle">
			@import "css/list_page.css";
			@import "css/list_table.css";
		</style>
		<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').dataTable();
			} );
		</script>

		<?php
	$sr_num = 1;
	
	$GetItemInfo = mysqli_query($login_db, "SELECT * FROM sm_users ORDER By sm_username") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetItemInfo))
		{
				$sm_id 		= $row['sm_id'];
				$sm_firstname 		= $row['sm_firstname'];
	  			$sm_lastname 		= $row['sm_lastname'];
	  			$sm_username 		= $row['sm_username'];
	  			$sm_email 			= $row['sm_email'];
	  			$sm_contact_no 		= $row['sm_contact_no'];
	  			$sm_address 		= $row['sm_address'];
	  			$sm_city 			= $row['sm_city'];
	  			$sm_country 		= $row['sm_country'];
				$sm_accgen 			= $row['sm_accgen'];
				$sm_acclastlogin 		= $row['sm_acclastlogin'];
				$sm_enable 		= $row['sm_enable'];
				
			?>
			
			 <div class="container-fluid">
   <div class="Table table-responsive">
			<table width="100%" border="1" class="Table">
  <tbody>
    <tr>
      <td width="10%">Acc Gen.</td>
      <td width="37%"><?php echo $sm_accgen; ?></td>
      <td width="10%">Last login:</td>
      <td width="25%"><?php echo $sm_acclastlogin; ?></td>
    </tr>
    <tr>
      <td>Username:</td>
      <td><?php echo $sm_username; ?></td>
      <td>Email:</td>
      <td><?php echo $sm_email; ?></td>
    </tr>
    <tr>
      <td>Contact No.</td>
      <td><?php echo $sm_contact_no; ?></td>
      <td>Address:</td>
      <td><?php echo $sm_address; ?></td>
    </tr>
    <tr>
      <td>City:</td>
      <td><?php echo $sm_city; ?></td>
      <td>Country:</td>
      <td><?php echo $sm_country; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
		<?php } ?>
			</div>
			</div>
			</div>
	
			