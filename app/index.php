<?php

include("admin/config.php");

include("inc/conn.php");

$totg = $games_on_homepage;


$nog = "SELECT id FROM ".$TBprefix."games ORDER BY CAST(id AS SIGNED) DESC LIMIT 0,1";

$resultnog = mysql_query($nog) or die ("Problem connecting to database."); 

 $totgf = mysql_result($resultnog, 0, 'id');
 
 if ($totg > $totgf) {
 
 $totg = $totgf;
 
 }
 
 
 

$gnumbers = range(1, $totgf);
srand((float)microtime() * 1000000);
shuffle($gnumbers);
$cftg = 1;
foreach ($gnumbers as $crgn) {
    
	${'g'.$cftg} = $crgn;
	
	$cftg ++;
	
}



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php 

$meta_tags = stripslashes($meta_tags);

print $meta_tags; ?>
<META NAME="revisit-after" CONTENT="2">
<META NAME="distribution" CONTENT="global">
<title><?php print $site_name; ?> - Pick A Game</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>

<body>
<p align="center"><img src="title.png" width="700" height="120" border="0" usemap="#Map" />
  <map name="Map" id="Map"><area shape="rect" coords="628,5,696,21" href="all.php" /><area shape="rect" coords="628,5,696,21" href="#" />
    <area shape="rect" coords="581,5,618,20" href="index.php" /><area shape="rect" coords="628,5,696,21" href="#" />
  <area shape="rect" coords="0,1,352,120" href="index.php" />
  </map>
</p>
<p align="center"><br /><?php


$totg = intval($totg);

$ort = $totg;

$nodg = 0;

$rcv = 0;

$totg --;

while ($totg > 0) {

$trv = ${'g'.$totg};


$nog = "SELECT rating FROM ".$TBprefix."games WHERE id='$trv'";

$resultnog = mysql_query($nog) or die ("Problem connecting to database."); 

$xrat = mysql_result($resultnog, 0, 'rating');

if ($xrat == "x") {

//game has been deleted

$findrep = false;

while ($findrep == false) {

$nodg ++;

$ngn = $ort + $nodg;

$trv = ${'g'.$ngn};

$nog2 = "SELECT id,rating FROM ".$TBprefix."games WHERE id='$trv'";

$resultnog2 = mysql_query($nog2); 

$gie = mysql_numrows($resultnog2);


if ($gie == 1) {


$xrat2 = mysql_result($resultnog2, 0, 'rating');

if ($xrat2 != "x") {

$findrep = true;

print ' <a href="play.php?g='.${'g'.($ort+$nodg)}.'"><img href="play.php?g='.${'g'.($ort+$nodg)}.'" border="0" src="img/'.${'g'.($ort+$nodg)}.'.png" width="70" height="60"/></a>';

}


}else{

$findrep = true;

$rcv --;


}

}//while findrep

//-----------

}else{

print ' <a href="play.php?g='.${'g'.$totg}.'"><img href="play.php?g='.${'g'.$totg}.'" border="0" src="img/'.${'g'.$totg}.'.png" width="70" height="60"/></a>';

}


$rcv ++;




if ($rcv == 9) {


print '<br />';
$rcv = 0;

}

if ($totg == 1) {

$trv = ${'g'.$ort};

$nog = "SELECT rating FROM ".$TBprefix."games WHERE id='$trv'";

$resultnog = mysql_query($nog) or die ("Problem connecting to database."); 

$xrat = mysql_result($resultnog, 0, 'rating');

if ($xrat == "x") {


$findrep = false;

while ($findrep == false) {

$nodg ++;

$ngn = $ort + $nodg;

$trv = ${'g'.$ngn};

$nog2 = "SELECT id,rating FROM ".$TBprefix."games WHERE id='$trv'";

$resultnog2 = mysql_query($nog2); 

$gie = mysql_numrows($resultnog2);


if ($gie == 1) {


$xrat2 = mysql_result($resultnog2, 0, 'rating');

if ($xrat2 != "x") {

$findrep = true;

print ' <a href="play.php?g='.${'g'.($ort+$nodg)}.'"><img href="play.php?g='.${'g'.($ort+$nodg)}.'" border="0" src="img/'.${'g'.($ort+$nodg)}.'.png" width="70" height="60"/></a>';

}


}else{

$findrep = true;


}

}//while findrep





}else{


print ' <a href="play.php?g='.${'g'.$ort}.'"><img href="play.php?g='.${'g'.$ort}.'" border="0" src="img/'.${'g'.$ort}.'.png" width="70" height="60"/></a><br />';


}


}//totg == 1





$totg --;

}






 
?></p>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
