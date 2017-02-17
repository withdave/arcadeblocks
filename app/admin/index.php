<?php

//Check if logged in

session_start();

include("config.php");


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

header('Location: main.php');

}
}

}


if (isset($_POST['submit'])) {


$usr = $_POST['username'];
$pas = $_POST['password'];

	  
if ($usr == $admin_user) {

if ($pas == $admin_pass) {

//Log in

session_start();
	
	$_SESSION['username'] = $usr;
	
	$_SESSION['password'] = $pas; 
	

header('Location: main.php');


}

}
	  
}
	  
	  

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $site_name; ?> - Admin Login</title>
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
</p><form id="form1" name="form1" method="post" action="index.php">
<p align="center" class="style3">Username: <input name="username" class="inputtext" type="text" value=""></p>
<p align="center" class="style3">Password: <input name="password" class="inputtext" type="password" value="">
</p>
<p align="center"><INPUT class=submitbutton1 type=submit alt="Log In" value="Log In" border=0 name=submit height="17" width="40"><br />
</p></form>
<p align="center" class="footer">&copy; <?php print date('Y')." ".$site_name; ?></p>
</body>
</html>
