<?php

//conexão com o servidor
//$conect = mysql_connect("endereço_servidor", "usuario_do_banco_de_dados", "senha_banco_de_dados");
 $conect = mysql_connect ("localhost", "root", "");
 $db = mysql_select_db("mova");
 
// Caso a conexão seja reprovada, exibe na tela uma mensagem de erro
if (!$conect || !$db) {
		echo "<pre>";
		echo mysql_error ();
		echo "</pre>";};
 
// Caso a conexão seja aprovada, então conecta o Banco de Dados.	

?>