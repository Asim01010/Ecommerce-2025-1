<!-- 
ADMIN DESIGNED AND DEVELOPED BY SWISMAX SOLUTIONS
info@swismax.com | webexpert786@hotmail.co.uk
www.swismax.com
03125190928, 03215001033
--><?php
	require "libraries/loginchecker.php";



	//connect to the data base
	$content_id = $_POST['content_id'];
	$content_heading = $_POST['content_heading'];
	$content_text = $_POST['content_text'];

	// $blog_posted_name = $_POST['blog_username'];
	echo "<div class='HomeHeading'>
<div class='container-fluid'>
  <div class='row'>
   <h1><a href='index.php?view=home'><img src='images/back_icon.png' border='0'></a> | Save Page</h1>
  </div>
</div></div>";

	if (isset($content_id)) {

		$content_headings = mysqli_real_escape_string($dbcon, $content_heading);
		$content_texts = mysqli_real_escape_string($dbcon, $content_text);
		$change = mysqli_query($dbcon, "UPDATE im_page_content SET page_heading='$content_headings', page_content='$content_texts' WHERE page_id='$content_id'") or die("Error with query - 02076");

		echo "<div class='alert alert-success'><p>Your details has been submitted.<p>
     <a href='index.php?view=alert alert-success'>Go To Back</a></div>";
	} else {
		echo "<div class='alert alert-danger'><p>Oops! Error in updating. Please check in the Page ID & Page Details.</p></span><br>
<a href='index.php?view=alert alert-danger'><span class='red_text'><font size='6'>Go To Back</font></span></a></div>";
	}



	?>

</div>


<div class="SpacingBox"></div>
<div class="SpacingBox"></div>
<div class="SpacingBox"></div>