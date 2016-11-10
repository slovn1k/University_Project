<?php
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
      <div id="content">
     	<form action='prelucrare_new.php' method='post'>
		<div class='main'>
			<div class='field'>
				<label>Inserati titlul pentru noutate: </label><input type='text' name='titlu'></br>
			</div>
		

			<div class='field'>
				<label>Inserati descrierea pentru noutate: </label>
				<textarea name='textul' cols='30' rows='10'>
					Introduceti descrierea aici...
				</textarea></br>
			</div>
			

			<div class='field'>
				<label>Inserati data adaugarii pentru noutate: </label><input type='date' min='2013-01-01' max='2400-01-01' value='2015-01-01' name='data_adaugare'></br>
			</div>
			

			<div class='field'>
				<label>Inserati linkul pentru cautare: </label><input type='text' name='link'></br>
			</div>

			
			<input type='submit' value='Insereaza_noutate'>
		</div>
		</form>
      

      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>