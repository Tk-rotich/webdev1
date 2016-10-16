<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');


if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}




$saving_id=$_GET['saving_id'];


$sql="select * from savings WHERE saving_id = '$saving_id'";
$result=mysqli_query($connct,$sql) or die(mysql_error());
$row=mysqli_fetch_array($result);

$member_id=$row['member_id'];
$amount=$row['saving_amount'];



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Savings record</title>
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
<h3 align="center">SAVINGS</h3>
</div>

     <ol id="toc">
	 <li ><a href="savings.php"><span>Make Saving </span></a></li>
    <li  ><a href="view_savings.php"><span>Savings Record</span></a></li>
	<li  class="current"><a href="#"><span>Edit Saving</span></a></li>
     </ol>
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Savings details </div>
<table align="center" width="50%" >  

<tr>
<td>Saving ID</td>
<td><input type="text" name="saving_id" disabled="disabled" value="<?php echo $saving_id; ?>" /></td>
</tr>

<tr>
<td>National ID</td>
<td><input type="text" name="member_id" value="<?php echo $member_id; ?>" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input placeholder="4500" type="text" name="saving_amount" value="<?php echo $amount; ?>" /></td>
</tr>



</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="UPDATE" name="update" />
 </form>


<?php
if(isset($_POST['update'])){

$sql = "UPDATE savings
SET national_id = '$_POST[member_id]',
saving_amount = '$_POST[saving_amount]'

WHERE saving_id = '$saving_id'";

mysqli_query($connct,$sql) or die(mysql_error());


$member_id=$_POST['member_id'];

$sql2="select savings_account_balance from members where member_id = '$member_id'";
$result=mysqli_query($connct,$sql2) or die(mysql_error());
$row=mysqli_fetch_array($result);

$old_saving=$amount;
$current_balance=$row['savings_account_balance'];
$new_saving=$_POST['saving_amount'];

$new_balance=($current_balance-$old_saving)+$new_saving;


$sql3 = "UPDATE members 
SET savings_account_balance = '$new_balance' 
WHERE national_id = $_POST[member_id]";
mysqli_query($connct,$sql3) or die(mysql_error());


}


?>





</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
