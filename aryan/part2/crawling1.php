<?php

include("../../functions/mainpage.php");
include_once('simple_html_dom.php');
?>

<?php
getheader();

?>


<div class="container">
<div class="row">
<h3 align="center">Computer Science Books From Ebay</h3>
<div class="col-md-12>"
<?php
$target_url = "http://www.ebay.in/sch/i.html?_from=R40&_trksid=p2050601.m570.l1311.R3.TR10.TRC0.A0.H0.Xmanagement+.TRS0&_nkw=management+books&_sacat=0";
$html = new simple_html_dom();
$html->load_file($target_url);
$result=array();
foreach($html->find('#spf_content') as $img)
{
   $s1=rtrim($img);

echo $s1;
array_push($result,"$s1");


 
}

print_r($result);
?>



?>
</div>
</div>
</div>
     <?php
				getIp();
				?>
     
     
    

   <?php
   
   getscripts();
   
   ?>
</body>

</html>
