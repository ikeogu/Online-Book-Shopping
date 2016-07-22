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
$target_url = "http://www.ebay.in/sch/i.html?_odkw=computer+science&_osacat=0&_from=R40&_trksid=p2045573.m570.l1313.TR3.TRC0.A0.H0.Xcomputer+science+books.TRS0&_nkw=computer+science+books&_sacat=0";
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
   
   getscripts();
   
   ?>
</body>

</html>
