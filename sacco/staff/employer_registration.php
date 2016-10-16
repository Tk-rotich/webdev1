<?php
session_start();
require_once('../db/conn.php');
$massage = "";

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}
  
?>
<!DOCTYPE html >
<html xmlns="">
<head>
<meta http-equiv <a href="regClients.php"></a>  
<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />



</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a class="current" href="view_members.php"><li>Members</li></a>
<a href="savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>
</ul>


</td></tr>
<tr>
<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;"> 
<div id="header">
<h3 align="center">COMPANY DETAILS</h3>
</div>

  
<form name="form" action="employer_registration1.php"  onsubmit="return validateForm()" method="post" > 
<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Company </div>
<table align="center" width="50%" >  

<tr>
<td>Company Registration:</td>
<td><input type="text" id="Emp_id" required="required" name="Emp_id" /></td>
</tr>
<tr>
<td>Company Email:</td>
<td><input id="email" type="email" required="required" name="email" /></td>
</tr>

</table>

</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="Check" name="campany" />
 </form>

 <?php
       echo $massage;
  
  ?>



</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
