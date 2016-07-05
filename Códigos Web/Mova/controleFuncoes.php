<?php
	require('conectDB.php');
	
	$funcao = $_POST['funcao'];

	switch ($funcao) {
		case 'criarAmizade':
			$idAmigo = $_POST['idAmigo'];
			$meuID = $_POST['meuId'];
			$sql = mysql_query("INSERT INTO usuarioeusuario (codUsuario, codAmigo, statusAmizade) VALUES (".$meuID.",".$idAmigo.", 1)") or die (mysql_error());
			
		break;
		case 'aceitarAmizade':
			$idAmigo = $_POST['idAmigo'];
			$meuID = $_POST['meuId'];
			$sql = mysql_query("UPDATE usuarioeusuario SET statusAmizade = 2 WHERE codAmigo = ".$meuID." AND codUsuario = ".$idAmigo."") or die (mysql_error());
			
		break;

		case 'desfazerAmizade':
			$meuID = $_POST['meuId'];
			$idAmigo = $_POST['idAmigo'];
			
			$sql = mysql_query("DELETE FROM usuarioeusuario WHERE (codUsuario = ".$meuID." AND codAmigo = ".$idAmigo.") or (codUsuario = ".$idAmigo." AND codAmigo = ".$meuID.") ") or die (mysql_error());
		break;
		case 'participarEvento':
			$idEvento = $_POST['idEvento'];
			$meuID = $_POST['meuId'];
			$sql = mysql_query("INSERT INTO usuarioevento (usuarioPK, eventoPK, status) VALUES (".$meuID.",".$idEvento.", 1)") or die (mysql_error());
			
		break;
		case 'cancelarParticipar':
			$meuID = $_POST['meuId'];
			$idEvento= $_POST['idEvento'];
			
			$sql = mysql_query("DELETE FROM usuarioevento WHERE usuarioPK = ".$meuID." AND eventoPK = ".$idEvento."") or die (mysql_error());
		break;
		
		
		
		default:
			
			break;
	}
?>