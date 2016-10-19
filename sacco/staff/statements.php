
<?php
session_start();
error_reporting(0);
require_once('../db/conn.php');

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}

$massage="";

?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>

<title>Sacco | Statements</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

<script>
function printContent(data_print){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(data_print).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
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
<a class="current" href="statements.php"><li>Statements</li></a>
<a  href="../staff/loan_application.php"><li>Loan Application</li></a>
<a  href="../access/logout.php"><li>Log out</li></a>

</ul>
</td></tr>




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">  
<div id="header">
<h3 align="center">Loan Application</h3>
</div>
<form action="#" method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Statement Type </div>
<table align="center" width="50%" >  

<tr>
<td>Member ID</td>
<td><input type="text"  name="member_id" /></td>
</tr>
<tr>
<td>Type:</td>
<td><input  type="radio" name="report_type" value="general" /> General <input  type="radio" name="report_type" value="saving"/> Savings  <input  type="radio" name="report_type" value="loan"/> Loans</td>

</tr>


<tr>
<td></td>
<td><input style="margin-top:10px;margin-bottom:10px;" type="submit" value="GENERATE" name="generate" /></td>
</tr>


</table>


</div>  



<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Results </div>
<table align="center" width="50%" >  

   
 <?php
   
if(isset($_POST['generate']))
{
  $member_id=$_POST['member_id'];
  $report_type=$_POST['report_type'];


if($member_id!=""){


if ($report_type=="general")
{

				$sql="SELECT * from members where national_id= '$member_id' ";
				$result=mysqli_query($connct,$sql) or die(mysql_error());
				if(mysqli_num_rows($result)=="")
				 {
				 	$massage="The ID is invalid OR you are not registered member!!!";
				 }
				 else{
						$row=mysqli_fetch_array($result);

						$national_id=$row['national_id'];
						$fname=$row['first_name'];
						$mname=$row['middle_name'];
						$lname=$row['last_name'];
						$shares=$row['shares'];
						$savings=$row['savings_account_balance'];


						$sql2="SELECT SUM(loan_amount) from loan_applications where national_id= '$member_id' ";
						$result2=mysqli_query($connct,$sql2) or die(mysql_error());
						$row2=mysqli_fetch_array($result2);
						$total_loans=$row2['SUM(loan_amount)'];

						$sql3="select SUM(loan_balance) from loan_applications where national_id= '$member_id' ";
						$result3=mysqli_query($connct,$sql3) or die(mysql_error());
						$row3=mysqli_fetch_array($result3);
						$loan_balance=$row3['SUM(loan_balance)'];


						echo '
						<table align="center" width="70%">
						<tr><td><lable>Full name :</label></td>  <td>'.$fname.'&nbsp;'.$mname.'&nbsp;'.$lname.'</td></tr>
						<tr><td><lable>National ID</label></td>  <td>'.$national_id.'</td></tr>
						<tr><td><lable>Total shares</label></td>  <td>'.$shares.'</td></tr>
						<tr><td><lable>Total Savings :</label></td>  <td>'.$savings.'</td></tr>
						<tr type="hidden"><td><lable>Total Loans :</label></td>  <td>'.$total_loans.'</td></tr>
						<tr><td><lable>Loan Balance :</label></td>  <td>'.$loan_balance.'</td></tr>
						</table>
						';
              }


}



else if ($report_type=="saving")
{

		$sql="SELECT * from savings where national_id = '$member_id' ";
		$result=mysqli_query($connct,$sql) or die(mysql_error());
		if(mysqli_num_rows($result)<1)
						 {
						 	$massage="The ID is invalid OR you are not registered member!!!";
						 }
     else{	
            echo"<tr style='margin-bottom:1px;'>";
		    echo" <td id='tab2'>Saving Id</td><td id='tab2'>Member Id</td><td id='tab2'>Saving Balance</td><<td id='tab2'>Edit</td><td id='tab2'>Delete</td>
		           </tr>";			 
		while($row=mysqli_fetch_array($result))
		   {
             echo '
				<tr style="margin-bottom:1px;">
				<td id="tab1">'.$row['saving_id'].'</td>
				<td id="tab1">'.$row['national_id'].'</td>
				<td id="tab1">'.$row['saving_amount'].'</td>
				<td id="tab1"><a href="edit_savings.php?saving_id='.$row['saving_id'].'">Edit</td></a>
				<td id="tab1">Delete</td>
				</tr>
				'
				;
		    }
	   }
}
else if ($report_type=="loan"){

$sql="SELECT * from loan_applications where national_id = '$member_id' ";
$result=mysqli_query($connct,$sql) or die(mysql_error());
 if(mysqli_num_rows($result)=="")
						 {
						 	$massage="The ID is invalid OR you are not registered member!!!";
						 }
 else{	
       echo"<tr style='margin-bottom:1px;'>";
       echo" <td id='tab2'>Loan Id</td><td id='tab2'>Member Id</td><td id='tab2'>Commence Date</td><td id='tab2'>Repayment Period</td><td id='tab2'>Due Date</td><td id='tab2'>Loan Amount</td><td id='tab2'>Loan Balance/td><td id='tab2'>Edit</td><td id='tab2'>Delete</td>
             </tr>";					 
      while($row=mysqli_fetch_array($result))
		{
		echo '
		<tr style="margin-bottom:1px;">
		<td id="tab1">'.$row['serial_no'].'</td>
		<td id="tab1">'.$row['national_id'].'</td>
		<td id="tab1">'.$row['start_date'].'</td>
		<td id="tab1">'.$row['repayment_period'].'</td>
		<td id="tab1">'.$row['due_date'].'</td>
		<td id="tab1">'.$row['loan_amount'].'</td>
		<td id="tab1">'.$row['loan_balance'].'</td>

		<td id="tab1"><a href="edit_loan_applications.php?loan_id='.$row['serial_no'].'">Edit</td></a>
		<td id="tab1">Delete</td>
		</tr>
		'
		;
		}
    }
}
else {
echo"Choose one category";
}



}
else
	{
		echo"you must provide a <b>MEMBER ID</B>";
	}
}
   echo $massage;
?>
  <div id="print"><button onclick="print()"> Print Content </button></div> 
 </table>  
</div>  
</td> 
</tr> 
</table>
</td></tr>
</table>

</body>
</html>
