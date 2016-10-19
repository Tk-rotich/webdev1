<?php
session_start();
require_once('../db/conn.php');
$massage = "";

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}
  

  ?>


<?php
  if(isset($_POST['save']))
{
	$sql1 = " INSERT INTO employer_tb  (Emp_id, first_name, middle_name, last_name, Emp_name, salary, member_id, years_worked, address) VALUES('$_POST[emp_id]','$_POST[first_name]','$_POST[middle_name]','$_POST[last_name]','$_POST[emp_name]','$_POST[salary]','$_POST[member_id]','$_POST[years_worked]','$_POST[address]') " ;
	    mysqli_query($connct, $sql1);

	    header('Location:employer_registration.php');
}

 ?>


<?php  
if(isset($_POST['campany'])) 
{
		  $Emp_id = $_POST['Emp_id'] ;
		  $email = $_POST['email'];

		  $sql2="SELECT * from employee where emp_id = '$Emp_id' AND emp_mail = '$email' ";
		  $result=mysqli_query($connct,$sql2);
		  

		  if(mysqli_num_rows($result) == 1)
		  {

		  	 $sql3="SELECT * from employee where emp_id = '$Emp_id' ";
		    $result3 = mysqli_query($connct,$sql3);
		    $data3 = mysqli_fetch_assoc($result3);

		    
		    $emp_name = $data3['emp_name'];
		    $emp_id = $data3['emp_id'];
		  }
?>





<!DOCTYPE html >
<html xmlns="">
<head>
<meta http-equiv <a href="regClients.php"></a>  
<title>Sacco | Registration</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

<script type="text/javascript" >

  function dothis()
      {
         if (document.form.salary.value < 6000)
              {
                alert("Salary Amount should be more than 6000! ")
                document.form.salary.focus();
                document.getElementById("salary").style.color = 'red';
                return false;
              }
      }
</script>
</script>

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
<h3 align="center">MEMBER REGISTRATION</h3>
</div>

   <ol id="toc">
   <li><a href="employer_registration.php"><span>Add Company Worker</span></a></li>   
   <li><a href="confirm_employer.php"><span>Add Sacco Member </span></a></li>
   <li class="current"><a href="#"><span>New Employee:</span></a></li>
   </ol>
<form name="form" action="#" id="form"  method="post" > 
<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Personal details </div>
<table align="center" width="50%" >  

<tr>
<td>Company Name:</td>
<td><input type="text" value="<?php echo $emp_name ?>" disabled="disabled" name="emp_name" /><input  name="emp_name" type="hidden" value="<?php echo $emp_name ?>" /></td>
</tr>

<tr>
<td>Company ID</td>
<td><input type="text" value="<?php echo $emp_id ?>" disabled="disabled" name="emp_id" /><input type="hidden" value="<?php echo $emp_id ?>" name="emp_id" /></td>
</tr>

<tr>
<td>National ID</td>
<td><input type="text" id="member_id" name="member_id" /></td>
</tr>
<tr>
<td>Full name:</td>
<td><input placeholder="first name" id="first_name" type="text" required="required" name="first_name" /></td>
<td><input  placeholder="middle name" id="middle_name" required="required" type="text" name="middle_name" /></td>
<td><input  placeholder="last name" id="last_name" required="required" type="text" name="last_name" /></td>
</tr>

<tr>
<td>Sallary</td>
<td><input type="text" id="salary" required="required" onchange="dothis()" name="salary" /></td>
</tr>

<tr>
<td>Years Worked</td>
<td><input type="text" id="years_worked" required="required" name="years_worked" /></td>
</tr>

<tr>
<td>Address</td>
<td><input type="text" required="required" id="address" name="address" /></td>
</tr>

</table>

</div> 

<input style="margin-top:10px;margin-bottom:10px;"  type="submit" value="save" name="save" />

 </form>

</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
<?php
}

else
{

   header('Location:employer_registration.php');
}




?>