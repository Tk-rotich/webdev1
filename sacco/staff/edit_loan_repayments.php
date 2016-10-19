<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}


$repayment_id=$_GET['repayment_id'];


$sql="select * from loan_repayments WHERE repayment_id = '$repayment_id'";
$result=mysqli_query($connct,$sql) or die(mysql_error());
$row=mysqli_fetch_array($result);

$loan_id=$row['loan_id'];
$amount=$row['payment_amount'];




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
	 <li  ><a href="loan_application.php"><span>Loan Application </span></a></li>
	 <li   class="current"   ><a href="loan_repayments.php"><span>Loan Repayment </span></a></li>
    <li   ><a href="view_loan_repayments.php"><span>Repayments Record</span></a></li>
	
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   
	
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Pay Loan </div>
<table align="center" width="50%" >  

<tr>
<td>Loan ID</td>
<td><input type="text" name="loan_id" value="<?php  echo $loan_id; ?>"/></td>
</tr>
<tr>
<td>Amount:</td>
<td><input placeholder="4500" type="text" name="payment_amount" value="<?php  echo $amount; ?>" /></td>
</tr>


</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="UPDATE" name="update" />



<?php
if(isset($_POST['update'])){

$sql = "UPDATE loan_repayments
SET loan_id = '$_POST[loan_id]',
payment_amount = '$_POST[payment_amount]'

WHERE repayment_id = '$repayment_id'";

mysqli_query($connct,$sql) or die(mysql_error());


$loan_id=$_POST['loan_id'];

$sql2="select loan_balance from loan_applications where loan_id = '$loan_id'";
$result=mysqli_query($sql2) or die(mysql_error());
$row=mysqli_fetch_array($result);

$old_repayment=$amount;
$current_balance=$row['loan_balance'];
$new_repayment=$_POST['payment_amount'];

$new_balance=($current_balance-$old_repayment)+$new_repayment;


$sql3 = "UPDATE loan_applications
SET loan_balance = '$new_balance' 
WHERE loan_id = $loan_id";
mysqli_query($connct,$sql3) or die(mysql_error());

 header('Location:loan_repayments.php');

}


?>




</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
