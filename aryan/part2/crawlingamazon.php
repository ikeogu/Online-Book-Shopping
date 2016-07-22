<?php

include("../../functions/mainpage.php");
include_once('simple_html_dom.php');
?>

<?php
getheader();

?>
<div class="container">
<div class="row">
<h3 align="center">Computer Science Books From Amazon</h3>
<div class="col-md-12>"
<?php

$target_url = "https://www.amazon.in/s/ref=nb_sb_ss_c_0_12?url=search-alias%3Dstripbooks&field-keywords=computer+science&sprefix=computer+sci%2Caps%2C311";
$html = new simple_html_dom();
$html->load_file($target_url);
$result=array();
foreach($html->find('#center') as $img)
{
   $s1=rtrim($img);

echo $s1;
array_push($result,"$s1");


 
}

print_r($result);
?>
<?php

include_once('simple_html_dom.php');
$target_url = "https://www.amazon.in/s/ref=sr_pg_2?rh=n%3A976389031%2Ck%3Acomputer+science&page=2&keywords=computer+science&ie=UTF8&qid=1443984062";
$html = new simple_html_dom();
$html->load_file($target_url);
$result=array();
foreach($html->find('#center') as $img)
{
   $s1=rtrim($img);

echo $s1;
array_push($result,"$s1");


 
}

print_r($result);
?>
</div>
</div>
</div>
 
     
    

   <?php
   
   getscripts();
   
   ?>
</body>

</html>
