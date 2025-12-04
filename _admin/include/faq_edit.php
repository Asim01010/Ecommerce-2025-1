<?php
				require "libraries/loginchecker.php";
									
?>

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=faq"><img src="images/back_icon.png" border="0"></a> | Edit FAQ's</h1>
  </div> </div>
</div></div>

<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('answer_update');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>


<?php
/*===============================Edit Cides======================================*/

if(isset($_POST['update'])){

	$edit_id			=	$_POST['id'];
	$question_update	=	$_POST['question_update'];
	$answer_update		=	$_POST['answer_update'];
	
	$answer_update_string = mysqli_real_escape_string($dbcon, $answer_update);
	
if ($question_update&&$answer_update){	
	
$sql_edit =	 mysqli_query($dbcon, "UPDATE ptcs_faqs SET faq_question='$question_update', faq_answer='$answer_update_string' WHERE faq_id='$edit_id'");
echo "<div class='alert alert-success'>Your faqs has been edited.</div>";
}
else {
echo "<div class='alert alert-danger'>Failed ! Please insert data.</div>";
}
}

	//
		$edit = $_GET['edit'];

$GetFaqs =  mysqli_query($dbcon, "SELECT * FROM ptcs_faqs WHERE faq_id='$edit'");
if ($row=mysqli_fetch_array($GetFaqs)){		

	$id			= $row['faq_id'];	
	$question  	= $row['faq_question'];
	$answer 	= $row['faq_answer'];
}
?>

<div class="SpacingBox"></div>	

		<div class="wrapper">	
	
<div class="container form">
  <div class="row">
    <div class="col-sm-8">
    <form class="form-horizontal" method="post"> 
	<div class="form-group">
    <label class="control-label col-sm-3" for="id"></label>
    <div class="col-sm-9">
      <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" readonly >
    </div>
  </div>
	<div class="form-group">
    <label class="control-label col-sm-3" for="question_update">Question</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="question_update" value="<?php echo $question; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="answer_update">Description:</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="answer_update"><?php echo $answer; ?></textarea>
    </div>
  </div> <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="update" id="btn" value="Save" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>	</div>		
				

	