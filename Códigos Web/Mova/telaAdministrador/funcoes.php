<?php	require ('conectDB.php');
//POR QUESTÃO DE DIDATICA EU ALTERNEI A VERIFICAÇÃO DE DADOS JÁ ECISTENTES
// A VERIFICAÇÃO É FEITA TANTO EM mysql_num_rows como sql_fetch_assoc

		if (isset($_POST['cadastrar'])){
		
			$nome=$_POST['usuarioNome'];
			$email = $_POST['usuarioEmail'];
			$senha = $_POST['senha'];
			$Confirmsenha = $_POST['senhaConfirm'];
			$datanascimento = $_POST['usuarioDataNascimento'];
			$telefone = $_POST['usuarioTelefone'];
			@$sexo = $_POST['usuarioSexo'];

			
			// VERIFICAÇÃO APENAS DE EMAIL.
			if ($email == ""){echo "<script>alert('Digite um email.')</script>";}
			else {
				$select_email = mysql_query("SELECT email FROM usuario WHERE email = '".$_POST['usuarioEmail']."'");	//CODIGO REDUZIDO
				$contagem = mysql_num_rows($select_email); // CONTA AS LINHAS
					
					if ($contagem > 0) //Mais de 0 linha significa que existe um dado.
					{
						echo "<script>alert('O email ".$_POST['usuarioEmail']." ja esta cadastrado.')</script>";
					}
					
					else
					{
						
						if($senha != $Confirmsenha || $senha == "" || $Confirmsenha == ""){
							echo "<script>alert('Digite senhas válidas.')</script>";
						}
						else {					
			
						$originalDate = $datanascimento;
						$newDate = date("Y-m-d", strtotime($originalDate));				
						$usuarioCadastrar = ("INSERT INTO usuario(nome, email, senha, data_nasc, telefone, sexo) 
												VALUES ('$nome', '$email','$senha', '$newDate', '$telefone', '$sexo')");
							mysql_query ($usuarioCadastrar);
							
							if(isset($_FILES["arquivo"])){ //
						
								$arquivo = $_FILES["arquivo"]; 
								
								// CAMINHO DO SERVIDOR							
								$caminho = $_SERVER['DOCUMENT_ROOT'];
								
								$usuarioPK = mysql_query("SELECT usuarioPK from usuario WHERE email = '".$_POST['usuarioEmail']."' ORDER BY usuarioPK DESC limit 1");
								$pegaPK = mysql_fetch_object($usuarioPK);
								$usuarioPK = $pegaPK->usuarioPK;
								
								$pasta_dir = $caminho."/Admin com PDO (1)/adm/arquivos/".$usuarioPK."/"; //	DIRETORIO DO CAMINHO
								// Se nao existir a pasta ele cria uma
								
								if(!file_exists($pasta_dir)){ // SE A PASTA NÃO EXISTE
									mkdir($pasta_dir);
								}
								
								$arquivo_nome = $pasta_dir . $arquivo["name"];

								// Faz o upload da imagem
								move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
								
								//aqui salva no banco o path da foto
								mysql_query("INSERT INTO imagens (usuarioPK, imagem) VALUES ('$usuarioPK','".$arquivo["name"]."') ");

							}
						}
						
					}
			}
			
		}
		if (@$_REQUEST ['botao'] == "Cadastrar Local"){
			
			if ($_POST['localTipo'] == 0) { echo "Selecione o tipo do local.";} //Verifica se escolheu o tipo do local
			else{
				$TipoLocal = $_POST['localTipo'];
				$LocalNome = $_POST['localNome'];
				$LocalTelefone = $_POST ['localTelefone'];
				$LocalEmail = $_POST ['localEmail'];
				$LocalEndereco = $_POST ['localEndereco'];
				$LocalInformacoes = $_POST ['localInformacoes'];
				


				//VERIFICAÇÃO APENAS DE NOME.
					
					$var = mysql_query("SELECT nomeLocal, endereco FROM local WHERE nomeLocal = '".$_POST['localNome']."' AND endereco = '".$_POST['localEndereco']."' ");
					$varcount = mysql_num_rows($var);
							if ($varcount > 0)
							{ 
								echo "<p>O local <b>".$var2['nomeLocal']."</b> ja existe em nosso Banco de Dados</p>";
							}
							
							else{
									if (isset ($_POST['localComplemento'])){
										$OutroTipoLocal = $_POST['localComplemento'];
										$localCadastrar = "INSERT INTO local (LtipoLocal, nomeLocal, telefone, email, endereco, informacoes, outroTipodeLocal) 
													VALUES ('$TipoLocal','$LocalNome','$LocalTelefone','$LocalEmail','$LocalEndereco','$LocalInformacoes', '$OutroTipoLocal')";
									}	
									
									else {
									
										$localCadastrar = "INSERT INTO local (LtipoLocal, nomeLocal, telefone, email, endereco, informacoes) 
													VALUES ('$TipoLocal','$LocalNome','$LocalTelefone','$LocalEmail','$LocalEndereco','$LocalInformacoes')";
										}
										
								mysql_query ($localCadastrar) or die (mysql_error());
							}
				}
		}
		
		if (@$_REQUEST ['botao'] == "Cadastrar Evento"){
			if ($_POST['localidEvento'] == 0){ echo "Selecione o local.";} //Verifica se escolheu o local
			else {
					//localidEvento é chave estrangeira de um local já existente
					$event_local = $_POST['localidEvento'];
					$event_name = $_POST['nomeEvento'];
					$event_date = $_POST['dataEvento'];
					$event_hour = $_POST['horarioEvento'];
					$event_attraction = $_POST['atracaoEvento'];
					$event_price = $_POST['precoEvento'];
					$event_agegroup = $_POST['faixaetEvento'];
					
					//VERIFICAÇÃO DE NOME E LOCAL.
					
						$verificaExiste = mysql_query ("SELECT EidLocal, nomeEvento, dataEvento FROM evento 
													WHERE nomeEvento like '%".$_POST['nomeEvento']."%' AND EidLocal = '".$_POST['localidEvento']."'");
						$count = mysql_num_rows($verificaExiste);
						
						if ($count > 0)
						{
							echo ("<p>Não foi possível criar esse evento<br>Já existe um evento com mesmo nome e no mesmo local nos registros.<br> ");
							echo ("Caso o evento que queira registrar realmente exista além do já resitrado, entre em contato!<br>Obrigado.</p>");
						}
						else 
						{
							$originalDate = $event_date;
							$newDate = date("Y-m-d", strtotime($originalDate));
							$cadastrar_evento = mysql_query ("INSERT INTO evento (EidLocal, nomeEvento, dataEvento, horario, atracao, preco)
											VALUES ('$event_local','$event_name','$newDate','$event_hour','$event_attraction','$event_price')") or die (mysql_error());
						}
			}
		}
	
	
		
?>