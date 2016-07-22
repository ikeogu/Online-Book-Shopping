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
     
     </header>
           <div align="center">
 <?php
               if(!isset($_SESSION['customer_email']))
			   {
				   include('customer_login.php');
			   }
			   else
			   {
				   include('payment.php');
			   }
      
	  
	  
	  ?>      
      
      </div>      

<?php

getscripts();
?>
</body>

</html>
