<?php
session_start();

if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}
require_once('../db/conn.php');

$member_id=$_SESSION['username'];
$sql="select * from members WHERE national_id = '$member_id'";
$result=mysqli_query($connct,$sql) or die(mysqli_error());
$row=mysqli_fetch_array($result);

//$member_id=$row['member_id'];
$national_id=$row['national_id'];
$first_name=$row['first_name'];
$last_name=$row['last_name'];
$middle_name=$row['middle_name'];
$phone_no=$row['phone_no'];
$gender=$row['gender'];
$member_address=$row['member_address'];
$marital_status=$row['marital_status'];
$spouse_id=$row['spouse_id'];
$spouse_name=$row['spouse_name'];
$income=$row['income'];
$company_name=$row['company'];
$company_address=$row['company_address'];
$years_worked=$row['years_worked'];
$emp_id=$row['emp_id'];

?>


<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | My Profile</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />






</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">

<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;"> 
<div id="header">
<h3 align="center">MY PROFILE</h3>
</div>

      <ol id="toc">
	 <li  class="current"   ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li   ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li   ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li   ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li   ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
	<li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	
     </ol>


<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Personal details </div>
<table align="center" width="50%" >  

<tr>
<td>National ID</td>
<td><?php echo '<font style="color:blue;">'.$member_id.' </font>';  ?></td>
</tr>
<tr>
<td>Full name:</td>
<td><?php echo '<font style="color:blue;">'.$first_name.'&nbsp;'.$middle_name.'&nbsp;'.$last_name.'</font>';  ?></td>
<td></td>
<td></td>
</tr>

<tr>
<td>Gender</td>
<td><?php echo '<font style="color:blue;">'.$gender.' </font>';  ?></td>
</tr>

<tr>
<td>Phone Number</td>
<td><?php echo '<font style="color:blue;">'.$phone_no.' </font>';  ?></td>
</tr>

<tr>
<td>Address</td>
<td><?php echo '<font style="color:blue;">'.$member_address.' </font>';  ?></td>
</tr>





</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Family details </div>
<table align="center" width="50%" >  
<tr>
<td>Marital Status</td>
<td><?php echo '<font style="color:blue;">'.$marital_status.' </font>';  ?> </td>
</tr>


<tr>
<td>Spouse ID</td>
<td><?php echo '<font style="color:blue;">'.$spouse_id.'</font>';  ?></td>
</tr>

<tr>
<td>Spouse Name</td>
<td><?php echo '<font style="color:blue;">'.$spouse_name.'</font>';  ?></td>
</tr>



</table>


</div>  

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Employment details </div>
<table align="center" width="50%" >  

<tr>
<td>Company Name</td>
<td><?php echo '<font style="color:blue;">'.$company_name.' </font>';  ?> </td>
</tr>

<tr>
<td>Company Registration </td>
<td><?php echo '<font style="color:blue;">'.$emp_id.' </font>';  ?> </td>
</tr>


<tr>
<td>Income / Salary</td>
<td><?php echo '<font style="color:blue;">'.$income.' </font>';  ?> </td>
</tr>


<tr>
<td>Address</td>
<td><?php echo '<font style="color:blue;">'.$company_address.' </font>';  ?> </td>
</tr>

<tr>
<td>Years worked</td>
<td><?php echo '<font style="color:blue;">'.$years_worked.' </font>';  ?> </td>
</tr>



</table>




</div> 







</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
