
<?php
session_start();
require_once('../db/conn.php');

error_reporting(0);

if(!isset($_SESSION['username'])){
  header('Location:../access/login.php');
}


if(isset($_GET['id_delete'])) {
    $sql=("DELETE FROM loan_applications WHERE  serial_no = '".$_GET['id_delete']."'");
    mysqli_query($connct, $sql);
   
   //header("Location:../members/my_loan_repayments.php");
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
	 <li  ><a href="loan_application.php"><span>Loan Application </span></a></li>
	  <li   ><a href="view_loan_applications.php"><span>Application record </span></a></li>
	 <li    ><a href="loan_repayments.php"><span>Loan Repayment </span></a></li>
    <li   ><a href="view_loan_repayments.php"><span>Repayments Record</span></a></li>
	  <li   ><a href="manage_loan_application.php"><span>Manage</span></a></li> 
    <li class="current"  ><a href="sort_loan_applications.php"><span>Search loan By:</span></a></li>
     </ol>


	 
	<div id="personal_details" style="border-top:1px dotted grey;" >   
      <form method="post" action="#">
      <ol id="toc">
      <label>Sort by Loan Type:</label>
      <select name="type" >
      <option value="#"></option>
      <option value="sunripe">Sunripe Plus</option>
      <option value="development">Development</option>
      <option value="emergency">Emergency</option>

      </select
     </ol>
      <input style="margin-top:10px;margin-bottom:10px;" type="submit" value="search"  name="search" />

     </form>
<table align="center" width="50%" >  
<div class="contenta">

    
   
   <table align="left" id="table">
   <tr style="margin-bottom:1px;">
<td id="tab2">Loan Id</td><td id="tab2">Member Id</td><td id="tab2">Application Date</td><td id="tab2">Repayment Period</td><td id="tab2">Rate</td><td id="tab2">Loan Amount</td><td id="tab2">Loan Balance</td><td id="tab2">Loan State</td><td id="tab2">Edit</td><td id="tab2">Delete</td>
</tr>
   
     <?php

if(isset($_POST['search']))
{
    $search = $_POST['type'];

    $sql="SELECT * from loan_applications WHERE loan_type = '$search' ";
    $result=mysqli_query($connct, $sql) or die(mysql_error());
    while($row=mysqli_fetch_array($result)){
      if($row['is_paid'] == 0 )
      {
        $loan ="Not Processed";
      }
      else if($row['is_paid'] == 1)
      {
           $loan ="Paid";
      }
      else if($row['is_paid'] == 2)
      {
           $loan ="Declined";
      }
    echo '
    <tr style="margin-bottom:1px;">
    <td id="tab1">'.$row['serial_no'].'</td>
    <td id="tab1">'.$row['national_id'].'</td>
    <td id="tab1">'.$row['appl_date_time'].'</td>
    <td id="tab1">'.$row['repayment_period'].'</td>
    <td id="tab1">'.$row['rate'].'</td>
    <td id="tab1">'.$row['loan_amount'].'</td>
    <td id="tab1">'.$row['loan_balance'].'</td>
    <td id="tab1">'.$loan.'</td>

    <td id="tab1"><a href="edit_loan_applications.php?loan_id='.$row['serial_no'].'">Edit</td></a>
    <td id="tab1"><a href="view_loan_applications.php?id_delete='.$row['serial_no'].'" onclick="Del()"class="action"> Delete</a></td>
    </tr>
    '
    ;
    }


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
