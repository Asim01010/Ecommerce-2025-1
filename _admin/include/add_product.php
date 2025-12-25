<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add Product</h1>
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

if (isset($_POST['submit'])) {
  $brand_id          = $_POST['brand_id'];
  $pro_cat_id          = $_POST['pro_cat_id'];
  $pro_ed_addtocart     = $_POST['pro_ed_addtocart'];
  $pro_name             = mysqli_real_escape_string($dbcon, $_POST['pro_name']);
  $pro_price            = $_POST['pro_price'];
  $pro_discount         = $_POST['pro_discount'];
  $pro_keyfeature       = mysqli_real_escape_string($dbcon, $_POST['pro_keyfeature']);
  $pro_overview         = mysqli_real_escape_string($dbcon, $_POST['pro_overview']);
  //$pro_spces          = $_POST['pro_spces'];
  $pro_video            = $_POST['pro_video'];
  $pro_ava_qty          = $_POST['pro_ava_qty'];
  $pro_keywords         = $_POST['pro_keywords'];
  $pro_sku              = $_POST['pro_sku'];
  $file                 = $_FILES["image"]["tmp_name"];
  $file2                = $_FILES["image2"]["tmp_name"];


  if ($pro_cat_id && $pro_name) {
      
   // Get the original file name
$originalFileName = $_FILES["image"]["name"];

// Get the file extension from the original file name
$fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);

    // Convert to lowercase to ensure case-insensitivity
    $fileExtension = strtolower($fileExtension);
    
    // Check if the extension is either 'png' or 'jpg'
    if ($fileExtension === 'png' || $fileExtension === 'jpg') {

    if ($pro_cat_id == 0) {
      echo "<div class='alert alert-danger'>Please select sub-mcategory for product</div>";
    } else {
      if (!isset($file))
        echo "<div class='alert alert-danger'>Please fill all fields & select image<BR> <a href='index.php?view=add_product'><img src='images/user_back.png'></a></div>";
      else {
        //get data form image with extension
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);
        $file_tmp = $_FILES['image']['tmp_name'];



        $image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
        $image2_name = addslashes($_FILES['image2']['name']);
        $image2_size = getimagesize($_FILES['image2']['tmp_name']);
        $file2_tmp = $_FILES['image2']['tmp_name'];

        //give the random name genator
        $randomNumber = rand(0000, 99999);
        //give the random name image
        $extension = pathinfo($image_name, PATHINFO_EXTENSION); // Get the file extension
        $newName = $pro_name . '.' . $extension;
        //$newName = $randomNumber . $image_name;
        $newName2 = $randomNumber . $image2_name;

        $MainCategory = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id='$pro_cat_id'") or die("Error with querry");
        if ($row = mysqli_fetch_assoc($MainCategory)) {
          $pro_mcat_id = $row['ct_parent'];
          $ldsQuery = "INSERT INTO sm_products (`pro_mcat_id`, `brand_id`, `pro_cat_id`,`pro_size_guidline`, `pro_ed_addtocart`, `pro_name`, `pro_price`, `pro_discount`, `pro_keyfeature`, `pro_overview`, `pro_image`, `pro_video`, `pro_ava_qty`,`pro_keywords`,`pro_sku`, `pro_status`)
          VALUES('$pro_mcat_id', '$brand_id' , '$pro_cat_id', '$newName2', '$pro_ed_addtocart', '$pro_name', '$pro_price','$pro_discount', '$pro_keyfeature', '$pro_overview', '$newName', '$pro_video', '$pro_ava_qty', '$pro_keywords', '$pro_sku','1')";
          $ldsQueryRun = mysqli_query($dbcon, $ldsQuery) or die(mysqli_error($dbcon));

          if ($ldsQueryRun) {
            $lastid = mysqli_insert_id($dbcon);

            $colors = $_POST['colors'];
            $codes = $_POST['codes'];
            $sizes = $_POST['sizes'];
            $quantities = $_POST['quantities'];

            for ($i = 0; $i < count($colors); $i++) {
              $color = $colors[$i];
              $code = $codes[$i];
              $size = $sizes[$i];
              $quantity = $quantities[$i];

              $insetColor = mysqli_query($dbcon, "INSERT INTO `sm_products_colors` VALUES ('', '$lastid', '$color', '$code', '$size', '$quantity')") or die(mysqli_error($dbcon));
            }



            if (move_uploaded_file($file_tmp, '../imgs/products/resized/' . $newName)) {
              include "../imgs/products/resized/imageinc.php";
              create_thumbnail('../imgs/products/resized/' . $newName, '../imgs/products/' . $newName, 500, 500);
              unlink('../imgs/products/resized/' . $newName);
              echo "<div class='alert alert-success'><center>Product has been uploaded</div>";
            }
            if (move_uploaded_file($file2_tmp, '../imgs/products/' . $newName2)) {
              include "../imgs/products/resized/imageinc.php";
              create_thumbnail('../imgs/products/' . $newName2, '../imgs/products/resized/' . $newName2, 1000, 700);
              unlink('../imgs/products/resized/' . $newName2);
              echo "<div class='alert alert-success'><center>Product has been uploaded</div>";
            }
          }
        }
      }
    }
  } else {
    // Invalid file extension
    echo "<div class='alert alert-danger'>Invalid file type. Only PNG and JPG are allowed.</div>";
}
  } else {
    echo "<div class='alert alert-danger'>Please select product category</div>";
  }
}

?>
<!-- --------------------------- -->


<div class="SpacingBox"></div>

<div class="wrapper">
  <div class="container form">
    <div class="row">


      <div class="col-sm-10">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_cat_id">Select Categary:</label>
            <div class="col-sm-9">
              <select required type="text" class="form-control" name="pro_cat_id">
                <option value="0">---- Not selected ----</option>
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
      ?>
        <option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
      <?php } ?>
    </select>
  </div>
</div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_name">Enable / Disable Add to Cart:</label>
            <div class="col-sm-9">

              <label><input type="radio" name="pro_ed_addtocart" value="1" id="pro_ed_addtocart_0" checked> Enable Cart with Size</label>
              <label><input type="radio" name="pro_ed_addtocart" value="2" id="pro_ed_addtocart_1"> Enable Cart For Gun</label>
              <label><input type="radio" name="pro_ed_addtocart" value="3" id="pro_ed_addtocart_2"> Disable Cart</label>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_name">Product Name:</label>
            <div class="col-sm-9">
              <input required type="text" class="form-control" name="pro_name">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="image">Select Display Image:</label>
            <div class="col-sm-9">
              <input required type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="image">Select Size Guidline Image:</label>
            <div class="col-sm-9">
              <input required type="file" class="form-control" name="image2">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_price">Price (PKR):</label>
            <div class="col-sm-9">
              <input required type="text" class="form-control" name="pro_price" id="pro_price">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_discount">Discount (%):</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pro_discount" id="pro_discount">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3"></label>
            <div class="col-sm-9">
              <div id="fieldsSet" style="margin-bottom: 30px;">

                <div class="fieldsSet" style="border-radius: 5px; border: 1px solid #c9cccf; padding: 25px; margin-bottom: 15px;">
                  <button type="button" class="btn btn-danger " style="float: right;" onclick="removeFields(this)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                      <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                  </button>
                  <div class="form-group" style="margin-top: 30px;">
                    <label for="color">Color:</label>
                    <div style="display: flex; gap: 18px;">
                      <input type="text" name="colors[]" class="form-control" placeholder="Black, Smoke Gray, Blaze Green" required>
                      <input type="color" name="codes[]" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" name="sizes[]" class="form-control" placeholder="XS_S_M_L_XL_2XL OR 36_38_40_42_44_46" required>
                  </div>

                  <script>
                    function sumQty() {
                      var qtyArray = $('input[name="quantities[]"]').map(function() {
                        return $(this).val();
                      }).get();

                      var total_qty = 0;

                      for (var i = 0; i < qtyArray.length; i++) {
                        var qtySingleArray = qtyArray[i].split(", ");

                        for (var j = 0; j < qtySingleArray.length; j++) {
                          var qtySingleArray = qtyArray[i].split("_");
                          var qty = parseFloat(qtySingleArray[j]) || 0;
                          total_qty += qty;
                        }
                      }

                      $('#pro_ava_qty').val(total_qty);
                    }
                  </script>

                  <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" oninput="sumQty()" required>
                  </div>


                </div>

              </div>

              <button type="button" class="btn btn-primary" onclick="addFields()">Add Another Set</button>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_ava_qty">Total Quantity:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pro_ava_qty" id="pro_ava_qty" value="" readonly>
              <small>It will automatically calculated based on the quantities you provide for each color and size.</small>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_shortview">Product Description:</label>
            <div class="col-sm-9">
              <div id="Tabs1">
                <ul>
                  <li><a href="#tabs-1">Overview</a></li>
                  <li><a href="#tabs-2">Key Features</a></li>
                </ul>
                <div id="tabs-1">
                  <p><label for="pro_overview">Write here product overview:</label><BR>
                    <textarea name="pro_overview" id="pro_overview" class="jqte-test" style="width: 1000px; height: 400px"></textarea>
                  </p>
                </div>
                <div id="tabs-2">
                  <p><label for="pro_keyfeature">Key Features:</label><BR>
                    <textarea name="pro_keyfeature" id="pro_keyfeature" class="jqte-test" style="width: 1000px; height: 400px"></textarea>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_video">Video code:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pro_video" id="pro_video">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_keywords">Product Keywords:</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="pro_keywords" id="pro_keywords">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pro_sku">Product SKU:</label>
            <div class="col-sm-9">
              <input required type="text" class="form-control" name="pro_sku" id="pro_sku">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" name="submit" value="Save" id="btn" style="float: right;">
            </div>
          </div>

        </form>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
</div>
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



<script>
  function addFields() {
    var newSet = `<div class="fieldsSet" style="border-radius: 5px; border: 1px solid #c9cccf; padding: 25px; margin-bottom: 15px;">
                            <button type="button" class="btn btn-danger " style="float: right;" onclick="removeFields(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                </svg>
                            </button>
                            <div class="form-group" style="margin-top: 30px;">
                                <label for="color">Color:</label>
                                <div style="display: flex; gap: 18px;">
                                    <input type="text" name="colors[]" class="form-control" placeholder="Black, Smoke Gray, Blaze Green" required>
                                    <input type="color" name="codes[]" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="size">Size:</label>
                                <input type="text" name="sizes[]" class="form-control" placeholder="S_M_L_XL_2XL_3Xl OR 36_38_40_42_44_46" required>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                 <input type="text" name="quantities[]" class="form-control" placeholder="5_10_3_2_6_9" oninput="sumQty()" required>
                            </div>
                        </div>`;

    $('#fieldsSet').append(newSet);
  }

  function removeFields(button) {
    $(button).parent().remove();
  }
</script>

</div>