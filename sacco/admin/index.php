
<?php
session_start();
require_once('db/conn.php');

error_reporting(0);




if(isset($_GET['id_on'])) {
    
   
   header("Location:access/login.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Home</title>
<link rel="stylesheet" type="text/css" href="design/style.css" />
</head>

<body>
<img align="middle" src="image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">   


<div id="header">
<h3 align="center">WELCOME TO OUR ONLINE SACCO SYSTEM</h3>
<img src="image/logo.jpg" alt="Sacco logo" align="center" width="70%" /></br>

 <a href="index.php?id_on='on'" style="padding-bottom:3%;"><img src="image/enter.png" /></a>
</td>
 <p>
 <p>
</div>
   </div>


</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
