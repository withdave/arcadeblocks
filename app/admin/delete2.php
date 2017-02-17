<?php



include("config.php");

include("../inc/conn.php");


session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
	header('Location: index.php');
} else {

	
$pgt = $_SESSION['username'];
$pga = $_SESSION['password'];


	  
if ($pgt != $admin_user) {

header('Location: index.php');

}

if ($pga != $admin_pass) {

header('Location: index.php');

}


}

//If delete...

if (isset($_POST['submit2'])) {

$gid = $_GET['gid'];

if ($gid != preg_replace('#[^0-9]+#i', '', $gid)) {

header('Location: delete.php?er=inv');

}


$nog = "SELECT id FROM ".$TBprefix."games WHERE id = '$gid'";

$resultnog = mysql_query($nog) or die ("<div align=\"center\" class=\"style3\" >Problem connecting to database. <br><br><a href='delete.php'>Back</a></div>"); 

$dge = mysql_numrows($resultnog);

if ($dge != 1) {


header('Location: delete.php?er=ex');

}

//Delete png and swf


$myFile = "../img/".$gid.".png";
unlink($myFile);

$myFile = "../swf/".$gid.".swf";
unlink($myFile);


//Delete game

$vfr = "x";

 $gcs = "UPDATE ".$TBprefix."games SET rating = '$vfr' WHERE id='$gid'";

$resultgcs = mysql_query($gcs) or die ("<div align=\"center\" class=\"style3\" >Problem connecting to database. <br><br><a href='delete.php'>Back</a></div>");



die ("<div align=\"center\" class=\"style3\" >Game successfully deleted. <br><br><a href='delete.php'>Back</a></div>");


}

//If view...


if (isset($_POST['submit'])) {


$gid = $_POST['gid'];

if ($gid != preg_replace('#[^0-9]+#i', '', $gid)) {

header('Location: delete.php?er=inv');

}

$nog = "SELECT id FROM ".$TBprefix."games WHERE id = '$gid'";

$resultnog = mysql_query($nog) or die ("<div align=\"center\" class=\"style3\" >Problem connecting to database. <br><br><a href='delete.php'>Back</a></div>"); 

$dge = mysql_numrows($resultnog);

if ($dge != 1) {


header('Location: delete.php?er=ex');

}



//-------------------
	  
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $site_name; ?> - Admin</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>
<script src="../inc/AC_RunActiveContent.js" type="text/javascript"></script>
</head>

<body>
<p align="center"><img src="../title.png" width="700" height="120" border="0" usemap="#Map" />
  <map name="Map" id="Map"><area shape="rect" coords="628,5,696,21" href="../all.php" />
  <area shape="rect" coords="628,5,696,21" href="#" />
    <area shape="rect" coords="581,5,618,20" href="../index.php" />
    <area shape="rect" coords="628,5,696,21" href="#" />
  <area shape="rect" coords="0,1,352,120" href="../index.php" />
  </map>
</p>
<p align="center"><br />
  <span class="style1">Admin Panel - Delete a game </span><br />
</p><form id="form1" name="form1" method="post" action="delete2.php?gid=<?php print $gid; ?>">
<p align="center" class="style3">Game <?php print $gid; ?>:<br />
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0','width','550','height','400','src','../swf/<?php print $gid; ?>','quality','high','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','../swf/<?php print $gid; ?>' ); //end AC code</script>
<div align="center">
  <noscript>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="550" height="400">
      <param name="movie" value="../swf/<?php print $gid; ?>.swf" />
      <param name="quality" value="high" />
      <embed src="../swf/<?php print $gid ?>.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="550" height="400"></embed>
    </object>
    </noscript>
  </p>
</div>
<p align="center" class="style3">
  <input class="submitbutton1" type="submit" alt="Delete Game" value="Delete" border="0" name="submit2" height="17" width="40" />
</p>
<p align="center" class="style3"><a href="delete.php">Back</a></p>
</form>
<p align="center" class="style3"><br />
</p>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
