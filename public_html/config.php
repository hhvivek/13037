<?php
error_reporting(E_ALL & ~E_DEPRECATED);
$host = "localhost"; 
$username = "thelster_hackathon"; 
$password = "UKK&mm)3pHAZ"; 
$dbname = "thelster_hackathon";
$sitename = "TheLstEra";
$sitelink = "";

$connection = mysql_connect($host,$username,$password);

if (!$connection)

  {

  die('Could not connect: ' . mysql_error());

  }

mysql_select_db($dbname) or die(mysql_error());

mysql_query("SET NAMES utf8");

?>