<?php
session_start();
$message="";
require_once('../db/conn.php');


if (isset($_POST['login'])) 
{
	# code...
	$admin_id=$_POST['email'];
	$password=$_POST['password'];

	$q="SELECT * FROM admin WHERE email = '$admin_id' AND password ='$password' ";
	$r=mysqli_query($connct, $q);
	

	if(mysqli_num_rows($r) == 1 )
		{   
			$data=mysqli_fetch_assoc($r);
			$email=$data['email'];

			$_SESSION['email'] = $email;
			
			header("Location:index.php");
		}

		else{
		header("Location: ../access/login.php");
	   }
  
	}

	


?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>ADMIN |Login </title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />

</head>

<body>
<!-- <img align="middle" src="../image/login.png" width="100%" />  -->
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
<h3 align="center">AUTHENTICATION</h3>
</div>
<form action="#" method="post" >
<table align="center" width="50%" >


<tr>
<td></td>
<td></td>
</tr>

<tr>
<td>Admin Email</td>
<td><input type="text" name="email" placeholder="Email" /></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" /></td>
</tr>



<tr>
<td></td>
<td> <button  type="submit" name="login" value="Login"><img  align="middle" src="../image/login.png" width="10%" height="10%" /></button> </td>
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



<?php echo $message; ?>
</body>
</html>
