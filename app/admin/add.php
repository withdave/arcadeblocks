<?php





include("config.php");

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


//If upload...


if (isset($_POST['submit'])) {


//Get latest game id

include("../inc/conn.php");

$nog = "SELECT id FROM ".$TBprefix."games ORDER BY CAST(id AS SIGNED) DESC LIMIT 0,1";

$resultnog = mysql_query($nog) or die ("Problem connecting to database."); 

 $totg = mysql_result($resultnog, 0, 'id');

$ngn = $totg +1;

//Upload game

$target_path = "../img";

$target_path = $target_path . "/".$ngn.".png"; 

if(move_uploaded_file($_FILES['thumbfile']['tmp_name'], $target_path)) {
   
} else{
    die ("<div align=\"center\" class=\"style3\" >There was an error uploading the thumbnail, please try again! <br><br><a href='add.php'>Back</a></div>");
}


$target_path2 = "../swf";

$target_path2 = $target_path2 . "/".$ngn.".swf"; 

if(move_uploaded_file($_FILES['gamefile']['tmp_name'], $target_path2)) {
   
} else{
    die ("<div align=\"center\" class=\"style3\" >There was an error uploading the swf, please try again! <br><br><a href='add.php'>Back</a></div>");
}


//Add rating record to db

$nog = "INSERT INTO ".$TBprefix."games (id,rating,nov) VALUES ('$ngn',0,0)";

$resultnog = mysql_query($nog) or die ("<div align=\"center\" class=\"style3\" >Problem connecting to database. <br><br><a href='add.php'>Back</a></div>"); 
	  
//Complete game adding

die("<div align=\"center\" class=\"style3\" >Game has been successfully added. <br><br><a href='add.php'>Back</a></div>");
	  
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
</style></head>

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
  <span class="style1">Admin Panel - Add a game </span><br />
</p><form enctype="multipart/form-data" action="add.php" method="POST">
<p align="center" class="style3">Thumbnail (.png | .jpg | .gif): 
  <input name="thumbfile" class="inputtext" type="file" />
  (Thumbnail should be 70x60, or it will be scaled)
</p>
<p align="center" class="style3">Game (.swf): <input class="inputtext" name="gamefile" type="file" />
  (Game should be 550x400, or it will be scaled) </p>
<p align="center" class="style3">
  <input class="submitbutton1" type="submit" alt="Add Game" value="Add" border="0" name="submit" height="17" width="40" />
</p>
<p align="center" class="style3"><a href="main.php">Back</a></p>
</form>
<p align="center" class="style3"><br />
</p>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
