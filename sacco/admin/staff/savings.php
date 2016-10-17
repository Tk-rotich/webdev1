<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}

$massage="";


if(isset($_POST['save'])){
	$serial = uniqid('serial/');
$sql = "INSERT INTO savings 
(national_id,saving_id,saving_amount,is_deleted) 
VALUES
('$_POST[member_id]','$serial',  '$_POST[saving_amount]','0')";
mysqli_query($connct,$sql) or die(mysql_error());

$member_id=$_POST['member_id'];

$sql2="SELECT savings_account_balance FROM members WHERE national_id = '$member_id'";
$result=mysqli_query($connct,$sql2) or die(mysql_error());
$row=mysqli_fetch_array($result);

$current_balance=$row['savings_account_balance'];
$new_saving=$_POST['saving_amount'];

$new_balance=$current_balance+$new_saving;


$sql = "UPDATE members 
SET savings_account_balance = '$new_balance' 
WHERE national_id = $_POST[member_id]";
mysqli_query($connct,$sql) or die(mysql_error());

$massage='<p style="color:green ;">Your savings of ksh '.$_POST['saving_amount'].' is successful!!</p>';

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
<a  href="../staff/view_members.php"><li>Members</li></a>
<a class="current" href="../staff/savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>

</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">
<div id="header">
<h3 align="center">Savings</h3>

     <ol id="toc">
	 <li  class="current" ><a href="savings.php"><span>Make Saving </span></a></li>
    <li  ><a href="view_savings.php"><span>Savings Record</span></a></li>
	
     </ol>
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
</div>
<form action="#" method="post" >

<div id="personal_details" style="border:1px dotted grey;" >  

<table align="center" width="50%" >  

<tr>
<td>National ID</td>
<td><input type="text" required="required" name="member_id" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input required="required" type="text" name="saving_amount" /></td>
</tr>

</tr>

<div>
  <?php echo $massage; ?>
</div>




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
