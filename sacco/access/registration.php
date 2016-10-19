<?php
session_start();
require_once('../db/conn.php');
$massage="";
 
  $member_id = $_GET['member_id']; 

  $sql2="SELECT * from employer_tb where member_id = '$member_id'";
  $result=mysqli_query($connct,$sql2) or die(mysql_error());
  $data = mysqli_fetch_assoc($result);
            
            $Emp_id = $data['Emp_id'];
            $Emp_name = $data['Emp_name'];
            $member_id = $data['member_id'];
            $years_worked = $data['years_worked'];
            $salary = $data['salary'];
            $address = $data['address'];
            $first_name = $data['first_name'];
            $middle_name = $data['middle_name'];
            $last_name = $data['last_name'];


if(isset($_POST['register'])){


$sql = "INSERT INTO members 
(national_id,emp_id,first_name,middle_name,last_name,gender,phone_no,member_address,marital_status,spouse_id,spouse_name,income,company,company_address,years_worked,savings_account_balance,password,is_active,is_deleted) 
VALUES
('$_POST[national_id]','$_POST[emp_id]','$_POST[first_name]','$_POST[middle_name]','$_POST[last_name]','$_POST[gender]','$_POST[phone_no]','$_POST[member_address]','$_POST[marital_status]','$_POST[spouse_id]','$_POST[spouse_name]','$_POST[income]','$_POST[company]','$_POST[company_address]','$_POST[years_worked]','0','123456','0','0')
";
mysqli_query($connct, $sql) ;

$massage= '<p style="color:green;"><b>Registration Successfull</b></p>';

header("Location:registration_successfull.php?national_id=$_POST[national_id] ");

}


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





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;"> 
<div id="header">
<h3 align="center">REGISTRATION</h3>
</div>

     <ol id="toc">
	 <li class="current"><span><a href="#">Create Account </a> <?php echo $massage; ?></span></li>
     </ol>

<form name="form" action="#"  onsubmit="return validateForm()" method="post" > 
<?php
 echo $massage;

?>

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Personal details </div>
<table align="center" width="50%" >  

<tr>
<td>National ID</td>
<td><input type="text" value="<?php echo $member_id ?>" disabled="disabled" name="national_id" /><input type="hidden" value="<?php echo $member_id ?>" name="national_id" /></td>
</tr>
<tr>
<td>Full name:</td>
<td><input placeholder="first name" value="<?php echo $first_name ?>" type="text" disabled="disabled" name="first_name" /><input value="<?php echo $first_name ?>" type="hidden"  name="first_name" /></td>
<td><input  placeholder="middle name" value="<?php echo $middle_name ?>" disabled="disabled" type="text" name="middle_name" /><input  value="<?php echo $middle_name ?>"  type="hidden" name="middle_name" /></td>
<td><input  placeholder="last name" value="<?php echo $last_name ?>" disabled="disabled" type="text" name="last_name" /><input  value="<?php echo $last_name ?>"  type="hidden" name="last_name" /></td>
</tr>

<tr>
<td>Gender</td>
<td><input type="radio" name="gender" value="male" /> Male  <input type="radio" name="gender" value="female" /> Female</td>
</tr>

<tr>
<td>Phone Number</td>
<td><input type="text" required="required" name="phone_no" /></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" required="required" disabled="disabled" value="<?php echo $address ?>" name="member_address" /><input type="hidden" value="<?php echo $address ?>" name="member_address" /></td>
</tr>





</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Family details </div>
<table align="center" width="50%" >  
<tr>
<td>Marital Status</td>
<td><input required="required" type="radio" name="marital_status" value="single" /> Single 
 <input type="radio" required="required" value="married" name="marital_status"  />Married </td>
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
<td>Salary  Ksh.</td>
<td><input type="text" value="<?php echo $salary ?>" disabled="disabled" name="income" /><input type="hidden" value="<?php echo $salary ?>" name="income" /></td>
</tr>

<tr>
<td>Company</td>
<td><input type="text" value="<?php echo $Emp_name ?>" disabled="disabled" name="company" /><input type="hidden" value="<?php echo $Emp_name ?>"  name="company" /></td>
</tr>

<tr>
<td>Employer ID</td>
<td><input type="text" value="<?php echo $Emp_id ?>" disabled="disabled" name="emp_id" /><input type="hidden" value="<?php echo $Emp_id ?>" name="emp_id" /></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" required="required"  name="company_address" /> </td>
</tr>

<tr>
<td>Years worked</td>
<td><input type="text" value="<?php echo $years_worked ?>" disabled="disabled" name="years_worked" /><input type="hidden" value="<?php echo $years_worked ?>"  name="years_worked" /></td>
</tr>

</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="REGISTER" name="register" />
 </form>
</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
