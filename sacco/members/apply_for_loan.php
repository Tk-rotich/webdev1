<?php
session_start();
require_once('../db/conn.php');
$message="";
$fill="";
$member_id=$_SESSION['username'];
if(!isset($_SESSION['username']))
  {
    header('Location:../access/login.php');
  }


      $sql1="select * from members WHERE national_id = '$member_id'";
      $result=mysqli_query($connct,$sql1);
      $row=mysqli_fetch_array($result);

      
      $income=$row['income'];
      $savings=$row['savings_account_balance'];

      $sql2="SELECT loan_balance FROM loan_applications where national_id= '$member_id'  AND is_repaid = 0 AND loan_type ='emergency' ";
      $re=mysqli_query($connct,$sql2);

  if(!mysqli_num_rows($re) =="" )
        {
          $message ='<p style="color:red;">You have Unrepaid Emergency loan!!, Please pay before borrowing again!!</p>';
          $fill =1;
        }

else
{  
  $sql3="SELECT loan_balance FROM loan_applications where national_id= '$member_id'  AND no =(select MAX(no)from loan_applications) ";
  $result2=mysqli_query($connct,$sql3) or die(mysqli_error());
  $row2=mysqli_fetch_array($result2);

  $loan_balance1=$row2['loan_balance'];



      if(isset($_POST['submit']))
          {     
  
            if ($loan_balance1+$_POST['loan_balance'] > $_POST['savings'] *3) 
              {
                $message = "Your Active Loan plus Requested Amount Exceeds 3 times your Savings ";
              }

          else
              { 

               $sql4="SELECT loan_balance FROM loan_applications where national_id= '$member_id'  AND no =(select MAX(no)from loan_applications) ";
               $re4=mysqli_query($connct,$sql4);
               $row4= mysqli_fetch_array($re4);
               $loan_balance2=$row4['loan_balance'];

               $loan_balance = $loan_balance2+$_POST['loan_balance'];

                    if($_POST['member_id']== "" || $_POST['instalments']== "" || $_POST['loan_amount']=="" || $_POST['loan_balance']=="" ||$_POST['loan_purpose'] =="" || $_POST['repayment_period']=="" || $_POST['instalments']=="" || $_POST['rate']=="" )
                        {
                            $message="Some required fields are missing!!!!";
                        }

                    else{
                             $serial_no = uniqid('serial/'); 
                             $commence_date=date("Y,m,d");

                            $sql = "INSERT INTO loan_applications 
                            (serial_no,national_id,loan_amount,loan_interest,loan_purpose,start_date,repayment_period,instalments,rate,monthly_income,savings,guarantor1,guarantor2,loan_balance,is_paid,is_deleted,loan_type) 
                            VALUES
                            ('$serial_no','$_POST[member_id]','$_POST[loan_amount]','$_POST[loan_balance]','$_POST[loan_purpose]','$commence_date','$_POST[repayment_period]','$_POST[instalments]','$_POST[rate]','$_POST[income]','$_POST[savings]','$_POST[guarantor1]','$_POST[guarantor2]','$loan_balance','0','0','$_POST[loan_type]')
                            ";
                            mysqli_query($connct,$sql) OR die('Could not insert becoz:'. mysqli_error());
                          }

               $message="Application succesfull!!!";

              }

          }
}

?>
<!DOCTYPE html >
<html xmlns="http:">
<head>

<title>Sacco | Loan Application</title>
<link rel="stylesheet" type="text/css" href="../design/style.css" />






<script type="text/javascript" >
    


    
    function dothis()
    {
      
      var loan_amount = Number(document.getElementById("loan_amount").value);
      var r_period = Number(document.getElementById("r_period").value);

      var savings = Number(document.getElementById("savings").value);
     
      if (document.form.loan_amount.value == "")
        {
          alert("Amount is Required")
          document.form.loan_amount.focus();
          return false;
        }
     else if(document.form.loan_amount.value<50)  
          {
              alert("Invalid value!!!!!\nMinimum Loan amount is Ksh 50")
              document.form.loan_amount.focus();
              return false;
          }

    else if(document.form.loan_amount.value>savings*3)
        {
          alert("Loan amount should not be more than 3 times your income")
          document.form.loan_amount.focus();
          return false;
        }
  else  {  
           if (document.form.loan_type.value == "emergency") 
           {
               document.form.repayment_period.value="1 Month";
               document.form.rate.value=12;
               var interest = loan_amount * 12 * 1/(100*12);
               var sum_loan = interest+loan_amount;
               var instal = Math.round(sum_loan);
               document.form.instalments.value=instal;
               document.form.loan_balance.value=sum_loan;
               alert("Loan Type: Emergency loan. \nLoan Amount = Ksh "+loan_amount+"\nInterest = Ksh "+interest+"   \nTotal Repayment = Ksh "+sum_loan+" \nPayment Period 6 Months\nRate 12% Per Month\n Instalment  Ksh "+instal+" Once" );
               
              
               return true;
           }

           else if (document.form.loan_type.value == "development") 
           {
               document.form.repayment_period.value= r_period;
               document.form.rate.value=10;
               var interest = loan_amount * 10 * r_period/(100*12);
               var sum_loan = interest+loan_amount;
               var instal = Math.round(sum_loan / r_period);
               document.form.instalments.value=instal;
               document.form.loan_balance.value= sum_loan ;
               document.form.loan_balance.value=sum_loan;
               alert("Loan Type: Development loan. \nLoan Amount = Ksh "+loan_amount+"\nInterest = Ksh "+interest+"   \nTotal Repayment = Ksh "+sum_loan+" \nPayment Period "+r_period+" Months\nRate 10% Per Year\n Instalment  Ksh "+instal+"  per month");
               

               return true;
           }
           else if (document.form.loan_type.value == "sunripe") 
           {
               document.form.repayment_period.value= r_period;
               document.form.rate.value=12;
               var interest = loan_amount * 12 * (1*r_period)/(100*12);
               var sum_loan = interest+loan_amount;
               var instal = Math.round(sum_loan / r_period);
               document.form.instalments.value=instal;
               document.form.loan_balance.value= sum_loan ;
               document.form.loan_balance.value=sum_loan;
               alert("Loan Type: Sunripe Plus loan. \nLoan Amount = Ksh "+loan_amount+"\nInterest = Ksh "+interest+"   \nTotal Repayment = Ksh "+sum_loan+" \nPayment Period "+r_period+" Months\nRate 12% Per Year\n Instalment  Ksh "+instal+"  per month");
               
               return true;
           }
           
            else{
                   alert ("Not valid!!!!!");
                   return false;
            }
           
          }
        }  
    
 function guarantor_id2()
 {
  if (!(document.getElementById("guarantor2").value.length == 8 ))
    {
      alert("The ID Number is Invalid\nShould be 8 Digits!!!!")
      document.getElementById("guarantor2").focus();
      return false;
    }
    else{
      return true;
    }
 }   


function guarantor_id1()
{ 
  
    if(!(document.getElementById("guarantor1").value.length == 8 ))
    {
      alert("The ID Number is Invalid\nShould be 8 Digits!!!!")
      document.getElementById("guarantor1").focus();
      return false;
    }
    
    else{
      document.getElementById("guarantor2").focus();
      return true;
    }
   
}


</script>


</head>

<body>
<img align="middle" src="../image/01.png" width="100%" />

<table bgcolor="black" align="center" width="70%" height="100%" style=" border-radius: 10px;">




<tr>


<td align="center" bgcolor="white" style="border:solid 4px #FF6600; border-radius: 10px;">
<div id="header">
<h3 align="center">APPLY FOR LOAN</h3>
</div>
      <ol id="toc">
	 <li    ><a href="my_profile.php"><span>My Profile </span></a></li>
	  <li  ><a href="make_saving.php"><span>Make Saving</span></a></li>
	 <li ><a href="my_savings.php"><span>My Savings </span></a></li>
    <li class="current"   ><a href="apply_for_loan.php"><span>Apply for Loan</span></a></li>
	<li   ><a href="my_loans.php"><span>My Loans</span></a></li>
	<li   ><a href="make_repayment.php"><span>Make Repayment</span></a></li>
	<li   ><a href="my_loan_repayments.php"><span>My Repayments</span></a></li>
	<li   ><a href="my_statement.php"><span>My Statement</span></a></li>
  <li   ><a href="../access/logout.php"><span>Logout</span></a></li>
	 
	
     </ol>
<form name="form" id="form" action="#" onsubmit="return acount()" method="post" >

<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Loan Specification </div>
<table align="center" width="50%" >  

<tr>
<td>Member ID</td>
<td><input type="text" name="member_id" value="<?php echo $member_id;   ?>" disabled="disabled" /> <input type="hidden" value="<?php echo $member_id;   ?>"  name="member_id" /></td>
</tr>

<tr>
<td>Loan Type</td>
 <td>
  <select name="loan_type" id="loan_type"  required="required">
  <option></option>
  <option value="emergency">Emergency loan</option>
  <option value="development">Development</option>
  <option value="sunripe">Sunripe Plus</option>
 </select>
</td>
</tr>

<tr>
<td>Repayment Period:</td>
<td><input type="text" id="r_period" name="r_period">Months</td>
</tr>

<tr>
<td>Amount:</td>
<td><input  type="text"  id="loan_amount" name="loan_amount"  required="required" onchange="dothis()" /></td>

</tr>

<tr>
<td>Loan purpose</td>
<td><input type="text" onchange='ln_purpose()' id="loan_purpose"  name="loan_purpose" /></td>
</tr>

</table>
</div>  
</div>  


<div id="personal_details" style="border:1px dotted grey;" >  
<div class="label">Loan Securities </div>
<table align="center" width="50%" >  
<tr>
<td>Monthly Income</td>
<td><input type="text" name="income" id="income" value="<?php echo $income;   ?>" disabled="disabled" /> <input type="hidden" value="<?php echo $income;   ?>" id="income"  name="income" /></td>

</tr>

<tr>
<td>Savings</td>
<td><input type="text" name="savings" id="savings" value="<?php echo $savings;   ?>" disabled="disabled" /> <input type="hidden" value="<?php echo $savings;   ?>" id="savings"  name="savings" /></td>
</tr>

<tr>
<td>Guarantor 1 ID no.</td>
<td><input type="text" onchange="guarantor_id1()"  required="required" name="guarantor1" id="guarantor1" /></td>
</tr>

<tr>
<td>Guarantor 2  ID no.</td>
<td><input type="text" onchange="guarantor_id2()" required="required" name="guarantor2" id="guarantor2" /></td>
</tr>
<input type="hidden" id="repayment_period" name="repayment_period" value=""  />
<input type="hidden" id="rate" name="rate" value=""  />
<input type="hidden" id="instalments" name="instalments" value=""  />
<input type="hidden" id="loan_balance" name="loan_balance" value=""  />

<tr>
<td></td> 
<td><?php echo  $message;  ?></td>
</tr>
</table>




</div> 

<input style="margin-top:10px;margin-bottom:10px;" type="submit" value="SUBMIT" onClick='amount();' name="submit" />

</form>



<?php

?>
</td>   
</tr>  

</table>


</td></tr>


</table>


</body>
</html>
