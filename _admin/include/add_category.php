<?php
require "libraries/loginchecker.php";

?>

<div class="HomeHeading">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add Category</h1>
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
		CKEDITOR.replace('category_text');
		//bootstrap WYSIHTML5 - text editor
		$(".textarea").wysihtml5();
	});
</script>
<BR>
<?php
if (isset($_POST['submit'])) {

	$category_type 				= $_POST['category_type'];
	$attached_with_category 	= $_POST['attached_with_category'];
	$category_name				= $_POST['category_name'];
	$category_text				= htmlspecialchars($_POST['category_text']);
	$ct_linked_target			= $_POST['ct_linked_target'];
	$file   =	$_FILES["image"]["tmp_name"];

	if ($category_type && $ct_linked_target) {

		if ($category_type == 1) {
			$CategoryURL = "index.php?view=products_category_view&CatID=";
			$CatType = "1";
		} elseif ($category_type == 2) {
			$CategoryURL = "index.php?view=products_view&CatID=$attached_with_category&SubCatID=";
			$CatType = "2";
		} elseif ($category_type == 3) {
			$CategoryURL = "index.php?view=products_view&CatID=$attached_with_category&SubCatID=";
			$CatType = "3";
		} elseif ($category_type == 4) {
			$CategoryURL = "index.php?view=products_view&CatID=$attached_with_category&SubCatID=";
			$CatType = "4";
		}

		$uploadFile = $file;

		if (!isset($file))
			echo "<div class='alert alert-danger'>Please fill all fields & select image<BR> <a href='index.php?view=add_product'><img src='images/user_back.png'></a></div>";
		else {
			//get data form image with extension
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			$file_tmp = $_FILES['image']['tmp_name'];


			//give the random name genator
			$randomNumber = rand(0000, 99999);
			//give the random name image
			$newName = $randomNumber . $image_name;


			//file checker image or not image
			if ($image_size == FALSE)
				echo "<div class='alert alert-danger'>Thats not an image. Please select only JPG, JPEG, PNG & GIF.</div>";
			else {
				$Insert = mysqli_query($dbcon, "INSERT INTO sm_categories VALUES ('','$category_type','$category_name','$CategoryURL','$category_text','$ct_linked_target','$newName','$attached_with_category')") or die("Error in Query");


				$lastid = mysqli_insert_id($dbcon);
				//move the image form pc to server with random name
				if (move_uploaded_file($file_tmp, '../imgs/categories/resized/' . $newName)) {
					include "../imgs/categories/resized/imageinc.php";
					create_thumbnail('../imgs/categories/resized/' . $newName, '../imgs/categories/' . $newName, 400, 400);
					unlink('../imgs/categories/resized/' . $newName);

					echo "<div class='alert alert-success'><center>Your Category has been uploaded.</div>";
				}
			}
		}
	} else {
		echo "<div class='alert alert-danger'>Please select menu Type, Sub menu & write Menu Name.</div>";
	}
}

?>

<BR><BR>
<div class="SpacingBox"></div>

<div class="wrapper">

	<div class="container form">
		<div class="row">
			<div class="col-sm-8">
				<form class="form-horizontal" method="post" enctype="multipart/form-data">
					<!--div class="form-group">
    <label class="control-label col-sm-3" for="	ct_grp_id">Group Type:</label>
    <div class="col-sm-9"> 
      <select type="text" class="form-control" name="ct_grp_id">
	  <option>---- Not selected ----</option>
	  <?php /*
			$GetTelcoDetails = mysqli_query($dbcon, "SELECT * FROM sm_pro_groups WHERE grp_end='1'") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetTelcoDetails))
				{
				
		$grp_id	    = $row['grp_id'];
		$grp_name 	= $row['grp_name'];
				?>
				<option value="<?php echo $grp_id; ?>"><?php echo $grp_name; ?></option>
				<?php }*/ ?> 
	   </select>
    </div>
  </div-->
					<div class="form-group">
						<label class="control-label col-sm-3" for="category_type">Category Type:</label>
						<div class="col-sm-9">
							<select type="text" class="form-control" name="category_type">
								<option value="1" selected>Level 1 - Main DropDown Category</option>
								<option value="2">Level 2 - DropDown Category</option>
								<option value="3">Level 3 - Product Category</option>
								<option value="4">Level 4 - Direct Product Page</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="attached_with_category">Choose Category:</label>
						<div class="col-sm-9">
							<select type="text" class="form-control" name="attached_with_category" required>
								<option value="0">---- Not selected ----</option>
								<?php
								$GetTelcoDetail_1 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='0'") or die("Error with querry");
								while ($row = mysqli_fetch_assoc($GetTelcoDetail_1)) {
									$ct_id = $row['ct_id'];
									$ct_name = $row['ct_name'];
								?>
									<option value="<?php echo $ct_id; ?>"><?php echo $ct_name; ?></option>

									<?php
									$GetTelcoDetail_2 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id'") or die("Error with querry");
									while ($row = mysqli_fetch_assoc($GetTelcoDetail_2)) {
										$ct_id_2 = $row['ct_id'];
										$ct_name_2 = $row['ct_name'];
									?>
										<option value="<?php echo $ct_id_2; ?>">> <?php echo $ct_name_2; ?></option>

										<?php
										$GetTelcoDetail_3 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id_2'") or die("Error with querry");
										while ($row = mysqli_fetch_assoc($GetTelcoDetail_3)) {
											$ct_id_3 = $row['ct_id'];
											$ct_name_3 = $row['ct_name'];
										?>
											<option value="<?php echo $ct_id_3; ?>">--> <?php echo $ct_name_3; ?></option>
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
						<label class="control-label col-sm-3" for="category_name">Category Name:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="category_name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="image">Select Image:</label>
						<div class="col-sm-9">
							<input type="file" class="form-control" name="image" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="category_text">Category Text:</label>
						<div class="col-sm-9">
							<textarea type="text" class="form-control" name="category_text" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="ct_linked_target">Target Window:</label>
						<div class="col-sm-9">
							<select type="text" class="form-control" name="ct_linked_target">
								<option value="_parent" selected>Parent</option>
								<option value="_blank">Open with new Window</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" name="submit" id="btn" value="Save" style="float: right;">
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</div>

<div class="SpacingBox"></div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>