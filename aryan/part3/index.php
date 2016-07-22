<?php
include("../../functions/mainpage.php");
?>

<?php
getheader();

?>

<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Compare Prices From Flipkart!!</h1>
         </div>
        </div>
    </header>



<div class="container">
<div class="row">
<h3 align="center">Engineering Books</h3>
<div class="col-md-3">
<img src="books images/ProgWinPhone7.jpg" height="60px" width="60px" />
<?php
 
$url = "http://www.flipkart.com/programming-windows-phone7-microsoft-silverlight-pb-english/p/itmd34fpahducw5h?pid=9789350041895&ref=L%3A-8446160810695112633&srno=p_1&query=programming+windows+7&otracker=from-search";
 
$response = getPriceFromFlipkart($url);
 
echo json_encode($response);
 
/* Returns the response in JSON format */
 
function getPriceFromFlipkart($url) {
 
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 10.10; labnol;) ctrlq.org");
	curl_setopt($curl, CURLOPT_FAILONERROR, true);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$html = curl_exec($curl);
	curl_close($curl);
 
	$regex = '/<meta itemprop="price" content="([^"]*)"/';
	preg_match($regex, $html, $price);
 
	$regex = '/<h1[^>]*>([^<]*)<\/h1>/';
	preg_match($regex, $html, $title);
 
	$regex = '/data-src="([^"]*)"/i';
	preg_match($regex, $html, $image);
 
	if ($price && $title && $image) {
	$response = array("price" => "Rs. $price[1].00", "title" => $title[1]);
	} else {
	$response = array("status" => "404", "error" => "We could not find the product details on Flipkart $url");
	}
 
	return $response;
}
?>
</div>
</div>
</div>










     
     <?php
				getIp();
				?>
     
     
    
	 <?php
	 
	 getfooter();
	 
	 ?>
   <?php
   
   getscripts();
   
   ?>
</body>

</html>
