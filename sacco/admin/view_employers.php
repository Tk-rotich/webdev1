<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');
$message="";
$admin_id=$_SESSION['email'];
if(!isset($_SESSION['email'])){
  header('Location:login.php');
}


if(isset($_GET['id_delete']))
{

     $emp_id = $_GET['id_delete'];

	 $q = "DELETE FROM `employee` WHERE emp_id = '$emp_id' ";
	 mysqli_query($connct,$q);
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
<h3 align="center">REGISTERED EMPLOYERS</h3>
</div>
      
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   

<table align="center" width="50%" >  
<div class="contenta">
   
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">Employer Registration</td><td id="tab2">Name</td><td id="tab2">Email</td><td id="tab2">Contacts</td><td id="tab2">Reg Date</td><td id="tab2">Password</td><td id="tab2">Remove Employer</td>
</tr>
   
     <?php


$sql="SELECT * from employee ";
$result=mysqli_query($connct, $sql) or die(mysqli_error());
while($row=mysqli_fetch_array($result)){
echo '
<tr style="margin-bottom:1px;">
<td id="tab1">'.$row['emp_id'].'</td>
<td id="tab1">'.$row['emp_name'].'</td>
<td id="tab1">'.$row['emp_mail'].'</td>
<td id="tab1">'.$row['emp_phone'].'</td>
<td id="tab1">'.$row['reg_time'].'</td>
<td id="tab1">'.$row['password'].'</td>

<td id="tab1"><a href="view_employers.php?id_delete='.$row['emp_id'].'" onclick="Del()"class="action"> Delete</a></td>
</tr>
'
;
}

?>
   
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
