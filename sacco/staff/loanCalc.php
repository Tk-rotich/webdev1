<script language="JavaScript">
<!--
function showpay() {
 if ((document.calc.loan.value == null || document.calc.loan.value.length == 0) ||
     (document.calc.months.value == null || document.calc.months.value.length == 0)
||
     (document.calc.rate.value == null || document.calc.rate.value.length == 0))
 { document.calc.pay.value = "Incomplete data";
 }
 else
 {
 var princ = document.calc.loan.value;
 var term  = document.calc.months.value;
 var intr   = document.calc.rate.value / 1200;
 document.calc.pay.value = princ * intr / (1 - (Math.pow(1/(1 + intr), term)));
 }

// payment = principle * monthly interest/(1 - (1/(1+MonthlyInterest)*Months))

}

// -->
</script>

The results of this loan payment calculator are for comparison purposes only.
They will be a close approximation of actual loan
repayments if available at the terms entered, from a financial institution. This
is being
provided for you to plan your next loan application. To use, enter values
for the
Loan Amount, Number of Months for Loan, and the Interest Rate (e.g.
7.25), and
click the Calculate button. Clicking the Reset button will clear entered
values.
<p>
<center>
<form name=calc method=POST>
<table width=60% border=0>
<tr><th bgcolor="#aaaaaa" width=50%><font color=blue>Description</font></th>
<th bgcolor="#aaaaaa" width=50%><font color=blue>Data Entry</font></th></tr>
<tr><td bgcolor="#eeeee">Loan Amount</td><td bgcolor="#aaeeaa" align=right><input
type=text name=loan
size=10></td></tr>
<tr><td bgcolor="#eeeee">Loan Length in Months</td><td bgcolor="#aaeeaa"
align=right><input type=text
name=months size=10></td></tr>
<tr><td bgcolor="#eeeee">Interest Rate</td><td bgcolor="#aaeeaa" align=right><input
type=text name=rate
size=10></td></tr>
<tr><td bgcolor="#eeeee">Monthly Payment</td><td bgcolor="#eeaaaa"
align=right><em>Calculated</em> <input
type=text name=pay size=10></td></tr>
<tr><td  bgcolor="#aaeeaa"align=center><input type=button onClick='showpay()'
value=Calculate></td><td bgcolor="#eeeeaa" align=center><input type=reset
value=Reset></td></tr>
</table>
</form>
<font size=1>Enter only numeric values (no commas), using decimal points
where needed.<br>
Non-numeric values will cause errors.</font>
</center>

<p align="center"><font face="arial" size="-2">This free script provided by</font><br>
<font face="arial, helvetica" size="-2"><a href="http://javascriptkit.com">JavaScript
Kit</a></font></p>