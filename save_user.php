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
          <li><a href="reg.php">Inregistrare</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }


if (empty($login) or empty($password)) 
{
exit ("Nu ati introdus toata informatia, intorcetiva si introduceti toate datele necesare!");
}

$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);


$login = trim($login);
$password = trim($password);




//control la lungime loginului si parolei
if (strlen($login) < 3 or strlen($login) > 15) {
exit ("Loginul trebuie sa fie nu mai mic de 3 simboluri si nu mai mare de cit 15.");
}
if (strlen($password) < 3 or strlen($password) > 15) {
exit ("Parola nu trebuie sa fie mai mica de 3 simboluri sua mai mare ca 15.");
}


if (!empty($_POST['fupload'])) //controlam daca utilizatorul a ales avatarul
{
$fupload=$_POST['fupload']; $fupload = trim($fupload); 
  if ($fupload =='' or empty($fupload)) {
                     unset($fupload);// daca fupload este libera o distrugem
					 }
}

if (!isset($fupload) or empty($fupload) or $fupload =='')
{
//daca utilizatorul nu a ales avatarul ii punem noi o imagine ca default
$avatar = "avatars/noavatar.gif";
}

else 
{
//altfel uplodam imaginea utilizatorului
$path_to_90_directory = 'avatars/';

	
if(preg_match('/[.](JPG)|(jpg)|(gif)|(GIF)|(png)|(PNG)$/',$_FILES['fupload']['name']))//controlam formatul imaginii
	 {	
	 	 	
		$filename = $_FILES['fupload']['name'];
		$source = $_FILES['fupload']['tmp_name'];	
		$target = $path_to_90_directory . $filename;
		move_uploaded_file($source, $target);//uploadul imaginii originale in $path_to_90_directory

	if(preg_match('/[.](GIF)|(gif)$/', $filename)) {
	$im = imagecreatefromgif($path_to_90_directory.$filename) ; 
	}
	if(preg_match('/[.](PNG)|(png)$/', $filename)) {
	$im = imagecreatefrompng($path_to_90_directory.$filename) ;
	}
	
	if(preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)$/', $filename)) {
		$im = imagecreatefromjpeg($path_to_90_directory.$filename); 
	}
	


$w = 90;  // 


$w_src = imagesx($im); 
$h_src = imagesy($im); 

         
         $dest = imagecreatetruecolor($w,$w); 

         
         if ($w_src>$h_src) 
         imagecopyresampled($dest, $im, 0, 0,
                          round((max($w_src,$h_src)-min($w_src,$h_src))/2),
                          0, $w, $w, min($w_src,$h_src), min($w_src,$h_src)); 

         
         if ($w_src<$h_src) 
         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w,
                          min($w_src,$h_src), min($w_src,$h_src)); 

         
         if ($w_src==$h_src) 
         imagecopyresampled($dest, $im, 0, 0, 0, 0, $w, $w, $w_src, $w_src); 
		 

$date=time(); 
imagejpeg($dest, $path_to_90_directory.$date.".jpg");



$avatar = $path_to_90_directory.$date.".jpg";

$delfull = $path_to_90_directory.$filename; 
unlink ($delfull);
}
else 
         {
		 
         exit ("Avatarul trebuie sa fie de format <strong>JPG,GIF sau PNG</strong>");
	     }

}

$password = md5($password);

$password = strrev($password);

$password = $password."b3p6f";

include ("bd.php");


$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Scuzati dar loginul introdus este deacuma inregistrat. Introduceti altul.");
}


$result2 = mysql_query ("INSERT INTO users (login,password,avatar) VALUES('$login','$password','$avatar')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
echo "Vati inregistrat! Puteti intra pe site. <a href='main.php'>Pagina principala</a>";
}

else {
echo "Eroare! Nu vati inregistrat.";
     }
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