<?php


// Initiate a mySQL Database Connection
// Database Connectivity Variables and other Variables
   
   
   include("../admin/config.php");
   
   
      // Connect to mySQL Server
   $DBConn = mysql_connect($DBhost,$DBuser,$DBpass) or die("Problem connecting to database.");
   // Select mySQL Database
   mysql_select_db($DBName, $DBConn) or die("Problem connecting to database.");

   
   //=================================================================================================================
   
 ?>