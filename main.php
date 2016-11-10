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


      //
      session_start();

include ("bd.php");

if (!empty($_SESSION['login']) and !empty($_SESSION['password']))
{
//daca exista parola si login in sesiune de afishat
$login = $_SESSION['login'];
$password = $_SESSION['password'];
$result = mysql_query("SELECT id,avatar FROM users WHERE login='$login' AND password='$password'",$db); 
$myrow = mysql_fetch_array($result);
//afisham datele necesare ale utilizatorului
}
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>MostEpic</title>
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />

  <!-- VOTARE -->
  <script>
  function getVote(int) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("poll").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>

  <!-- VOTARE -->
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
          <li><a href="it.php">Video</a></li>
          <li><a href="comment/comment.php">Chat</a></li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div id="content">
        <?php
if (!isset($myrow['avatar']) or $myrow['avatar']=='') {
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
//la intrare reushita utilizatorului i se afisheaza totul de desupt.
//************************************************************************************


print <<<HERE


Ati intrar pe site, ca $_SESSION[login] (<a href='exit.php'>Iesire</a>)<br>


Avatar:<br>
<img alt='$_SESSION[login]' src='$myrow[avatar]' width='90px' height='90px'>

HERE;

}

?>
<div id="poll">
<h2>Va place site-ul???</h2>
<form>
Da:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>Nu:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>
<!-- numarul utilizatorilor inregistrati -->
<h2>Alaturativa la comunitatea noastra...cu cit mai multi utilizatori cu atit mai multe curiozitati se vor adauga</h2>
<?php
 $res = mysql_query('SELECT COUNT(*) FROM `users`');
 if($res)
   $row = mysql_fetch_array($res, MYSQL_NUM);
 $nr_uti = !empty($row[0]) ? $row[0] : 0; //
 echo '<h1>Numarul utilizatorilor inregistrati:<b>'.$nr_uti.'</b></h1>';
?>
<!-- numarul utilizatorilor inregistrati -->
        </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>
</body>
</html>