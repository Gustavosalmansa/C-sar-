<?php

if(isset($_POST) and isset($_GET['function']) and $_POST['msg']){
	
	@$function = $_GET['function'];
	@$sp = isset($_POST['sp']) ? preg_replace('/\D/i', '', $_POST['sp']) : 0;
	
	
	$what = array("á","à","ã","â","ä","Á","À","Ã","Â","Ä","é","è","ê","ë","É","È","Ê","Ë","í","ì","î","ï","Í","Ì","Î","Ï","ó","ò","õ","ô","ö","Ó","Ò","Õ","Ô","Ö","ú","ù","û","ü","Ú","Ù","Û","Ü",'ñ','Ñ','ç','Ç');
	$by   = array('a','a','a','a','a','A','A','A','A','A','e','e','e','e','E','E','E','E','i','i','i','i','I','I','I','I','o','o','o','o','o','O','O','O','O','O','u','u','u','u','U','U','U','U','n','N','c','C');
	
	$msg = trim($_POST['msg']);	
	$msg = str_replace($what, $by, $msg);
	
	if($function  == 'codificar' or $function  == 'decodificar' ){
		
		if(!is_numeric($sp) or $sp < 0) $sp = 0;
		
		$retorno = null;
		$array_msg = str_split($msg);
		
		foreach($array_msg as $value){
			
			$numberAscii = ord($value);
			
			if($numberAscii < 32 or $numberAscii > 126)
				continue;
			
			if($function == 'codificar'){
				$numberAscii+= $sp;
				while($numberAscii > 126)
					$numberAscii-= 94;
				
			}else if($function == 'decodificar'){
				$numberAscii-= $sp;
				while($numberAscii < 32)
					$numberAscii+= 94;
			}
			
			
			$retorno.= chr($numberAscii);
		}
		
	}else if($function  == 'auto'){
	
		$descodificacao = null;
		
		$array_msg = str_split($msg);
		
		for($i = 32; $i <= 126 ; $i++){
			
			$palavras = null;
			
			foreach($array_msg as $value){
				
				$numberAscii = ord($value) - $i;
				
				if($numberAscii < 32 or $numberAscii > 126)
					continue;
			
				while($numberAscii < 32)
					$numberAscii+= 94;
				
					$palavras.= chr($numberAscii);
			
			}
			
			$descodificacao[] = $palavras;
			
		}
		
		$retorno = [];
		
		if(is_array($descodificacao)){
			
			function stringLimpa($string){
				
				$what = array('(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
				$by   = array('','','','','','','','','','','','','','','','','','','','','');
		
				$string = str_replace($what, $by, $string);
				$string = strtolower($string);

				return $string;
			}
						
			$arquivo = "texto.txt";
			$palavrasTXT = file($arquivo,FILE_IGNORE_NEW_LINES);
			
			foreach($descodificacao as $texto){
				
				$palavrasDoTexto = explode(' ',$texto);
				
				$NPE = 0;
				
				foreach($palavrasDoTexto as $palavra){
					
					if(strlen($palavra) >= 3){
						
						$palavra = stringLimpa($palavra);
						foreach($palavrasTXT as $value){
							
							$value = stringLimpa($value);
						
							if($value == $palavra){
								$NPE++;
								break;
							}
						}
					}
				}
				
				if($NPE)
					$retorno[] = $texto;
			}
		}
		
		$retorno = implode('<br><br>',$retorno);

	}
}
	
