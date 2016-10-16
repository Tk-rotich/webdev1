<?php
session_start();
require_once('../db/conn.php');
$massage="";

if(isset($_POST['register']))
{

$sql = "INSERT INTO members 
(national_id, emp_id,first_name,middle_name,last_name,gender,phone_no,member_address,marital_status,spouse_id,spouse_name,income,company,company_address,years_worked,savings_account_balance,password,is_active,is_deleted) 
VALUES
('$_POST[national_id]','$_GET[emp_id]','$_POST[first_name]','$_POST[middle_name]','$_POST[last_name]','$_POST[gender]','$_POST[phone_no]','$_POST[member_address]','$_POST[marital_status]','$_POST[spouse_id]','$_POST[spouse_name]','$_POST[income]','$_POST[company]','$_POST[company_address]','$_POST[years_worked]','0','123456','0','0')
";
mysqli_query($connct,$sql) or die(mysqli_error());
$nat_id= $_POST['national_id'];
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];

$massage= "Registration was success!! You can now login.";
header("refresh:4; url=login.php");

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

<script>
function validateForm()
{
var first_name=document.forms["form"]["first_name"].value;
var middle_name=document.forms["form"]["middle_name"].value;
var last_name=document.forms["form"]["last_name"].value;
var national_id=document.forms["form"]["national_id"].value;

var gender=document.forms["form"]["gender"].value;
var phone_no=document.forms["form"]["phone_no"].value;
var member_address=document.forms["form"]["member_address"].value;


var marital_status=document.forms["form"]["marital_status"].value;
var income=document.forms["form"]["income"].value;
var company=document.forms["form"]["company"].value;
var company_address=document.forms["form"]["company_address"].value;
var years_worked=document.forms["form"]["years_worked"].value;


if (national_id=="" || first_name=="" || middle_name=="" || last_name=="" || gender=="" || phone_no=="" || member_address=="" || marital_status=="" || marital_status=="" || income=="" || company=="" ||  company_address=="" || years_worked=="")
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





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;"> 
<div id="header">
<h3 align="center">REGISTRATION</h3>
</div>

     <ol id="toc">
	 <li class="current"><span><a href="#">Create Account </a> <?php echo $massage; ?></span></li>
    
	
     </ol>
<form name="form" action="#"  onsubmit="return validateForm()" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Personal details </div>
<table align="center" width="60%" >  

<tr>
<td>National ID</td>
<td><input type="text" name="national_id" /></td>

</tr>
<tr>
<td>Full name:</td>
<td><input placeholder="first name" type="text" name="first_name" /></td>
<td><input  placeholder="middle name" type="text" name="middle_name" /></td>
<td><input  placeholder="last name" type="text" name="last_name" /></td>
</tr>

<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male" /> Male  <input type="radio" name="gender" value="female" /> Female</td>
</tr>

<tr>
<td>Phone Number</td>
<td><input type="text" name="phone_no" /></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="member_address" /></td>
</tr>





</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Family details </div>
<table align="center" width="50%" >  
<tr>
<td>Marital Status</td>
<td><input type="radio" name="marital_status" value="single" /> Single  <input type="radio" value="married" name="marital_status"  />Married </td>
</tr>


<tr>
<td>Spouse Info</td>
<td><input type="text" placeholder="ID number" name="spouse_id" /><input type="text" placeholder="full name" name="spouse_name" /></td>
</tr>



</table>


</div>  

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Employment details </div>
<table align="center" width="50%" >  
<tr>
<td>Income / Salary</td>
<td><input type="text" name="income" /></td>
</tr>

<tr>
<td>Company</td>
<td><input type="text" name="company" /></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="company_address" /></td>
</tr>

<tr>
<td>Years worked</td>
<td><input type="text" name="years_worked" /></td>
</tr>



</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="REGISTER" name="register" />
 </form>


<?php

?>





</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
