<?php
session_start();
include ("bd.php");
//*********************************
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


      $result = mysql_query("SELECT * FROM video ORDER BY id_video DESC");
      $myrow = mysql_fetch_array($result); 
      if(!$myrow){
        die('Eroarea la afisare'.mysql_error());
      }

    

?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Mostepic</title>
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
  xmlhttp.open("GET","livesearch2.php?q="+str,true);
  xmlhttp.send();
}
</script>
<!--livesearch-->


  <script type="text/javascript" src="mootools-1.2.2.js"></script>
  <script type="text/javascript">
    
    /* scroll spy plugin / class */
    var ScrollSpy = new Class({
      
      /* implements */
      Implements: [Options,Events],
    
      /* options */
      options: {
        min: 0,
        mode: 'vertical',
        max: 0,
        container: window,
        onEnter: $empty,
        onLeave: $empty,
        onTick: $empty
      },
      
      /* initialization */
      initialize: function(options) {
        /* set options */
        this.setOptions(options);
        this.container = $(this.options.container);
        this.enters = this.leaves = 0;
        this.max = this.options.max;
        
        /* fix max */
        if(this.max == 0) 
        { 
          var ss = this.container.getScrollSize();
          this.max = this.options.mode == 'vertical' ? ss.y : ss.x;
        }
        /* make it happen */
        this.addListener();
      },
      
      /* a method that does whatever you want */
      addListener: function() {
        /* state trackers */
        this.inside = false;
        this.container.addEvent('scroll',function() {
          /* if it has reached the level */
          var position = this.container.getScroll();
          var xy = this.options.mode == 'vertical' ? position.y : position.x;
          /* if we reach the minimum and are still below the max... */
          if(xy >= this.options.min && xy <= this.max) {
              /* trigger Enter event if necessary */
              if(!this.inside) {
                /* record as inside */
                this.inside = true;
                this.enters++;
                /* fire enter event */
                this.fireEvent('enter',[position,this.enters]);
              }
              /* trigger the "tick", always */
              this.fireEvent('tick',[position,this.inside,this.enters,this.leaves]);
          }
          else {
            /* trigger leave */
            if(this.inside) 
            {
              this.inside = false;
              this.leaves++;
              this.fireEvent('leave',[position,this.leaves]);
            }
          }
        }.bind(this));
      }
    });
  </script>
    <script type="text/javascript">
    window.addEvent('domready',function() {
      /* smooth */
      new SmoothScroll({duration:500});
      
      /* link management */
      $('gototop').set('opacity','0').setStyle('display','block');
      
      /* scrollspy instance */
      var ss = new ScrollSpy({
        min: 200,
        onEnter: function(position,enters) {
          //if(console) { console.log('Entered [' + enters + '] at: ' + position.x + ' / ' + position.y); }
          $('gototop').fade('in');
        },
        onLeave: function(position,leaves) {
          //if(console) { console.log('Left [' + leaves + '] at: ' + position.x + ' / ' + position.y); }
          $('gototop').fade('out');
        },
        onTick: function(position,state,enters,leaves) {
          //if(console) { console.log('Tick  [' + enters + ', ' + leaves + '] at: ' + position.x + ' / ' + position.y); }
        },
        container: window
      });
    });
  </script>


<style type="text/css">
    #gototop      { 
      display:none; 
      font-weight:bold; 
      font-family:tahoma; 
      /*font-size:50px; */
      width:180px; 
      /*background:url(add_content_spr.gif) 5px -8px no-repeat #eceff5; */
      color:orange; 
      font-size:21px; 
      text-decoration:none; 
      position:fixed; 
      right:5px; 
      bottom:5px; 
      padding:7px 7px 7px 15px; }
    #gototop:hover  { text-decoration:underline; }
  </style>


</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
        
          <h1><a href="index.html" name='top' id='top'>Most<span class="logo_colour">Epic</span></a></h1>
          <h2>Despre tot...</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
         <li><a href="main.php">Utilizator</a></li>
          <li><a href="index.php">Principala</a></li>
          <li class='selected'><a href="it.php">Video</a></li>
          <li><a href="comment/comment.php">Chat</a></li>
         
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="site_content">
       <div class="sidebar">
<!--         <form action="cautare2.php" method="GET">
 <b>Cautare:</b></br> 
 <input type="text" name="term" size="18">
  <input name="search" type="image" style="border: 0; margin: 0 0 -9px 5px;" src="style/search.png" alt="Search" title="Search" />
</form> -->

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

        //***********************************************************88
          do{
            echo "<h2><b>".$myrow['titlu']."</b></h2>";
            echo "<p><b>".$myrow['data_adaugare']."</b></p>";
            echo "<p>".$myrow['descriere']."</p>";
            echo "<div class='video'>
              <video width='420' height='340' controls id='video_1'>
                <source src='".$myrow['src']."' type='video/mp4'>
              </video>
            </div>";
           
          }
          while($myrow = mysql_fetch_array ($result));
        }
        ?>
    
      
        </div>

      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      <p>Copyright&copy; Turcanu Alexandr 2015</p>
    </div>
  </div>

  <a href="#top" id="gototop" class="no-click no-print">Ridicatima sus va rog!!!</a></h1>

</body>
</html>
