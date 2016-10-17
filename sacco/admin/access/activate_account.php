<?php
session_start();
//error_reporting(0);
require_once('../db/conn.php');

$message="";

$member_id=$_GET['member_id'];


if(isset($_POST['activate']))
{
$national_id=$_POST['usernameH'];
$new_password=$_POST['new_password'];
$conf_new_password=$_POST['conf_new_password'];

if($new_password==$conf_new_password)
{
	$sqlS="UPDATE members SET password = '$new_password',is_active = '1' WHERE national_id = '$national_id' ";
	mysqli_query($connct, $sqlS) or die(mysql_error());
	header("Location:../access/account_activated.php");
}
else
{
   $message="passwords do not match";
}




}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sacco | Account Activation </title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />
</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px; text-align:center;">
<tr bgcolor="black" style="text-align:center; border-radius:5px; height:30px;">
<td align="center"  style="text-align:center;">

</td>

</tr>


<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">


<div class="contenta">
   
     <div id="header">
<h3 align="center">ACTIVATE ACCOUNT</h3>
</div>


<?php
$sql="select * from members WHERE national_id = '$member_id' ";
$result=mysqli_query($connct, $sql);
$row=mysqli_fetch_array($result);

$password=$row['password'];;
?>



<form action="#" method="post" >
<table align="center" width="50%" >

<tr>
<td>Name</td>
<td><input type="text" name="username" value="<?php echo $row['first_name']  .'    '. $row['last_name'] ; ?>" disabled="disabled" /> <input type="hidden" name="usernameH" value="<?php echo $member_id; ?>"  /></td>
</tr>


<tr>
<td>National ID</td>
<td><input type="text" name="username" value="<?php echo $member_id; ?>" disabled="disabled" /> <input type="hidden" name="usernameH" value="<?php echo $member_id; ?>"  /></td>
</tr>

<tr>
<td>Old Password</td>
<td><input type="password" name="old_password" value="<?php echo $password; ?>" disabled="disabled" /></td>
</tr>

<tr>
<td>New Password</td>
<td><input type="password" name="new_password" /></td>
</tr>

<tr>
<td>Confirm Password</td>
<td><input type="password" name="conf_new_password" /></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="activate" value="activate"/></form> </td>
</tr>


<tr>
<td></td>
<td><?php  echo $message; ?></td>
</tr>

</table>
   

  
</div>
   
   
   
   
</div></tr>
</table>


</td></tr>




</table>

<table align="center" width="60%" style="text-align:center;">
<tr>
<td>
<ul id="footList">
<li>Home</li>
<li>Contact Us</li>
<li>About Us</li>
<li>Terms & Conditions</li>
</ul>
</td>

</tr>
</table>


</body>
</html>
