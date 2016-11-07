<?php 
$dbhost = "localhost";
$dbname = "ThesisMgr";
$dbuser = "root";
$dbpass = "";
$db = mysql_connect($dbhost, $dbuser, $dbpass) or die("Die connect" . mysql_connect_error());
mysql_select_db("$dbname") or die("Die select database");
mysql_query("SET NAME 'utf8'", $db);
mysql_query("SET CHARACTER SET 'utf8';", $db); 

?>