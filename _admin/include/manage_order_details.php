<?php require "libraries/loginchecker.php";
$OrderNo = $_GET['OrderNo'];

$GrandTotal = 0;
$GrandTotalQty = 0;
?>



<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage Orders</h1>
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

  $select_orderid     = $_POST['select_orderid'];
  $select_action     = $_POST['select_action'];

  if ($select_orderid && $select_action) {

    $Change = "UPDATE sm_orders SET sco_status='$select_action' WHERE sco_id='$select_orderid'";
    $GetChange = mysqli_query($dbcon, $Change) or die(mysqli_error($dbcon));

    echo "<div class='alert alert-success alert-dismissable'><strong>Updated!</strong> Order has been updated.</div>";
  }
}

//------------------------------------------------------------Fetch Querry---------------------------------------------------//


$GETOrders = "SELECT * FROM sm_orders WHERE odr_no='$OrderNo'";
$CheckOrderQuery = mysqli_query($dbcon, $GETOrders) or die(mysqli_error($dbcon));
while ($orow = mysqli_fetch_array($CheckOrderQuery)) {

  $odr_pro_id = explode(", ", $orow['odr_pro_id']);
  $odr_pro_size = explode(", ", $orow['odr_pro_size']);
  $odr_pro_color = explode(", ", $orow['odr_pro_color']);
  $odr_pro_qty = explode(", ", $orow['odr_pro_qty']);
  $pro_count = count($odr_pro_id);
  // print_r($odr_pro_size);
?>


  <div class="SpacingBox"></div>
  <div class="MainHeight" id="printableArea">
    <div class="container">
      <div class="row">
        <center>
          <h2>Invoice. <?php echo $orow['odr_no']; ?></h2>
        </center>
        <BR><BR>

        <!-----------------------------------------------------Product Order Details------------------------------------------------------->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <table width="100%" border="1" class="table table-bordered table-striped">
            <tbody>
              <!-- <h3>Porducts Details</h3> -->
              <tr>
                <td width="4%" align="center"><b>Sr.</b></td>
                <td width="15%" align="center"><b>Image</b></td>
                <td width="38%" align="center"><b>Product Name</b></td>
                <td width="12%" align="center"><b>Size</b></td>
                <td width="12%" align="center"><b>Color</b></td>
                <td width="10%" align="center"><b>Price</b></td>
                <!-- <td width="10%" align="center"><b>Discount %</td</b>> -->
                <td width="7%" align="center"><b>Qty</b></td>
                <td width="14%" align="center"><b>Total Price</b></td>
              </tr>

              <?php
              for ($i = 0; $i < $pro_count; $i++) {
                $get_pro = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_id = '" . $odr_pro_id[$i] . "'") or die(mysqli_error($dbcon));
                while ($pro_row = mysqli_fetch_assoc($get_pro)) {
                  $discount = ($pro_row['pro_price'] * $pro_row['pro_discount']) / 100;
              ?>
                  <tr>
                    <td width="4%" align="center"><?php echo $i + 1 ?></td>
                    <td width="15%" align="center"><img src="../imgs/products/<?php echo $pro_row['pro_image'] ?>" style="height: 100px" alt=""></td>
                    <td width="38%" align="center"><?php echo $pro_row['pro_name'] ?></td>
                    <td width="12%" align="center"><?php echo $odr_pro_size[$i] ?></td>
                    <td width="12%" align="center"><?php echo $odr_pro_color[$i] ?></td>
                    <td width="10%" align="center"><?php echo number_format($pro_row['pro_price'] - $discount, 2); ?></td>
                    <!-- <td width="10%" align="center">Discount %</td> -->
                    <td width="7%" align="center"><?php echo $odr_pro_qty[$i] ?></td>
                    <td width="14%" align="center"><?php echo number_format(($pro_row['pro_price'] - $discount) * $odr_pro_qty[$i], 2) ?></td>
                  </tr>
              <?php
                }
              }
              ?>

            </tbody>
          </table>
        </div>

        <!-----------------------------------------------------Order Qyantity & Products------------------------------------------------------->

        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <tbody>
                <!-- <h3>Delivery Details</h3> -->
                <tr>
                  <td width="18%" align="right"><b>Full Name</b></td>
                  <td width="18%" align="right"><?php echo $orow['odr_full_name'] ?></td>
                </tr>
                <tr>
                  <td width="18%" align="right"><b>Mobile Number</b></td>
                  <td width="18%" align="right"><?php echo $orow['odr_contact_no'] ?></td>
                </tr>
                <tr>
                  <td width="18%" align="right"><b>Email</b></td>
                  <td width="18%" align="right"><?php echo $orow['odr_email'] ?></td>
                </tr>
                <tr>
                  <td width="18%" align="right"><b>Address, Appartment</b></td>
                  <td width="18%" align="right"><?php echo $orow['odr_address'] . ", " . $orow['odr_appartment_suite'] ?></td>
                </tr>
                <tr>
                  <td align="right"><b>Country, City</b></td>
                  <td align="right"><?php echo $orow['odr_country'] . ", " . $orow['odr_city'] ?></td>
                </tr>
                <tr>
                  <td align="right"><b>State, Postal Code</b></td>
                  <td align="right"><?php echo $orow['odr_state'] . ", " . $orow['odr_postal_code'] ?></td>
                </tr>
                <tr>
                  <td align="right"><b>Payment Method</b></td>
                  <td align="right"><?php echo $orow['odr_payment_method'] ?></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <tbody>
                <!-- <h3>Billing Details</h3> -->
                <tr>
                  <td width="18%" align="right"><b>Total Items</b></td>
                  <td width="18%" align="right"><?php echo $pro_count; ?></td>
                </tr>
                <?php if ($GrandTotal >= "500000") { ?>
                  <tr>
                    <td colspan="2">Free Shipping above Rs. 500000/-</td>
                  </tr>
                  <tr>
                    <td align="right"><b>Total Amount</b></td>
                    <td align="right"><?php echo number_format($GrandTotal, 2); ?></td>
                  </tr>
                <?php } else { ?>
                  <!-- <tr>
                    <td align="right">Total Amount:</td>
                    <td align="right"><?php echo number_format($GrandTotal, 2); ?></td>
                  </tr> -->
                  <td align="right"><b>Shipping Charges</b></td>
                  <td align="right">0</td>
                  </tr>
                  <tr>
                    <td align="right"><b>Total Amount</b></td>
                    <td align="right"><?php echo number_format($orow['odr_total_price'], 2); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div style="display: flex; justify-content: center; align-items: center; margin: 30px 0;">
    <button onclick="printDiv('printableArea')" class="btn btn-primary">Print Invoice</button>
  </div>


  <script>
    function printDiv(divId) {
      var printContents = document.getElementById(divId).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
    }
  </script>

<?php
}
?>