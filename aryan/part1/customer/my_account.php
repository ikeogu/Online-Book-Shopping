<?php
session_start();
include("functions.php");
include("style.php");

?>
<body>

<?php

getheader();
?>
<?php
getnav();
?>
<?php

cart();
?>
<?php

getIp();
?>
<div class="container">
<div class="row">
<div class="col-md-3">

<h2 align="center">
<?php
if(isset($_SESSION['customer_email']))
{
	echo "<b> Welcome:</b>".$_SESSION['customer_email']."<b>";
}



?>
<?php
if(!isset($_SESSION['customer_email']))
{
	echo "Please Login In To Your Account!!!!";
}



?>

</h2>
</div>
<div class="col-md-3">
<h3 align="right">
<?php

if(!isset($_SESSION['customer_email']))
{
	
echo "<a href='../checkout.php'>Login<a> ";	
}
else
{
echo "<a href='logout.php'>Logout</a>";	
}



?>
</h3>
</div>
</div>

<div class="row">
<div class="col-md-3">
<h1>
My Account
</h1>
</div>
</div>
<div class="container">
<Div class="row">
<div class="col-md-12">
<?php 

if(isset($_SESSION['customer_email']))				
{
                $user = $_SESSION['customer_email'];
				
				$get_img = "select * from customers where customer_email='$user'";
				
				$run_img = mysqli_query($con, $get_img); 
				
				$row_img = mysqli_fetch_array($run_img); 
				
				$c_image = $row_img['customer_image'];
				
				$c_name = $row_img['customer_name'];
				
				echo "<p style='text-align:center;'><img src='customer_images/$c_image' class='img-rounded'  style='width:150px;height:150px'/></p>";
}
				?>
                </div>
                
                </div>
                </div>
 <div class="container">
 <div class="row">
 <div class="col-md-3">               
<div class="list-group">
 
 <li class="list-group-item"><a href="my_account.php?edit_account">Edit Account</a></li>
 <li class="list-group-item"><a href="my_account.php?change_pass">Change Password</a></li> 
 <li class="list-group-item"><a href="my_account.php?delete_account">Delete Account</a></li>
 <li class="list-group-item"><a href="logout.php">Logout</a></li> 
 
 
                  
</div>
</div>
<div class="col-md-9">
<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				
				if(isset($_SESSION['customer_email']))
				{
					echo "
				<h2>Welcome:  $c_name </h2> <b>You can Update Your Info Here</b>";
				}
				
				
				}
				}
				}
				}
				?>
				
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
				
				
				
				?>
				


</div>

        
<?php

getscripts();
?>
</div>
</div>

</body>

</html>
