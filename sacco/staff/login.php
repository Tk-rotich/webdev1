<?php
session_start();
error_reporting(0);
require_once('../conn.php');

$message="";

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];


$sql="select * from staff where staff_id = '$username' and password ='$password' ";
$result=mysql_query($sql) or die(mysql_error());
$row=mysql_fetch_array($result);
if($row['staff_id']!=""){
$_SESSION['staff_id']=$row['staff_id'];

header("Location:confirm_employer.php");
}
else
{
$message="incorrect username or password";
}



}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sacco |Login </title>
<link rel="stylesheet" type="text/css" href="../style.css" />
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


<div class="contenta">
   
     <div id="header">
<h3 align="center">Staff Login</h3>
</div>
<form action="#" method="post" >
<table align="center" width="50%" >


<tr>
<td>Username</td>
<td><input type="text" name="username" /></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" /></td>
</tr>



<tr>
<td></td>
<td><input type="submit" name="login" value="Login"/></form> </td>
</tr>


<tr>
<td></td>
<td><?php  echo $message; ?></td>
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
