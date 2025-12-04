<?php
				
					require "libraries/header.php";
									
?>
<div class="account_auctionlist_content">
	<div class="back_icon"><table width="100%" border="0">
  <tr class="back_icon_text">
    <td width="46"><a href="index.php?view=home"><img src="../_img/back_icon.png" border="0"></a></td>
    <td width="20">|</td>
    <td width="98%">Add Product</td>
  </tr>
</table></div>
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


 
 $category_no = $_POST['category_no'];
 $name = $_POST['name'];
$model_no = $_POST['model_no'];
$price = $_POST['price'];
$in_stock = $_POST['in_stock'];
$description = $_POST['description'];
$in_price_list = $_POST['in_price_list'];

 //file properties
$file = $_FILES['image']['tmp_name'];
 


 $uploadFile = $file;

if (!isset($file))
echo "<span class='blue_text'>Please fill all fields & select image<BR> <a href='new.php'><img src='images/user_back.png'></a></span>";
else
{
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
	if ($image_size==FALSE)
	echo "<span class='red_text'>Thats not an image. Please select only JPG, JPEG, PNG & GIF.</span>";
	else
	{	
	//intert data in sql & problem issio
	if (!$insert = mysqli_query($login_db, "INSERT INTO imt_pro_m_products VALUES ('',
			'$select_category',
			'$product_name',
			'$pro_shortview',
			'$product_overview',
			'$product_specs',
			'$newName')"))
		echo "<span class='red_text'>Your image size to high. Please select 1.5MB File.</span>";
	
	else
	{
	$lastid = mysqli_insert_id($login_db);
	//move the image form pc to server with random name
	if (move_uploaded_file($file_tmp, '../images/'.$newName) ){
	echo "<span class='green_text'>Your product has been uploaded.</span> ";}
	echo "<span class='green_text'>Please Click for confirm the product</span>
	<br>
	<a href='../images/create.php?name=$newName'><span class='red_text'><font size='6'>Click Here</font></span></a>";
	}	
}
	}
	
	
	
?>


<table border="0" width="100%" id="top" cellspacing="0" cellpadding="0">
	<tr>
		<td align="center" valign="top">
		<table border="0" width="1000" cellspacing="0" cellpadding="0">
<table width="1000" border="0">
  <tr>
    <td><span class="administrator_page_heading">Add New Product & Details</span><br><br>







<form action="add_product.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="1000" border="0">
    <tr>
      <td width="150" class='textbox_headings'><label for="category_no">Category:</label></td>
      <td width="780"><select name="category_no" id="category_no">
	  <option>---- Not selected ----</option>
	  <?php
			$GetTelcoDetails = mysqli_query($login_db, "SELECT * FROM imt_pro_category WHERE ct_parent='0'") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetTelcoDetails))
				{
				$ct_id = $row['ct_id'];
				$ct_name = $row['ct_name'];
				?>
				<option value="0"><?php echo $ct_name; ?></option>
				
				<?php
			$GetTelcoDetail = mysqli_query($login_db, "SELECT * FROM imt_pro_category WHERE ct_parent='$ct_id'") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($GetTelcoDetail))
				{
				$ct_id_2 = $row['ct_id'];
				$ct_name_2 = $row['ct_name'];
				?>
				<option value="<?php echo $ct_id_2; ?>">>> <?php echo $ct_name_2; ?></option>
				<?php
				}
				?>
				<?php
				}
				?>
      </select></td>
    </tr>
    <tr>
      <td class='textbox_headings'><label for="name">Product Name:</label></td>
      <td><input type="text" name="name" id="name" /></td>
    </tr>
    <tr>
      <td class='textbox_headings'><label for="image">Image:</label></td>
      <td><input type="file" name="image" id="image" /></td>
    </tr>
    <tr>
      <td class='textbox_headings'><label for="model_no">Model No.</label></td>
      <td><input type="text" name="model_no" id="model_no" /></td>
    </tr>
    <tr>
      <td class='textbox_headings'><label for="price">Price AED:</label></td>
      <td><input type="text" name="price" id="price" /></td>
    </tr>
    <tr>
      <td class='textbox_headings'><label for="in_stock">In Stock:</label></td>
      <td><select name="in_stock" id="in_stock">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select></td>
    </tr>
	    <tr>
      <td class='textbox_headings'><label for="in_price_list">In Stock:</label></td>
      <td><select name="in_price_list" id="in_price_list">
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select></td>
    </tr>
    <tr>
      <td  align="left" valign="top" class='textbox_headings'><label for="description">Description:</label></td>
      <td><textarea name="description" id="description" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width="750" border="0">
        <tr>
          <td width="626">&nbsp;</td>
          <td width="58"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form></td>
  </tr>
</table>
<script type="text/javascript">
$(function() {
	$( "#Tabs1" ).tabs(); 
});
</script>
<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>

			</div>
	<?php
	require "libraries/footer.php";
	?>
			