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
      if(isset($_POST['id_noutate'])) 
    {$id_noutate = $_POST['id_noutate'];}

  if(isset($id_noutate)){
    $result = mysql_query("DELETE FROM noutati WHERE id_noutate='$id_noutate'");
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
          <li><a href="del_new.php">Stergere_noutate</a></li>

        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
     	<form action='delete_noutate.php' method='post'>
		<?php
			if($result == 'true'){
      echo 'Noutatea stearsa cu succes';
    }
    else
      echo 'Eroarea la stergere'.mysql_error();
  }
  else
  {
    echo 'Ati lansat stergerea fara id, de aceea nu poate fi realizata stergerea';
  }
		?>
		
	</fomr>
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>