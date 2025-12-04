<?php
				require "libraries/loginchecker.php";
									
?>


<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=add_testimonial"><img src="images/back_icon.png" border="0"></a> | View Testimonial</h1>
  </div>   
  </div>
</div></div>


<?php 
 
    if(isset($_POST['Delete'])){
		
		 $tst_id      	= $_POST['tst_id'];
		 
		 $DeleteData =  mysqli_query($login_db, "DELETE FROM sms_testimonial WHERE tst_id='$tst_id'")or die("Error Delete");
		echo "<div class='alert alert-success'><strong>Success!</strong>  Testimonial has been deleted.</div>";
		
	}

?>

<div class="SpacingBox"></div>	
   <div class="container-fluid">
   <div class="Table table-responsive">
	<table width="100%" border="1">
  <tbody>
        <thead>
          <tr>
		<th>ID</th>
        <th>Page Name</th>
        <th>Page Url</th>
        <th>Username</th>
        <th>User Rating</th>
        <th>Company Page Name</th>
        <th>Delete</th>
          </tr>
        </thead>
 
 <?php



	
	$GetData =  mysqli_query($login_db, "SELECT * FROM  sms_testimonial") or die("Error with querry");
	while ($row = mysqli_fetch_array($GetData)){
		 
		 
                $tst_id                           = $row['tst_id'];
                $tst_page_name                    = $row['tst_page_name'];
				$tst_page_url                     = $row['tst_page_url'];
				$tst_page_rating                  = $row['tst_page_rating'];
				$tst_user                         = $row['tst_user'];
				$tst_user_rating                  = $row['tst_user_rating'];
				$tst_cmp_name                     = $row['tst_cmp_name'];
				$tst_testimonial                  = $row['tst_testimonial'];
				$tst_ed                           = $row['tst_ed'];
	
?>
	
 

     <tbody>
		
    		 <tr>
    <td><?php echo $tst_id; ?></td> 
    <td><?php echo $tst_page_name; ?></td> 
    <td><a href="<?php echo $tst_page_url; ?>" target="blank"><?php echo $tst_page_url; ?></a></td> 
    <td><?php echo $tst_user; ?></td> 
    <td><?php echo $tst_user_rating; ?></td> 
    <td><?php echo $tst_cmp_name; ?></td> 
    <td><form method="POST">
	<input type="hidden" name="tst_id" value="<?php echo $tst_id; ?>" id="btn">
	<input type="submit" name="Delete" value="Delete" id="btn">
	</form></td> 
    
	
	<?php } ?>
	
	
        
		</tr>
		</tbody>
      </table>

</div>
</div>
<div class="SpacingBox"></div>	
   

			
	
			