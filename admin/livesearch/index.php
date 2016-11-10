<?php

$config['mysql_host'] = "localhost";
$config['mysql_user'] = "root";
$config['mysql_pass'] = "";
$config['db_name']    = "epic";
$config['table_name'] = "noutati";
 

mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);

@mysql_select_db($config['db_name']) or die( "Eroare la selectarea bazei de date");

$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$root_element = $config['table_name']."s"; //fruits
$xml         .= "<$root_element>";

//selectarea tuturor itemilor in tabel
$sql = "SELECT * FROM ".$config['table_name'];
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
 
if(mysql_num_rows($result)>0)
{
   while($result_array = mysql_fetch_assoc($result))
   {
      $xml .= "<".$config['table_name'].">";
 
      //crearea elementelor
      foreach($result_array as $key => $value)
      {
         //$key detine denumirea coloanelor tabelului
         $xml .= "<$key>";
 
         //tipul datelor pentru documentul XML
         $xml .= "<![CDATA[$value]]>";
 
         //inchiderea elementului
         $xml .= "</$key>";
      }
 
      $xml.="</".$config['table_name'].">";
   }
}

//inchiderea elementului parinte
$xml .= "</$root_element>";
 
//transmiterea tipului documentului catre browser
header ("Content-Type:text/xml");
 
//crearea insusi fisierului xml
$f = fopen("output.xml", "w");
// afisarea datelor xml;
fwrite($f, print_r($xml, true));
fclose($f);
?>