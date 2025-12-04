<style>
    .badge-success {
  background-color: #5cc45e;
    }
    .badge-success:hover {
    background-color: #356635;
    }
    .badge-info {
  background-color: #3a87ad;
    }
    .badge-info:hover {
    background-color: #2d6987;
    }
    .badge-golden {
  background-color: #FFD700;
    }
    .badge-golden:hover {
    background-color:#FFD700;
    }
    .badge-blue {
    background-color: #0000FF;
    }
    .badge-blue:hover {
    background-color:#0000FF;
    }
    .badge-sliver {
    background-color: #C0C0C0;
    }
    .badge-sliver:hover {
    background-color:#C0C0C0;
    }
    
</style>
<div class="HomeHeading">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Membership</h1>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['delete_user'])) {
    $member_id = $_POST['member_id'];
    $DeleteData = "DELETE FROM sm_membership_club WHERE member_id='$member_id'";
    $DataDelete = mysqli_query($login_db, $DeleteData) or die("Error 01012");
    echo "<div class='alert alert-danger'>User has been deleted.</div>";
}
?>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#example').dataTable();
    });
</script>
<?php
if (isset($_POST['add_new_membership'])) {
?>
    <div class="container">
    <h4 class="text-center">Add New Membership</h4>
        <form method="post" action="">
            <div class="col-md-4">
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="card_name">Membership Type</label>
                    <select class="form-control" name="card_name">
                        <option value="0">Rejected</option>
                        <option value="1">Golden</option>
                        <option value="2">Blue</option>
                        <option value="3">Silver</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-primary" name="save_membership_new">
                <div class="spacingBox"></div>
            </div>
            </div>
        </form>
    <!-- </div> -->
<?php
} else if(isset($_POST['save_membership_new'])) {
    $card_name = $_POST['card_name'];
    $email     = $_POST['email'];
    $user_check_email = mysqli_query($login_db,"SELECT * from `sm_membership_club` where `email`='$email'");
    if(mysqli_num_rows($user_check_email)>0){
        $membership_save = mysqli_query($login_db,"UPDATE `sm_membership_club` set `card_name`='$card_name',`sm_ed`='1' where `email`='$email'");
        if($card_name=='0'){
            $membership_rejected = mysqli_query($login_db,"DELETE FROM `sm_membership_club` WHERE `email`='$email' and `member_id`='$_SESSION[sm_id]") or die("Error : Membership Rejected 12031");
        }
        if($membership_save){
            echo "<div class='alert alert-success'>Membership has assigned to ".$email."</div>"; 
        }
    }else{
        echo "<div class='alert alert-success'>User Record Does Not Exist</div>"; 
    }
    }
    ?>
        <div class="MainHeight">
        <div class="container">
            <div class="MainHeight">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <div class="text-right">
                                    <form method="post" action="index.php?view=membership_view&&add_new">
                                        <button class="btn" name="add_new_membership" type="submit">New Membership</button>
                                    </form>
                                </div>
                                <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0" border="0" class="display" id="example">
                                    <thead>
                                        <tr>
                                            <th>SR #.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Membership Type</th>
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
                                        $getuser = "SELECT * FROM  sm_membership_club  Order by member_id ASC LIMIT $start, $per_page";
                                        $membership_record = mysqli_query($login_db, $getuser) or die("Member Data Issue");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($membership_record)) {
                                        ?>
                                            <tr class='Default'>
                                                <td align='center'><?php echo $i; ?></td>
                                                <td align='center'><?php echo $row['name']; ?></td>
                                                <td align='center'><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['contact_no']; ?></td>
                                                <td><?php echo $row['address']; ?></td>
                                                <td align='center'><?php 
                                                 if($row['card_name']=='0'){
                                                    ?>
                                                     <span class="badge badge-danger">Rejected</span>
                                                    <?php
                                                 }elseif($row['card_name']=='1'){
                                                    ?>
                                                     <span class="badge badge-golden">Golden</span>
                                                    <?php
                                                 }else if($row['card_name']=='2'){
                                                    ?>
                                                     <span class="badge badge-blue">Blue</span>
                                                    <?php
                                                 }else if($row['card_name']=='3'){
                                                    ?>
                                                    <span class="badge badge-silver">Silver</span>
                                                   <?php
                                                 }else{
                                                    ?>
                                                    <span class="badge badge-primary">Pending</span>
                                                   <?php
                                                 } ?></td>
                                                <td align='center'>
                                                    <?php if ($row['sm_ed'] == '1') {
                                                    ?>
                                                        <span class="badge badge-success">Accepted</span>
                                                    <?php } else {
                                                    ?>
                                                        <span class="badge badge-info">pending</span><?php
                                                                                                    } ?>
                                                </td>
                                                <!-- <td class='center'><a href='index.php?view=edit_user&userID=<?php echo $row['member_id']; ?>'><img src='images/edit_admin.png'></a></td> -->
                                                <form id='form1' name='form1' method='post' action='index.php?view=membership_view'>
                                                    <td class='center'>
                                                        <input type='hidden' id='id' name='member_id' value='<?php echo $row['member_id']; ?>'>
                                                        <input type='submit' id='delete_user' name='delete_user' value='Delete' class="btn btn-danger">
                                                    </td>
                                                </form>
                                            </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>SR #.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Membership Type</th>
                                            <th>Status</th>
                                            <!-- <th>Edit</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
