<?php
	include ("funcoes.php");
	
	$controle = $_POST['funcao'];
	
	//	FUNÇÕES	//
					function removePasta($pasta_dir){
					if (!is_dir($pasta_dir)) 	//	VERIFICA SE É UM DIRETÓRIO
					{
						return false;
					}

					if (!preg_match("/\\/$/", $pasta_dir)) //	SE NÃO SEGUE UM DESSES PADRÕES
					{
						$$pasta_dir .= '/';
					}


					$diretorio = array($pasta_dir);	//	LISTA 

					while (count($diretorio) > 0)	
					{
						$hasDir = false;
						$dir    = end($diretorio);
						$dh     = opendir($dir);

						while (($file = readdir($dh)) !== false)
						{
							if ($file == '.'  ||  $file == '..')
							{
								continue;
							}

							if (is_dir($dir . $file))
							{
								$hasDir = true;
								array_push($diretorio, $dir . $file . '/');
							}

							else if (is_file($dir . $file))
							{
								unlink($dir . $file);
							}
						}

						closedir($dh);

						if ($hasDir == false)
						{
							array_pop($diretorio);
							rmdir($dir);
						}
					}

					return true;
				}
				
				function pegaImagem($idusuario){
				  	$pegaImagens = mysql_query("SELECT * from imagens WHERE usuarioPK = ".$idusuario." ORDER BY usuarioPK DESC");								
					$contagem = mysql_num_rows($pegaImagens);
					
					$objetoImagem = mysql_fetch_object($pegaImagens);
						if( $contagem >= 1){
								
							return $objetoImagem;
						
						}else{	return FALSE;}	
					
				}
					
	//	CONTROLE	//			
	if (isset($controle)){
		
		switch($controle){
		
			case 'deletar' :
				$dado['campoID'] = $_POST['campoID'];
				$dado['id'] = $_POST['id'];
				$dado['tabela'] = $_POST['tabela'];
				$sql = mysql_query("Delete from ".$dado['tabela']." where ".$dado['campoID']." = ".$dado['id']." ")
						or die (mysql_error());	
						
				$id = $dado['id'];		
				$caminho = $_SERVER['DOCUMENT_ROOT'];

				$pasta_dir = $caminho."/Admin com PDO (1)/adm/arquivos/".$id."/"; //	DIRETORIO DO CAMINHO				
				removePasta($pasta_dir);	//	CHAMA FUNÇÃO QUE APAGA PASTA	//

				
			break;
			
			case 'alterar' :
				$dado['tabela'] = $_POST['tabela'];
				$dado['id'] = $_POST['id'];
				$dado['campoId'] = $_POST['campoID'];
				$dado['campoAlterado'] = $_POST['campoAlterado'];
				$dado['valor'] = $_POST['valor'];
				
				//	Muda o padrão das datas	//
				if ($dado['campoAlterado'] == "data_nasc" || $dado['campoAlterado'] == "dataEvento"){ 
					$originalDate = $_POST['valor'];
					$dado['valor'] = date("Y-m-d", strtotime($originalDate));
				}
				$sql = mysql_query ("UPDATE ".$dado['tabela']." SET ".$dado['campoAlterado']." = '".$dado['valor']."'
														WHERE ".$dado['campoId']." = ".$dado['id']." ") or die(mysql_error());
														
				/*$retornoSQL= mysql_query("SELECT ".$dado['campoAlterado']." FROM ".$dado['tabela']." 
												WHERE ".$dado['campoId']." = ".$dado['id']." ") or die(mysql_error());*/
				
			break;
			
			case 'apresentaImagem':
				$pkUsuario = $_POST['idUsuario'];

					//$pegaImagens = mysql_query("SELECT * from imagens where usuarioPK = $pk  ORDER BY usuarioPK DESC") or die (mysql_error());		
					$pegaImagens = mysql_query("SELECT * from imagens where usuarioPK = $pkUsuario  ORDER BY usuarioPK DESC");				

					while($objetoImagem = mysql_fetch_assoc($pegaImagens)){
						
						
						echo "<a href ='#'/></a>";
						echo "<img  src=\"./arquivos/".$pkUsuario."/".$objetoImagem['imagem']."\" width='50%' height='70%' name='imagem' alt='".$objetoImagem['imagem']."' style='margin-left: 20%'/><br>";					
					
					}
			break;
		}
	}
	
	else { echo "error";}
?>