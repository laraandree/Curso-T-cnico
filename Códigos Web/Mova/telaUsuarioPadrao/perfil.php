<?php
require ('conectDB.php');
session_start();

?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	
	<title>Projeto Mova 1</title>
	<link rel="stylesheet" type="text/css" href="layout.css">
	<script type="text/javascript" src="jquery.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			var eu = "<?php echo $_SESSION['usuario']->usuarioPK;?>" ;
		//	FUNÇÕES GERAIS DE CLIQUE	//
			$('#mostrarEventos, #mostrarAmizades').hide();
			
			$('.mostrarEventos').click(function(){
				$('#pedidosAmizade, #mostrarAmizades ').fadeOut(300);
				$('#mostrarEventos').fadeIn(300);
				console.log("a");
			});
			$('.mostrarAmizades').click(function(){
				$('#mostrarEventos, #pedidosAmizade').fadeOut(300);
				$('#mostrarAmizades').fadeIn(300);
				console.log("a");
			});
			$('.solicitaAmizade').click(function(){
				$('#mostrarEventos, #mostrarAmizades ').fadeOut(300);
				$('#pedidosAmizade').fadeIn(300);
				console.log("a");
			});
		//	AÇÕES	//
			$('.ir').click(function(){
				var nomeEvento = $(this).parents('ul').parents('ul').children('li:eq(1)').text();
				console.log(nomeEvento);
				var evento = $(this).parents('ul').parents('ul');
				$.post("controleFuncoes.php",{
					funcao: "participarEvento",
					nomeEvento: nomeEvento,
					meuId: eu 			
				},function(re){
					evento.fadeOut(300);
					console.log(re);
				}); 
			});	
			
			$('.recusar').click(function(){
				var nomeEvento = $(this).parents('ul').parents('ul').children('li:eq(1)').text();
				console.log(nomeEvento);
				var evento = $(this).parents('ul').parents('ul').parents('div .evento');
				$.post("controleFuncoes.php",{
					funcao: "cancelarParticipar",
					nomeEvento: nomeEvento,
					meuId: eu 			
				},function(re){
					evento.fadeOut(300);
					console.log(re);
				}); 
			});
			$('.aceitar').click(function(){
				var nomeAmigo = $(this).parents('ul').parents('ul').children('li:eq(1)').text();
				console.log(nomeAmigo);
				var evento = $(this).parents('ul').parents('ul').parents('div .evento');
				$.post("controleFuncoes.php",{
					funcao: "aceitarAmizade",
					nomeAmigo: nomeAmigo,
					meuId: eu 			
				},function(re){
					evento.fadeOut(300);
					console.log(re);
				}); 
			});	


			
		});
		
	</script>
	
</head>
<body>

<div id="meuPerfil" class="parallax" data-speed = "1">
	<div id="topoPerfil">
			<img src="semfoto.gif" width="20%" height="99%" >
			<div id="informacoes">
				<ul style="list-style:none;">
					<li><h2><?php echo $_SESSION['usuario']->nome;?></h2></li>
					<li>560 Interações</li>
					<li>Estação Pedreira foi seu ultimo evento</li>
					<li>Curitiba, 19 anos</li>
				</ul>
			</div>
			<div id="menu">
				<ul style="align:right; margin-top:-120px;">
					<li><a href="logout.php">Sair</a></li>
				</ul>
				<ul>
					<li><a href="#" class="solicitaAmizade">Solicitação de Amizade</a></li>
					<li><a href="#" class="mostrarAmizades">Amigos</a></li>
					<li><a href="#" class="mostrarEventos">Eventos</a></li>
				</ul>
			</div>
	</div>
	<div id="restoPerfil">
		<div id="mostrarEventos">
			<h2 align="center"style="margin-top: 10px;">Próximos eventos</h2>
			<?php 
					$mostraEvento = mysql_query("SELECT E.cod_evento, E.nomeEvento, E.dataEvento, L.nomeLocal 
												FROM evento AS E
												INNER JOIN local AS L on E.EidLocal = L.localPK
												where E.cod_evento NOT IN (SELECT eventoPK from usuarioevento)
												ORDER BY rand() DESC limit 3 ") or die (mysql_error());
					
					while ( $rowsEvento = mysql_fetch_assoc($mostraEvento) ) {
						$dataBanco = $rowsEvento['dataEvento'];
						$dataExibida = date("d-m-Y", strtotime($dataBanco));
						?>
								<div class='evento'>
									<ul name="evento" style='list-style: none;'>
										<li align='center'><img src='semfoto.gif' width='180px' height='170px'/></li>
									
										<li align='center'><h3><?php echo $rowsEvento['nomeEvento'];?></h3></li>
										<li align='center'> <?php echo $rowsEvento['nomeLocal'];?> </li>
									
										<li align='center'><?php echo $dataExibida;?></li>
									<ul id='inputs' style='list-style: none; '>
										<li><input class='ir' type='button' value='Ir'/></li>
										<li><input class='recusar' type='button' value='Recusar'/></li>
									</ul>
									
									
									</ul>
									
								</div>
			
			<?php
			}
			?>
		

		
			<h2 align="center"style="margin-top: 350px; margin-left:-20px; border-top:8px solid #60aaca; padding:10px;">Eventos que confirmei presença</h2>
			<?php
			$evento = mysql_query("SELECT * from usuarioevento where usuarioPK = ".$_SESSION['usuario']->usuarioPK."  AND status = 1 ORDER BY usuarioPK DESC limit 3") or die(mysql_error());
			while($dado = mysql_fetch_assoc($evento)){
					$dadosEvento = mysql_query("Select * from evento where cod_evento = ".$dado['eventoPK']." ORDER BY cod_evento DESC");
					while($Evento = mysql_fetch_object($dadosEvento)){
						$dataBanco = $Evento->dataEvento;
						$dataExibida = date("d-m-Y", strtotime($dataBanco));
						$local = mysql_query("Select nomeLocal from local where localPK = ".$Evento->EidLocal." ORDER BY localPK DESC");
							while ($nomeLocal = mysql_fetch_object($local)) {
								$nome = $nomeLocal->nomeLocal;
								?>
								<div class='evento'>
									<ul style='list-style: none;'>
										<li align='center'><img src='semfoto.gif' width='180px' height='170px'/></li>
									
										<li align='center'><h3><?php echo $Evento->nomeEvento;?></h3></li>
										<li align='center'> <?php echo $nome;?> </li>
									
										<li align='center'><?php echo $dataExibida;?></li>
									<ul id='inputsConf' style='list-style: none; '>
										<li ><input class='recusar' type='button' value='Recusar'/></li>
									</ul>
									</ul>
									
								</div>
			
			<?php
			}}}
			?>	

	</div>
	<div id="pedidosAmizade">

					<div class="evento">
			<?php
			$amigo = mysql_query("SELECT * from usuarioeusuario where codAmigo = ".$_SESSION['usuario']->usuarioPK." AND statusAmizade = 1 ORDER BY codUsuario DESC") or die(mysql_error());
			while($dado = mysql_fetch_assoc($amigo)){
					$meuAmigo = mysql_query("Select * from usuario where usuarioPK = ".$dado['codUsuario']." ORDER BY usuarioPK DESC");
					while($meuamigo = mysql_fetch_object($meuAmigo)){
					?>
					
						<ul name="evento" style='list-style: none;'>
								<li align='center'><img src='semfoto.gif' width='180px' height='170px'/></li>
							
								<li align='center'><h3><?php echo $meuamigo->nome;?></h3></li>
								<li align='center'> <?php echo $meuamigo->data_nasc;?> </li>
							
								<li align='center'>Popularidade: <?php echo $meuamigo->popularidade;?></li>
							<ul id='inputs' style='list-style: none; '>
								<li><input class='aceitar' type='button' value='Aceitar'/></li>
								<li><input class='rejeitar' type='button' value='Rejeitar'/></li>
							</ul>
						</ul>		
					</div>
					<?php
			
			}}
			?>

		</div>
	<div id="mostrarAmizades">
		
		<div class="evento">
			<?php
			$usuario = mysql_query("SELECT * from usuario where nivel = 0 ORDER BY usuarioPK DESC") or die(mysql_error());
			while($meuamigo = mysql_fetch_assoc($usuario)){
					?>
					
						<ul name="evento" style='list-style: none;'>
								<li align='center'><img src='semfoto.gif' width='180px' height='170px'/></li>
							
								<li align='center'><h3><?php echo $meuamigo['nome'];?></h3></li>
								<li align='center'> <?php echo $meuamigo['data_nasc'];?> </li>
							
								<li align='center'>Popularidade: <?php echo $meuamigo['popularidade'];?></li>
							<ul id='inputs' style='list-style: none; '>
								<li><input class="aceitar" type="button" value="Solicitar Amizade"/></li>

							</ul>
						</ul>	
						<?php	}?>
					</div>
		
	</div>
</div>
</body>
</html>