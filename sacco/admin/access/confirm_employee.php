<?php
session_start();
$message="";
//error_reporting(0);
require_once('../db/conn.php');

if(isset($_POST['search'])){

$emp_id = $_POST['emp_id'];
$emp_mail = $_POST['emp_mail'];
$member_id = $_POST['member_id'];

$q = "SELECT * FROM employee WHERE emp_id = '$emp_id' AND emp_mail = '$emp_mail' ";
$r = mysqli_query($connct, $q) or die(mysqli_error());

if(mysqli_num_rows($r) == 1 )
		{
			
			header("Location:registration.php?member_id=$member_id");
		}

else{
	$message ="Sorry!!! We regret Your Employee isn't registered yet!!! ";
}

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv<a href="regClients.php">page</a>="Content-Type" content="text/html; charset=iso-8859-1" />
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
	 <li class="current"><span><a href="#">Check Your Employer: </a></span></li>
    
	
     </ol>
<form name="form" action="#"  method="post" > 

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Employer details </div>
<table align="center" width="60%" >  

<tr>
<td>Employer ID</td>
<td><input type="text" name="emp_id" /></td>
</tr>
<tr>


<tr>
<td>Email Address</td>
<td><input type="email" name="emp_mail" /></td>
</tr>
<tr>

<tr>
<td>Your National ID</td>
<td><input type="text" name="member_id" /></td>
</tr>
<tr>

<tr>
<td> <?php echo $message; ?></td>
</tr>	

</table>
</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="Check" name="search" />
 </form>






</td>   
</tr>  


</table>


</td></tr>


</table>
   

</body>
</html>
