<?php
session_start();
$message="";
require_once('../db/conn.php');

if (isset($_POST['login'])) 
{
	# code...
	$user_id=$_POST['user_id'];
	$password=$_POST['password'];

	$q="SELECT * FROM staff WHERE national_id = '$user_id' AND password ='$password' ";
	$r=mysqli_query($connct, $q);
	

	if(mysqli_num_rows($r) == 1 )
		{
			$_SESSION['username'] = $_POST['user_id'];
			header("Location:../staff/view_members.php");
		}

	else if (mysqli_num_rows($r) == "")
	   {

			$qe ="SELECT * FROM members WHERE national_id = '$user_id' AND password ='$password' ";
		    $re =mysqli_query($connct,$qe);
		    //$data= mysqli_fetch_array($re);

            //$message=$data['first_name'];

		 if (mysqli_num_rows($re) == 1) 
		    {    $data= mysqli_fetch_array($re);
		    	 
		    	if($data['is_active'] == 1)
					  {  
					     $_SESSION['username'] = $_POST['user_id'];
			             header("Location:../members/my_profile.php");
					   }
                else if($data['is_active'] == 0)
					  {
						  header("Location:../access/activate_account.php?member_id=$user_id");
				      }
            }   
        }

	  else
			{
				$message="incorrect username or password";
			}
	}

	


?>
<!DOCTYPE html PUBLIC "">
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sacco |Login </title>
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
<h3 align="center">AUTHENTICATION</h3>
</div>
<form action="#" method="post" >
<table align="center" width="50%" >


<tr>
<td></td>
<td>New User? &nbsp;<a href="confirm_employee.php">Register</a></td>
</tr>

<tr>
<td></td>
<td></td>
</tr>

<tr>
<td>User National ID</td>
<td><input type="text" name="user_id" placeholder="National ID" /></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" /></td>
</tr>



<tr>
<td></td>
<td> <button  type="submit" name="login" value="Login"><img align="middle" src="../image/login.png" width="70px" height="30px" /></button> </td>
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
