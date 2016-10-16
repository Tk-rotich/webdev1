<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['email'])){
  header('Location:login.php');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Admin</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>

<img align="middle" src="../images/pic1.png" width="100%" />
<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="index.php"><li>Home</li></a>
<a  href="add_staff.php"><li>Add Staff</li></a>
<a href="view_staff.php"><li>View staff</li></a>
<a  href="add_employer.php"><li>Add employer</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>


</ul>
</td></tr>

<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">
<div id="header">
<h3 align="center">ADMIN BACK END</h3>

     <ol id="toc">
	 <li  class="current" ><a href="#"><span>Add Staff Member </span></a></li>
    
	
     </ol>
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
</div>
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  

<table align="center" width="70%" >  

<tr>
<td>First name</td>
<td><input type="text" placeholder="first name" name="first_name" /> </td> 
</tr>
<tr>
<td>Last name</td>
<td><input type="text" placeholder="last name" name="last_name" /></td>
</tr>
<td>National ID:</td>
<td><input  type="text" name="national_id" /></td>
</tr>

<tr>
<td>Password:</td>
<td><input  type="password" name="password" /></td>
</tr>


</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SAVE" name="save" />




<?php

if(isset($_POST['save']))
{
$sql = "INSERT INTO staff (national_id,first_name,last_name,password) 
VALUES('$_POST[national_id]', '$_POST[first_name]','$_POST[last_name]','$_POST[password]')";
mysqli_query($connct,$sql);



}


?>





</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
