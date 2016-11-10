<!DOCTYPE HTML>
<html>
<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>
<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
         
          <h1><a href="index.html">Most<span class="logo_colour">Epic</span></a></h1>
          <h2>Despre tot...</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          
          <li><a href="main.php">Main</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
<?php
session_start();

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }


if (empty($login) or empty($password)) //daca utilizatorul nu a introdus parola sau login oprim scriptul si afisam eroare
{
exit ("Nu ati introdus toata informatia, intorcetiva si impleti toate spatiile obligatorii!");
}
//daca login si parola sunt introduse le afisam folosind parametri speciali
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//stergem spatiile libere
$login = trim($login);
$password = trim($password);

include ("bd.php");

// nimicontrol la alegerea parolei aleator
$ip=getenv("HTTP_X_FORWARDED_FOR");
if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }

mysql_query ("DELETE FROM oshibka WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(date) > 900");//stergem ip-adresa utilizatorului care sa greshit peste 15 min.

$result = mysql_query("SELECT col FROM oshibka WHERE ip='$ip'",$db);// extragem din baza numarul de incercari eronate ale utilizatorului ca ip-adresa data
$myrow = mysql_fetch_array($result);

if ($myrow['col'] > 2) {
//daca numarul de incercari depaseste 3 afisam urmatorul mesah.
exit("Ati introdus gresit login sau parola de 3 ori. Asteptati 15 minute pina la incercarea urmatoare.");
}


$password = md5($password);//codificam parola
$password = strrev($password);// pentru mai buna aparare inversam
$password = $password."b3p6f";





$result = mysql_query("SELECT * FROM users WHERE login='$login' AND password='$password'",$db); //extragem din baza informatia despre utilizator cu loginul introdus
$myrow = mysql_fetch_array($result);
if (empty($myrow['id']))
{
//daca utilizatorul nu exista atunci inscriem adresa ip

$select = mysql_query ("SELECT ip FROM oshibka WHERE ip='$ip'");
$tmp = mysql_fetch_row ($select);
if ($ip == $tmp[0]) {
//controlam daca este utilizatorul in tabel
$result52 = mysql_query("SELECT col FROM oshibka WHERE ip='$ip'",$db);
$myrow52 = mysql_fetch_array($result52);

$col = $myrow52[0] + 1;//Daca este incrementam
mysql_query ("UPDATE oshibka SET col=$col,date=NOW() WHERE ip='$ip'");
}

else {
//daca in ultimele 15 minute nu au fost erori introducem o noua inregistrare in tabel
mysql_query ("INSERT INTO oshibka (ip,date,col) VALUES ('$ip',NOW(),'1')");
}


exit ("Scuzati, parola sau loginul introdus sunt eronate.");
}
else {

          //daca totul coincide pornim sesiunea
          $_SESSION['password']=$myrow['password']; 
		  $_SESSION['login']=$myrow['login']; 
          $_SESSION['id']=$myrow['id'];
		  
//Salvam datele in cookie

if (isset($_POST['save'])){
//daca utilizatorul doreshte sa salveze datele le salvam in browserul lui
setcookie("login", $_POST["login"], time()+9999999);
setcookie("password", $_POST["password"], time()+9999999);}
}	
	  
echo "<html><head><meta http-equiv='Refresh' content='0; URL=main.php'></head></html>";

//rederectam utilizatorul pe pagina principala

?>
 </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>