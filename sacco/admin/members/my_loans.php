
<?php
session_start();
require_once('../db/conn.php');

//error_reporting(0);

if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}

$member_id=$_SESSION['username'];

if(isset($_GET['id_delete'])) {

    $sql=("UPDATE loan_applications SET is_deleted='1' WHERE  serial_no = '".$_GET['id_delete']."'");
    mysqli_query($connct, $sql);
  
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />



</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">   


<div id="header">
<h3 align="center">MY LOANS</h3>
</div>
      <ol id="toc">
	 <li    ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li    ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li class="current"  ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li   ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li   ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
	<li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   

<table align="center" width="50%" >  
<div class="contenta">
   
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">Loan Id</td><td id="tab2">Member Id</td><td id="tab2">Loan Type</td><td id="tab2">Commence Date</td><td id="tab2">Repayment Period</td><td id="tab2">Rate</td><td id="tab2">Loan Amount</td><td id="tab2">Loan Balance</td><td id="tab2">Loan State</td><td id="tab2">Delete</td>
</tr>
   
     <?php


$sql="SELECT * FROM loan_applications WHERE national_id = '$member_id' AND is_deleted=0 ";
$result=mysqli_query($connct,$sql);
while($row=mysqli_fetch_array($result)){
	if($row['is_paid'] == 0 )
	{
		$loan ="Being Processed";
	}
	else if($row['is_paid'] == 1)
	{
       $loan ="Paid";
	}
	else if($row['is_paid'] == 2)
	{
       $loan ="Declined";
	}

echo '
<tr style="margin-bottom:1px;">
<td id="tab1">'.$row['serial_no'].'</td>
<td id="tab1">'.$row['national_id'].'</td>
<td id="tab1">'.$row['loan_type'].'</td>
<td id="tab1">'.$row['start_date'].'</td>
<td id="tab1">'.$row['repayment_period'].'</td>
<td id="tab1">'.$row['rate'].'</td>
<td id="tab1">'.$row['loan_amount'].'</td>
<td id="tab1">'.$row['loan_balance'].'</td>
<td id="tab1">'.$loan.'</td>


<td id="tab1"><a href="my_loans.php?id_delete='.$row['serial_no'].'" onclick="Del()"class="action"> Delete</a></td>
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
