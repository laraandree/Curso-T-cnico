<?php
//inicia a sessão
session_start();
	
	//Verifica se existe os dados da sessão de login
	if(!isset ($_SESSION ["email"]) || !isset ($_SESSION ["senha"])) {
		//Usuário não logado! Redireciona para a página de login
		header ("Location: login_usuario.php");
		exit;
	}
?>