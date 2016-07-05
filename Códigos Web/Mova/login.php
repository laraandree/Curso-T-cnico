<?php

//	FUNÇÃO DE LOGIN
function login($email, $senha) {
	$pdo = conecta();
	try {
		$logar = $pdo -> prepare("SELECT * FROM usuario WHERE email = ? AND senha = ?");
		//	$login e $senha vem com a chamada da função	//
		$logar -> bindValue(1, $email, PDO::PARAM_STR);
		$logar -> bindValue(2, $senha, PDO::PARAM_STR);
		$logar -> execute();

		if ($logar -> rowCount() == 1) :	
			return TRUE;
		else :
			return FALSE;
		endif;
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}

}

//	PEGA O QUE O CARA DIGITOU PARA FAZER UMAS VALIDAÇÕES EM controlador.php
function pegaLogin($email) {
	$pdo = conecta();
	try {
		$byEmail = $pdo -> prepare("SELECT * FROM usuario WHERE email = ? ");
		$byEmail -> bindValue(1, $email, PDO::PARAM_STR);
		$byEmail -> execute();

		if ($byEmail -> rowCount() == 1) :
			//	ENCONTROU EMAIL	//
			return $byEmail->fetch(PDO::FETCH_OBJ);
		else :
			return FALSE;
		endif;
	} catch(PDOException $e) {
		echo $e -> getMessage();
	}
}
