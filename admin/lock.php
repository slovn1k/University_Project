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
if (!isset($_SERVER['PHP_AUTH_USER']))

{
        Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
        Header ("HTTP/1.0 401 Unauthorized");
        exit();
}

else {
        // if (!get_magic_quotes_gpc()) {
        //         $_SERVER['PHP_AUTH_USER'] = mysql_escape_string($_SERVER['PHP_AUTH_USER']);
        //         $_SERVER['PHP_AUTH_PW'] = mysql_escape_string($_SERVER['PHP_AUTH_PW']);
        // }

        $query = "SELECT pass FROM userlist WHERE user='".$_SERVER['PHP_AUTH_USER']."'";
        $lst = @mysql_query($query);

        if (!$lst)
        {
            Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
        Header ("HTTP/1.0 401 Unauthorized");
        exit();
        }

        if (mysql_num_rows($lst) == 0)
        {
           Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
           Header ("HTTP/1.0 401 Unauthorized");
           exit();
        }

        $pass =  @mysql_fetch_array($lst);
        if ($_SERVER['PHP_AUTH_PW']!= $pass['pass'])
        {
            Header ("WWW-Authenticate: Basic realm=\"Admin Page\"");
           Header ("HTTP/1.0 401 Unauthorized");
           exit();
        }


}




?>