<?php

session_start();
require_once('../db/conn.php');

error_reporting(0);
$nat_id=$_GET['national_id'];


$sql="select * from members WHERE national_id = '$nat_id'";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($result);


$mem=$row['member_id'];
$fname=$row['first_name'];
$lname=$row['last_name'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px; text-align:center;">
<tr bgcolor="black" style="text-align:center; border-radius:5px; height:30px;">
<td align="center"  style="text-align:center;">

</td>

</tr>


<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">


<div class="contenta" style="text-align:left;">
   
     <div id="header">
<h3 align="center">Registration successfull</h3>
</div>
<font style="font-size:1.2em; margin-left:20%;">Hello <?php echo $fname;?> </font> <br /><br />
<font style="font-size:1.2em;margin-left:20%;">These are your login credentials : </font><br /><br />
<font style="font-size:1.2em;margin-left:30%;">Username : <b><?php echo $mem; ?></b></font><br /><br />
<font style="font-size:1.2em;margin-left:30%;">Password : <b>123456</b></font>
<br /><br /><br />
<a  href="login.php" ><img style="margin-left:50%;" src="../image/login.png" width="100" height="100" /></a>
<br /></br>



<tr>
<td></td>
<td></td>
</tr>

</table>
   

  
</div>
   
   
   
   
</div></tr>

</table>


</td></tr>




</table>

<table align="center" width="60%" style="text-align:center;">
<tr>
<td>
<ul id="footList">
<li>Home</li>
<li>Contact Us</li>
<li>About Us</li>
<li>Terms & Conditions</li>
</ul>
</td>

</tr>
</table>


</body>
</html>
