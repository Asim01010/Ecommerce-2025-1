<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage Categories</h1>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			</div>
		</div><br>
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


<?php

if (isset($_POST['delete_category'])) {
	$sct_id   = $_POST['sct_id'];
	$scat_image   = $_POST['scat_image'];

	unlink('../imgs/categories/' . $scat_image);
	$delete = mysqli_query($dbcon, "DELETE FROM sm_categories WHERE ct_id='$sct_id'") or die("Error with query - 4576");
	echo "<div class='alert alert-success'>DELETE - Item has been deleted.</div>";
}


if (isset($_POST['save_category'])) {

	$category_id 				= $_POST['category_id'];
	$category_type 				= $_POST['category_type'];
	$attached_with_category 	= $_POST['attached_with_category'];
	$category_name				= $_POST['category_name'];
	$category_text				= htmlspecialchars($_POST['category_text']);
	$ct_linked_target			= $_POST['ct_linked_target'];
	$TR_Image  					= $_FILES["tr_image"]["tmp_name"];

	if ($category_id) {

		if ($category_type == 1) {
			$CategoryURL = "";
		} elseif ($category_type == 2) {
			$CategoryURL = "index.php?view=products_view&CatID=$attached_with_category&SubCatID=";
		} elseif ($category_type == 3) {
			$CategoryURL = "index.php?view=products_view&CatID=$attached_with_category&SubCatID=";
		}

		if (empty($TR_Image)) {

			$change = mysqli_query($dbcon, "UPDATE sm_categories SET ct_name='$category_name', ct_link='$CategoryURL', ct_text='$category_text',  ct_link_target='$ct_linked_target', ct_parent='$attached_with_category' WHERE ct_id='$category_id'") or die("Error with query - 4576");
			echo "<div class='alert alert-success'>Main-Menu has been saved.</div>";
		} else {

			if ($TR_Image) {
				if (!isset($TR_Image))
					echo "<div class='alert alert-danger'>Please fill all fields & select image<BR> <a href='index.php?view=add_product'><img src='images/user_back.png'></a></div>";
				else {
					//get data form image with extension
					$image 			= addslashes(file_get_contents($_FILES['tr_image']['tmp_name']));
					$image_name 	= addslashes($_FILES['tr_image']['name']);
					$image_size 	= getimagesize($_FILES['tr_image']['tmp_name']);
					$file_tmp 		= $_FILES['tr_image']['tmp_name'];




					//give the random name genator
					$randomNumber = rand(0000, 99999);
					//give the random name image
					$newName = $randomNumber . $image_name;

					$CertificateID_Gen = "00000000000-$TRCF_CourseTitle$TRCF_InstructorName";
					//file checker image or not image
					if ($image_size == FALSE)
						echo "<div class='alert alert-danger'>Thats not an image. Please select only JPG, JPEG, PNG & GIF.</div>";
					else {
						//intert data in sql & problem issio
						if ($newName) {


							$change = mysqli_query($dbcon, "UPDATE sm_categories SET ct_name='$category_name', cat_image='$newName', ct_link='$CategoryURL', ct_text='$category_text',  ct_link_target='$ct_linked_target', ct_parent='$attached_with_category' WHERE ct_id='$category_id'") or die("Error with query - 4576");

							$lastid = mysqli_insert_id($dbcon);
							//move the image form pc to server with random name
							if (move_uploaded_file($file_tmp, '../img/category/resized/' . $newName)) {
								include "../img/category/resized/imageinc.php";
								create_thumbnail('../img/category/resized/' . $newName, '../img/category/' . $newName, 300, 293);
								unlink('../img/category/resized/' . $newName);
								/*-------- Message --------*/
								echo "<div class='alert alert-success'>Your Category details has been saved.</div>";
							}
						}
					}
				}
			}
		}
	} else {
		echo "<div class='alert alert-danger'>Please select menu Type, Sub menu & write Menu Name.</div>";
	}
}





?>
<div class="container-fluid">


	<div class="table-responsive">
		<table width="100%" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead>

				<tr>
					<th width='10%'></th>
					<th width='10%'></th>
					<th width='20%'></th>
					<th width='30%'></th>
					<th width='5%'></th>
					<th width='10%'></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$GetProductsDetail = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='0' ORDER By ct_id") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetProductsDetail)) {

					$ct_id 		= $row['ct_id'];
					$ct_class 	= $row['ct_class'];
					$ct_name 	= $row['ct_name'];
					$cat_image 	= $row['cat_image'];
					$Ct_parent 	= $row['ct_parent'];
					$Ct_text 	= $row['ct_text'];
				?>

					<tr>
						<td class="ManageCategory"></td>
						<td class="ManageCategory" colspan="2" style="font-weight:bold; font-size:20px;"><?php echo $ct_name; ?></td>
						<td class="ManageCategory"><a href='index.php?view=edit_category&CatID=<?php echo $ct_id; ?>'><img src='images/edit_admin_white.png'></a></td>
						<form id='form1' name='form1' method='post' action='index.php?view=manage_categories'>
							<td class="ManageCategory">
								<input type='hidden' id='ct_id' name='sct_id' value='<?php echo $ct_id; ?>'>
								<input type='hidden' id='cat_image' name='scat_image' value='<?php echo $cat_image; ?>'>
								<input type='submit' id='btn' name='delete_category' value='Delete'>
							</td>
						</form>
					</tr>
					</tr>


					<?php

					$GetProductsDetails = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id' ORDER By ct_id") or die("Error with querry");
					$LineBackground = '';
					while ($row = mysqli_fetch_assoc($GetProductsDetails)) {
						$sct_id 		= $row['ct_id'];
						$sct_class 	= $row['ct_class'];
						$sct_name 	= $row['ct_name'];
						$sct_parent 	= $row['ct_parent'];
						$sct_text 	= $row['ct_text'];
						$sct_link 	= $row['ct_link'];

						if ($sct_id % 2) {
							$KLineBackground = "style='background-color: #EEEEEE;'";
						} else {
							$KLineBackground = "style='background-color: #CCCCCC;'";
						}
					?>

						<tr>
							<td <?php echo $LineBackground; ?>>&nbsp;</td>
							<td <?php echo $LineBackground; ?> width="55"></td>
							<td <?php echo $LineBackground; ?> width="762"><?php echo $sct_name; ?></td>
							<td <?php echo $LineBackground; ?>><a href='index.php?view=edit_category&CatID=<?php echo $sct_id; ?>'><img src='images/edit_admin.png'></a></td>
							<form id='form1' name='form1' method='post' action='index.php?view=manage_categories'>
								<td <?php echo $LineBackground; ?>>
									<input type='hidden' id='sct_id' name='sct_id' value='<?php echo $sct_id; ?>'>
									<input type='submit' id='btn' name='delete_category' value='Delete'>
								</td>
							</form>
						</tr>


						<?php

						$GetProductsCategory = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$sct_id' ORDER By ct_id") or die("Error with querry");
						while ($row = mysqli_fetch_assoc($GetProductsCategory)) {

							$csct_id 		= $row['ct_id'];
							$csct_class 	= $row['ct_class'];
							$csct_name 	= $row['ct_name'];
							$csct_parent 	= $row['ct_parent'];
							$csct_text 	= $row['ct_text'];
							$csct_link 	= $row['ct_link'];

							if ($sct_id % 2) {
								$KLineBackground = "style='background-color: #EEEEEE;'";
							} else {
								$KLineBackground = "style='background-color: #CCCCCC;'";
							}
						?>

							<tr>
								<td <?php echo $KLineBackground; ?>>&nbsp;</td>
								<td <?php echo $KLineBackground; ?> width="55">>>>></td>
								<td <?php echo $KLineBackground; ?> width="762"><?php echo $csct_name; ?></td>
								<td <?php echo $KLineBackground; ?>><a href='index.php?view=edit_category&CatID=<?php echo $csct_id; ?>'><img src='images/edit_admin.png'></a></td>
								<form id='form1' name='form1' method='post' action='index.php?view=manage_categories'>
									<td <?php echo $KLineBackground; ?>>
										<input type='hidden' id='sct_id' name='sct_id' value='<?php echo $csct_id; ?>'>
										<input type='submit' id='btn' name='delete_category' value='Delete'>
									</td>
								</form>
							</tr>
				<?php
						}
					}
				}
				?>
			</tbody>
			<tfoot>
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
			</tfoot>
		</table>
	</div>
</div>

<div class="SpacingBox"></div>