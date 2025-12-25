<?php

use function PHPSTORM_META\type;

require "libraries/loginchecker.php";

$GetProducts =  mysqli_query($dbcon, "SELECT * FROM sm_products") or die("Error with querry");
$countProducts = mysqli_num_rows($GetProducts);

?>





<div class="HomeHeading">
	<div class="container-fluid">
		<div style="display:flex; justify-content:end; align-items:center;">
			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage Shop</h1>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<h1 style="font-size: 25px; text-align:center;"> Products Uploaded | <?php echo $countProducts; ?></h1>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="display:flex; justify-content:end;">
				<a href="index.php?view=add_product"><img src="images/icon_add_product_ved.png" border="0"></a>
			</div>
		</div>
	</div>
</div>

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

<div class="SpacingBox"></div>

<?php

if (isset($_POST['delete_pro'])) {
	$pro_id = $_POST['pro_id'];
	$pro_image = $_POST['pro_image'];

	unlink('../imgs/products/' . $pro_image);
	$SelectImgs =  mysqli_query($dbcon, "SELECT * FROM sm_products_images WHERE img_pro_id='$pro_id'") or die(mysqli_error($dbcon));
	while ($ImgRow = mysqli_fetch_assoc($SelectImgs)) {
		unlink('../imgs/products/' . $ImgRow['img_link']);
	}
	$DeleteImgs = mysqli_query($dbcon, "DELETE FROM sm_products_images WHERE img_pro_id ='$pro_id'") or die(mysqli_error($dbcon));
	$DeleteSizes = mysqli_query($dbcon, "DELETE FROM sm_products_sizes WHERE ps_proid ='$pro_id'") or die(mysqli_error($dbcon));
	$DeleteColors = mysqli_query($dbcon, "DELETE FROM sm_products_colors WHERE pc_pro_id ='$pro_id'") or die(mysqli_error($dbcon));
	$DeletePro =  mysqli_query($dbcon, "DELETE FROM sm_products WHERE pro_id='$pro_id'") or die(mysqli_error($dbcon));

	echo "<div class='alert alert-success'>DELETE - Item has been deleted.</div>";
}


if (isset($_POST['save_product'])) {

	$product_id			  = $_POST['product_id'];
	$pro_cat_id           = $_POST['pro_cat_id'];
	$brand_id           = $_POST['brand_id'];
	echo $brand_id;
	$pro_ed_addtocart     = $_POST['pro_ed_addtocart'];
	$pro_name             = mysqli_real_escape_string($dbcon, $_POST['pro_name']);
	$pro_price        = $_POST['pro_price'];
	$pro_discount         = $_POST['pro_discount'];
	$pro_keyfeature       = mysqli_real_escape_string($dbcon, $_POST['pro_keyfeature']);
	$pro_overview         = mysqli_real_escape_string($dbcon, $_POST['pro_overview']);
	//$pro_spces          = $_POST['pro_spces'];
	$pro_video            = $_POST['pro_video'];
	// $pro_ava_qty          = $_POST['pro_ava_qty'];
	$pro_keywords         = $_POST['pro_keywords'];
	$pro_sku              = $_POST['pro_sku'];
	$pro_old_image		  = $_POST['pro_old_image'];
	$file                 = $_FILES["pro_image"]["tmp_name"];
	echo $file;
	if ($pro_cat_id && $pro_name) {

		if ($pro_cat_id == 0) {
			echo "<div class='alert alert-danger'>Please select sub-mcategory for product</div>";
		} else {

			function pro_edit_update($dbcon, $pro_image)
			{
				global $product_id, $brand_id, $pro_cat_id, $pro_ed_addtocart, $pro_name, $pro_price, $pro_discount, $pro_keyfeature, $pro_overview, $pro_video, $pro_ava_qty, $pro_keywords, $pro_sku, $ps_name_S, $ps_name_M, $ps_name_L, $ps_name_XL, $ps_name_XXL, $ps_name_XXXL;

				$MainCategory = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id='$pro_cat_id'") or die("Error with querry");
				if ($row = mysqli_fetch_assoc($MainCategory)) {
					$pro_mcat_id = $row['ct_parent'];
					$ldsQuery = "UPDATE sm_products SET pro_mcat_id = '$pro_mcat_id', brand_id = '$brand_id', pro_cat_id = '$pro_cat_id', pro_ed_addtocart = '$pro_ed_addtocart', pro_name = '$pro_name', pro_price = '$pro_price', pro_discount = '$pro_discount', pro_overview = '$pro_overview', pro_keyfeature = '$pro_keyfeature', pro_image = '$pro_image', pro_video = '$pro_video', pro_keywords = '$pro_keywords', pro_sku ='$pro_sku', pro_status = '1' WHERE pro_id = '$product_id'";
					$ldsQueryRun = mysqli_query($dbcon, $ldsQuery) or die(mysqli_error($dbcon));

					return $ldsQueryRun;
				}
			}

			// if (!isset($file)) {
			// 	echo "<div class='alert alert-danger'>Please fill all fields & select image<BR> <a href='index.php?view=add_product'><img src='images/user_back.png'></a></div>";
			// } else 
			if (isset($_FILES["pro_image"]) && $_FILES["pro_image"]["error"] == 0) {

				// Get the original file name
				$originalFileName = $_FILES["pro_image"]["name"]; // fixed 'image' to 'pro_image'

				// Get the file extension
				$fileExtension = strtolower(pathinfo($originalFileName, PATHINFO_EXTENSION));

				// Get image details
				$image = addslashes(file_get_contents($_FILES['pro_image']['tmp_name']));
				$image_name = addslashes($_FILES['pro_image']['name']);
				$image_size = getimagesize($_FILES['pro_image']['tmp_name']);
				$file_tmp = $_FILES['pro_image']['tmp_name'];

				// Generate a unique file name
				$randomNumber = rand(10000, 99999);
				$newName = $randomNumber . '_' . $image_name;
echo $newname;
				// Move file
				if (move_uploaded_file($file_tmp, '../imgs/products/resized/' . $newName)) {
					include "../imgs/products/resized/imageinc.php";

					// Create thumbnail and remove resized version
					create_thumbnail('../imgs/products/resized/' . $newName, '../imgs/products/' . $newName, 500, 500);
					unlink('../imgs/products/resized/' . $newName);

					// Update database with product info and image name
					$ldsQueryRun = pro_edit_update($dbcon, $newName);
					if ($ldsQueryRun) {
						echo "<div class='alert alert-success'><center>Product has been uploaded</center></div>";
					}
				}
			} else {
				// No image uploaded — update only with old image
				$ldsQueryRun = pro_edit_update($dbcon, $pro_name, $pro_old_image);
				if ($ldsQueryRun) {
					echo "<div class='alert alert-success'><center>Product has been uploaded</center></div>";
				}
			}

		}
	} else {
		echo "<div class='alert alert-danger'>Please select product category</div>";
	}
}

if (isset($_POST['UpdateStatus'])) {

	$pro_id     = $_POST['pro_id'];
	$pro_status = $_POST['pro_status'];

	$GetUpdate =  mysqli_query($dbcon, "UPDATE sm_products SET pro_status='$pro_status'  WHERE pro_id='$pro_id'") or die("Error Update");

	echo "<div class='alert alert-success'> Your product status has been Update.</div>";
}


?>

<div class="container-fluid">


	<div class="table-responsive">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>
				<tr>
					<!-- <th width='10%'>ID</th> -->
					<th width='10%'>Image</th>
					<th width='10%'>Name</th>
					<th width='10%'>Sku</th>
					<th width='15%'>Price</th>
					<th width='15%'>Discount</th>
					<th width='15%'>Quantity</th>
					<th width='15%'>Status</th>
					<th width='10%'>Available</th>
					<th width='10%'>Add/Remove Colors/Sizes/Qty</th>
					<th width='10%'>Edit</th>
					<th width='10%'>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php


				$get_product =  mysqli_query($dbcon, "SELECT * FROM sm_products") or die(mysqli_error($dbcon));
				while ($prorow = mysqli_fetch_assoc($get_product)) {
					$pro_id = $prorow['pro_id'];
					$pro_cat_id = $prorow['pro_cat_id'];
					$pro_image = $prorow['pro_image'];

					if ($prorow['pro_ava_qty'] > 0) {
						$pro_availability = "In Stock";
					} else {
						$pro_availability = "Out of Stock";
					}

					$get_category =  mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id='$pro_cat_id'") or die(mysqli_error($dbcon));
					while ($catrow = mysqli_fetch_assoc($get_category)) {
						$ct_name = $catrow['ct_name'] ?>

						<tr>
							<td><img src="../imgs/products/<?php echo $prorow['pro_image'] ?>" alt="" style="height: 120px;"></td>
							<td><?php echo $prorow['pro_name'] . "<BR>" . $ct_name ?></td>
							<td><?php echo $prorow['pro_sku'] ?></td>
							<td><?php echo $prorow['pro_price'] ?> PKR</td>
							<td><?php echo $prorow['pro_discount'] ?> %</td>
							<td><?php echo $prorow['pro_ava_qty'] ?></td>
							<?php
							if ($prorow['pro_status'] == 1) {
								echo "<form id='form1' name='form1' method='post' action='index.php?view=manage_products'>
								<td><input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<select class='form-control' name='pro_status'>
								<option selected hidden>Enable</option>
								<option value='0'>Disable</option>
								<option value='2'>Out of Stock</option>
								</select> <br> <input type='submit' name='UpdateStatus' value='Change Status' id='btn'></td>

								<td>$pro_availability</td>
								<td class='center'><a href='index.php?view=manage_pro_colors&ProID=$pro_id'><img src='images/icon_moreimages.png'></a></td>
								<td><a href='index.php?view=edit_product&ProID=$pro_id' id='btn'>Edit</a></td>
								
								
								<td class='center'>
								<input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<input type='hidden' id='pro_image' name='pro_image' value='$pro_image'>
								<input type='submit' name='delete_pro' value='Delete' id='btn'></td>
								</form>";
							} elseif ($prorow['pro_status'] == 0) {
								echo "<form id='form1' name='form1' method='post' action='index.php?view=manage_products'>
								<td><input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<select class='form-control' name='pro_status'>
								<option selected hidden>Disable</option>
								<option value='1'>Enable</option>
								<option value='2'>Out of Stock</option>
								</select> <br> <input type='submit' name='UpdateStatus' value='Change Status' id='btn'></td>

								<td>$pro_availability</td>
								<td class='center'><a href='index.php?view=manage_pro_colors&ProID=$pro_id'><img src='images/icon_moreimages.png'></a></td>
								<td><a href='index.php?view=edit_product&ProID=$pro_id' id='btn'>Edit</a></td>
								
								
								<td class='center'>
								<input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<input type='hidden' id='pro_image' name='pro_image' value='$pro_image'>
								<input type='submit' name='delete_pro' value='Delete' id='btn'></td>
								</form>";
							} else {
								echo "<form id='form1' name='form1' method='post' action='index.php?view=manage_products'>
								<td><input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<select class='form-control' name='pro_status'>
								<option selected hidden>Out of Stock</option>
								<option value='1'>Enable</option>
								<option value='0'>Disable</option>
								</select> <br> <input type='submit' name='UpdateStatus' value='Change Status' id='btn'></td>

								<td>$pro_availability</td>
								<td class='center'><a href='index.php?view=manage_pro_colors&ProID=$pro_id'><img src='images/icon_moreimages.png'></a></td>
								<td><a href='index.php?view=edit_product&ProID=$pro_id' id='btn'>Edit</a></td>
								
								
								<td class='center'>
								<input type='hidden' id='pro_id' name='pro_id' value='$pro_id'>
								<input type='hidden' id='pro_image' name='pro_image' value='$pro_image'>
								<input type='submit' name='delete_pro' value='Delete' id='btn'></td>
								</form>";
							}
							?>

						</tr>
				<?php
					}
				}
				?>


			</tbody>
			<tfoot>
				<tr>
					<!-- <th width='10%'>ID</th> -->
					<th width='10%'>Image</th>
					<th width='10%'>Name</th>
					<th width='10%'>Sku</th>
					<th width='15%'>Price</th>
					<th width='15%'>Discount</th>
					<th width='15%'>Quantity</th>
					<th width='15%'>Status</th>
					<th width='10%'>Available</th>
					<th width='10%'>Add More Colors</th>
					<th width='10%'>Edit</th>
					<th width='10%'>Delete</th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div class="SpacingBox"></div>


<!-- TO add more images of product -->
<!-- <td class='center'><a href='index.php?view=manage_product_more_images&ProID=$pro_id'><img src='images/icon_moreimages.png'></a></td> -->