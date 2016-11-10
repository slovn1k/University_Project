<?php
session_start();
include ("bd.php");
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
if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
{
//daca exista parola si login in sesiune de afishat
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result2 = mysql_query("SELECT id,avatar FROM users WHERE login='$login' AND password='$password'",$db); 
$myrow2 = mysql_fetch_array($result2);
//afisham datele necesare ale utilizatorului
}

      $result = mysql_query("SELECT * FROM noutati ORDER BY id_noutate DESC");
      $myrow = mysql_fetch_array($result); 
      if(!$myrow){
        die('Eroarea la afisare'.mysql_error());
      }
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />

  <!-- live search-->
  <script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<!--livesearch-->
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
          <li class="selected"><a href="index.php">Principala</a></li>
          <li><a href="it.php">Video</a></li>
          <li><a href="comment/comment.php">Chat</a></li>
            
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">



<!--livesearch-->
<form>
  <b>Cautare</b>
<input type="text" size="23" onkeyup="showResult(this.value)">
<div id="livesearch"></div>
</form>
<!--livesearch-->

      </div>

 
     
      <div id="content">
        <?php
        if (!isset($myrow2['avatar']) or $myrow2['avatar']=='') {
//controlam daca nu sunt scoase datele utilizatorului din baza, in caz contrar afisam forma de intrare.
echo "
<form action='testreg.php' method='post'>
  <p>
    <label>Login:<br></label>
    <input name='login' type='text' size='15' maxlength='15'
";
  
if (isset($_COOKIE['login'])) //controlam daca este login in Cookie, trebuie sa fie daca utilizatorul a apasat butonul retinema
{
//daca da atunci introducem in forma valoarea loginului
echo ' value="'.$_COOKIE['login'].'">';
}


print <<<HERE
  </p>
  <p>
    <label>Parola:<br></label>
    <input name="password" type="password" size="15" maxlength="15"
HERE;

  
if (isset($_COOKIE['password']))//tot aceeashi situatie ca si cu login
{
echo ' value="'.$_COOKIE['password'].'">';
}
  
print <<<HERE
  </p>  
  <p>
    <input name="save" type="checkbox" value='1'> Retinema.
  </p>

<p>
<input type="submit" name="submit" value="Intra">
<br>
<a href="reg.php">Inregistrare</a> 
</p></form>
<br>
Ati intrar pe site, ca musafir<br>
HERE;
}

else
{
        //*****************888
          do{
            echo "<h2>".$myrow['titlu']."</h2>";
            echo "<p><b>".$myrow['data_adaugare']."</b></p>";
            echo "<p>".$myrow['textul']."</p>";
          }
          while($myrow = mysql_fetch_array ($result));
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
