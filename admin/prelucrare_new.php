<?php
			$link = mysql_connect('localhost','root','');
			if(!$link){
				die('Nu ma pot conecta la baza de date'.mysql_error().'</br>');
			}
			// echo "Conectarea a fost realizata cu succes</br>";
			// //mysql_close($link);

			$db_select = mysql_select_db('epic', $link);
			if(!$db_select){
				die('Eroare la selectarea bazei de date'.mysql_error().'</br>');
			}
			// echo 'Selectarea a fost realizata cu succes</br>';

			$order = "insert into noutati (`titlu`, `textul`, `data_adaugare`,`link`) values ('$_POST[titlu]', '$_POST[textul]', '$_POST[data_adaugare]', '$_POST[link]')";
			$result = mysql_query($order);
			
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
          <li><a href='add_new.php'>Adaugare_noutate</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
     	<?php 
     		if(!$result){
				die('Eroarea la inserare'.mysql_error());
			}
			echo "Inserarea a fost realizata cu succes";
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