<?php
require "libraries/loginchecker.php";

?>


<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Web Slider</h1>
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
    CKEDITOR.replace('sl_text');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>

<?php

if (isset($_POST['submit'])) {


  $sl_image      =  $_FILES["sl_image"]["tmp_name"];
  $sl_mobimage     =  $_FILES["sl_mobimage"]["tmp_name"];
  $sl_url    =  $_POST['sl_url'];
  $sl_heading    =  $_POST['sl_heading'];
  $sl_text   =  htmlspecialchars($_POST['sl_text']);

  if (empty($sl_image)) {
    echo "<div class='alert alert-danger'>You haven't chosen any image. Please select an image.</div>";
  } else {
    if (empty($sl_mobimage)) {
      echo "<div class='alert alert-danger'>You haven't chosen any image for mobile.Please select an image for mobile.</div>";
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
      $image1 = addslashes(file_get_contents($_FILES['sl_mobimage']['tmp_name']));
      $image_name1 = addslashes($_FILES['sl_mobimage']['name']);
      $image_size1 = getimagesize($_FILES['sl_mobimage']['tmp_name']);
      $file_tmp1 = $_FILES['sl_mobimage']['tmp_name'];


      //give the random name genator
      $randomNumber1 = rand(0000, 99999);
      //give the random name image
      $newName1 = $randomNumber1 . $image_name1;

      $insert = "INSERT INTO sm_slider (sl_image, sl_mobimage, sl_url, sl_heading, sl_text) VALUES('$newName', '$newName1', '$sl_url', '$sl_heading', '$sl_text')";
      $res = mysqli_query($dbcon, $insert);


      include "../imgs/slides/resized/imageinc.php";
      //move the image form pc to server with random name
      move_uploaded_file($file_tmp, '../imgs/slides/resized/' . $newName);
      create_thumbnail('../imgs/slides/resized/' . $newName, '../imgs/slides/' . $newName,  1489, 615);
      unlink('../imgs/slides/resized/' . $newName);

      //move the image form pc to server with random name
      move_uploaded_file($file_tmp1, '../imgs/slides/resized/' . $newName1);
      create_thumbnail('../imgs/slides/resized/' . $newName1, '../imgs/slides/' . $newName1,  624, 1025);
      unlink('../imgs/slides/resized/' . $newName1);

      echo "<div class='alert alert-success'><p>Your Slides has been uploaded.</p></div>";
    }
  }
}




if (isset($_POST['delete_webslider'])) {

  $sl_image = $_POST['sl_image'];
  $sl_mobimage = $_POST['sl_mobimage'];
  $sl_id = $_POST['sl_id'];

  $delete = "DELETE FROM sm_slider WHERE sl_id='$sl_id'";
  $dell = mysqli_query($dbcon, $delete);
  unlink('../imgs/slides/' . $sl_image);
  unlink('../imgs/slides/' . $sl_mobimage);

  echo "<div class='alert alert-danger'><p>DELETE - Slide has been deleted.</p></div>";
}


?>


<div class="SpacingBox"></div>

<div class="MainHeight">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <form class="form-horizontal" enctype="multipart/form-data" action="index.php?view=web_slider" method="post">
          <div class="form-group">
            <div class="col-sm-6">
              <label for="sl_image">Select Image: <span class="label label-success">For PC (Size: 1350 x 540)</span></label>
              <input type="file" class="form-control" name="sl_image" id="sl_image">
            </div>
            <div class="col-sm-6">
              <label for="sl_mobimage">Select Image: <span class="label label-danger">For Mobile (Size: 450 x 600)</span></label>
              <input type="file" class="form-control" name="sl_mobimage" id="sl_mobimage">
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_url">URL:</label> -->
              <input type="hidden" class="form-control" name="sl_url" placeholder="Optional">
            <!-- </div>
          </div> -->
          <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_heading">Heading:</label>
              <input type="text" class="form-control" name="sl_heading">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <label for="sl_text">Text:<BR></label>
              <textarea class="form-control" name="sl_text" rows="5"></textarea>
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

  <div class="NewsHead">
    <div class="container-fluid">
      <div class="row">



        <!------------------------------------------------------------------------->

        <div class="SpacingBox"></div>
        <div class="SpacingBox"></div>

        <div class="container-fluid">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Image</th>
                      <th scope="col">Mobile Image</th>
                      <th scope="col">Cotent</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php
                    $GetWebSlider = "SELECT * FROM sm_slider";
                    $ress = mysqli_query($dbcon, $GetWebSlider);
                    while ($srows = mysqli_fetch_array($ress)) {

                      $Details = htmlspecialchars_decode($srows['sl_text']);

                    ?>

                      <tr>
                        <td><?= $srows['sl_id'] ?></td>
                        <td><img src="../imgs/slides/<?= $srows['sl_image']; ?>" height="100"></td>
                        <td><img src="../imgs/slides/<?= $srows['sl_mobimage']; ?>" height="100"></td>
                        <td style="width: 30%;"><?= $srows['sl_heading']; ?><BR><small><?= $Details; ?></small></td>
                        <form id='form1' name='form1' method='post' action='index.php?view=web_slider'>
                          <td>
                            <a href="index.php?view=slider_edit&sl_id=<?= $srows['sl_id']; ?>" class="btn btn-primary">Edit</a>
                            <input type='hidden' id='sl_id' name='sl_id' value='<?= $srows['sl_id']; ?>'>
                            <input type='hidden' id='sl_image' name='sl_image' value='<?= $srows['sl_image']; ?>'>
                            <input type='hidden' id='sl_mobimage' name='sl_mobimage' value='<?= $srows['sl_mobimage']; ?>'>
                            <input type='submit' class='btn btn-danger' name='delete_webslider' value='Delete'>
                          </td>
                        </form>
                      </tr>
                    <?php } ?>
                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>