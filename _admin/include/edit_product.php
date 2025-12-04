<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Edit Product</h1>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('ob_bookdisc');
		//bootstrap WYSIHTML5 - text editor
		$(".textarea").wysihtml5();
	});
</script>

<BR>
<link href="css/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery.ui.tabs.min.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.9.2.tabs.custom.min.js" type="text/javascript"></script>




<link type="text/css" rel="stylesheet" href="css/jquery-te-1.4.0.css">
<script type="text/javascript" src="js/jquery-te-1.4.0.min.js" charset="utf-8"></script>


<!------------------------------------------------------------ jQUERY TEXT EDITOR ------------------------------------------------------------>

<?php

$ProID = $_GET['ProID'];

$GetProducts = mysqli_query($dbcon, "SELECT * FROM sm_products WHERE pro_id='$ProID'") or die("Error with querry");
while ($row = mysqli_fetch_assoc($GetProducts)) {
	$pro_id                     = $row['pro_id'];
	$pro_cat_id					= $row['pro_cat_id'];
	$existing_brand_id					= $row['brand_id'];
	$pro_name					= $row['pro_name'];
	$pro_ed_addtocart					= $row['pro_ed_addtocart'];
	$pro_price				= $row['pro_price'];
	$pro_discount				= $row['pro_discount'];
	$pro_overview		     	= $row['pro_overview'];
	// $product_specs				= $row['product_specs'];
	$pro_keyfeature				= $row['pro_keyfeature'];
	// $content_texts              = $row['product_overview'];
	// $product_names              = $row['product_name'];
	$pro_image                  = $row['pro_image'];
	$pro_video                  = $row['pro_video'];
	$pro_ava_qty			    = $row['pro_ava_qty'];
	$pro_keywords				= $row['pro_keywords'];
	$pro_sku				    = $row['pro_sku'];

	$pro_cat 					= array();
	$pro_cat_name				= "";

	$GetTelcoDetail_2 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id ='$pro_cat_id' Order by ct_id ASC") or die("Error with querry");
	while ($row = mysqli_fetch_assoc($GetTelcoDetail_2)) {
		$pro_cat_name = $row['ct_name'];
	}

	$GetProductsCat = mysqli_query($dbcon, "SELECT * FROM sm_products_sizes WHERE ps_proid='$ProID'") or die("Error with querry");
	while ($row = mysqli_fetch_assoc($GetProductsCat)) {
		$pro_cat[$row["ps_name"]] = $row["ps_price"];
	}
?>


	<div class="SpacingBox"></div>

	<div class="wrapper">

		<div class="container form">
			<div class="row">
				<div class="col-sm-10">
					<form class="form-horizontal" method="post" action="index.php?view=manage_products" enctype="multipart/form-data">
						<input type="hidden" class="form-control" name="pro_id" value="<?php echo $pro_id; ?>">
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_cat_id">Selected Categary:</label>
							<div class="col-sm-9">
								<select required type="text" class="form-control" name="pro_cat_id">
									<option value="<?php echo $pro_cat_id; ?>" selected><?php echo $pro_cat_name; ?></option>
									<?php
									$GetTelcoDetails = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='0' Order by ct_id ASC") or die("Error with querry");
									while ($row = mysqli_fetch_assoc($GetTelcoDetails)) {
										$ct_id = $row['ct_id'];
										$ct_name = $row['ct_name'];
									?>
										<option value="0" disabled><?php echo $ct_name; ?></option>

										<?php
										$GetTelcoDetail = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id' Order by ct_id ASC") or die("Error with querry");
										while ($row = mysqli_fetch_assoc($GetTelcoDetail)) {
											$ct_id_2 = $row['ct_id'];
											$ct_name_2 = $row['ct_name'];
										?>
											<option value="<?php echo $ct_id_2; ?>" disabled>> <?php echo $ct_name_2; ?></option>

											<?php
											$GetTelcoDetail_2 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id_2' Order by ct_id ASC") or die("Error with querry");
											while ($row = mysqli_fetch_assoc($GetTelcoDetail_2)) {
												$ct_id_3 = $row['ct_id'];
												$ct_name_3 = $row['ct_name'];
											?>
												<option value="<?php echo $ct_id_3; ?>">- <?php echo $ct_name_3; ?></option>
											<?php
											}
											?>

										<?php
										}
										?>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
  <label class="control-label col-sm-3" for="brand_id">Select Brand:</label>
  <div class="col-sm-9">
    <select required class="form-control" name="brand_id">
      <option value="0">---- Not selected ----</option>
      <?php
      $GetBrands = mysqli_query($dbcon, "SELECT * FROM sm_brands WHERE brand_is_active = 1 ORDER BY brand_name ASC") or die("Error with query");

      while ($row = mysqli_fetch_assoc($GetBrands)) {
        $brand_id = $row['brand_id'];
        $brand_name = $row['brand_name'];

        // Set selected if it matches the product's brand
        $selected = ($brand_id == $existing_brand_id) ? 'selected' : '';
        echo "<option value='$brand_id' $selected>$brand_name</option>";
      }
      ?>
    </select>
  </div>
</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_name">Enable / Disable Add to Cart:</label>
							<div class="col-sm-9">

								<label><input <?php echo ($pro_ed_addtocart == '1') ? "checked" : ""; ?> type="radio" name="pro_ed_addtocart" value="1" id="pro_ed_addtocart_0"> Enable Cart with Size</label>
								<label><input <?php echo ($pro_ed_addtocart == '2') ? "checked" : ""; ?> type="radio" name="pro_ed_addtocart" value="2" id="pro_ed_addtocart_1"> Enable Cart For Gun</label>
								<label><input <?php echo ($pro_ed_addtocart == '3') ? "checked" : ""; ?> type="radio" name="pro_ed_addtocart" value="3" id="pro_ed_addtocart_2"> Disable Cart</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_name">Product Name:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_name" value="<?php echo $pro_name; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_image">Selected Display Image:</label>
							<div class="col-sm-9">
								<div>
									<img style="margin-bottom: 4px;" class="img-responsive img-rounded img-custom" src="<?php echo '../imgs/products/' . $pro_image; ?>" alt="" srcset="" width="100" height="100">
								</div>
								<input type="hidden" name="pro_old_image" value="<?php echo $pro_image; ?>">
								<input type="file" class="form-control" name="pro_image">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_price">Price (PKR):</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_price" id="pro_price" value="<?php echo $pro_price; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_discount">Discount (%):</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_discount" id="pro_discount" value="<?php echo $pro_discount; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_ava_qty">Total Quantity:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_ava_qty" id="pro_ava_qty" value="<?php echo $pro_ava_qty; ?>" readonly>
								<small>It will automatically calculated based on the quantities you provide for each color and size.</small>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_spces">Product Description:</label>
							<div class="col-sm-9">
								<div id="Tabs1">
									<ul>
										<li><a href="#tabs-1">Overview</a></li>
										<li><a href="#tabs-2">Key Features</a></li>
									</ul>
									<div id="tabs-1">
										<p><label for="pro_overview">Write here product overview:</label><BR>
											<textarea name="pro_overview" id="pro_overview" class="jqte-test" style="width: 1000px; height: 400px"><?php echo $pro_overview; ?></textarea>
										</p>
									</div>
									<div id="tabs-2">
										<p><label for="pro_keyfeature">Key Features:</label><BR>
											<textarea name="pro_keyfeature" id="pro_keyfeature" class="jqte-test" style="width: 1000px; height: 400px"><?php echo $pro_keyfeature; ?></textarea>
										</p>
									</div>
								</div>
							</div>
						</div>



						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_video">Video code:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_video" id="pro_video" value="<?php echo $pro_video; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_keywords">Product Keywords:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="pro_keywords" id="pro_keywords" value="<?php echo $pro_keywords; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="pro_sku">Product SKU:</label>
							<div class="col-sm-9">
								<input type="text" value="<?php echo $pro_sku ?>" class="form-control" name="pro_sku" id="pro_sku" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<input type="hidden" name="product_id" value="<?php echo $pro_id ?>">
								<input type="submit" name="save_product" value="Save" id="btn" style="float: right;">
							</div>
						</div>

					</form>
				</div>
				<div class="col-sm-2">
				</div>
			</div>
		</div>
	</div>

<?php } ?>

<script type="text/javascript">
	$(function() {
		$("#Tabs1").tabs();
	});
</script>
<script>
	$('.jqte-test').jqte();

	// settings of status
	var jqteStatus = true;
	$(".status").click(function() {
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({
			"status": jqteStatus
		})
	});
</script>

</div>