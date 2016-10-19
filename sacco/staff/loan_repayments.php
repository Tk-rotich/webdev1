<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}



?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>
<title>Sacco | Loan Repayments</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a  href="../staff/view_members.php"><li>Members</li></a>
<a   href="savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a class="current"  href="loan_application.php"><li>Loans</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>

</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">
<div id="header">
<h3 align="center">LOANS</h3>
</div>
      <ol id="toc">
		 <li   ><a href="loan_application.php"><span>Loan Application </span></a></li>
	  <li     ><a href="view_loan_applications.php"><span>Application record </span></a></li>
	 <li   class="current"   ><a href="loan_repayments.php"><span>Loan Repayment </span></a></li>
    <li   ><a href="view_loan_repayments.php"><span>Repayments Record</span></a></li>
	<li   ><a href="manage_loan_application.php"><span>Manage</span></a></li>
	<li   ><a href="sort_loan_applications.php"><span>Search loan By:</span></a></li>
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   
	
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Pay Loan </div>
<table align="center" width="50%" >  

<tr>
<td>National ID</td>
<td><input type="text" name="loan_id" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input placeholder="4500" type="text" name="payment_amount" /></td>
</tr>


</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SAVE" name="save" />




<?php
if(isset($_POST['save'])){
$sql = "INSERT INTO loan_repayments 
(national_id,payment_amount,is_deleted) 
VALUES
('$_POST[loan_id]','$_POST[payment_amount]','0')";
mysqli_query($connct,$sql) or die(mysql_error());

$national_id =$_POST['loan_id'];

$sql2="SELECT loan_balance from loan_applications where national_id = '$national_id' AND no =(select MAX(no)from loan_applications)  ";
$result=mysqli_query($connct,$sql2) or die(mysql_error());
$row=mysqli_fetch_array($result);

$current_balance=$row['loan_balance'];
$new_payment=$_POST['payment_amount'];

if($current_balance>$new_payment)
{
   $new_balance=$current_balance-$new_payment;
   $sql3 = "UPDATE loan_applications
   SET loan_balance = '$new_balance' 
   WHERE national_id = '$national_id' AND is_repaid = 0 ";
   mysqli_query($connct,$sql3) or die(mysql_error());

}
else if($current_balance<$new_payment)
{
    $new_balance= 0 ;
    $sql4 = "UPDATE loan_applications
   SET loan_balance = '$new_balance', is_repaid = 1 
   WHERE national_id = '$national_id' AND is_repaid = 0 ";
   mysqli_query($connct,$sql4) or die(mysql_error());

   $savings=$new_payment-$current_balance ;

   $sql5="SELECT savings_account_balance FROM members WHERE national_id = '$national_id'";
   $result=mysqli_query($connct,$sql5) or die(mysql_error());
   $row=mysqli_fetch_array($result);

   $current_balance=$row['savings_account_balance'];
   $new_saving=$savings;

   $new_balance=$current_balance+$new_saving;
   $sql6 = "UPDATE members 
   SET savings_account_balance = '$new_balance' 
   WHERE national_id = '$national_id' ";
   mysqli_query($connct,$sql6) or die(mysql_error());

     
}

else if($current_balance == $new_payment)
{
	 $new_balance= 0 ;

     $sql7 = "UPDATE loan_applications
     SET loan_balance = '$new_balance', is_repaid = 1 
     WHERE national_id = '$national_id' AND is_repaid = 0 ";
     mysqli_query($connct,$sql) or die(mysql_error());

     
}








}


?>





</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
