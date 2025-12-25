<?php
require "libraries/loginchecker.php";
?>

<!-- Bootstrap & Summernote CSS/JS Includes -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-10">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add Brand</h1>
      </div>
    </div>
  </div>
</div>

<?php
if (isset($_POST['submit'])) {

    $brand_name        = $_POST['brand_name'];
    $brand_description = $_POST['brand_description'];

    if ($brand_name && $brand_description) {

        // Handle file uploads
        $brand_image = '';
        $brand_logo = '';

        if (!empty($_FILES['brand_image']['name'])) {
            $img_tmp = $_FILES['brand_image']['tmp_name'];
            $img_name = rand(1000, 99999) . '_' . $_FILES['brand_image']['name'];
            move_uploaded_file($img_tmp, '../imgs/brands/' . $img_name);
            $brand_image = $img_name;
        }

        if (!empty($_FILES['brand_logo']['name'])) {
            $logo_tmp = $_FILES['brand_logo']['tmp_name'];
            $logo_name = rand(1000, 99999) . '_' . $_FILES['brand_logo']['name'];
            move_uploaded_file($logo_tmp, '../imgs/brands/' . $logo_name);
            $brand_logo = $logo_name;
        }

        $insert = mysqli_query($dbcon, "INSERT INTO sm_brands (
            brand_name, brand_description, brand_image, brand_logo, brand_created_at, brand_is_active
        ) VALUES (
            '$brand_name', '$brand_description', '$brand_image', '$brand_logo', NOW(), 1
        )") or die("Query Error");

        echo "<div class='alert alert-success'>Brand has been Added Successfully</div>";

    } else {
        echo "<div class='alert alert-danger'><strong>Failed!</strong> Please fill all required fields.</div>";
    }
}
?>

<div class="SpacingBox"></div>

<div class="wrapper">
  <div class="container form">
    <form method="post" enctype="multipart/form-data" class="form-horizontal">

      <div class="form-group">
        <label class="control-label col-sm-3">Brand Name:</label>
        <div class="col-sm-9">
          <input type="text" name="brand_name" class="form-control" placeholder="Example: Nike">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Brand Description:</label>
        <div class="col-sm-9">
          <textarea name="brand_description" id="summernote" class="form-control" placeholder="Enter brand details..."></textarea>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Brand Image:</label>
        <div class="col-sm-9">
          <input type="file" name="brand_image" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-3">Brand Logo:</label>
        <div class="col-sm-9">
          <input type="file" name="brand_logo" class="form-control">
        </div>
      </div>

      <div class="form-group"> 
        <div class="col-sm-12">
          <input type="submit" name="submit" value="Save Brand" style="float:right;" class="btn btn-primary">
        </div>
      </div>

    </form>
  </div>
</div>

<div class="SpacingBox"></div>

<script>
  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>
