<div class="HomeHeading">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | New Membership</h1>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
    $('#example').dataTable();
  });
</script>
<?php
if (isset($_POST['delete_user'])) {
  $member_id = $_POST['member_id'];
  $DeleteData = "DELETE FROM sm_membership_club WHERE member_id='$member_id'";
  $DataDelete = mysqli_query($login_db, $DeleteData) or die("Error 01012");
  echo "<div class='alert alert-danger'>User has been deleted.</div>";
}
?>
<div class="MainHeight">
  <div class="container">
    <?php

    //PHP GuestBook using mySQL databae

    //connect to the data base


    // if (isset($_POST['submit_membership'])) {
    //     $tour_pkg            = $_POST['membership_name'];
    //     $price               = $_POST['price'];
    //         $sql = "INSERT INTO city_breaks (img,name,stay_days,flight,hotel__name,deals,tour_pkg,price) 
    // VALUES ('$newName','$name','$stay_days','$flight','$hotel__name','$deals','$tour_pkg','$price')";
    //         $ChechkAgain = mysqli_query($Conn, $sql) or die("Error 1926");
    //         echo "<div class='alert alert-success'>Break added successfully.</div>";

    //         //move the image form pc to server with random name
    //         move_uploaded_file($file_tmp, '../images/breaks/resized/' . $newName);
    //         include "../images/breaks/resized/imageinc.php";
    //         create_thumbnail('../images/breaks/resized/' . $newName, '../images/breaks/' . $newName,  600, 400);
    //         unlink('../images/breaks/resized/' . $newName);
    // } 
    ?>


    <div class="row">
      <div class="col-sm-12">
        <form class="form-inline" action="" method="post">
          <div class="form-group">
            <label for="email">New Memership:</label>
            <select class="form-control" name="membership_name">
              <option>Rejected</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
          </div>
          <div class="form-group">
            <button type="submit" name="submit_membership">Submit</button>
          </div>

        </form>
      </div>
    </div>



    <div class="MainHeight">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


            <!----------------------------------------------------------------------------------------------------------------------------->


            <div class="table-responsive">
              <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                <thead>

                  <tr>
                    <th>SR #.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Status</th>
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  if (isset($_GET['start'])) {
                    $start = $_GET['start'];
                  }
                  //max display per page
                  $per_page = 100;
                  //count records
                  $record_count = mysqli_num_rows(mysqli_query($login_db, "SELECT * FROM  sm_membership_club  Order by member_id  DESC"));

                  //count max page
                  $max_pages = $record_count / $per_page; //may come out as decimal

                  if (!isset($start))
                    $start = 0;

                  //Next page options codes
                  //setup prev and next variables
                  $prev = $start - $per_page;
                  $next = $start + $per_page;



                  $getuser = "SELECT * FROM  sm_membership_club WHERE sm_ed='0'   Order by member_id ASC LIMIT $start, $per_page";
                  $membership_record = mysqli_query($login_db, $getuser) or die("Member Data Issue");
                  $i = 1;
                  while ($row = mysqli_fetch_array($membership_record)) {
                  ?>
                    <tr class='Default'>
                      <td align='center'><?php echo $i; ?></td>
                      <td align='center'><?php echo $row['name']; ?></td>
                      <td align='center'><?php echo $row['email']; ?></td>
                      <td><?php echo $row['contact_no']; ?></td>
                      <td align='center'><?php echo $row['address']; ?></td>
                      <td align='center'>

                        <?php if ($row['sm_ed'] == '1') {
                        ?>
                          <span class="badge badge-success">Accepted</span>
                        <?php } else {
                        ?>
                          <span class="badge badge-success">pending</span><?php
                                                                        } ?>
                      </td>


                      <!-- <td class='center'><a href='index.php?view=edit_user&userID=<?php echo $row['member_id']; ?>'><img src='images/edit_admin.png'></a></td> -->

                      <form id='form1' name='form1' method='post' action='index.php?view=all_membership_view'>
                        <td class='center'>
                          <input type='hidden' id='id' name='member_id' value='<?php echo $row['member_id']; ?>'>
                          <input type='submit' id='delete_user' name='delete_user' value='Delete' class="btn btn-danger">
                        </td>
                      </form>
                    </tr>

                  <?php } ?>


                </tbody>
                <tfoot>
                  <tr>
                    <th>SR #.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <!-- <th>Edit</th> -->
                    <th>Delete</th>
                  </tr>
                </tfoot>
              </table>
            </div>

            <!----------------------------------------------------------------------------------------------------------------------------->

            <nav aria-label="Page navigation">
              <ul class="pagination">



                <?php

                $pagelink = "index.php?view=view_cards&start=";


                //Show Erow Button at 1st Pagination
                #######################################
                if (!($start <= 0)) { ?>
                  <li class="page-item">
                    <a class="page-link" href='<?php echo "$pagelink$prev"; ?><?php if (isset($cndstatus)) {
                                                                                echo "&cndstatus=$cndstatus";
                                                                              } ?>' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>
                  </li>
                <?php } else { ?>
                  <li class='disabled page-item '>
                    <a class="page-link" aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a>
                  </li>
                  <?php
                }
                #######################################

                //Generate Number of Buttons & Print
                #######################################

                $i = 1;
                for ($x = 0; $x < $record_count; $x = $x + $per_page) {
                  if ($start != $x) { ?>
                    <li class="page-item"><a class="page-link" href='<?php echo "$pagelink$x";  ?><?php if (isset($cndstatus)) {
                                                                                                    echo "&cndstatus=$cndstatus";
                                                                                                  } ?>'><?php echo $i; ?></a></li>
                  <?php } else { ?>
                    <li class='active page-item'><a class="page-link" href='<?php echo "$pagelink$x";   ?><?php if (isset($cndstatus)) {
                                                                                                            echo "&cndstatus=$cndstatus";
                                                                                                          } ?>'><?php echo $i; ?></a></li>
                  <?php
                  }
                  $i++;
                }
                #######################################

                //show next button
                if (!($start >= $record_count - $per_page)) { ?>
                  <li class="page-item">
                    <a class="page-link" href='<?php echo "$pagelink$next"; ?><?php if (isset($cndstatus)) {
                                                                                echo "&cndstatus=$cndstatus";
                                                                              } ?>' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a>
                  </li>
                <?php } else { ?>
                  <li class='disabled page-item '>
                    <a class="page-link" aria-label='Next'><span aria-hidden='true'>&raquo;</span></a>
                  </li>


                <?php } ?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>