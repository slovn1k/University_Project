<?php

class Comment
{
	private $data = array();
	
	public function __construct($row)
	{
		/*
		/	Constructor
		*/
		
		$this->data = $row;
	}
	
	public function markup()
	{
		
		
		// Atribuim la this->data o variabila
		$d = &$this->data;
		
		$link_open = '';
		$link_close = '';
		
		
		
		// Transformam timpul in format UNIX:
		$d['dt'] = strtotime($d['dt']);
		
		
		
		return '
		
			<div class="comment">
				<div class="avatar">
					'.$link_open.'
					<img src="noavatar.gif" width="50px" height="50px" />
					'.$link_close.'
				</div>
				
				<div class="name">'.$link_open.$d['name'].$link_close.'</div>
				<div class="date" title="Added at '.date('H:i \o\n d M Y',$d['dt']).'">'.date('d M Y',$d['dt']).'</div>
				<p>'.$d['body'].'</p>
			</div>
		';
	}
	
	public static function validate(&$arr)
	{
		/*
		Controlul datelor introduse
		*/
		
		$errors = array();
		$data	= array();
		
		// Folosim functia filter_input din PHP 5.2.0
		
		if(!($data['email'] = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL)))
		{
			$errors['email'] = 'Va rog sa introduceti email-ul corect.';
		}
		
		
		
		
		
		if(!($data['body'] = filter_input(INPUT_POST,'body',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['body'] = 'Va rog sa introduceti textul comentariului.';
		}
		
		if(!($data['name'] = filter_input(INPUT_POST,'name',FILTER_CALLBACK,array('options'=>'Comment::validate_text'))))
		{
			$errors['name'] = 'Va rog sa introduceti numele.';
		}
		
		if(!empty($errors)){
			
			// Daca este eroare introducem erorile in masivul arr
			
			$arr = $errors;
			return false;
		}
		
		// daca datele sunt correct le transmitem in masivul arr
		
		foreach($data as $k=>$v){
			$arr[$k] = mysql_real_escape_string($v);
		}
		
		// emailul trebuie sa fie in registru mic
		
		$arr['email'] = strtolower(trim($arr['email']));
		
		return true;
		
	}

	private static function validate_text($str)
	{
		/*
		/	Metoda data folosim ca filtru call_back
		*/
		
		if(mb_strlen($str,'utf8')<1)
			return false;
		
		// Codificam toate simbolurile speciale html
	
		
		$str = nl2br(htmlspecialchars($str));
		
		// Stergem toate simbolurile ramase cu o noua linie
		$str = str_replace(array(chr(10),chr(13)),'',$str);
		
		return $str;
	}

}

?>