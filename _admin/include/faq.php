<?php
				require "libraries/loginchecker.php";
									
?>

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Manage FAQ's</h1>
  </div> </div>
</div></div>


<?php
/*===========================================Delete Query Codea==========================================*/

if(isset($_POST['id'])) {
  $id= $_POST['id'];
}  else {
  $id = -1;
}


    if(isset($_POST['delete'])){
		
		$GetDell =  mysqli_query($dbcon, "DELETE FROM ptcs_faqs WHERE faq_id='$id'") or die("ERROR");
		
		echo "<div class='alert alert-success'>Your Faq has been Deleted</div>";
		
		
	}
?>




 <div class="container-fluid">
   <div class="Table table-responsive">
	<table width="100%">
  <tbody>
    <tr class="Thead">
      <td width="40%">Question</td>
      <td width="50%">Answer</td>
      <td width="5%">Edit</td>
      <td width="5%">Delete</td>
    </tr>

<?php
/*==========================================All FAQ's View On The Page================================== */

$sql =  mysqli_query($dbcon, "select * from ptcs_faqs ");	
while($row = mysqli_fetch_array($sql)){
	
	$id			=	$row['faq_id'];	
	$question	=	$row['faq_question'];
	$answer		=	$row['faq_answer'];
?>
<tr class="Tbody">
  <td> <?php echo $question; ?></td>
  <td> <?php echo $answer; ?></td>
  <td><a href="index.php?view=faq_edit&edit=<?php echo $id; ?>"><img src="images/edit_admin.png" width="30" title="Edit" /></a></td>
  <td><form id="form1" name="form1" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>" id="id">
  <input type="submit" name="delete" value="Delete" id="btn">
  </form>
  </td>
</tr>
   

<?php } ?>

  </tbody>
</table>
</div>
</div>