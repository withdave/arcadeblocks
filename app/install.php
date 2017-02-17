  <?php


if (isset($_POST['submit'])) {


$xdbhost = $_POST['dbhost'];
$xdbuser = $_POST['dbuser'];
$xdbpass = $_POST['dbpass'];
$xdbname = $_POST['dbname'];
$xpfix = $_POST['pfix'];

$xaduser = $_POST['aduser'];
$xadpass = $_POST['adpass'];

$xsname = $_POST['sname'];
$xmtags = $_POST['mtags'];
$xgohome = $_POST['gohome'];
$xadcode = $_POST['adcode'];


  if ($xgohome != preg_replace('#[^0-9]+#i', '', $xgohome)) {
 die("You need to choose a number of games to appear on the homepage.<br><br><a href='install.php'>Back</a>");
 }


      if(trim($xdbhost) == '') {
          die("You need a database host.<br><br><a href='install.php'>Back</a>");
   }
   
         if(trim($xdbuser) == '') {
          die("You need a database user.<br><br><a href='install.php'>Back</a>");
   }
         if(trim($xdbpass) == '') {
          die("You need a database password.<br><br><a href='install.php'>Back</a>");
   }
         if(trim($xdbname) == '') {
          die("You need a database name.<br><br><a href='install.php'>Back</a>");
   }
   
         if(trim($xaduser) == '') {
          die("You need an admin panel username.<br><br><a href='install.php'>Back</a>");
   }
   
            if(trim($xadpass) == '') {
          die("You need an admin panel password.<br><br><a href='install.php'>Back</a>");
   }
   
            if(trim($xsname) == '') {
          die("You need a site name.<br><br><a href='install.php'>Back</a>");
   }
   
               if(trim($xgohome) == '') {
          die("You need to choose a number of games to appear on the homepage.<br><br><a href='install.php'>Back</a>");
   }

	if(!get_magic_quotes_gpc()) {
	

		$xmtags = addslashes($xmtags);
		$xadcode = addslashes($xadcode);

}


//Create game table


      // Connect to mySQL Server
   $DBConn = mysql_connect($xdbhost,$xdbuser,$xdbpass) or die("Problem connecting to database.<br><br><a href='install.php'>Back</a>");
   // Select mySQL Database
   mysql_select_db($xdbname, $DBConn) or die("Problem connecting to database.<br><br><a href='install.php'>Back</a>");


		$strSql = "
			CREATE TABLE IF NOT EXISTS `".$xpfix."games` (
  `id` int(11) NOT NULL auto_increment,
  `rating` longtext NOT NULL,
  `nov` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;
";
		mysql_query($strSql) or die ("Problem connecting to database.<br><br><a href='install.php'>Back</a>"); 
		
		
		
		
		
				$strSql = "
			INSERT INTO `".$xpfix."games` (`id`, `rating`, `nov`) VALUES 
(1, '0', '0'),
(2, '0', '0'),
(3, '0', '0'),
(4, '0', '0'),
(5, '0', '0'),
(6, '0', '0'),
(7, '0', '0'),
(8, '0', '0'),
(9, '0', '0');";

		mysql_query($strSql) or die ("Problem connecting to database.<br><br><a href='install.php'>Back</a>"); 
		
		



$filec = fopen("admin/config.php", "w");





$strText = '<?php

//This is the config file for the ArcadeBlocks script.



//Change the following variables for your server:



$site_name = "'.$xsname.'"; //Name of the site

$admin_user = "'.$xaduser.'"; //admin panel username

$admin_pass = "'.$xadpass.'"; //admin panel password

$DBhost = "'.$xdbhost.'"; // Database Server

$DBuser = "'.$xdbuser.'"; // Database User

$DBpass = "'.$xdbpass.'"; // Database Pass

$DBName = "'.$xdbname.'"; // Database Name

$TBprefix = "'.$xpfix.'"; //Table Prefix

$games_on_homepage = '.$xgohome.'; //Number of thumbnails to show on the homepage (games display in rows of 9, so this number should be divisible by 9)

$advert_code = \''.$xadcode.'\'; //Put your generated ad code between the quotes.

$meta_tags = \''.$xmtags.'\'; //Choose your own meta tags that search engines will pick up.

//IMPORTANT

//IF YOUR AD CODE CONTAINS ANY SINGLE QUOTES - \' - THEN YOU MUST PUT A BACKSLASH BEHIND EACH ONE.



//==============================

?>';





fputs($filec, $strText); 
		fclose($filec);

		
		
die("ArcadeBlocks has been successfully installed!<br><br><b>It is VERY important you remove install.php immediately.</b>");
		
		
		
}



		
		

?><style type="text/css">
<!--
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 16px; font-weight: bold; }
.style3 {font-size: 14px; font-family: Verdana, Arial, Helvetica, sans-serif;}
-->
</style>
<p class="style2">ArcadeBlocks Installation</p>
<p class="style3">Thanks for purchasing the ArcadeBlocks script.</p>
<p class="style3">Please make sure you have read the readme.txt included before proceeding with the installation.</p>
<p class="style3">---------------------</p>
<p class="style3">Before installing, you should have done the following things:</p>
<p class="style3">1. CHMOD 777 (full rights) the /img directory.</p>
<p class="style3">2. CHMOD 777 (full rights) the /swf directory.</p>
<p class="style3">3. CHMOD 777 (full rights) the /admin/config.php file (not the whole directory).</p>
<p class="style3">4. Have SQL database login details ready.</p>
<p class="style3">5. Created an SQL database, or know the name of one you plan to use.</p>
<p class="style3">----------------------</p>
<form id="form1" name="form1" method="post" action="install.php">
<p class="style3">Database Host: 
  <input name="dbhost" type="text" id="dbhost" value="localhost" />
</p>
<p class="style3">Database User:
  <input name="dbuser" type="text" id="dbuser" />
</p>
<p class="style3">Database Password:
  <input name="dbpass" type="password" id="dbpass" />
</p>
<p class="style3">Database Name:
  <input name="dbname" type="text" id="dbname" />
</p>
<p class="style3">Table Prefix :
  <input name="pfix" type="text" id="pfix" value="ab_" />
</p>
<p class="style3">----</p>
<p class="style3">Admin Username: 
  <input name="aduser" type="text" id="aduser" />
</p>
<p class="style3">Admin Password:
  <input name="adpass" type="password" id="adpass" value="" />
</p>
<p class="style3">(The admin panel can be found at <?php



	$scr_n_n = $_SERVER["SCRIPT_NAME"];
		
		$scr_n_n = substr($scr_n_n, 0, -12);
		
		  print "http://" . $_SERVER["HTTP_HOST"] . $scr_n_n . "/admin";



?>)</p>
<p class="style3">----</p>
<p class="style3">Site Name: 
  <input name="sname" type="text" id="sname" />
</p>
<p class="style3">Meta Tags:
  <textarea name="mtags" cols="50" id="mtags"><meta name="description" content="" />
<meta name="keywords" content="" /></textarea>
</p>
<p class="style3">Number of games on homepage:
  <input name="gohome" type="text" id="gohome" value="72" />
</p>
<p class="style3">Ad Code :
  <textarea name="adcode" cols="50" id="adcode"></textarea>
</p>
<p class="style3">----</p>
<p class="style3">
  <input type="submit" value="Install" border="0" name="submit" height="17" width="40" /></form>
<p class="style3">----</p>