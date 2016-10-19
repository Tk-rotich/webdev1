<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}



$loan_id=$_GET['loan_id'];


$sql="SELECT * from loan_applications WHERE serial_no = '$loan_id'";
$result=mysqli_query($connct,$sql) or die(mysql_error());
$row=mysqli_fetch_array($result);

$member_id=$row['national_id'];
$loan_amount=$row['loan_amount'];
$loan_purpose=$row['loan_purpose'];
$start_date=$row['start_date'];
$repayment_period=$row['repayment_period'];
$instalments=$row['instalments'];
$rate=$row['rate'];
$penalty_type=$row['penaty_type'];
$monthly_income=$row['monthly_income'];
$guarantor1=$row['guarantor1'];
$guarantor2=$row['guarantor2'];



?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Loan Application</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

<script>
function validateForm()
{

var member_id=document.forms["form"]["member_id"].value;
var loan_purpose=document.forms["form"]["loan_purpose"].value;
var loan_amount=document.forms["form"]["loan_amount"].value;
var commence_date=document.forms["form"]["commence_date"].value;

var repayment_period=document.forms["form"]["repayment_period"].value;
var rate=document.forms["form"]["rate"].value;
var instalments=document.forms["form"]["instalments"].value;


var penalty_type=document.forms["form"]["penalty_type"].value;
var income=document.forms["form"]["income"].value;
var shares=document.forms["form"]["shares"].value;
var guarantor1=document.forms["form"]["guarantor1"].value;
var guarantor2=document.forms["form"]["guarantor2"].value;


if (member_id=="" || loan_purpose=="" || loan_amount=="" || commence_date=="" || repayment_period=="" || rate=="" || instalments=="" || penalty_type=="" || shares=="" || income=="" || guarantor1=="" ||  guarantor2=="")
  {
  alert("some of the fields are blank");
  return false;
  }
}

</script>
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a  href="../staff/view_members.php"><li>Members</li></a>
<a href="savings.php"><li>Savings</li></a>
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
	 <li  class="current"  ><a href="loan_application.php"><span>Loan Application </span></a></li>
	 <li    ><a href="loan_repayments.php"><span>Loan Repayment </span></a></li>
    <li   ><a href="view_loan_repayments.php"><span>Repayments Record</span></a></li>
	
     </ol>
<form name="form" action="#"  onsubmit="return validateForm()" method="post" >

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Loan Specification </div>
<table align="center" width="50%" >  

<tr>
<td>Member ID</td>
<td><input type="text"  placeholder="M1201" name="member_id" value="<?php echo $member_id;  ?>" /></td>
</tr>
<tr>
<td>Amount:</td>
<td><input placeholder="500000" type="text" name="loan_amount"  value="<?php echo $loan_amount;  ?>" /></td>

</tr>

<tr>
<td>Loan purpose</td>
<td><input type="text"  name="loan_purpose" value="<?php echo $loan_purpose;  ?>" /></td>
</tr>






</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Repayment details </div>
<table align="center" width="50%" >  


<tr>
<td>Commence date</td>
<td><input type="date" placeholder="02-11-2012" name="start_date" value="<?php echo $start_date;  ?>" /></td>
</tr>

<tr>
<td>Repayment period</td>
<td><input type="text" placeholder="24 months" name="repayment_period" value="<?php echo $repayment_period;  ?>" /></td>
</tr>

<tr>
<td>Rate</td>
<td><input type="text" placeholder="" name="rate" value="<?php echo $rate;  ?>" /></td>
</tr>



<tr>
<td>Instalments</td>
<td><input type="text" placeholder="1000 pm" name="instalments" value="<?php echo $instalments;  ?>" /></td>
</tr>

<tr>
<td>Penalty type</td>
<td><select name="penalty_type">
<option><?php echo $penalty_type;  ?></option>
<option></option>
<option>B</option>
<option>C</option>
</select></td>
</tr>




</table>


</div>  

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Loan Securities </div>
<table align="center" width="50%" >  
<tr>
<td>Monthly Income</td>
<td><input type="text" name="monthly_income" value="<?php echo $monthly_income;  ?>" /></td>
</tr>



<tr>
<td>Guarantor 1 ID no.</td>
<td><input type="text" name="guarantor1" value="<?php echo $guarantor1;  ?>" /></td>
</tr>

<tr>
<td>Guarantor 2  ID no.</td>
<td><input type="text" name="guarantor2" value="<?php echo $guarantor2;  ?>" /></td>
</tr>



</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="UPDATE" name="update" />

</form>



<?php
if(isset($_POST['update'])){

$sql = "UPDATE loan_applications
SET loan_amount = '$_POST[loan_amount]',
loan_purpose = '$_POST[loan_purpose]',
start_date = '$_POST[start_date]',
repayment_period = '$_POST[repayment_period]',
rate = '$_POST[rate]',
instalments = '$_POST[instalments]',
penalty_type = '$_POST[penalty_type]',
monthly_income= '$_POST[monthly_income]',
guarantor1 = '$_POST[guarantor1]',
guarantor2 = '$_POST[guarantor2]'
WHERE national_id = '$member_id'";


mysqli_query($connct,$sql) or die(mysql_error());

}
?>



</td>   
</tr>  

</table>



</td></tr>


</table>


</body>
</html>
