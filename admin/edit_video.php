﻿<?php
			$link = mysql_connect('localhost','root','');
			if(!$link){
				die('Nu ma pot conecta la baza de date'.mysql_error().'</br>');
			}
			// else
			// {
			// 	echo "Conexiunea cu baza de date a fost realizata cu succes.";
			// }

			$db_select = mysql_select_db('epic', $link);
			if(!$db_select){
				die('Eroare la selectarea bazei de date'.mysql_error().'</br>');
			}
			// else
			// {
			// 	echo "Selectarea bazei de date a fost realizata cu succes.";
			// }
			if (isset($_GET['id_video'])) {$id_video = $_GET['id_video'];}
			include("lock.php");
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" title="style" />
  <link rel="stylesheet" type="text/css" href="forma.css">
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
          <li><a href='index.php'>Principala</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content_2">
      	<?php
      	if (!isset($id_video))

{
$result = mysql_query("SELECT titlu,id_video FROM video");      
$myrow = mysql_fetch_array($result);

do 
{
printf ("<p><a href='edit_video.php?id_video=%s'>%s</a></p>",$myrow["id_video"],$myrow["titlu"]);
}

while ($myrow = mysql_fetch_array($result));

}

else

{

$result = mysql_query("SELECT * FROM video WHERE id_video=$id_video");      
$myrow = mysql_fetch_array($result);
echo "
     	 <form action='update_video.php' method='post'>
		<div class='main'>
			<div class='field'>
				<label>Titlul pentru video: </label><input type='text' name='titlu' value='$myrow[titlu]'></br>
			</div>

			<div class='field'>
				<label>Descrierea pentru video: </label>
				<textarea name='descriere' cols='30' rows='10'>
					$myrow[descriere]
				</textarea></br>
			</div>

			<div class='field'>
				<label>Locarea a fisierului sursa: </label>
				<input type='text' name='src' value='$myrow[src]'></br>
			</div>

			<div class='field'>
				<label>Data adaugarii pentru video: </label><input type='date' min='2013-01-01' max='2400-01-01' value='$myrow[data_adaugare]' name='data_adaugare'></br>
			</div>

			<div class='field'>
				<label>Link: </label><input type='text' name='link' value='$myrow[link]'></br>
			</div>

			<input name='id_video' type='hidden' value='$myrow[id_video]'>
			
			<input type='submit' value='Update'>
		</div>
		</form>";}
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