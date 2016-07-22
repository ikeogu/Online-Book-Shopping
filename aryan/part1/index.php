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
		<!-- Grid -->
		<section class="grid grid--loading">
			<!-- Loader -->
			<img class="grid__loader" src="images/grid.svg" width="60" alt="Loader image" />
			<!-- Grid sizer for a fluid Isotope (Masonry) layout -->
			<div class="grid__sizer"></div>
			<!-- Grid items -->
			<?php
			
			getpro();
			?>
			
             <?php
					
					getcatpro();
					?>
                    
                    <?php
					
					getbrandpro();
					?>
            
            
		</section>
		<!-- /grid-->
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
