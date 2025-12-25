<?php
				require "libraries/loginchecker.php";
									
?>

<!--------------------------------------------------------------------------------------------------->

  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
  
<!--------------------------------------------------------------------------------------------------->

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Add Reviews</h1>
  </div>   
  <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
<div class="SpacingBox"></div>	
<a href="index.php?view=view_testimonial"><img src="images/img_testimonials.png" width="80%"></a></div> 
  </div>
</div></div>


<?php
        if (isset($_POST['submit'])){

				$tst_page_name                    = $_POST['tst_page_name'];
				$tst_page_url                     = $_POST['tst_page_url'];
				$tst_page_rating                  = $_POST['tst_page_rating'];
				$tst_user                         = $_POST['tst_user'];
				$tst_user_rating                  = $_POST['tst_user_rating'];
				$tst_cmp_name                     = $_POST['tst_cmp_name'];
				$tst_testimonial                  = $_POST['tst_testimonial'];
				
				
				if($tst_page_name&&$tst_page_url&&$tst_page_rating&&$tst_user&&$tst_user_rating&&$tst_cmp_name&&$tst_testimonial){
					
             if(isset($_FILES)){
   
               //get data form image with extension
	
                $file 				= addslashes(file_get_contents($_FILES['tst_page_logo']['tmp_name']));
                $file_name 			= addslashes($_FILES['tst_page_logo']['name']);
                $file_size 			= getimagesize($_FILES['tst_page_logo']['tmp_name']);
                $file_tmp 			= $_FILES['tst_page_logo']['tmp_name'];
               

                //give the random name genator
                $randomNumber = rand(0000, 99999);

                //give the random name image
                $newName = $randomNumber . $file_name;
				
				
				
				
				 $InsertItem =  mysqli_query($login_db, "INSERT into sms_testimonial VALUES('',
				 '$tst_page_name',
		         '$tst_page_url',
		         '$newName',
		         '$tst_page_rating',
		         '$tst_user',
		         '$tst_user_rating',
		         '$tst_cmp_name',
		         '$tst_testimonial',
				 '1')") or die("Error with querry");
				 
				    $Imageuploaded 	= move_uploaded_file($file_tmp, '../img/reviews/'.$newName);
				echo "<div class='alert alert-success'>Review has been Added</div>";
		}
				
				}else{
					echo "<div class='alert alert-danger'><strong>Faild!</strong>  Please fill all fields.</div>";
				}
		}
			
?>


<div class="SpacingBox"></div>	

		<div class="wrapper">	
	
<div class="container form">

<form id="form1" name="form1" method="post" class="form-horizontal"enctype="multipart/form-data" >

      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_page_name">Page Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_page_name" placeholder="Example: Lappy Book">
  </div>
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_page_url">Page URL:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_page_url" placeholder="Example: facebook.com">
    </div>
  </div>
   
   <div class="form-group">
    <label class="control-label col-sm-3" for="tst_page_logo">Social Media Logo:</label>
    <div class="col-sm-9">
      <input type="file" class="form-control" name="tst_page_logo">
    </div>
  </div>
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_page_rating">Social Media page Rating:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_page_rating" placeholder="Example: 4.5 / 5">
    </div>
  </div>
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_user">User Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_user" placeholder="Example: Nick">
    </div>
  </div>
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_user_rating">Viewer Rating:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_user_rating" placeholder="Example: 4.5 / 5">
    </div>
  </div>
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_cmp_name">Social Media page Name:</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="tst_cmp_name" placeholder="Example: Google My Business">
    </div>
  </div>
   
  
      <div class="form-group">
    <label class="control-label col-sm-3" for="tst_testimonial">Testimonial Text:</label>
    <div class="col-sm-9">
      <textarea type="text" class="form-control" name="tst_testimonial" id="summernote" placeholder="Example: Google My Business"></textarea>
    </div>
  </div>
   
  <div class="form-group"> 
    <div class="col-sm-12">
      <input type="submit" name="submit" id="btn" value="Save" style="float:right;">
    </div>
  </div>
  
</form>
</div>
	
</div>
	
<div class="SpacingBox"></div>	
	
      <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>