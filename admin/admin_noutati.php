<?php 
	include("lock.php");
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css" title="style" />
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
          <li><a href="index.php">Principala</a></li>
          <li><a href="add_new.php">Adaugare_noutate</a></li>
          <li><a href="del_new.php">Stergere_noutate</a></li>
          <li><a href="edit_new.php">Inoire_noutate</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
       
        <h1>Pagina de administrare</h1>
        <p>Aceasta pagina este destinata pentru administrator</p>

        <!-- livesearch -->
    <form action='livesearch/index.php' method='post'>
      <div class='field'>
        <label>GENEREAZA LINKURILE</label></br>
      </div>

      
      <input type='submit' value='Insereaza_noutate'>
    </form>
    <!-- livesearch -->
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>
