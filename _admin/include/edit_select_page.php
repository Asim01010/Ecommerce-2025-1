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
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Select Page for Edit</h1>
  </div>
  </div>
</div></div>



<div class="wrapper">


<?php
echo "<div id='menubar'>
<ul>";
//display data
$get_content = mysqli_query($dbcon, "SELECT * FROM im_page_content") or die("Error with querry");
				while ($row = mysqli_fetch_assoc($get_content))
{
 //get data
	$page_id = $row['page_id'];
	$page_heading = $row['cont_heading'];
 
 
 echo "
<li><a href='index.php?view=edit_page&content=$page_id'><img src='images/folder.png' /><br />$page_heading</a></li>
";
}
echo "</ul><div> ";
	
	
	

?>
   
   </div>
  
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	


