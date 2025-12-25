<?php

session_start();

//distory session
session_destroy();
echo "<script>window.location.href = 'index.php'</script>";
echo '<table width="100%" height="100%" border="0">
  <tr>
    <td align="center" valign="middle"><font size="5">Confirm for logout your administrator<br><a href="index.php"><font size="5" color="#00AFEF">COMFIRM</a></font></font></td>
  </tr>
</table>';
?>

