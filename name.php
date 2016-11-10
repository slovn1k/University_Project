<?php 
	if (isset($_POST['titlu']) === true && empty($_POST['titlu']) === false){
		require 'bd.php';
		$result = mysql_query("SELECT * FROM noutati WHERE titlu = '".$_POST['titlu']."'");
		$myrow = mysql_fetch_array($result);
		do{
            echo $myrow['textul'];
          }
        while($myrow = mysql_fetch_array ($result));
	}
?>