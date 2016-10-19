<?php
session_start();
require_once('../db/conn.php');

error_reporting(0);

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}


if(isset($_GET['id_delete'])) {
    $sql=("DELETE FROM members WHERE  national_id = '".$_GET['id_delete']."'");
    mysqlI_query($connct, $sql);
   
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
   <li  class="current"><a href="view_members.php"><span>Registered Members</span></a></li>   
	 <li ><a href="confirm_employer.php"><span>Add Sacco Member </span></a></li>
   <li ><a href="employer_registration.php"><span>Add Company Workers</span></a></li>
	
     </ol>
	 
	 <div id="personal_details" style="border-top:1px dotted grey;" >  
<div class="contenta">
   
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">NO</td><td id="tab2">First Name</td><td id="tab2">Last Name</td><td id="tab2">National Id</td><td id="tab2">Phone No</td><td id="tab2">Gender</td><td id="tab2">Savings Balance</td><td id="tab2">State</td><td id="tab2">Edit</td><td id="tab2">Delete</td>
</tr>
   
     <?php


$sql="SELECT * FROM members order by member_num";
$result=mysqlI_query($connct,$sql) or die(mysql_error());
while($row=mysqli_fetch_array($result))
{
  if($row['is_active']==1)
  {
    $is_active = "Active" ;
  }
  else
  {
    $is_active = "Not active";
  }

echo '
<tr style="margin-bottom:1px;">
<td id="tab1">'.$row['member_num'].'</td>
<td id="tab1">'.$row['first_name'].'</td>
<td id="tab1">'.$row['last_name'].'</td>
<td id="tab1">'.$row['national_id'].'</td>
<td id="tab1">'.$row['phone_no'].'</td>
<td id="tab1">'.$row['gender'].'</td>
<td id="tab1">'.$row['savings_account_balance'].'</td>
<td id="tab1">'.$is_active.'</td>
<td id="tab1"><a href="edit_member_details.php?member_id='.$row['national_id'].'">Edit</td></a>
<td id="tab1"><a href="view_members.php?id_delete='.$row['national_id'].'" onclick="Del()"class="action"> Delete</a></td>
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
