	<div class="account_auctionlist_content">
	<div class="back_icon"><table width="300" border="0">
  <tr class="back_icon_text">
    <td width="46"><a href="index.php?view=home"><img src="../_img/back_icon.png" border="0"></a></td>
    <td width="20">|</td>
    <td width="212">Add Auction</td>
  </tr>
</table></div>


<?php
 require "functions.php";
//PHP GuestBook using mySQL databae

 //connect to the data base
		

 if ($_POST['submit'])
{
$date = $date_year-$date_month-$date_day;
$name = $_POST['name'];
$desccription = $_POST['desccription'];
$date = $_POST['date'];
$keywords = $_POST['keywords'];


if ($name&&$desccription&&$date)
{

 
  //find username for additions
  $username_user = $_SESSION['username'];
  //adds feeds
  $querypost = mysqli_query($login_db, "INSERT INTO acution_list VALUES ('','asfasfasdf','dsfsdfdsf','sdfsdfdsf','asfsdfsdfsdf','s','s','s','s','s','s','s')");
  echo "<span class='index_heading'>Please Wait... <img src='images/loading.gif'></span><meta http-equiv='refresh' content='2'>";

}
 else
     echo"<table width='600' border='0'>
  <tr>
    <td width='97' class='details'><font color='#ff0000'>Error</td>
    <td width='487' class='details' bgcolor='#DDD' ><font color='#ff0000'>Please fill out all fields!</span></td>
  </tr>
</table>";
}




$current_month = date('m');
$current_day = date('d');
$current_year = date('Y');

 echo "
<form id='form1' name='form1' method='post' action='add_auction.php'>
<table width='980' border='0'>
  <tr>
    <td width='507'>&nbsp;</td>
    <td width='177'>&nbsp;<input type='submit' name='submit' id='submita' value='Save Details' /></td>
  </tr>
</table>
  <table width='600' border='0'>
    <tr>
      <td width='168'><label for='name' class='details'>Name:</label></td>
      <td width='416'><input type='text' name='name' id='name'/></td>
    </tr>
    <tr>
      <td><label for='keywords' class='details'>Passport No:</label></td>
      <td class='details'><input type='text' name='keywords' id='keywords' />
	  (Exp: CN-0765781)</td>
    </tr>
    <tr>
      <td><label for='date' class='details'>Date:</label></td>
      <td  class='details'><input name='date' type='text' id='date' /> 
        (Year-Month-Day)</td>
    </tr>
    <tr>
      <td align='left' valign='top' class='details'><label for='desccription'>Desccription:</label></td>
      <td><textarea name='desccription' id='desccription' cols='45' rows='5'></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><table width='870' border='0'>
  <tr>
    <td width='507'>&nbsp;</td>
    <td width='177'>&nbsp;<input type='submit' name='submit' id='submita' value='Save Details' /></td>
  </tr>
</table></td>
    </tr>
  </table>
</form>
 
 ";
 
 
 

?>
			</div>
	
			