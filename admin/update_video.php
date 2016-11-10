<?php 
$link = mysql_connect('localhost','root','');
      if(!$link){
        die('Nu ma pot conecta la baza de date'.mysql_error().'</br>');
      }
      // else
      // {
      //  echo "Conexiunea cu baza de date a fost realizata cu succes.";
      // }

      $db_select = mysql_select_db('epic', $link);
      if(!$db_select){
        die('Eroare la selectarea bazei de date'.mysql_error().'</br>');
      }
      // else
      // {
      //  echo "Selectarea bazei de date a fost realizata cu succes.";
      // }
      include("lock.php");
if (isset($_POST['titlu'])) {$titlu = $_POST['titlu']; if ($titlu == '') {unset($titlu);}}
if (isset($_POST['descriere']))        {$descriere = $_POST['descriere']; if ($descriere == '') {unset($descriere);}}
if (isset($_POST['src']))      {$src = $_POST['src']; if ($src == '') {unset($src);}}
if (isset($_POST['data_adaugare']))      {$data_adaugare = $_POST['data_adaugare']; if ($data_adaugare == '') {unset($data_adaugare);}}
if (isset($_POST['link'])) {$link = $_POST['link']; if ($link == '') {unset($link);}}
if (isset($_POST['id_video'])) {$id_video = $_POST['id_video'];}

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
          <li><a href='edit_video.php'>Editare_video</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">

      

         <?php 
if (isset($titlu) && isset($descriere) && isset($src) && isset($data_adaugare))
{
$result = mysql_query ("UPDATE video SET titlu='$titlu', descriere='$descriere', src='$src', data_adaugare='$data_adaugare', link='$link' WHERE id_video='$id_video'");

if ($result == 'true') {echo "<p>Succes!</p>";}
else {echo "<p>Eroare!</p>";}


}    
else 

{
echo "<p>Variabilele nu exista.</p>";
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
