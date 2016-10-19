<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}


$member_id=$_GET['member_id'];


$sql="select * from members WHERE national_id = '$member_id'";
$result=mysqli_query($connct,$sql);
$row=mysqli_fetch_array($result);

$first_name=$row['first_name'];
$middle_name=$row['middle_name'];
$last_name=$row['last_name'];
$national_id=$row['national_id'];
$phone_no=$row['phone_no'];
$gender=$row['gender'];
$marital_status=$row['marital_status'];
$spouse_id=$row['marital_status'];
$spouse_name=$row['spouse_name'];
$income=$row['income'];
$company=$row['company'];
$company_address=$row['company_address'];
$years_worked=$row['years_worked'];
$member_address=$row['member_address'];



?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a class="current" href="view_members.php"><li>Members</li></a>
<a href="savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>


</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;"> 
<div id="header">
<h3 align="center">REGISTRATION</h3>
</div>

     <ol id="toc">
	 <li ><a href="register.php"><span>Add Member </span></a></li>
    <li  ><a href="view_members.php"><span>Registered Members</span></a></li>
	<li  class="current"><a href="#"><span>Edit Member Details</span></a></li>
     </ol>
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Personal details </div>
<table align="center" width="50%" >  

<tr>
<td>National ID</td>
<td><input type="text" disabled="disabled" name="national_id" value="<?php echo $national_id;  ?>"  /></td>
</tr>
<tr>
<td>Full name:</td>
<td><input placeholder="first name" type="text" name="first_name" value="<?php echo $first_name;  ?>"  /></td>
<td><input  placeholder="middle name" type="text" name="middle_name" value="<?php echo $middle_name;  ?>"  /></td>
<td><input  placeholder="last name" type="text" name="last_name"  value="<?php echo $last_name;  ?>"  /></td>
</tr>

<tr>
<td>Gender</td>
<td><select name="gender">
<option><?php echo $gender;  ?></option>
<option></option>
<option>male</option>
<option>female</option>
</select></td>
</tr>

<tr>
<td>Phone Number</td>
<td><input type="text" name="phone_no" value="<?php echo $phone_no;  ?>"/></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="member_address" value="<?php echo $member_address;  ?>"/></td>
</tr>


</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Family details </div>
<table align="center" width="50%" >  
<tr>
<td>Marital Status</td>
<td>
<select name="marital_status">
<option><?php echo $marital_status;  ?></option>
<option></option>
<option>Single</option>
<option>Married</option>
</select>
</td>
</tr>


<tr>
<td>Spouse Info</td>
<td><input type="text" placeholder="ID number" name="spouse_id" value="<?php echo $spouse_id;  ?>"/><input type="text" placeholder="full name" name="spouse_name" value="<?php echo $spouse_name;  ?>"/></td>
</tr>



</table>


</div>  

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Employment details </div>
<table align="center" width="50%" >  
<tr>
<td>Income / Salary</td>
<td><input type="text" name="income" value="<?php echo $income;  ?>"/></td>
</tr>

<tr>
<td>Company</td>
<td><input type="text" name="company" value="<?php echo $company;  ?>"/></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" name="company_address" value="<?php echo $company_address;  ?>"/></td>
</tr>

<tr>
<td>Years worked</td>
<td><input type="text" name="years_worked" value="<?php echo $years_worked;  ?>"/></td>
</tr>



</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="UPDATE" name="update" />
 </form>


<?php
if(isset($_POST['update'])){

$sql = "UPDATE members
SET first_name = '$_POST[first_name]',
middle_name = '$_POST[middle_name]',
last_name = '$_POST[last_name]',
gender = '$_POST[gender]',
phone_no = '$_POST[phone_no]',
member_address = '$_POST[member_address]',
marital_status = '$_POST[marital_status]',
spouse_id = '$_POST[spouse_id]',
spouse_name = '$_POST[spouse_name]',
income = '$_POST[income]',
company = '$_POST[company]',
company_address = '$_POST[company_address]',
years_worked = '$_POST[years_worked]'
WHERE national_id = '$member_id'";


mysqli_query($connct,$sql) or die(mysql_error());


header('Location:view_members.php');

			


}


?>





</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
