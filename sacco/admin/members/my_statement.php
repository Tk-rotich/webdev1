
<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');

$member_id=$_SESSION['username'];
if(!isset($_SESSION['username'])){
	header('Location:../access/login.php');
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Sacco | Statements</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">





<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">  
<div id="header">
<h3 align="center">MY STATEMENT</h3>
</div>

<ol id="toc">
	

	
	
	
     </ol>



<div id="personal_details"   style="border:1px dotted grey;" >  
<div class="label">Account Statement </div>
<table align="center" style="margin-top:3%;" width="50%" >  

   
     <?php
   


$sql="select * from members WHERE national_id = '$member_id' ";
$res=mysqli_query($connct,$sql);
$row=mysqli_fetch_assoc($res);

$number=$row['member_num'];
$fname=$row['first_name'];
$mname=$row['middle_name'];
$lname=$row['last_name'];
$savings=$row['savings_account_balance'];


$sql2="SELECT SUM(loan_amount) FROM loan_applications WHERE national_id = '$member_id' ";
$result2=mysqli_query($connct,$sql2) or die(mysqli_error());
$row2=mysqli_fetch_array($result2);
$total_loans=$row2['SUM(loan_amount)'];

$sql3="select SUM(loan_balance) from loan_applications WHERE national_id = '$member_id' ";
$result3=mysqli_query($connct, $sql3);
$row3=mysqli_fetch_assoc($result3);
$loan_balance=$row3['SUM(loan_balance)'];


echo '
<table align="center" width="70%">
<tr><td><lable>Full name :</label></td>  <td>'.$fname.'&nbsp;'.$mname.'&nbsp;'.$lname.'</td></tr>
<tr><td><lable>National ID</label></td>  <td>'.$member_id.'</td></tr>
<tr><td><lable>Number</label></td>  <td>'.$number.'</td></tr>
<tr><td><lable>Total Savings :</label></td>  <td>'.$savings.'</td></tr>

<tr><td><lable>Loan Balance :</label></td>  <td>'.$loan_balance.'</td></tr>
<tr><td><lable></label></td>  <td></td></tr>
<tr><td><lable>Print Statement :</label></td>  <td><input type="button" value="PRINT" onclick="print()" ></td></td></tr>


</table>
';





?>
   

 </table>  
</div>  
</td> 
</tr> 
</table>
</td></tr>
</table>
</body>
</html>
