<?php
				require "libraries/loginchecker.php";
									
?>

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add FAQ's</h1>
  </div> </div>
</div></div>


<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('answer');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>


<?php
/*=================================Insert Query Codes====================================*/
if(isset($_POST['publish'])){
	
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	$answer_update_string = mysqli_real_escape_string($dbcon, $answer);
	
if($question&&$answer){

  $sql = mysqli_query($dbcon, "INSERT INTO ptcs_faqs (faq_id, faq_question, faq_answer) VALUES ('', '$question', '$answer_update_string')");

 
  
echo "<div class='alert alert-success'>Your FAQ's Has Been Published Successfully</div>";
}
else{
echo "<div class='alert alert-danger'><Please insert Data.</div>";
}

}
?>
<div class="SpacingBox"></div>	

		<div class="wrapper">	
	
<div class="container form">
  <div class="row">
    <div class="col-sm-8">
    <form class="form-horizontal" method="post"> 
	<div class="form-group">
    <label class="control-label col-sm-3" for="question">Question:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="question">
    </div>
    </div>
   <div class="form-group">
    <label class="control-label col-sm-3" for="answer">Answer:</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="answer" placeholder="Type A Description Here...!"></textarea>
    </div>
  </div>
	<div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="publish" id="btn" value="Publish" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>	</div>		
