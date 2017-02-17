<?php

session_start();

$adminlog = false;

include("admin/config.php");


if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
	
} else {

	if(!get_magic_quotes_gpc()) {
		$_SESSION['username'] = addslashes($_SESSION['username']);
		$_SESSION['password'] = addslashes($_SESSION['password']);
	}
	
$pgt = $_SESSION['username'];
$pga = $_SESSION['password'];
	  
if ($pgt == $admin_user) {
if ($pga == $admin_pass) {

$adminlog = true;

}
}

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
<title><?php print $site_name; ?> - gameplay :)</title>
<link href="style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>
<script src="inc/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<p align="center"><img src="title.png" width="700" height="120" border="0" usemap="#Map" />
  <map name="Map" id="Map"><area shape="rect" coords="628,5,696,21" href="all.php" /><area shape="rect" coords="628,5,696,21" href="#" />
    <area shape="rect" coords="581,5,618,20" href="index.php" /><area shape="rect" coords="628,5,696,21" href="#" />
  <area shape="rect" coords="0,1,352,120" href="index.php" />
  </map>
  <br />
</p>
<p align="center"><a href="play.php?g=<?php

include("inc/conn.php");

$nog = "SELECT id FROM ".$TBprefix."games ORDER BY CAST(id AS SIGNED) DESC LIMIT 0,1";

$resultnog = mysql_query($nog) or die ("Problem connecting to database."); 

 $totg = mysql_result($resultnog, 0, 'id');
 
 $rgn = $_GET['g'];
 
 while ($rgn == $_GET['g']) {

srand((double)microtime()*1000000);  
$rgn =  rand(1,$totg);

}

print $rgn;

 ?>"><img src="another.png" alt="Another Game?" border="0" width="550" height="25" /></a><br />

  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','550','height','400','src','swf/<?php print $_GET['g']; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','swf/<?php print $_GET['g']; ?>' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="550" height="400">
    <param name="movie" value="swf/<?php print $_GET['g']; ?>.swf" />
    <param name="quality" value="high" />
    <embed src="swf/<?php print $_GET['g']; ?>.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="550" height="400"></embed>
  </object></noscript>
<br />
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','550','height','40','src','rate?g=<?php print $_GET['g']; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','rate?g=<?php print $_GET['g']; ?>' ); //end AC code
  </script>
<noscript>
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="550" height="40">
  <param name="movie" value="rate.swf?g=<?php print $_GET['g']; ?>" />
  <param name="quality" value="high" />
  <embed src="rate.swf?g=<?php print $_GET['g']; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="550" height="40"></embed>
</object>
</noscript>
  <br />
<br />
<?php 

if ($adminlog == true) {


print "<div align=\"center\" class=\"style3\" ><a href='admin/delete.php?pgid=".$_GET['g']."'>Delete this game.</a></div>";


}else{


$advert_code = stripslashes($advert_code);



print $advert_code;


}



?>
</p>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
