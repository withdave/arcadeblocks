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
  <span class="style1">Admin Panel </span><br />
</p>
<p align="center" class="style3"><a href="add.php">Add a Game</a></p>
<p align="center" class="style3"><a href="delete.php">Delete a Game</a></p>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
