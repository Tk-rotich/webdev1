<?php
session_start();

require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}

$member_id=$_SESSION['username'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Loan Repayments</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="80%" height="100%" style=" border-radius: 10px;">





<tr style="width:100%;">


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;" >
<div id="header">
<h3 align="center">REPAY LOAN</h3>
</div>
      <ol id="toc">
	 <li    ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li   ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li   ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li  class="current" ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li   ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
	<li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   
	
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Pay Loan </div>
<table align="center" width="50%" >  

<tr>
<td>Member National ID</td>
<td><input name="national_id" disabled="disabled" type="text" value="<?php echo $member_id ?>"  /><input disabled="disabled" type="hidden" value="<?php echo $member_id ?>" name="national_id" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input  type="text" name="payment_amount" /></td>
</tr>


</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SAVE" name="save" />


<?php
if(isset($_POST['save']))
{
$national_id =$member_id;
$sql = "INSERT INTO loan_repayments 
(national_id,payment_amount,is_deleted) 
VALUES
('$national_id','$_POST[payment_amount]','0')";
mysqli_query($connct,$sql) or die(mysql_error());



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

else 
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










}


?>
</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
