
<?php
session_start();
require_once('../db/conn.php');

error_reporting(0);

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}


if(isset($_GET['id_delete'])) {
    $sql=("DELETE FROM savings WHERE  saving_id = '".$_GET['id_delete']."'");
    mysqli_query($connct,$sql);
  
}

?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Savings Record</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">
<tr bgcolor="black"><td>
<ul id="nav"  style="border-radius:5px;">
<a href="../access/login.php"><li>Home</li></a>
<a  href="../staff/view_members.php"><li>Members</li></a>
<a class="current" href="../staff/savings.php"><li>Savings</li></a>
<a  href="../staff/statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>


</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">   


<div id="header">
<h3 align="center">SAVINGS</h3>
</div>
      <ol id="toc">
	 <li  ><a href="savings.php"><span>Make Saving </span></a></li>
    <li class="current"   ><a href="view_savings.php"><span>Savings Record</span></a></li>
	
     </ol>
	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   

<table align="center" width="50%" >  
<div class="contenta">
   
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">Saving Id</td><td id="tab2">Member Id</td><td id="tab2">Saving Amount</td><td id="tab2">Date</td><td id="tab2">Edit</td><td id="tab2">Delete</td>
</tr>
   
     <?php


$sql="select * from savings";
$result=mysqli_query($connct,$sql) or die(mysql_error());
while($row=mysqli_fetch_array($result)){
echo '
<tr style="margin-bottom:1px;">
<td id="tab1">'.$row['saving_id'].'</td>
<td id="tab1">'.$row['national_id'].'</td>
<td id="tab1">'.$row['saving_amount'].'</td>
<td id="tab1">'.$row['tran_time'].'</td>
<td id="tab1"><a href="edit_savings.php?saving_id='.$row['saving_id'].'">Edit</td></a>
<td id="tab1"><a href="view_savings.php?id_delete='.$row['saving_id'].'" onclick="Del()"class="action"> Delete</a></td>
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
