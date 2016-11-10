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
if (isset($_POST['data_adaugare']))        {$data_adaugare = $_POST['data_adaugare']; if ($data_adaugare == '') {unset($data_adaugare);}}
if (isset($_POST['textul']))      {$textul = $_POST['textul']; if ($textul == '') {unset($textul);}}
if (isset($_POST['link'])) {$link = $_POST['link']; if ($link == '') {unset($link);}}

if (isset($_POST['id_noutate'])) {$id_noutate = $_POST['id_noutate'];}

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
          <li><a href='edit_new.php'>Editare_noutate</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">

      

         <?php 
if (isset($titlu) && isset($textul) && isset($data_adaugare))
{
$result = mysql_query ("UPDATE noutati SET titlu='$titlu', textul='$textul', data_adaugare='$data_adaugare', link='$link' WHERE id_noutate='$id_noutate'");

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
