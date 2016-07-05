 <?php require ('funcoes.php');
 //http://imasters.com.br/artigo/1009/php/php-get/
 //$("tr:odd td").css('background', '#00fff0'); EFEITO ZEBRA JQUERY
//require ('verifica.php');
 session_start();

 ?>
 
 <html lang="pt-br">
 <head>
 	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!--<script type="text/javascript" src="js/jquexry.js"></script>-->
	<!--<link rel="stylesheet" src="js/jquery-ui.css"> CSS do calendario -->	
	<script src="js/jquery-1.8.2.js"></script> 
	<script src="js/maskedinput.js"></script> 
	<script src="js/jquery-ui.js"></script>
	<script src="docjq.js"></script> 
	<script src="js/jqFancyTransitions.1.8.js" type="text/javascript"></script>
	<link href="layout.css" rel="stylesheet" type="text/css"/>
	
	

</head>
<body>
	<div id="wrap">
			<div id="topo">
				
				<span style="color:white; position:absolute; top:40px;"><h2>Bem vindo <?php echo $_SESSION['administrador']->nome;?></h2></span>
				<span style="position:absolute; margin-left:800px; margin-top:40px;"><h3><a href="logout.php">Logout</a></h3></span>
				
				<span style="margin-top:50px; position:absolute;"><img name="logo" src="mova.png"/></span>
			</div>
	<div id="conteudo">
	<div id="menu">
				<ul>
					<h3>Mostrar/Editar</h3>
					<li><a href="#" class="mostrarUsuarios">Mostrar Usuarios</a></li>
					<li><a href="#" class="mostrarEventos">Mostrar Eventos</a></li>
					<li><a href="#" class="mostrarLocais">Mostrar Locais</a></li>
				
				
				<ul>	
					<h3>Cadastro</h3>
					<li><a href="#" class="cadastrarUsuarios">Cadastrar Usuarios</a></li>
					<li><a href="#" class="cadastrarEventos">Cadastrar Eventos</a></li>
					<li><a href="#" class="cadastrarLocais">Cadastrar Locais</a></li>
				</ul>
				</ul>
			</div>
		
		<div id="Cadastro_UsuarioHidden">
			<form action="#" id="formulario" method="POST" enctype = "multipart/form-data">
				<ul>
					<li><label>Nome</label><input name="usuarioNome" value="" /></li>
					<li><label>E-mail</label><input name="usuarioEmail" value="" /></li>
					<li><label>Senha</label><input type="password" name="senha" value="" /></li>
					<li><label>Confirme a senha</label><input type="password" name="senhaConfirm" value="" /></li>
					<li><label>Data de Nascimento</label><input name="usuarioDataNascimento" class="data" value="" /></li>
					<li><label>Telefone</label><input name="usuarioTelefone" class="fone" value="" /></li>
					<li><label>Sexo</label><input type="radio" name="usuarioSexo" value="1">Masculino
											<input type="radio" name="usuarioSexo" value="2">Feminino
					</li>
					<li><label>Foto de perfil</label><input type = "file" name = "arquivo"></li>
					<li><input type="reset" value="Limpar formulario"/><input type="submit" name="cadastrar" value="Cadastrar Usuario"></li>
				</ul>
				
			</form>
		</div>
		<div id="Cadastro_LocalHidden">
			<form action="#" id="formulario" method="POST">
				<ul>
			<li><label>Tipo Local</label>								
					<select name ="localTipo" class="tipoLocal"> 
					<?php
						
							$query = "SELECT tipoLocalPK, descricao FROM tipolocal ORDER BY tipoLocalPK"; 
							$resultado = mysql_query ($query);
		
					?>
					
					<option value="0" selected>Selecione o Tipo do Local</option>
					<?php
						while ( @$linha = mysql_fetch_assoc($resultado) )//ENQUANTO EXECUTA
						{
						?>
						
						<option title="<?php echo @$linha['descricao'];?>" value="<?php echo $linha['tipoLocalPK'];//RECEBE COMO VALUE O tipoLocalPK?>" 
							 <?php echo $linha['tipoLocalPK'] == @$_POST['localTipo']?"selected":""?>
									<!--
										OPERADOR TERNARIO ^
										SE ID FOR IGUAL O QUE EST� EM POST DEIXA SELECIONADO SEN�O FICA VAZIO
										? = fa�a : = sen�o.
									-->
							<?php echo @$linha['descricao'];?><!-- IMPRIME O NOME DO LOCAL-->
						</option>
						<?php 
						}
						?>
						
				</select>
		
					<input type="text" name="localComplemento" id="Cadastro_LocalOutroHidden" placeHolder="Que local tipo de local é esse?"value=""/>
					</li>
					<li>					<label>Nome</label>				<input name="localNome" value=""/>		</li>
					<li id="Localtelefone">	<label >Telefone</label>		<input name="localTelefone" class="fone" value=""/>	</li>
					<li id="Localemail">	<label> Email</label>			<input name="localEmail" value=""/>		</li>
					<li>					<label>Endereço</label>			<input name="localEndereco" value=""/>	</li>
					<li>					<label>Mais Informações</label>	<input name="localInformacoes" value=""/></li>
					<input type="submit" name="botao" value="Cadastrar Local"/>
				</ul>
			</form>
		</div>
		
		<div id="Cadastro_EventoHidden">
			<form action="#" id="formulario" method="POST">
				<ul>
					<li><label>Nome</label><input name="nomeEvento" value=""/></li>
					<li><label>Local</label>
											<?php
		
												$variavel = "SELECT localPK, nomeLocal FROM local ORDER BY nomeLocal";
												$resultado = mysql_query($variavel);
											?>
											<select name="localidEvento" class="localEvento">
												<option value="0" selected>Selecione o local</option>
												<?php
													while ( @$verifica = mysql_fetch_assoc($resultado) )
													{
												?>
												<option name="<?php echo $verifica['nomeLocal'];?>" value="<?php echo $verifica['localPK']; $verifica['localPK'] == @$_POST['localTipo']?"selected" :""?>">
													<?php echo $verifica['nomeLocal'];?>
												</option>
													<?php
													}
													?>
											<select/>
		
											
					</li>
					<li><label>Data</label><input name="dataEvento" class="data" value=""/></li>
					<li><label>Horario</label><input name="horarioEvento" class="hora" value=""/></li>
					<li><label>Atracao</label><input name="atracaoEvento" value=""/></li>
					<li><label>Preco</label><input name="precoEvento" value=""/></li>
					<li><label>Faixa Etaria</label><input name="faixaetEvento" value=""/></li>
				</ul>
					<input type="submit" name="botao" value="Cadastrar Evento"/>
			</form>
		</div>

		<div id="MostrarTudo_HiddenUsuario">
			<table border="1" title="usuario">
				
				<thead>
					<tr>
						<tr> 
							<th  colspan="100%">Usuarios do Mova</th></tr>
						<td colspan="2" align="center">Ações</td><td>Codigo Usuario</td><td> Nome </td> <td> Email </td> <td> Data de Nascimento </td> <td> Telefone </td> <td> Sexo </td> <td> Popularidade </td> <td> Nivel de Confiança </td> <td>Nivel</td> <td>Fotos<td/>
					</tr>
				</thead>
				<tbody>
					<?php 
		
						$mostraUsuarios = mysql_query("SELECT T.descricao, U.*
																FROM usuario AS U INNER JOIN tipocadastro AS T ON U.nivel = T.tipoCadastroPK
																ORDER BY U.nivel DESC");
						while ($rows = mysql_fetch_assoc($mostraUsuarios)){
								
								
							$sexo = $rows['sexo'];							
								if ($sexo == 1) {$sexo = "Masculino";}
								if ($sexo == 2) {$sexo = "Feminino" ;}
								
								$pk = $rows['usuarioPK'];
								
								$img = mysql_query("SELECT I.* from imagens AS I INNER JOIN usuario AS U ON I.usuarioPK = ".$pk." ORDER BY I.usuarioPK DESC limit 1 ") or die(mysql_error());								
								$objimg = mysql_fetch_object($img);
								
								@$nome = $objimg->imagem;
							
								//$url="./arquivos/".$rows['usuarioPK']."/".$nome;
								if ($nome == ""){ $url=""; }
								if ($nome != ""){									
									$url="tem";
								}
							
							$nome = $rows['nome'];
							$datachegando = $rows['data_nasc'];
							$newDate = date("d-m-Y", strtotime($datachegando));
							
							
						?>
					
						<tr>
							<td><input type="button" class="deletar"  value="Deletar"/></td> 
							<td><input type="button" class="editar" value="Editar"></td>	
							
							
							<td title="usuarioPK"><?php echo $rows['usuarioPK'] ; ?></td>
							<td title="nome" class="editavel" id="confirmaEditavel"><?php echo $rows['nome'] ; ?></td>
							<td title="email" class="editavel" id="confirmaEditavel"><?php echo $rows['email'] ; ?></td>
							<td title="data_nasc" class="editavel" id="confirmaEditavel"><?php echo $newDate ; ?></td>
							<td title="telefone" class="editavel"id="confirmaEditavel"><?php echo $rows['telefone'] ; ?></td>
							<td title="sexo" class="editavel"><?php echo $sexo ; ?></td>
							<td title="popularidade">	<?php echo $rows['popularidade']?>	</td>
							<td title="nivel_conf">		<?php echo $rows['nivel_conf'] ; ?>	</td>
							<td title="nivel"><?php echo $rows['descricao'] ; ?></td>
							<td title="foto"><input type="button" name="<?php echo $url;?>" class="exibeFoto" value="Exibir Foto"></td>
						</tr>
					
					<?php 
					}

					?>
					
				</tbody>
			</table>
			<div class="background">
				<div class="box">
					<div class="close">x</div>
					<div id='slideshowHolder'>

					<h2 align="center">Fotos de <span name="nomeUsuario"></span></h2>
						<a href ="#"/></a>
						<div id="foto" style="width: 50%; height: 70%; margin-left: 20%" >
							<img name="imagem"/>
						</div>

						
					</div>
				</div>

			</div>
		</div>
		<div id="MostrarTudo_HiddenLocal">
			<table border="1" title="local">
				<?php
					$mostraLocal = mysql_query("
						SELECT L.localPK , L.outroTipodeLocal, L.LtipoLocal , L.nomeLocal , L.telefone , L.email 
							, L.endereco , L.informacoes , T.descricao , T.tipoLocalPK	FROM  local AS L 
							INNER JOIN  tipoLocal AS T ON L.LtipoLocal = T.tipoLocalPK 
							ORDER BY L.nomeLocal ASC ");
				?>
				<thead>
					<tr><th colspan="100%"> Locais Cadastrados no Mova</th></tr>
					<tr>
					<td colspan="2" align="center">Ações</td>
					<td>Código Local</td>
					<td>Tipo do Local</td>
					<td>Nome</td>
					<td>Telefone</td>
					<td>Email</td>
					<td>Endereço</td>
					<td>Informações</td>
					<td>Infos Adicionais<br>(Tipo local: Outro)</td>
					</tr>
				</thead>
				<tbody>
					<?php while ($rowsLocal = mysql_fetch_assoc(@$mostraLocal))	{ ?>
					<tr>
						<td><input type="button" class="deletar"  value="Deletar"/></td> 
						<td><input type="button" class="editar" value="Editar"></td>	
						
						<td title="localPK"><?php echo @$rowsLocal['localPK'];?></td>
						<td title="LtipoLocal" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['descricao'];?></td>
						<td title="nomeLocal" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['nomeLocal'];?></td>
						<td title="telefone" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['telefone'];?></td>
						<td title="email" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['email'];?></td>
						<td title="endereco" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['endereco'];?></td>
						<td title="informacoes" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['informacoes'];?></td>
						<td title="outroTipodeLocal" class="editavel" id="confirmaEditavel"><?php echo @$rowsLocal['outroTipodeLocal'];?></td>
					</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
		
		<div id="MostrarTudo_HiddenEvento">
			<table border="1" title="evento">
				<?php 
					$mostraEvento = mysql_query("SELECT E.cod_evento, E.nomeEvento, E.dataEvento, E.horario, E.atracao, E.preco, L.nomeLocal 
												FROM evento AS E 
												INNER JOIN local AS L on E.EidLocal = L.localPK
												ORDER BY E.dataEvento DESC");
				?>
			<thead>
				<tr>
					<tr><th colspan="100%"> Eventos Cadastrados no Sistema</th></tr>
					<td colspan="2" align="center">Ações</td><td>Codigo do Evento</td><td>Local Evento</td> <td> Nome </td> <td> Data </td><td> Horario </td><td> Atração </td><td> Preço </td>
				</tr>
			</thead>
				<tbody>
					<?php 
						while ( $rowsEvento = mysql_fetch_assoc($mostraEvento)) {
						$dataBanco = $rowsEvento['dataEvento'];
						$dataExibida = date("d-m-Y", strtotime($dataBanco));
					?>
					
					<tr>
						<td><input type="button" class="deletar"  value="Deletar"/></td> 
						<td><input type="button" class="editar" value="Editar"></td>	
						
						<td title="cod_evento"><?php echo $rowsEvento['cod_evento'];?></td>
						<td title="EidLocal" class="editavel" id="confirmaEditavel"><?php echo $rowsEvento['nomeLocal'];?></td>
						<td title="nomeEvento" class="editavel" id="confirmaEditavel"><?php echo $rowsEvento['nomeEvento'];?></td>
						<td title="dataEvento" class="editavel" id="confirmaEditavel"><?php echo $dataExibida;?></td>
						<td title="horario" class="editavel" id="confirmaEditavel"><?php echo $rowsEvento['horario'];?></td>
						<td title="atracao" class="editavel" id="confirmaEditavel"><?php echo $rowsEvento['atracao'];?></td>
						<td title="preco" class="editavel" id="confirmaEditavel"><?php echo $rowsEvento['preco'];?></td>
					</tr>
				<?php
					}
				?>
				</tbody>
			</table>
		</div>

		 <!--
		
		 <div id="">
		 	<table border="1">
				<form action="#" method="POST">
					<tr>
						<th colspan="6"> Ranking </th>
					</tr>
					<tr>
						<td>
							<label> Escolha o tipo </label>
						</td>
						<td>
							<select name="tipoUsuario">
								<option value="0" selected>Selecione</option>
								<option value="1">Usuario</option>
								<option value="2">Local</option>
								<option value="3">Evento</option>
							</select>
						</td>
					</tr>
						<th colspan="6"><input type="submit" name="botao" value="Submit"></th>
				
				</form>
			</table>
		</div>
		
		<hr><hr>
		-->
		
		</div>
	</div>
 </body>
 <span width="10%">Tela ADM</span>
 </html>