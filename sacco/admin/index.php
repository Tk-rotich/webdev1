<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');
$message="";

if(!isset($_SESSION['email']))
{
  header('Location:login.php');
}



if(isset($_GET['id_delete']))
{

     $national_id = $_GET['id_delete'];
	 $q = "DELETE FROM `staff` WHERE national_id = '$national_id' ";
	 mysqli_query($connct,$q);
}

 ?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Admin</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />



</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />
<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="index.php"><li>Home</li></a>
<a  href="add_staff.php"><li>Add Staff</li></a>
<a href="view_staff.php"><li>View staff</li></a>
<a  href="add_employer.php"><li>Add employer</li></a>
<a  href="logout.php"><li>Log out</li></a>


</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">   


<div id="header">
<h3 align="center">ADMISTRATION PANNEL</h3>
</div>
      
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   
  
<table align="center" width="50%" >  
<div class="contenta">
   <img src="../image/logo.jpg" alt="Sacco logo" align="center" width="70%" /></br>
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">

</tr>
  
   
 </table>  
   
</div>
   </div>


</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
