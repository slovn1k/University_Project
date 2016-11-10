<?php

// Mesaj de eroare
error_reporting(E_ALL^E_NOTICE);

include "connect.php";
include "comment.class.php";



$arr = array();
$validates = Comment::validate($arr);

if($validates)
{
	/* Introducem datele in baza: */
	
	mysql_query("	INSERT INTO comments(name,email,body)
					VALUES (
						'".$arr['name']."',
						'".$arr['email']."',
						'".$arr['body']."'
					)");
	
	$arr['dt'] = date('r',time());
	$arr['id'] = mysql_insert_id();
	

	
	$arr = array_map('stripslashes',$arr);
	
	$insertedComment = new Comment($arr);



	echo json_encode(array('status'=>1,'html'=>$insertedComment->markup()));

}
else
{
	/* Mesaj de eroare */
	echo '{"status":0,"errors":'.json_encode($arr).'}';
}

?>