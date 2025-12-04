<?php
				require "libraries/loginchecker.php";
									
require 'phpmailer/PHPMailerAutoload.php';
?>

<div class="HomeHeading">
<div class="container-fluid">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
   <h1><a href="index.php?view=home"><img src="images/back_icon.png" border="0"></a> | Compose Email</h1>
  </div> </div>
</div></div>



<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('Message');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>


<?php 
   
 
  
	 $GETOrder =  mysqli_query($login_db, "SELECT * FROM sm_subscription WHERE sub_end='1'") or die ("Error with query");
			While ($row = mysqli_fetch_assoc($GETOrder))
			{
	
		$sub_email 		     = $row['sub_email'];
		
		
if(isset($_POST['submit'])){
	
		
	$Message 		= $_POST['Message'];
	
		
		
 $mail = new PHPMailer;
 //$mail->isSMTP();
 $mail->Host='smtp.dime180.dizinc.com';
 $mail->Port=465;
 $mail->SMTPAuth=true;
 $mail->SMTPSecure='tls';
 $mail->Username='info@lappybook.com';
 $mail->Password='pakistan1947';
 $mail->setFrom('info@lappybook.com', 'Lappy Book');
 $mail->addAddress($sub_email);
 $mail->addReplyTo('info@lappybook.com');


 $mail->isHTML(true);
 $mail->Subject= "Update Available in Lappy Book" ;
 $mail->Body= "<style>
.Heading {
	color: #000000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 24px;
	font-weight: 100;
	background-color: #EEEEEE;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
.Details {
	color: #000000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 14px;
	font-weight: 100;
	background-color: #ffffff;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
.DetailsMessage {
	color: #000000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 14px;
	background-color: #FFFFFF;
	font-weight: 100;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
.Footer {
	color: #000000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 14px;
	font-weight: 100;
	background-color: #DBDBDB;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
.Footer {
	color: #000000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 14px;
	font-weight: 100;
	background-color: #DBDBDB;
	padding-top: 10px;
	padding-right: 10px;
	padding-bottom: 10px;
	padding-left: 10px;
	}
.Footer a {
	color: #FF0000;
	font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif;
	font-size: 14px;
	font-weight: 100;
	}
</style>

<TABLE style='BORDER-RIGHT: #CCCCCC 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #CCCCCC 1px solid; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; BORDER-LEFT: #CCCCCC 1px solid; PADDING-TOP: 0px; BORDER-BOTTOM: #CCCCCC 1px solid'
height=238 cellSpacing='0' cellPadding='0' width='800'>
  <tr>
    <td class='Heading'> <img src='https://lappybook.com/img/logo.svg'> </td>
  </tr>
  <tr>
    <td height='37' class='DetailsMessage'>Welcome to Lappy Book</td>
  </tr>
  <tr>
    <td height='83' bgcolor='#FFFFFF' class='Details'><table width='100%' border='0'>
  <tbody>
    <tr>
      <td width='100%'></td>
    </tr>
    <tr>
      <td>
	  Dear $sub_email, <BR>
	  $Message
	  <BR> Regards,<BR>
	  Lappy Book</td>
    </tr>
    <tr>
      <td height='40' bgcolor='#EEEEEE'><center>This E-Mail Powered by <a href=;http://swismax.com;>Swis MAX Solutions</center></td>
    </tr>
  </tbody>
</table></td>
  </tr>
</table>"; 

 if(!$mail->send()){
 	$Message = "<div class='alert alert-danger'><strong>Warning!</strong> Not sent.</div>";
 }
 else{
$Message = "<div class='alert alert-success'><strong>Success!</strong> Your E-MAIL has been sent to your subscribers.</div>";
 }
  }


}
			
?>
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>	

		<div class="wrapper">	
	<?php echo $Message; ?>
<div class="container form">
  <div class="row">
    <div class="col-sm-8">
    <form class="form-horizontal" method="post">
	 <div class="form-group">
    <label for="Message">Write Email:</label>
      <textarea class="form-control" name="Message"></textarea>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" id="btn" value="Send Email" style="float: right;">
    </div>
  </div>
</form>
    </div>
    <div class="col-sm-4">
    </div>
  </div>
</div>	</div>		
				
<div class="SpacingBox"></div>	
<div class="SpacingBox"></div>			
			
			
			