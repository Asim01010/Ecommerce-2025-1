<?php require "libraries/loginchecker.php";

$OrderType = $_GET['OrderType'];
?>




<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> |Manage Orders</h1>
			</div>

			<div class="SpacingBox"></div>
			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<a href="index.php?view=manage_order&OrderType=1" class='active btn btn-success'>NEW ORDERS</a>
				<a href="index.php?view=manage_order&OrderType=2" class='active btn btn-success'>ORDER IN PROCESS</a>
				<a href="index.php?view=manage_order&OrderType=3" class='active btn btn-success'>ORDER DELIVERED</a>
				<a href="index.php?view=manage_order&OrderType=4" class='active btn btn-danger'>ORDER CANCELED</a>
			</div>

		</div>
	</div>
</div>


<div class="SpacingBox"></div>

<?php

if (isset($_POST['update_order'])) {

	$odr_id     = $_POST['odr_id'];
	$odr_no		 = $_POST['odr_no'];
	$action		 = $_POST['action'];

	if ($odr_id && $action) {

		$update_odr_status = mysqli_query($dbcon, "UPDATE sm_orders SET odr_status='$action' WHERE odr_id='$odr_id'") or die(mysqli_error($dbcon));

		if ($update_odr_status) {
			echo "<div class='alert alert-success alert-dismissable'>Order Status updated.</div>";
		} else {
			echo "<div class='alert alert-danger alert-dismissable'>Something went wrong!</div>";
		}

		//----------------------------Product Quantity Change--------------------------------------------------//

		// $GETOrderItems = "SELECT * FROM sm_shoppingcart_items WHERE sci_order_id=" . $_POST['odr_no'];
		// $GetOrderProduct = mysqli_query($dbcon, $GETOrderItems) or die(mysqli_error($dbcon));
		// while ($pirow = mysqli_fetch_array($GetOrderProduct)) {
		// 	$sci_product_qty 			= $pirow['sci_product_qty'];
		// 	$Osci_product_id 		= $pirow['sci_product_id'];


		// 	$GETItemName = "SELECT * FROM imt_pro_m_products WHERE pro_id=" . $pirow['sci_product_id'];
		// 	$GetProductsName = mysqli_query($dbcon, $GETItemName) or die(mysqli_error($dbcon));
		// 	while ($prorow = mysqli_fetch_array($GetProductsName)) {
		// 		$ProId = $prorow['pro_id'];

		// 		if ($action == 4) {
		// 			$TotalQuantity = $prorow['pro_ava_qty'] - $sci_product_qty;

		// 			$UpdateQuantity = "UPDATE imt_pro_m_products SET pro_ava_qty='$TotalQuantity' WHERE pro_id='$ProId'";
		// 			$CheckQuantity = mysqli_query($dbcon, $UpdateQuantity) or die(mysqli_error($dbcon));
		// 		}

		// 		echo "<div class='alert alert-success alert-dismissable'><strong>Updated!</strong> Order has been updated.</div>";
		// 	}
		// }
	}
}

?>


<div class="MainHeight" style="min-height: 100vh;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<td>ORDER NO</td>
								<td>ORDER DATE & TIME</td>
								<td>ORDERED TYPE</td>
								<td>USERNAME</td>
								<td>ACTION </td>
								<td> UPDATE</td>
								<td>VIEW ORDER</td>
							</tr>
						</thead>
						<tbody>
							<?php

							$GETOrders = "SELECT * FROM sm_orders WHERE odr_status= '$OrderType' ORDER BY odr_id DESC";
							$CheckOrderQuery = mysqli_query($dbcon, $GETOrders) or die(mysqli_error($dbcon));
							while ($orow = mysqli_fetch_array($CheckOrderQuery)) { ?>

								<tr>
									<td><?php echo $orow['odr_no']; ?></td>
									<td><?php echo $orow['odr_date_time']; ?></td>
									<td><?php echo $orow['odr_type']; ?></td>
									<td>
										<?php
										echo $orow['odr_full_name'];
										// $GetItemInfo = "SELECT * FROM sm_users";
										// $GetUsers = mysqli_query($dbcon, $GetItemInfo) or die("Error with querry 112");
										// while ($urow = mysqli_fetch_array($GetUsers)) {
										// 	if ($urow['sm_id'] == $orow['odr_id']) {
										// 		echo $urow['sm_username'];
										// 	} elseif ($urow['sm_id'] == $orow['sco_user_id']) {
										// 		echo $urow['sm_username'];
										// 	}
										// }
										?>
									</td>
									<form id="form1" name="form1" method="post" onsubmit="return validateForm()">
    <td>
        <input type="hidden" name="odr_id" id="odr_id" value="<?php echo $orow['odr_id']; ?>">
        <input type="hidden" name="odr_no" id="odr_no" value="<?php echo $orow['odr_no']; ?>">
        <select name="action" id="action" class="form-control" required>
            <option value="" selected hidden>---- Select Action ----</option>
            <option value="2">ORDER IN PROCESS</option>
            <option value="3">ORDER DELIVERED</option>
            <option value="4">ORDER CANCELED</option>
        </select>
    </td>
    <td>
        <input type="submit" name="update_order" class="btn btn-primary" value="UPDATE">
    </td>
</form>
									<td><a href="index.php?view=manage_order_details&OrderNo=<?php echo $orow['odr_no']; ?>" class="btn btn-success">View Order</a></td>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>


			</div>
		</div>
	</div>
</div>

<script>
function validateForm() {
    const actionSelect = document.getElementById('action');
    if (actionSelect.value === "") {
        alert('Please select a valid action before submitting the form.');
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}
</script>