
<?php
session_start();
require_once('../db/conn.php');

error_reporting(0);

$member_id=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}

if(isset($_GET['id_delete'])) {
    $sql=("UPDATE loan_repayments SET is_deleted = 1 WHERE  repayment_id = '".$_GET['id_delete']."'");
    mysqli_query($connct, $sql);
   
}

?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Loan Repayment Records</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">   


<div id="header">
<h3 align="center">MY LOAN REPAYMENTS</h3>
</div>
      <ol id="toc">
	 <li    ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li   ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li   ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li   ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li class="current"    ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
	<li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   

<table align="center" width="50%" >  
<div class="contenta">
   
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">Repayment Id</td><td id="tab2">National Id</td><td id="tab2">Payment Amount</td><td id="tab2">Time</td><td id="tab2">Delete</td>
</tr>
   
     <?php


$sql="SELECT * from loan_repayments  WHERE national_id = '$member_id' AND is_deleted = 0 ";
$result=mysqli_query($connct,$sql) or die(mysql_error());
while($row=mysqli_fetch_array($result)){
echo '
<tr style="margin-bottom:1px;">

<td id="tab1">'.$row['repayment_id'].'</td>
<td id="tab1">'.$row['national_id'].'</td>
<td id="tab1">'.$row['payment_amount'].'</td>
<td id="tab1">'.$row['payment_time'].'</td>

<td id="tab1"><a href="my_loan_repayments.php?id_delete='.$row['repayment_id'].'" onclick="Del()"class="action"> Delete</a></td>

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
