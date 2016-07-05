<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/layout.css" rel="stylesheet" type="text/css"/>
<title>Administrador - A Brasileira</title>
</head>
<body>
	<div id="wrap">
	<div id="topo">
	
		<!-- Menu Superior -->
		<div id="menu_superior">
			<div class="menu_superior_bordalateral"><p><?php require ('verifica.php'); echo @$_SESSION['email']; ?></p></div>
			<div class="menu_superior_bordalateral"><p style="margin-top: 3px;">Configuracoes da <br> Conta</p></div>
			<div class="menu_superior_sembordalateral"><p><a href="logout.php"> Sair </p></div>
				<input type="image" name="botao" src="imagens/seta1.png" width="14px" height="18px" alt="sair usuario" alt="Sair"/></a>
		</div>
	</div>
	
	<div id="logo"><img src="imagens/logo.png"></div>
	
	<!-- Menu Secundario -->
		<div id="menu_secundario">
			<ul>
				<li>Pagina Inicial</li><div class="menu_secundario_separador"></div>
				<li>Configuracao do Sistema</li><div class="menu_secundario_separador"></div>
				<li>Modificar Informacoes</li>
			</ul>
					<div id="menu_secundario_img"><input type="image" name="botao" src="imagens/pesquisar.png" alt="Procurar"/></div>
			
		</div>
	<!-- Menu Lateral -->
	<div id="menu_lateral">
		<ul>
			<li><img class="imagem_menu" src="imagens/arroba.png"/>Mensagens</li>
			<li><img class="imagem_menu" src="imagens/seta.png"/>Entregas</li></a><br><br>
			<li><img class="imagem_menu" src="imagens/estatisticas.png"/>Estatisticas</li>
			<li><img class="imagem_menu" src="imagens/ferramenta.png"/>Ferramentas</li>
			<li><img class="imagem_menu" src="imagens/usuario.png"/>Casdastros</li>
			
		</ul>
	</div>
	
	<!-- Conteudo do Site -->
			<div id="conteudo">
			
				<!-- Comentarios -->
				<div id="comentarios">
					<div id="comentario_titulo"><img src="imagens/mensagens.png" width="38px" height="30px" /><p>Comentarios</p></div>
					
						<div class="comentario_comentarios"> Camila dos Santos Reis <div class="comentario_data">20/09/2013</div>
							<span style="color: black;">Comentou:</span> Ola, gostaria de saber o praz...</div>
						
						<div class="comentario_comentarios">Jorge Amaral Neto	<div class="comentario_data">19/09/2013</div><br>
							<span style="color: black;">Comentou:</span> Boa tarde Andre, quero que ...</div>
						
						<div class="comentario_comentarios">Bruno Moretto de Lara	<div class="comentario_data">19/09/2013</div>
							<span style="color: black;">Comentou:</span> Faz dois anos que comprei o...</div>
						
						<div class="comentario_comentarios">Raquel Pereira Schmidt	<div class="comentario_data">19/09/2013</div>
							<span style="color: black;">Comentou:</span> Quando saira a nova cole褯 ...</div>
						
						<div class="limpafloat"></div>
							<div id="comentario_mais"><img src="imagens/mais.png" width="30px" height="25px" alt=""/><font color="red"><p> 25 Outros coment⳩os </p></font></div>
				</div>

				<!-- Vendas Requeridas -->
				<div id="vendas_requeridas">
					<div id="vendas_requeridas_titulo"><img src="imagens/vendas.png" alt=""/><p>Vendas Requeridas</p></div>
					
				<div id="vendas_requeridas_relatorio">
						<table bgcolor="#fff" border="1px">
							<tr bgcolor="#a7a7a7">
								<td>Cod.Venda</td><td>Produto</td><td>Cod.Cliente</td><td>Data Pagamento</td><td>Valor</td>
							</tr>
							<tr>
								<td bgcolor="#a7a7a7">#C256</td><td>Roupa</td><td>#AM200513</td><td>20/09/2013</td><td>R$59,90</td>
							</tr>
							<tr>
								<td bgcolor="#a7a7a7">#C147</td><td>Roupa</td><td>#LM010105</td><td>20/09/2013</td><td>R$19,90</td>
							</tr>
							<tr>
								<td bgcolor="#a7a7a7">#B294</td><td>Sapato</td><td>#MB010212</td><td>19/09/2013</td><td>R$149,90</td>
							</tr>
						</table>
					</div>
				</div>
				
				<!-- Mensagens Broadcast-->
				<div id="broadcast_mensagem">
					<div id="broadcast_mensagem_titulo"><img src="imagens/mensbro.png" >Nova mensagem em BroadCast</div>	<!-- icone e titulo -->
					

					<div id="boadcast_mensagem_texto">
					<textarea cols="50" rows="10" placeholder="Digite aqui a mensagem"  wrap="on"></textarea>
					</div>	<!-- Area de texto -->
					
					<div id="broadcast_mensagem_opcoes">
						<input type="checkbox" value="Homens"/>Homens<br>
						<input type="checkbox" value="Mulheres"/>Mulheres
					</div>	<!-- Opções checkbox-->
					<div id="broadcast_mensagem_input">
						<input type="submit" name=botao value="Enviar"/>
					</div>
				</div>
			</div>
		<div class="rodape">asfsda</div>
	</div>
</body>
</html>
