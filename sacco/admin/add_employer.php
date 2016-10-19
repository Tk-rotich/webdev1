<?php
session_start();

$message="";
//error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['email'])){
  header('Location:login.php');
}

if(isset($_POST['save']))
{

  $sql = " INSERT INTO employee ( emp_id, emp_name, emp_mail, emp_phone, address, town, password ) 
         VALUES('$_POST[registration_id]', '$_POST[name]','$_POST[email]','$_POST[contacts]','$_POST[address]','$_POST[town]','$_POST[password]' ) ";
        mysqli_query($connct, $sql);
       $message = "Employer Registration was Succesfull!!";
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
<h3 align="center">ADMIN BACK END</h3>

     <ol id="toc">
	 <li  class="current" ><a href="add_employer.php"><span>Add Employer </span></a></li>
    <li  ><a href="view_employers.php"><span>Registered Employers</span></a></li>
	
     </ol>
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
</div>
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  

<table align="center" width="70%" >  

<tr>
<td>Company/Instituition:</td>
<td><input type="text" required="required" placeholder="name" name="name" /> </td> 
</tr>
<tr>
<td>Adress:</td>
<td><input type="text" required="required" placeholder="address" name="address" /></td>
</tr>
<tr>
<td>Physical Location/Town:</td>
<td><input type="text" required="required"  name="town" /></td>
</tr>
<tr>
<td>Registration Number:</td>
<td><input  type="text" required="required" name="registration_id" /></td>
</tr>
<tr>
<td>Contacts:</td>
<td><input  type="text" required="required" name="contacts" /></td>
</tr>
<tr>
<td>Email:</td>
<td><input  type="email" required="required" name="email" /></td>
</tr>
<tr>
<td>Password:</td>
<td><input  type="text" required="required" name="password" /></td>
</tr>

<tr>
<td></td>	
<td><?php echo $message; ?></td>
</tr>
</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SAVE" name="save" />




<?php




?>





</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
