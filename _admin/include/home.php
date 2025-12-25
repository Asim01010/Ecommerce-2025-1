<?php
require "libraries/loginchecker.php";

?>

<div class="AdminHead" style="min-height: 100vh;">

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 EditBoxes">
        <h1>Doche Dashboard</h1>
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total Products</p>
              <h2 style="margin-bottom: 0;">
                <?php
                $getPro = mysqli_query($dbcon, "SELECT * FROM sm_products");
                echo mysqli_num_rows($getPro);
                ?>
              </h2>
            </div>
          </div>
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total New Orders</p>
              <h2 style="margin-bottom: 0;">
                <?php
                $getNewOdr = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_status = 1");
                echo mysqli_num_rows($getNewOdr);
                ?>
              </h2>
            </div>
          </div>
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total Processed Orders</p>
              <h2 style="margin-bottom: 0;">
                <?php
                $getProcessOdr = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_status = 2");
                echo mysqli_num_rows($getProcessOdr);
                ?>
              </h2>
            </div>
          </div>
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total Delivered Orders</p>
              <h2 style="margin-bottom: 0;">
                <?php
                $getDeliverOdr = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_status = 3");
                echo mysqli_num_rows($getDeliverOdr);
                ?>
              </h2>
            </div>
          </div>
        </div>
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total Cancelled Orders</p>
              <h2 style="margin-bottom: 0;">
                <?php
                $getDeliverOdr = mysqli_query($dbcon, "SELECT * FROM sm_orders WHERE odr_status = 4");
                echo mysqli_num_rows($getDeliverOdr);
                ?>
              </h2>
            </div>
          </div>
          <!-- <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Last 7 Days Sales</p>
              <div style="display: flex; align-items: center; gap: 5px; margin-top: 20px;">
                <h2 style="margin: 0;">
                  <?php
                  $getDeliverOdr = mysqli_fetch_array(mysqli_query($dbcon, "SELECT sum(odr_total_price) FROM sm_orders WHERE odr_status = 3 AND odr_date_time >= DATE_SUB(CURDATE(), INTERVAL 7 DAY))"));
                  echo number_format($getDeliverOdr[0]);
                  ?>
                </h2>
                <span>PKR</span>
              </div>
            </div>
          </div> -->
          <div class="col-md-3">
            <div style="border: 2px solid red; padding: 20px 30px;">
              <p>Total Sales</p>
              <div style="display: flex; align-items: center; gap: 5px; margin-top: 20px;">
                <h2 style="margin: 0;">
                  <?php
                  $getDeliverOdr = mysqli_fetch_array(mysqli_query($dbcon, "SELECT sum(odr_total_price) FROM sm_orders WHERE odr_status = 3"));
                  echo number_format($getDeliverOdr[0]);
                  ?>
                </h2>
                <span>PKR</span>
              </div>
            </div>
          </div>
        </div>



        <h1>More Options</h1>
         <a href="index.php?view=edit_select_page"><img src="images/edit_page.png" border="0"></a>
        <a href="index.php?view=web_slider"><img src="images/manage_slider.png" border="0"></a>
        <h1>Manage Brands </h1>
        <a href="index.php?view=add_brands"><img src="images/add-brand.png" border="0" width="120px"></a>
        <a href="index.php?view=view_brands"><img src="images/manage-brand.png" border="0" width="120px"></a>
        <!-- <a href="index.php?view=manage_email_subscribe"><img src="images/icon_subscribe.png" border="0"></a> -->
        <!-- <a href="index.php?view=contact_page"><img src="images/contact_page.png" border="0"></a> -->
        <!-- <a href="index.php?view=change_password"><img src="images/change_password.png" border="0"></a> -->
        <!-- <a href="index.php?view=add_testimonial"><img src="images/add_testimonials.png" border="0"></a> -->

        <h1>Shop</h1>
        <a href="index.php?view=add_category"><img src="images/add_category.png" border="0"></a>

        <a href="index.php?view=add_product"><img src="images/icon_add_product.png" border="0"></a>

        <a href="index.php?view=manage_categories"><img src="images/icon_manage_categories.png" border="0"></a>
        <a href="index.php?view=manage_products"><img src="images/icon_manage_products.png" border="0"></a>


        <h1>Manage Orders</h1>

        <!-- <a href="index.php?view=manage_users"><img src="images/manage_users.png" border="0"></a> -->
        <a href="index.php?view=manage_order&OrderType=1"><img src="images/icon_manage_orders.png" border="0"></a>



        <h1>Shopping FAQ's</h1>




        <a href="index.php?view=faq_insert"><img src="images/icon_faq.png" border="0"></a>
        <a href="index.php?view=faq"><img src="images/icon_faq_manage.png" border="0"></a>


      <!-- <h1>Membership</h1>
				<a href="index.php?view=membership_view"><img src="images/membership.png" border="0"></a> -->

      </div>

      <!---------------------------------------------------------------->


      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="row">

          <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 SideBar">
            <div class="row ImageUpload">
              <p>Image Upload</p>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="img-preview"></div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <form class="frmUpload" id="form1" name="form1" method="post" action="">
                  <div class="form-group">
                    <label for="userImage"></label>
                    <input type="file" class="form-control" name="userImage" id="userImage">
                  </div>
                  <div class="form-group">
                    <div class=" col-sm-12">
                      <input type="submit" class="btn-upload" name="UPLOAD" id="btn" value="UPLOAD" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
              <h3>Copy URL for paste anywhere</h3>
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 UrlDetails">
                <div class="upload-msg"></div>
              </div>
            </div>
            <div class="SpacingBox"></div>
          </div> -->


          <!---------------------------------------------------------------->
          <?php

          //--------------------------------------------------------------------- Change Password --------------------------------------------------------//

          if (isset($_POST['change_tms_password'])) {
            // check fields

            $current_password       = md5($_POST['current_password']);
            $new_password         = md5($_POST['new_password']);
            $again_new_password       = md5($_POST['again_new_password']);

            // check password against db



            $queryget = mysqli_query($dbcon, "SELECT password FROM imt_user WHERE id='1'") or die("Query didnt work");
            $row = mysqli_fetch_assoc($queryget);

            $oldpassworddb = $row['password'];

            //check passwords
            if ($current_password == $oldpassworddb) {
              // check two new password
              if ($new_password == $again_new_password) {
                //success
                //change password in db

                $querychange = mysqli_query($dbcon, "
         UPDATE imt_user SET password='$new_password' WHERE id='1'
         ");
                session_destroy();
                $Message = "<div class='alert alert-success'>SUCCESS - Your password successfully change.</div>	 
		 <script language='javascript'>
		  window.location = 'logout.php';
		</script>";
              } else {
                $Message = "<div class='alert alert-danger'>NOT MATCH - New passwords don't match please try again.</div>";
              }
            } else {
              $Message = "<div class='alert alert-danger'>OLD PASSWORD - Old password dosent match! please try again.</div>";
            }
          }
          //--------------------------------------------------------------------- Change Password --------------------------------------------------------//


          ?>


          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ChangePassword">
            <p>Change Password</p>
            <?php echo $Message; ?>

            <form action="" method="POST">
              <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" name="current_password" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" class="form-control" id="new_password">
              </div>
              <div class="form-group">
                <label for="again_new_password">Again New Password:</label>
                <input type="password" name="again_new_password" class="form-control" id="again_new_password">
              </div>
              <input type="submit" name="change_tms_password" value="Save & Change" id="btn">
            </form>

          </div>

          <!---------------------------------------------------------------->


        </div>
      </div>

    </div>
  </div>

</div>