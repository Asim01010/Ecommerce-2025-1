<?php
require "libraries/loginchecker.php";

?>

<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><a href="index.php?view=manage_products"><img src="images/back_icon.png" border="0"></a> | Add Product Images</h1>
			</div>
		</div>
	</div>
</div>


<BR><BR>

<?php

$ProID = $_GET['ProID'];
$Color = $_GET['Color'];
$Code = $_GET['Code'];

if (isset($_POST['delete_proimg'])) {
	$img_id = $_POST['img_id'];
	$GETImg = mysqli_query($dbcon, "SELECT * FROM sm_products_images WHERE img_id='$img_id'") or die(mysqli_error($dbcon));
	if ($row = mysqli_fetch_assoc($GETImg)) {
		$img_link 	= $row['img_link'];
		unlink("../imgs/products/$img_link");
		$DeleteLds = "DELETE FROM sm_products_images WHERE img_id='$img_id'";
		$DeleteNewsCheck = mysqli_query($dbcon, $DeleteLds) or die(mysqli_error($dbcon));
		echo "<div class='alert alert-success'>DELETE - Image has been deleted.</div>";
	}
}
// if (isset($_POST['delete_procolor'])) {
// 	$pc_id = $_POST['pc_id'];
// 	$GETcolor = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_id ='$pc_id'") or die(mysqli_error($dbcon));
// 	if ($row = mysqli_fetch_assoc($GETcolor)) {
// 		$DeleteLds = "DELETE FROM sm_products_colors WHERE pc_id='$pc_id'";
// 		$DeleteNewsCheck = mysqli_query($dbcon, $DeleteLds) or die(mysqli_error($dbcon));
// 		echo "<div class='alert alert-success'>DELETE - Color has been deleted.</div>";
// 	}
// }
// if (isset($_POST['delete_prosize'])) {
// 	$ps_id = $_POST['ps_id'];
// 	$GETsize = mysqli_query($dbcon, "SELECT * FROM sm_products_sizes WHERE ps_id ='$ps_id'") or die(mysqli_error($dbcon));
// 	if ($row = mysqli_fetch_assoc($GETsize)) {
// 		$DeleteLds = "DELETE FROM sm_products_sizes WHERE ps_id='$ps_id'";
// 		$DeleteNewsCheck = mysqli_query($dbcon, $DeleteLds) or die(mysqli_error($dbcon));
// 		echo "<div class='alert alert-success'>DELETE - Size has been deleted.</div>";
// 	}
// }


if (isset($_POST['UploadImage'])) {
	//get data form image with extension
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name 			= addslashes($_FILES['image']['name']);
	$image_size 			= getimagesize($_FILES['image']['tmp_name']);
	$file_tmp 				= $_FILES['image']['tmp_name'];

	//give the random name genator
	$randomNumber = rand(0000, 99999);
	//give the random name image
	$newName = $randomNumber . $image_name;

	$ldsQuery = "INSERT INTO sm_products_images (`img_pro_id`,`img_link`, `img_color`)
	 VALUES('$ProID','$newName','" . $Color . "')";
	$ldsQueryRun = mysqli_query($dbcon, $ldsQuery) or die(mysqli_error($dbcon));

	if ($ldsQueryRun) {
		//move the image form pc to server with random name
		if (move_uploaded_file($file_tmp, '../imgs/products/resized/' . $newName)) {
			include "../imgs/products/resized/imageinc.php";
			create_thumbnail('../imgs/products/resized/' . $newName, '../imgs/products/' . $newName, 500, 500);
			unlink('../imgs/products/resized/' . $newName);
			echo "<div class='alert alert-success'><center>Product Image has been uploaded.</div>";
		}
	}
}

// if (isset($_POST['add_color'])) {
// 	// Adding Product Colors
// 	$pro_color_names = $_POST['pro_color_name'];
// 	$pro_color_codes = $_POST['pro_color_code'];


// 	for ($i = 0; $i < count($pro_color_names); $i++) {
// 		$pro_color_name = $pro_color_names[$i];
// 		$pro_color_code = $pro_color_codes[$i];
// 		// echo "Text: $pro_color_name, Color: $pro_color_code <br>";
// 		$save_color = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '$ProID', '$pro_color_name', '$pro_color_code')") or die(mysqli_error($dbcon));
// 	}
// 	echo "<div class='alert alert-success'><center>Product Color has been added.</div>";
// }

// if (isset($_POST['add_size'])) {
// 	// Adding Product Sizes
// 	$selectedSized = $_POST["ps_name"];

// 	// Loop through the selected values
// 	foreach ($selectedSized as $value) {
// 		// echo "Selected checkbox value: $value<br>";
// 		$save_size = mysqli_query($dbcon, "INSERT INTO `sm_products_sizes` VALUES ('', '$ProID', '$value','', '')") or die("Error : product Size Insert");
// 	}

// 	echo "<div class='alert alert-success'><center>Product Size has been added.</div>";
// }



?>
<div class="SpacingBox"></div>

<div class="wrapper">

	<div class="container form">
		<div class="row">
			<div class="col-sm-8">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-sm-3">Product ID:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="" readonly value="<?php echo $ProID; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Color:</label>
						<div class="col-sm-9" style="display: flex; gap: 10px; align-items: center;">
							<input type="hidden" class="form-control" name="" readonly value="<?php echo $Color; ?>">
							<?php echo $Color; ?>
							<div style="width: 30px; height: 30px; border-radius: 50px; background-color: <?php echo $Code; ?>;"></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3">Select Image:</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="image">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="UploadImage" class="btn btn-success" value="Save" style="float: right;">
						</div>
					</div>
				</form>
				<!-- <form class="form-horizontal" method="post">
					<input type="hidden" class="form-control" name="Pro_ID" id="Pro_ID" readonly value="<?php echo $ProID; ?>">
					<div class="form-group">
						<label class="control-label col-sm-3" for="pro_colors">Add Product Colors:</label>
						<div class="col-sm-9 " style="display: flex; gap: 10px; align-items: start;">
							<div id="colorInputs">
								<div class="color-input">
									<input type="text" name="pro_color_name[]" placeholder="Enter color name">
									<input type="color" name="pro_color_code[]">
								</div>
							</div>
							<button type="button" id="addColor">Add More Color</button>
						</div>
					</div>
					<script>
						document.getElementById('addColor').addEventListener('click', function() {
							var colorInputs = document.getElementById('colorInputs');
							var newColorInput = document.createElement('div');
							newColorInput.innerHTML = '<input type="text" name="pro_color_name[]" placeholder="Enter color name"> <input type="color" name="pro_color_code[]">';
							colorInputs.appendChild(newColorInput);
						});
					</script>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="add_color" id="btn" value="Save" style="float: right;">
						</div>
					</div>
				</form>
				<form class="form-horizontal" method="post">
					<input type="hidden" class="form-control" name="Pro_ID" id="Pro_ID" readonly value="<?php echo $ProID; ?>">
					<div class="form-group">
						<label class="control-label col-sm-3">Add Product Size:</label>
						<div class="col-sm-5">
							<label>
								<input type="checkbox" name="ps_name[]" value="S - Small"> S - Small
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="M - Medium"> M - Medium
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="L - Large"> L - Large
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="XL - Extra Large"> XL - Extra Large
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="XXL - Double Extra Large"> XXL - Double Extra Large
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="XXXL - Triple Extra Large"> XXXL - Triple Extra Large
							</label>
						</div>
						<div class="col-sm-4">
							<label>
								<input type="checkbox" name="ps_name[]" value="38"> 38
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="40"> 40
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="42"> 42
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="44"> 44
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="46"> 46
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="48"> 48
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="52"> 52
							</label><BR>
							<label>
								<input type="checkbox" name="ps_name[]" value="54"> 54
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="add_size" id="btn" value="Save" style="float: right;">
						</div>
					</div>
				</form> -->
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="Table table-responsive">
		<!-- <table width="100%" border="1" style="margin-bottom: 30px;">
			<tbody>
				<tr class="Thead">

					<td width="29%">Size</td>
					<td width="13%">Delete</td>
				</tr>
				<?php
				$GetProSizes = mysqli_query($dbcon, "SELECT * FROM sm_products_sizes WHERE ps_proid='$ProID'") or die(mysqli_error($dbcon));
				while ($row = mysqli_fetch_assoc($GetProSizes)) {
				?>
					<tr>
						<td style="text-transform: capitalize;"><?php echo $row['ps_name']; ?></td>
						<form id='form1' name='form1' method='post' action='index.php?view=manage_product_more_images&ProID=<?php echo $ProID; ?>'>
							<td>
								<input type='hidden' name='ps_id' value='<?php echo $row['ps_id']; ?>'>
								<input type='submit' id='btn' name='delete_prosize' value='Delete'>
							</td>
						</form>

					</tr>

				<?php } ?>
			</tbody>
		</table>
		<table width="100%" border="1" style="margin-bottom: 30px;">
			<tbody>
				<tr class="Thead">

					<td width="29%">Color</td>
					<td width="13%">Delete</td>
				</tr>
				<?php
				$GetWebSlider = mysqli_query($dbcon, "SELECT * FROM sm_products_colors WHERE pc_pro_id='$ProID'") or die(mysqli_error($dbcon));
				while ($row = mysqli_fetch_assoc($GetWebSlider)) {
				?>
					<tr>
						<td style="text-transform: capitalize;"><?php echo $row['pc_name']; ?> <div style="width: 30px; height: 30px; border-radius: 50px; background-color: <?php echo $row['pc_code']; ?>;"></div>
						</td>
						<form id='form1' name='form1' method='post' action='index.php?view=manage_product_more_images&ProID=<?php echo $ProID; ?>'>
							<td>
								<input type='hidden' name='pc_id' value='<?php echo $row['pc_id']; ?>'>
								<input type='submit' id='btn' name='delete_procolor' value='Delete'>
							</td>
						</form>

					</tr>

				<?php } ?>
			</tbody>
		</table> -->
		<table width="100%" border="1">
			<tbody>
				<tr class="Thead">

					<td width="14%">ID</td>
					<td width="29%">Image</td>
					<td width="13%">Delete</td>
				</tr>
				<?php
				$GetWebSlider = mysqli_query($dbcon, "SELECT * FROM sm_products_images WHERE img_pro_id='$ProID' AND img_color = '$Color'") or die(mysqli_error($dbcon));
				while ($row = mysqli_fetch_assoc($GetWebSlider)) {

					$img_id 		= $row['img_id'];
					$img_link 	= $row['img_link'];
				?>
					<tr>
						<td><?php echo $img_id; ?></td>

						<td><img src="../imgs/products/<?php echo $img_link; ?>" height="150"></td>
						<form id='form1' name='form1' method='post'>
							<td><input type='hidden' id='img_id' name='img_id' value='<?php echo $img_id; ?>'>
								<input type='submit' class='btn btn-danger' name='delete_proimg' value='Delete'>
							</td>
						</form>

					</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>
</div>