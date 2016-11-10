<?php

// Mesaj despre eroare:
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";


/*
/	Alegem toate comentariile si implem masivul comments cu obiecte
*/

$comments = array();
$result = mysql_query("SELECT * FROM comments ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

<!DOCTYPE HTML>
<html>
<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="../style/style.css"  />
  <link rel="stylesheet" type="text/css" href="styles.css"  />
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
          
          <li><a href="../index.php">Principala</a></li>
          <li><a href="../it.php">Video</a></li>
          <li class="selected"><a href="comment.php">Chat</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">


<?php

/*
/	Afisarea comentariilor unul dupa altul
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

<div id="addCommentContainer">
	<p>Adauga comentariu</p>
	<form id="addCommentForm" method="post" action="">
    	<div>
        	<label for="name">Nume</label>
        	<input type="text" name="name" id="name" />
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
            
            <label for="body">Comentariu. Maxim 255 de caractere</label>
            <textarea name="body" id="body" cols="20" rows="5"></textarea>
            
            <input type="submit" id="submit" value="Transmite" />
        </div>
    </form>
</div>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

 </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>