<?php
require "libraries/loginchecker.php";
if (isset($_GET['OrderType'])) {
  $GETOrderID = $_GET['OrderType'];
}
?>




<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="SpacingBox"></div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage Email Subscribers</h1>
      </div>

      <div class="SpacingBox"></div>
      <div class="TabLinks">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9"></div>
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          <a href="index.php?view=email">Send Email</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1"></div>

      </div>

      <div class="SpacingBox"></div>
    </div>

  </div>
</div>

<?php


if (isset($_POST['Delete'])) {
  $sub_id = $_POST['sub_id'];

  $DellData =  mysqli_query($login_db, "DELETE FROM sm_subscription WHERE sub_id='$sub_id'") or die("Error Deleting");
  echo "<div class='alert alert-success'>Your Email has been deleted</div>";
}

?>


<div class="container-fluid">
  <div class="Table table-responsive">
    <table width="100%" border="1">
      <tbody>
        <tr class="Thead">
          <td width="5%">ID</td>
          <td width="30">Name</td>
          <td width="60%">E-MAIL</td>
          <td width="5%">DEL</td>
        </tr>
        <?php

        $GETOrder =  mysqli_query($login_db, "SELECT * FROM sm_subscription WHERE sub_end='1'") or die("mysql_error()");
        while ($row = mysqli_fetch_assoc($GETOrder)) {
          $sub_id        = $row['sub_id'];
          $sub_fullname        = $row['sub_fullname'];
          $sub_cell          = $row['sub_cell'];
          $sub_email          = $row['sub_email'];
          $sub_address      = $row['sub_address'];
          $sub_imp_news      = $row['sub_imp_news'];
          $sub_end          = $row['sub_end'];


        ?>

          <tr>
            <td><?php echo $sub_id; ?></td>
            <td><?php echo $sub_fullname; ?></td>
            <td><?php echo $sub_email; ?></td>
            <td>
              <form method="POST">
                <input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
                <input type="submit" name="Delete" id="btn" value="Delete">
              </form>
            </td>


          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>