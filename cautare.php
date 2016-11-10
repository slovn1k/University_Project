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
mysql_connect("localhost", "root", "");
mysql_select_db("epic");

$sql = mysql_query("SELECT * FROM noutati WHERE titlu LIKE '%$_GET[term]%'");

while($ser = mysql_fetch_array($sql)) { echo "<h2><a href='index.php'>$ser[titlu]</a></h2>"; }
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