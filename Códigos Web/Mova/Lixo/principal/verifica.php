<?php
//inicia a sessão
session_start();
	
	//Verifica se existe os dados da sessão de login
	if(!isset ($_SESSION ["usuario"])) {
		//Usuário não logado! Redireciona para a página de login
		header ("Location:  ../");
		exit;
	}
?>