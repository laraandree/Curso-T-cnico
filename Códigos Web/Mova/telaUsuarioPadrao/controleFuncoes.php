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
			$nomeAmigo = $_POST['nomeAmigo'];
			$pegaPK = mysql_query("SELECT usuarioPK from usuario where nome = '".$_POST['nomeAmigo']."' ") or die (mysql_error());
			$pkAmigo = mysql_fetch_assoc(pegaPK);
			$idAmigo = $pkAmigo['usuarioPK'];
			$sql = mysql_query("UPDATE usuarioeusuario SET statusAmizade = 2 WHERE codAmigo = ".$meuID." AND codUsuario = ".$idAmigo."") or die (mysql_error());
		break;
		case 'participarEvento':

			$nomeEvento = $_POST['nomeEvento'];
			$meuID = $_POST['meuId'];
			$pegaPK = mysql_query("SELECT cod_evento from evento where nomeEvento = '".$_POST['nomeEvento']."' ") or die (mysql_error());
			$pkEvento = mysql_fetch_assoc($pegaPK);
			$pk = $pkEvento['cod_evento'];
			
			$sql = mysql_query("INSERT INTO usuarioevento (usuarioPK, eventoPK, status) VALUES (".$meuID.",".$pk.", 1)") or die (mysql_error());
			
			
		break;
		case 'cancelarParticipar':
			$nomeEvento = $_POST['nomeEvento'];
			$meuID = $_POST['meuId'];
			$pegaPK = mysql_query("SELECT cod_evento from evento where nomeEvento = '".$_POST['nomeEvento']."' ") or die (mysql_error());
			$pkEvento = mysql_fetch_assoc($pegaPK);
			$pk = $pkEvento['cod_evento'];
			
			$sql = mysql_query("DELETE FROM usuarioevento WHERE usuarioPK = ".$meuID." AND eventoPK = ".$pk."") or die (mysql_error());
		break;
		
		
		
		default:
			
			break;
	}
?>