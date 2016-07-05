<?php 
		$pegaImagens = mysql_query("SELECT I.* from imagens AS I INNER JOIN usuario AS U ON I.usuarioPK = U.usuarioPK  ORDER BY I.usuarioPK DESC limit 1  ") or die (mysql_error());								
		$objetoImagem = mysql_fetch_object($pegaImagens);
		echo $pegaImagens - > imagem;
		
		
		/*$imagemUsuario = $objetoImagem -> usuarioPK;
		$pegaUsuario = mysql_query("SELECT U.* from usuario AS U INNER JOIN imagens AS I ON U.usuarioPK = ".$imagemUsuario." ORDER BY U.usuarioPK DESC limit 1  ")or die (mysql_error());
		$objetoUsuario = mysql_fetch_assoc($pegaUsuario);*/
	
?>