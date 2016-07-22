<?php
session_start();
include("functions.php");
include("style.php");
include("includes/connection.php");
?>
<body>

<?php

getheader();
?>
<?php
getnav();
?>
<body >
	<!-- Bottom bar with filter and cart info -->
	<div class="bar">
		<div class="filter">
			<span class="filter__label">BOOKS CATEGORY: </span>
            <button class="action filter__item filter__item--selected" data-filter="*"><?php getcats(); ?></button>
			
		</div>
        
        <br>
        
        <div class="filter">
			<span class="filter__label">AREAS: </span>
            	<button class="action filter__item filter__item--selected" data-filter="*"><?php getbrands(); ?></button>		
		</div>
		<button class="cart">
			<i class="cart__icon fa fa-shopping-cart"></i>
			<span class="text-hidden">Shopping cart</span>
			<span class="cart__count">0</span>
		</button>
	</div>
	<!-- Main view -->
	<div class="view">
		<!-- Blueprint header -->
		<header class="bp-header cf">
			<h1>Placement Assured Book Section </h1>
            <h3 align="right">
<?php
if(isset($_SESSION['customer_email']))
{
	echo "<b> Welcome:</b>".$_SESSION['customer_email']."<b>";
}
else
{
echo "<b>Welcome guest</b>";	
}


?>

</h3>

<h4 align="left">
SHOPPING CART DETAILS:
</h3>
Total items: <?php total_items(); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Total Price: <?php  total_price();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php

if(!isset($_SESSION['customer_email']))
{
	
echo "<a href='checkout.php'>Login<a> ";	
}
else
{
echo "<a href='logout.php'>Logout</a>";	
}



?>

			
		</header>



<div align="center">    
<form action="customer_register.php" method="post" enctype="multipart/form-data" >


<table align="center" width="750">
<tr>
<td><h3>Create An Account</h3></td>

</tr>

<tr >
<td align="right"> Customer Name: </td>
<td> <input type="text" name="c_name" required/> </td>
</tr>

<tr>
<td align="right"> Customer Email: </td>
<td><input type="text" name="c_email" required/>  </td>
</tr>

<tr>
<td align="right"> Customer Password: </td>
<td><input type="password" name="c_pass" required/>  </td>
</tr>

<tr>
<td align="right"> Customer Image: </td>
<td><input type="File" name="c_image" required/>  </td>
</tr>


<tr>
<td align="right"> Customer Country: </td>
<td> 
<select name="c_country">
<option>Select A Country</option>
<option>Afghanisthan</option>
<option>India</option>
<option>Srilanka</option>
<option>USA</option>
<option>China</option>
<option>Canada</option>
<option>BLA BLA</option>
<option>Poland</option>
<option>Double Bla Bla</option>
</select>


</td>
</tr>

<tr>
<td align="right"> Customer City: </td>
<td><input type="text" name="c_city" required/>  </td>
</tr>

<tr>
<td align="right"> Customer Contact: </td>
<td><input type="text" name="c_contact" required/>  </td>
</tr>

<tr>
<td align="right"> Customer Address: </td>
<td><input type="text" name="c_address" required />  </td>
</tr>

<tr>
<td align="right"><input type="submit"  name="register" value="Create Account"  /></td>

</tr>



</table>

</form>

</div>

<?php

cart();
?>
<?php

getIp();
?>

<?php

getscripts();
?>
</body>

</html>
<?php
if(isset($_POST['register']))
{
$ip=getIp();
$c_name=$_POST['c_name'];
$c_email=$_POST['c_email'];
$c_pass=$_POST['c_pass'];
$c_image=$_FILES['c_image']['name'];
$c_image_tmp=$_FILES['c_image']['tmp_name'];
$c_country=$_POST['c_country'];
$c_city=$_POST['c_city'];
$c_contact=$_POST['c_contact'];
$c_address=$_POST['c_address'];

move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

 $insert_c="insert into customers(customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image')";


$run_c=mysqli_query($con,$insert_c);

$sel_cart="select * from cart where ip_add='$ip' ";
$run_cart=mysqli_query('$con,$sel_cart');

$check_cart=mysqli_num_rows($run_Cart);

	if($check_cart==0)
	{
		$_SESSION['customer_email']=$c_email;
	echo "<script>alert('Account Has Been Created!!!!');</script>";	
	
	echo "<script>window.open('customer/myaccount.php','_self');</script>";
	
	}
	else
	{
  $_SESSION['customer_email']=$c_email;
	echo "<script>alert('Account Has Been Created!!!!');</script>";	
	
	echo "<script>window.open('checkout.php','_self');</script>";
	
		
		
	
	
}

}

?>

