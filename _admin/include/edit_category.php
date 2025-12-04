<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=manage_categories"><img src="images/back_icon.png" border="0"></a> | Edit Category</h1>
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

$CatID = $_GET['CatID'];

?>
<div class="SpacingBox"></div>

<div class="wrapper">

  <div class="container form">
    <div class="row">
      <div class="col-sm-8">
        <form class="form-horizontal" method="post" action="index.php?view=manage_categories" enctype="multipart/form-data">

          <?php



          $GetCategoryDetails = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_id='$CatID'") or die("Error with querry");
          if ($row = mysqli_fetch_assoc($GetCategoryDetails)) {

            $cct_id     = $row['ct_id'];
            $ct_class   = $row['ct_class'];
            $ct_name   = $row['ct_name'];
            $ct_parent   = $row['ct_parent'];
            $Ct_text = htmlspecialchars_decode($row['ct_text']);
            $ct_link   = $row['ct_link'];
            $ct_link_target   = $row['ct_link_target'];

          ?>

            <div class="form-group">
              <label class="control-label col-sm-3" for="category_id">Category ID:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="category_id" value="<?php echo $cct_id; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="category_type">Category Type:</label>
              <div class="col-sm-9">
                <select type="text" class="form-control" name="category_type" required>
                  <option value="1" <?php if ($ct_class == 1) {
                                      echo "selected";
                                    } ?>>Level 1 - Main DropDown Category</option>
                  <option value="2" <?php if ($ct_class == 2) {
                                      echo "selected";
                                    } ?>>Level 2 - DropDown Category</option>
                  <option value="3" <?php if ($ct_class == 3) {
                                      echo "selected";
                                    } ?>>Level 3 - Product Category</option>
                  <option value="4" <?php if ($ct_class == 4) {
                                      echo "selected";
                                    } ?>>Level 4 - Direct Product Page</option>
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
                    $ct_id_1 = $row['ct_id'];
                    $ct_name_1 = $row['ct_name'];
                  ?>
                    <option value="<?php echo $ct_id_1; ?>" <?php if ($ct_id_1 == $ct_parent) {
                                                              echo "selected";
                                                            } ?>><?php echo $ct_name_1; ?></option>

                    <?php
                    $GetTelcoDetail_2 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id_1'") or die("Error with querry");
                    while ($row = mysqli_fetch_assoc($GetTelcoDetail_2)) {
                      $ct_id_2 = $row['ct_id'];
                      $ct_name_2 = $row['ct_name'];
                    ?>
                      <option value="<?php echo $ct_id_2; ?>" <?php if ($ct_id_2 == $ct_parent) {
                                                                echo "selected";
                                                              } ?>>> <?php echo $ct_name_2; ?></option>

                      <?php
                      $GetTelcoDetail_3 = mysqli_query($dbcon, "SELECT * FROM sm_categories WHERE ct_parent='$ct_id_2'") or die("Error with querry");
                      while ($row = mysqli_fetch_assoc($GetTelcoDetail_3)) {
                        $ct_id_3 = $row['ct_id'];
                        $ct_name_3 = $row['ct_name'];
                      ?>
                        <option value="<?php echo $ct_id_3; ?>" <?php if ($ct_id_3 == $ct_parent) {
                                                                  echo "selected";
                                                                } ?> disabled> --> <?php echo $ct_name_3; ?></option>
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
                <input type="text" class="form-control" name="category_name" value="<?php echo $ct_name; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="category_text">Category Text:</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="category_text" id="category_text"><?php echo $Ct_text; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="tr_image">Category Image: 120 x 120 px</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" name="tr_image">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="ct_linked_target">Target Window:</label>
              <div class="col-sm-9">
                <select type="text" class="form-control" name="ct_linked_target" required>
                  <option value="<?php echo $ct_link_target; ?>" selected><?php echo $ct_link_target; ?></option>
                  <option value="_parent">Parent</option>
                  <option value="_blank">Open with new Window</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="save_category" id="btn" value="Save" style="float: right;">
              </div>
            </div>
            </table>
          <?php

          } ?>
        </form>


      </div>
    </div>
  </div>
</div>