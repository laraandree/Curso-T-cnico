<?php
//	CONSTANTES
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'mova'); 

//	FUNCAO DE CONEXAO
function conecta(){
	$dns = "mysql:host=" . HOST . ";dbname=" . DB;
	
	try {
		$conn = new PDO($dns, USUARIO, SENHA);
		//	CASO OCORRA ERRO, O setAttribute RECEBE ESSES ERROS	//
		$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	} catch(PDOException $erro){
		echo $erro->getMessage();
		
	}
	
}
?>