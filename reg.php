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
          
          <li><a href="main.php">Utilizator</a></li>
           
                 </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
<h2>Inregistrare</h2>
<form action="save_user.php" method="post" enctype="multipart/form-data">

  <p>
    <label>Login *:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
  </p>

  <p>
    <label>Parola *:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p>

 
  <p>
    <label>Alegeti avatarul. Imaginea trebuie sa fie de format jpg, gif sau png:<br></label>
    <input type="FILE" name="fupload">
  </p>

<p>
<input type="submit" name="submit" value="Inregistrare">

</p></form>

</div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>
