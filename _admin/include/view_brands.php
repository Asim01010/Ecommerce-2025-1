<?php
require "libraries/loginchecker.php";
?>

<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <h1><a href="index.php?view=add_brand"><img src="images/back_icon.png" border="0"></a> | View Brands</h1>
      </div>
    </div>
  </div>
</div>

<?php 
if (isset($_POST['Delete'])) {
    $brand_id = $_POST['brand_id'];
    
    $delete = mysqli_query($dbcon, "DELETE FROM sm_brands WHERE brand_id = '$brand_id'") or die("Error Delete");
    echo "<div class='alert alert-success'><strong>Success!</strong> Brand has been deleted.</div>";
}
?>

<div class="SpacingBox"></div>
<div class="container-fluid">
  <div class="Table table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Brand Name</th>
          <th>Description</th>
          <th>Image</th>
          <th>Logo</th>
          <th>Created At</th>
          <th>Status</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>

<?php
$getData = mysqli_query($dbcon, "SELECT * FROM sm_brands ORDER BY brand_id DESC") or die("Query Error");
while ($row = mysqli_fetch_array($getData)) {
    $brand_id          = $row['brand_id'];
    $brand_name        = $row['brand_name'];
    $brand_description = $row['brand_description'];
    $brand_image       = $row['brand_image'];
    $brand_logo        = $row['brand_logo'];
    $brand_created_at  = $row['brand_created_at'];
    $brand_is_active   = $row['brand_is_active'];
?>

        <tr>
          <td><?php echo $brand_id; ?></td>
          <td><?php echo $brand_name; ?></td>
          <td><?php echo substr(strip_tags($brand_description), 0, 50); ?>...</td>
          <td>
            <?php if ($brand_image != ''): ?>
              <img src="../imgs/brands/<?php echo $brand_image; ?>" width="50">
            <?php endif; ?>
          </td>
          <td>
            <?php if ($brand_logo != ''): ?>
              <img src="../imgs/brands/<?php echo $brand_logo; ?>" width="50">
            <?php endif; ?>
          </td>
          <td><?php echo $brand_created_at; ?></td>
          <td><?php echo ($brand_is_active == 1) ? 'Active' : 'Inactive'; ?></td>
          <td>
            <form method="POST">
              <input type="hidden" name="brand_id" value="<?php echo $brand_id; ?>">
              <input type="submit" name="Delete" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this brand?');">
            </form>
          </td>
        </tr>

<?php } ?>

      </tbody>
    </table>
  </div>
</div>

<div class="SpacingBox"></div>
