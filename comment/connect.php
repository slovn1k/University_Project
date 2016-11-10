<?php



$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database		= 'epic'; 




$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Erroare la conectare cu baza de date');

mysql_query("SET NAMES 'utf8'");
mysql_select_db($db_database,$link);

?>