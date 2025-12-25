<?php
				require "libraries/loginchecker.php";
									
?><!-- 
ADMIN DESIGNED AND DEVELOPED BY SWISMAX SOLUTIONS
info@swismax.com | webexpert786@hotmail.co.uk
www.swismax.com
03125190928, 03215001033
-->


<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Edit Page</h1>
  </div>
</div></div>



<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('content_text');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>



<div class="wrapper">


<?php
$content = $_GET['content'];
$get_content = mysqli_query($dbcon, "SELECT * FROM im_page_content WHERE page_id='$content'") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($get_content))
		{
			
			
		     $content_id          = $row['page_id'];
			 $content_heading     = $row['page_heading'];
			 $content_text        = $row['page_content'];
			echo "<div class='container form'>
  <div class='row'>
   <div class='col-sm-1'>
    </div>
    <div class='col-sm-9'>
    <form class='form-horizontal' action='index.php?view=save_page' method='post'>
  <div class='form-group'>
    <label class='control-label col-sm-2' for='content_id'>Page No.</label>
    <div class='col-sm-10'>
      <input type='text' class='form-control' name='content_id' value='$content_id'>
    </div>
  </div>
   <div class='form-group'>
    <label class='control-label col-sm-2' for='content_heading'>Page Name:</label>
    <div class='col-sm-10'>
      <input type='text' class='form-control' name='content_heading' value='$content_heading'>
    </div>
  </div>
 <div class='form-group'> 
        <label class='control-label col-sm-2' for='content_text'>Detail:</label> 
   <div class='col-sm-10'>		
      	<textarea name='content_text' id='content_text' class='form-control' rows='15'><?php echo $content_text; ?></textarea>
        </div></div>	
  <div class='form-group'> 
    <div class='col-sm-offset-2 col-sm-10'>
      <input type='submit' name='submit' value='Save' id='btn' style='float: right;'>
    </div>
  </div>
</form>
    </div>";
	  } ?>
    <div class="col-sm-2">
    </div>
  </div>
</div></div>
   	
	
			