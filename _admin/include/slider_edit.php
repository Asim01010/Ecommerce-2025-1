<?php require "libraries/loginchecker.php"; ?>

<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
  $(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('sl_text');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>


<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=web_slider"><img src="images/back_icon.png" border="0"></a> | Web Slider</h1>
      </div>
    </div>
  </div>
</div>

<?php



$sl_id = $_GET['sl_id'];



if (isset($_POST['submit'])) {

  $sl_image    =  $_FILES["sl_image"]["tmp_name"];
  $sl_mobimage    =  $_FILES["sl_mobimage"]["tmp_name"];
  $sl_url   =  $_POST['sl_url'];
  $sl_heading    =  $_POST['sl_heading'];
  $sl_text   =  htmlspecialchars($_POST['sl_text']);
  $oldsl_image   =  $_POST['oldsl_image'];
  $oldsl_mobimage   =  $_POST['oldsl_mobimage'];


  // if (empty($sl_image)) {
  //   $image2 = addslashes(file_get_contents($_FILES['sl_mobimage']['tmp_name']));
  //   $image_name2 = addslashes($_FILES['sl_mobimage']['name']);
  //   $image_size2 = getimagesize($_FILES['sl_mobimage']['tmp_name']);
  //   $file_tmp2 = $_FILES['sl_mobimage']['tmp_name'];
  //   //give the random name genator
  //   $randomNumber2 = rand(0000, 99999);
  //   //give the random name image
  //   $newName2 = $randomNumber2 . $image_name2;

  //   $Update1 = mysqli_query($Conn, "UPDATE sm_slider SET sl_image='$oldsl_image ', sl_mobimage= '$newName2', sl_url=' $sl_url', sl_heading = '$sl_heading', sl_text = '$sl_text' WHERE sl_id = '$sl_id'");
  //   (move_uploaded_file($file_tmp2, '../_img/resized/' . $newName2));
  //   include "../_img/resized/imageinc.php";
  //   create_thumbnail('../_img/resized/' . $newName2, '../_img/slides/' . $newName2,  450, 600);

  //   unlink('../_img/resized/' . $newName2);
  //   unlink('../_img/slides/' .  $oldsl_mobimage);
  //   echo "<div class='alert alert-success'><p>Slider have been update Successfully1!</p></div>";
  // } elseif (empty($sl_mobimage)) {
  //   //get data form image with extension
  //   $image = addslashes(file_get_contents($_FILES['sl_image']['tmp_name']));
  //   $image_name = addslashes($_FILES['sl_image']['name']);
  //   $image_size = getimagesize($_FILES['sl_image']['tmp_name']);
  //   $file_tmp = $_FILES['sl_image']['tmp_name'];
  //   //give the random name genator
  //   $randomNumber = rand(0000, 99999);
  //   //give the random name image
  //   $newName = $randomNumber . $image_name;
  //   $Update1 = mysqli_query($Conn, "UPDATE sm_slider SET sl_image='$newName', sl_mobimage= '$oldsl_mobimage', sl_url=' $sl_url', sl_heading = '$sl_heading', sl_text = '$sl_text' WHERE sl_id = '$sl_id'");

  //   //       //move the image form pc to server with random name
  //   (move_uploaded_file($file_tmp, '../_img/resized/' . $newName));
  //   include "../_img/resized/imageinc.php";
  //   create_thumbnail('../_img/resized/' . $newName, '../_img/slides/' . $newName,  1920, 720);
  //   unlink('../_img/resized/' . $newName);
  //   unlink('../_img/slides/' .  $oldsl_image);
  //   echo "<div class='alert alert-success'><p>Slider have been update Successfully!</p></div>";
  // } else


  if (empty($sl_mobimage) && empty($sl_image)) {
    $Update1 = mysqli_query($Conn, "UPDATE sm_slider SET sl_image='$oldsl_image', sl_mobimage= '$oldsl_mobimage', sl_url=' $sl_url', sl_heading = '$sl_heading', sl_text = '$sl_text' WHERE sl_id = '$sl_id'");
    echo "<div class='alert alert-success'><p>Slider have been update Successfully!</p></div>";
  } else {
    //get data form image with extension
    $image = addslashes(file_get_contents($_FILES['sl_image']['tmp_name']));
    $image_name = addslashes($_FILES['sl_image']['name']);
    $image_size = getimagesize($_FILES['sl_image']['tmp_name']);
    $file_tmp = $_FILES['sl_image']['tmp_name'];
    //give the random name genator
    $randomNumber = rand(0000, 99999);
    //give the random name image
    $newName = $randomNumber . $image_name;


    //get data form image with extension
    $image2 = addslashes(file_get_contents($_FILES['sl_mobimage']['tmp_name']));
    $image_name2 = addslashes($_FILES['sl_mobimage']['name']);
    $image_size2 = getimagesize($_FILES['sl_mobimage']['tmp_name']);
    $file_tmp2 = $_FILES['sl_mobimage']['tmp_name'];
    //give the random name genator
    $randomNumber2 = rand(0000, 99999);
    //give the random name image
    $newName2 = $randomNumber2 . $image_name2;

    $Update1 = mysqli_query($Conn, "UPDATE sm_slider SET sl_image='$newName', sl_mobimage= '$newName2', sl_url=' $sl_url', sl_heading = '$sl_heading', sl_text = '$sl_text' WHERE sl_id = '$sl_id'");

    //move the image form pc to server with random name
    (move_uploaded_file($file_tmp, '../imgs/slides/resized/' . $newName));
    include "../imgs/slides/resized/imageinc.php";
    create_thumbnail('../imgs/slides/resized/' . $newName, '../imgs/slides/' . $newName,  1350, 540);
    unlink('../imgs/slides/resized/' . $newName);
    unlink('../imgs/slides/' .  $oldsl_image);

    //move the image form pc to server with random name
    (move_uploaded_file($file_tmp2, '../imgs/slides/resized/' . $newName2));
    create_thumbnail('../imgs/slides/resized/' . $newName2, '../imgs/slides/' . $newName2,  450, 600);
    unlink('../imgs/slides/resized/' . $newName2);
    unlink('../imgs/slides/' .  $oldsl_mobimage);

    echo "<div class='alert alert-success'><p>Slider have been update Successfully!</p></div>";
  }
}


$Query = mysqli_query($Conn, "SELECT * FROM sm_slider WHERE sl_id = '$sl_id'") or die(mysqli_error($Conn));
$row = mysqli_fetch_assoc($Query);

?>


<div class="MainHeight">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form class="form-horizontal" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <div class="col-sm-6">
              <label for="sl_image">Select Image: <span class="label label-success">For PC (Size: 1350 x 540)</span></label>
              <input type="file" class="form-control" style="margin-bottom: 10px;" name="sl_image" id="sl_image">
              <input type="hidden" name="oldsl_image" id="oldsl_image" value="<?= $row['sl_image']; ?>">
              <img src="../_img/slides/<?= $row['sl_image']; ?>" style="height: 100px;" alt="">
            </div>
            <div class="col-sm-6">
              <label for="sl_mobimage">Select Image: <span class="label label-danger">For Mobile (Size: 450 x 600)</span></label>
              <input type="file" class="form-control" style="margin-bottom: 10px;" name="sl_mobimage" id="sl_mobimage">
              <input type="hidden" name="oldsl_mobimage" id="oldsl_mobimage" value="<?= $row['sl_mobimage']; ?>">
              <img src="../_img/slides/<?= $row['sl_mobimage']; ?>" style="height: 100px;" alt="">
            </div>
            <div class="col-sm-6" style="margin-top: 20px;">
              <small style="color: red;">If you want to change images, Please select both images.</small>
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_url">URL:</label> -->
          <input type="hidden" class="form-control" name="sl_url" value="<?= $row['sl_url']; ?>" placeholder="Optional">
          <!-- </div>
          </div> -->
          <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_heading">Heading:</label>
              <input type="text" class="form-control" name="sl_heading" value="<?= $row['sl_heading']; ?>">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_text">Text:<BR></label>
              <textarea class="form-control" name="sl_text" rows="5"><?= $row['sl_text']; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <input type="submit" name="submit" class="btn btn-primary" value="Save" style="float: right;">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!----------------------------------------------------------------------------------------------------->


  <?php
