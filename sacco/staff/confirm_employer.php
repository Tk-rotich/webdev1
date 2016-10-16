<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');

$massage="";

if(!isset($_SESSION['username']))
	{
	  header('Location:../access/login.php');
	}


if(isset($_POST['check']))
	{
       $member_id = $_POST['member_id'];

	   $sql = "SELECT * FROM employee WHERE Emp_id = '$_POST[comp_reg]' ";	
	   $q = mysqli_query($connct,$sql) or die(mysql_error());
	   if(mysqli_num_rows($q) == 1 )
		   {
             $sql2="SELECT * from employer_tb where member_id = '$member_id'";
	         $result=mysqli_query($connct,$sql2) or die(mysql_error());
	         if(mysqli_num_rows($result) == 1)
	         {
	         	header("Location:register.php?member_id=$member_id");
               
	         }
	         else{
	         	$massage = "Your Employer is not Yet registered with us!!!";
	         } 

		   }
    }


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Savings</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a class="current" href="../staff/view_members.php"><li>Members</li></a>
<a  href="../staff/savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>

</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">
<div id="header">
<h3 align="center">Employer Details Verification</h3>

     
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
</div>
<form action="#" method="post" >

<div id="personal_details" style="border:1px dotted grey;" >  

<table align="center" width="50%" >  

<tr>
<td>Member ID:</td>
<td><input required="required" type="text" name="member_id" /></td>
</tr>
<tr>
<td>Company Reg:</td>
<td><input required="required" type="text" name="comp_reg" /></td>
</tr>
</tr>
</table>

</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="check" name="check" />



<div>
<?php
echo $massage;
?>
</div>




</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
