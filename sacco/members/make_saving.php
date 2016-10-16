<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');

$member_id=$_SESSION['username'];

if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}

?>
<!DOCTYPE html >
<html xmlns="http:xhtml">
<head>

<title>Sacco | Savings</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="90%" height="100%" style=" border-radius: 10px;">





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;" width="100%">
<div id="header">
<h3 align="center">MAKE SAVING</h3>

      <ol id="toc">
	 <li    ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li class="current"  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li   ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li   ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li   ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li   ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
	<li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	
     </ol>
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
</div>
<form action="#" method="post" >

<div id="personal_details" style="border:1px dotted grey;" >  

<table align="center" width="60%" >  

<tr>
<td>Member ID</td>
<td><input type="text" value="<?php echo $member_id;   ?>" disabled="disabled" /> <input type="hidden" value="<?php echo $member_id;   ?>"  name="member_id" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input  type="text" name="saving_amount" /></td>
</tr>


</tr>





</table>


</div>  


<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SAVE" name="save" />




<?php


$saving_id = uniqid('serial/');
if(isset($_POST['save']))
{
	if($_POST['saving_amount'] >=50)
	   {
			$sql = "INSERT INTO savings 
			(national_id, saving_id, saving_amount,is_deleted) 
			VALUES
			('$_POST[member_id]','$saving_id','$_POST[saving_amount]','0')";
			 mysqli_query($connct,$sql);

			
			$sql2="select savings_account_balance from members where national_id = '$member_id'";
			$result=mysqli_query($connct,$sql2);
			$row=mysqli_fetch_array($result);

			$current_balance=$row['savings_account_balance'];
			$new_saving=$_POST['saving_amount'];

			$new_balance=$current_balance+$new_saving;


			$sql = "UPDATE members 
			SET savings_account_balance = '$new_balance' 
			WHERE national_id = $_POST[member_id]";
			mysqli_query($connct,$sql);

			$sql3="select savings_account_balance from members where national_id = '$member_id'";
			$result3=mysqli_query($connct,$sql3);
			$row3=mysqli_fetch_array($result3);
            echo "<br/>Savings updated succesfully";
            echo "<br/>Savings Balance ".$row3['savings_account_balance'];
        }

else{ echo "<br/>Invalid Amount, Should be More than Ksh 50";}


}


?>





</td> 
</tr> 

</table>


</td></tr>


</table>


</body>
</html>
