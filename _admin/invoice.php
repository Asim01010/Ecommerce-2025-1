<?php include 'functions.php';
	$OrderNo = $_GET['OrderNo'];
  $GrandTotal = 0;
  $GrandTotalQty = 0;
   ?>


	<!-- CSS Files -->
	<link href="css/theme_css.css" rel="stylesheet" type="text/css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="js/ajax-upload.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




<div class="SpacingBox"></div>	

<?php 

           $GETOrders = "SELECT * FROM sm_shoppingcart_orders WHERE sco_no='$OrderNo'";
		   $CheckOrderQuery = mysqli_query($login_db, $GETOrders) or die (mysql_error());
			while ($orow = mysqli_fetch_array($CheckOrderQuery)){

		
			$Date_DBFormat_View = date("d F, Y, h:i:s", strtotime($orow['sco_date_time']));
		
		if ($orow['sco_status']==2){
			$Result = "Submitted to Admin";
		}elseif ($orow['sco_status']==3){
			$Result = "Order in Process";
		}elseif ($orow['sco_status']==4){
			$Result = "Order Delivered";
		}elseif ($orow['sco_status']==5){
			$Result = "Order Canceled by Admin";
		}
			
		?>
		
		
<div class="SpacingBox"></div>
<div class="MainHeight">
<div class="container">
  <div class="row">
  <center><h2>Invoice. <?php echo $orow['sco_id']; ?></h2></center>
  <BR><BR>
  
<!-----------------------------------------------------User Details------------------------------------------------------->

               <?php 
	            $GetItemInfo = "SELECT * FROM sm_users WHERE sm_id=" .$orow['sco_id'];
				$GetUsers = mysqli_query($login_db, $GetItemInfo) or die("Error with querry");
 				if ($urow = mysqli_fetch_array($GetUsers)){
					
			if($urow['sm_id'] == $orow['sco_id']){
					
	            ?>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
 <div class="table-responsive">
<table class="table table-bordered table-striped">
<tr> <td colspan="4"><h3>User Details</h3></td></tr>
 <tr>
      <td>Username:</td>
      <td><?php echo $urow['sm_username']; ?></td>
	</tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $urow['sm_email']; ?></td>
    </tr>
    <tr>
      <td>Contact No.</td>
      <td><?php echo $urow['sm_contact_no']; ?></td>
	</tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $urow['sm_address']; ?></td>
    </tr>
    <tr>
      <td><b>ORDER STATUS</b></td>
      <td><?php echo $Result; ?></td>
    </tr>
    <tr>
	 <?php 
	  $CountryCity = "SELECT * FROM sm_country";
	  $CheckCCity = mysqli_query($login_db, $CountryCity)or die("Error 0010");
	  if($ccrow = mysqli_fetch_array($CheckCCity)){
      if($ccrow['cntry_id'] == $urow['sm_city']){ ?>
      <td>City:</td>
      <td><?php echo $ccrow['cntry_name']; ?></td>
	  <?php } } 
	  
	  $CountryCity = "SELECT * FROM sm_country";
	  $CheckCCity = mysqli_query($login_db, $CountryCity)or die("Error 0010");
	  if($ccrow = mysqli_fetch_array($CheckCCity)){
      if($ccrow['cntry_id'] == $urow['sm_country']){ ?>
      <td>Country:</td>
      <td><?php echo $ccrow['cntry_name']; ?></td>
	  <?php } } ?>
    </tr>
</table>
</div><br>
</div>

				<?php } } ?> 
  
<!-----------------------------------------------------Address Details------------------------------------------------------->

       <?php
        $GetUserDetails = "SELECT * FROM sm_addressbook WHERE ab_id='".$orow['sco_adbid']."'";
		$UserDateGet = mysqli_query($login_db, $GetUserDetails) or die (mysql_error());
		$CheckRows = mysqli_num_rows($UserDateGet);
		if($CheckRows!=0){
		if ($udrow = mysqli_fetch_array($UserDateGet)){
		}  ?>
			
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="table-responsive">
<table class="table table-bordered table-striped">
 <tr><td colspan="4"><h3>Delivery Details</h3></td></tr>
    <tr>
      <td width="10%">Name:</td>
      <td width="35%"><?php echo $udrow['ab_fullname']; ?></td>
	</tr>
    <tr>
      <td width="10%">Cell: </td>
      <td width="35%"><?php echo $udrow['ab_phone']; ?></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $udrow['ab_address']; ?>, <?php echo $udrow['ab_area']; ?></td>
	</tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $udrow['ab_city']; ?>, <?php echo $udrow['ab_province']; ?>, <?php echo $udrow['ab_country']; ?></td>
    </tr>
    <tr>
      <td>Payment Method</td>
      <td><?php if ($orow['sco_pmid']==1){ echo "Cash on Delivery";}elseif($orow['sco_pmid']==2){ echo "EasyPaisa";}elseif($orow['sco_pmid']==3){ echo "Jazzcash";}?></td>
    </tr>
</table>
</div>
</div>
		<?php } ?>
		



<!-----------------------------------------------------Product Order Details------------------------------------------------------->

		
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<table width="100%" border="1" class="table table-bordered table-striped">
  <tbody>
    <tr>
      <td width="4%" align="center">Sr.</td>
      <td width="15%" align="center"> Image</td>
      <td width="38%" align="center">Product Name</td>
      <td width="12%" align="center">Size</td>
      <td width="10%" align="center">Price</td>
      <td width="10%" align="center">Discount %</td>
      <td width="7%" align="center">Qty</td>
      <td width="14%" align="center">Total Price</td>
    </tr>
	<?php
			
		   $GETOrderItems = "SELECT * FROM sm_shoppingcart_items WHERE sci_order_id='".$_GET['OrderNo']."'";
		   $GetOrderProduct = mysqli_query($login_db, $GETOrderItems) or die (mysql_error());
		   while ($pirow = mysqli_fetch_array($GetOrderProduct)){
			$Osci_order_id 			= $pirow['sci_order_id'];
			$Osci_product_id 		= $pirow['sci_product_id'];
			$Osci_product_qty 		= $pirow['sci_product_qty'];
			
		   $GETItemName = "SELECT * FROM imt_pro_m_products WHERE pro_id='".$pirow['sci_product_id']."'";
		   $GetProductsName = mysqli_query($login_db, $GETItemName) or die (mysql_error());
			if ($prorow = mysqli_fetch_array($GetProductsName)){
			$pro_id		 			    = $prorow['pro_id'];
			
      $pro_shortview		 			= $prorow['pro_shortview'];
      $pro_discount 					= $prorow['pro_discount'];

      $pro_image		 				= $prorow['pro_image'];
      
      $DiscountOnPrice = $pro_shortview * $pro_discount / 100;
      $DiscountedPrice = $pro_shortview - $DiscountOnPrice;
      $TotalPrice = $DiscountedPrice * $Osci_product_qty;


?>
    <tr>
      <td><?php echo $pirow['sci_product_id']; ?></td>
      <td><img src="../img/products/<?php echo $prorow['pro_image']; ?>" class="img-thumbnail" width="100px"></td>
      <td><?php echo $prorow['pro_name']; ?></td>
      <td><?php
            $GetProductSize = "SELECT * FROM sm_products_sizes WHERE ps_id='".$pirow['sci_sizeid']."'";
			$GetSize = mysqli_query($login_db, $GetProductSize)or die(mysqli_error());
			if ($szrow = mysqli_fetch_array($GetSize)){
			echo  $szrow['ps_name']; }
	  ?></td>
    <td align="center"><?php echo number_format($prorow['pro_shortview'],2); ?></td>
      <td align="right"><?php echo $prorow['pro_discount']; ?></td>
      <td align="center"><?php echo $pirow['sci_product_qty']; ?></td>
      <td align="right"><?php echo number_format($TotalPrice,2); ?></td>
    </tr>
	  
<?php } 
	if (isset($TotalPrice)){
    $GrandTotal += $TotalPrice;
    $GrandTotalQty += $Osci_product_qty;
  }
  } ?>
  </tbody>
</table>



</div>

<!-----------------------------------------------------Order Quantity & Products------------------------------------------------------->

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6"></div>			
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="table-responsive">
<table class="table table-bordered table-striped">
<tbody>
    <tr>
      <td width="18%" align="right">Total Qty: </td>
      <td width="18%" align="right">PKR <?php echo $GrandTotalQty; ?></td>
    </tr>
	<?php if($GrandTotal >= "500000"){ ?>
	<tr>
      <td colspan="2">Free Shipping above Rs. 500000/-</td>
    </tr>
    <tr>
      <td align="right">Total Amount: </td>
      <td align="right">PKR <?php echo number_format($GrandTotal,2); ?></td>
    </tr>
	<?php }else{ ?>
    <tr>
      <td align="right">Total Amount: </td>
      <td align="right">PKR <?php echo number_format($GrandTotal,2); ?></td>
    </tr>
      <td align="right">Shipping Charges</td>
      <td align="right">0</td>
	  </tr>
      <tr>
      <td align="right">Total Amount: </td>
      <td align="right">PKR <?php echo number_format($GrandTotal,2); ?></td>
    </tr>
	<?php } ?>
  </tbody>
</table>
</div>
</div>
 
 
 
			<?php } ?>
 
			</div>
			</div>
			</div>
	
			