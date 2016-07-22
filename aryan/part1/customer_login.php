<?php

include("includes/connection.php");

?>

<div align="center">

<form method="post" action="">
<table width="500" 
align="center">

<tr align="center">
	<td><h4> Login Or Register To Shop!!!  </h4></td>
</tr>

<tr align="center">
<td colspan="3">Email: 
<input type="center" name="email" placeholder="enter mail" required="required"></td> 
</tr>

<tr align="center">
<td colspan="5">Password:<input type="password" name="pass" placeholder="enter password" required="required"></td> 
</tr>

<tr align="right">
	<td>
    
    <a href="checkout.php?forgot_pass"> Forgot Password?? </a>
    </td>

</tr>


<tr align="center">	
	<td><input type="submit" name="login" value="login"></td>
</tr>



</table>

<h3>
<a href="customer_register.php">New ? Register Here!!</a>
</h3>

</form>
<?php

if(isset($_POST['login']))
{
	$c_email=$_POST['email'];
	$c_pass=$_POST['pass'];
	$sel_c="select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'  ";
	
	$run_c=mysqli_query($con,$sel_c);
	
	$check_customer=mysqli_num_rows($run_c);
	
	if($check_customer==0)
	{
	echo "<script>alert('Password or email is incorrect,pls try again')</script>";	
	
	exit();
		
	}
	$ip=getIP();
	
	$sel_cart="select * from cart where ip_add='$ip' ";
$run_cart=mysqli_query('$con,$sel_cart');

$check_cart=mysqli_num_rows($run_cart);
     if($check_customer>0 AND $check_cart==0)
	 {
		 $_SESSION['customer_email']=$c_email;
		 echo "<script>alert('login sucess!!!')</script>";
		 echo "<script>window.open('customer/my_account.php','_self')</script>";
		 
	 }
	 else
	 {
		 $_SESSION['customer_email']=$c_email;
		 echo "<script>alert('login sucess!!!')</script>";
		 echo "<script>window.open('checkout.php','_self')</script>";
		 
		 
	 }
	
	
	
}


?>
</div>