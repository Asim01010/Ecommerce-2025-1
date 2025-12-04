<?php
require "libraries/loginchecker.php";
if (isset( $_GET['OrderType'])) {
	$GETOrderID = $_GET['OrderType'];
}
?>


<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage Users</h1>
			</div>
		</div>
	</div>
</div>

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
	});
</script>

<?php
if (isset( $_POST['sm_id'])) {
	$sm_id = $_POST['sm_id'];
}
if (isset($_POST['so_disable'])) {

	$Update = mysqli_query($login_db, "UPDATE sm_users SET sm_enable='0' WHERE sm_id='$sm_id'") or die("Error with query - 07076");
	echo "<div class='alert alert-success alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Disabled!</strong> Status has be disabled.
</div>";
}
if (isset($_POST['so_enable'])) {

	$Update = mysqli_query($login_db, "UPDATE sm_users SET sm_enable='1' WHERE sm_id='$sm_id'") or die("Error with query - 07076");
	echo "<div class='alert alert-success alert-dismissable'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Enabled!</strong> Status has be enabled.
</div>";
}


?>

<div class="container-fluid">
	<div class="Table table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>

				<tr>
					<th>ID</th>
					<th width='300'>Name</th>
					<th width='200'>Username</th>
					<th width='300'>Email</th>
					<th width='200'>Contact No</th>
					<th width='200'>City</th>
					<th width='200'>Active/Deactive</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sr_num = 1;

				$GetItemInfo = mysqli_query($login_db, "SELECT * FROM sm_users ORDER By sm_username") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetItemInfo)) {
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

					<tr class='Default'>

						<td><?php echo $sm_id; ?></td>
						<td><a href='index.php?view=manage_users_view&userid=<?php echo $sm_id; ?>'><?php echo $sm_firstname . '' . $sm_lastname; ?></a></td>
						<td><a href='index.php?view=manage_users_view&userid=<?php echo $sm_id; ?>'><?php echo $sm_email; ?></a></td>
						<td><?php echo $sm_email; ?></td>
						<td><?php echo $sm_contact_no; ?></td>
						<td><?php echo $sm_city; ?></td>
						<form id='form1' name='form1' method='post'>
							<td>
								<?php
								if ($sm_enable == 1) { ?>
									<input type='hidden' name='sm_id' value='<?php echo $sm_id; ?>'>
									<input type='submit' name='so_disable' id="btn" value='Disable'>
								<?php } elseif ($sm_enable == 0) { ?>
									<input type='hidden' name='sm_id' value='<?php echo $sm_id; ?>'>
									<input type='submit' id="btn" name='so_enable' value='Enable'>
								<?php } ?>
							</td>
						</form>


					</tr>
				<?php
				}

				?>
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Contact No</th>
					<th>City</th>
					<th>Active/Deactive</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>