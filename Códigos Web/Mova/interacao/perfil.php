<?php
header ("Location: ../principal/meuperfil.php");
require ('conectDB.php');
require ('verifica.php');
?>
<script type="text/javascript" src="js/jquery.js"></script>
 <script>
 $(document).ready(function(){
 	console.log($('.fazerAmigo').val());
 	var eu = "<?php echo $_SESSION['usuario']->usuarioPK;?>" ;
 	
 	$('.fazerAmigo').click(function(){
 		var linha = $(this).parents('tr');
 		var id = $(this).parents('tr').children('td:eq(0)').text();
 		//var b = $(this).parent().text('amigos');
 		$.post("controleFuncoes.php",{
 			funcao: "criarAmizade",
 			idAmigo: id,
 			meuId: eu	
 		},function(confirmouAmizade){
 			linha.fadeOut(300);
 			//alert(b);
 			console.log(confirmouAmizade);	
 		});
 		
 	});
 	$('.aceitarAmigo').click(function(){
 		var linha = $(this).parents('tr');
 		var id = $(this).parents('tr').children('td:eq(0)').text();
 		//var b = $(this).parent().text('amigos');
 		$.post("controleFuncoes.php",{
 			funcao: "aceitarAmizade",
 			idAmigo: id,
 			meuId: eu	
 		},function(confirmouAmizade){
 			linha.fadeOut(300);
 			//alert(b);
 			console.log(confirmouAmizade);	
 		});
 		
 	});
 	$('.desfazerAmigo').click(function(){
 		var linha = $(this).parents('tr');
 		var id = $(this).parents('tr').children('td:eq(0)').text();
 		$.post("controleFuncoes.php",{
 			funcao: "desfazerAmizade",
 			idAmigo: id,
 			meuId: eu 			
 		},function(re){
 			linha.fadeOut(300);
 			console.log(re);
 		}
 		); 		
 	});
 	$(".participarEvento").click(function(){
 		var pkEvento = $(this).parents('tr').children('td:eq(0)').text();
 		var linha = $(this).parents('tr');
 		$.post("controleFuncoes.php",{
 			funcao: "participarEvento",
 			idEvento: pkEvento,
 			meuId: eu 			
 		},function(re){
 			
 			linha.fadeOut(300);
 			console.log(re);
 		}
 		); 	
 		
 	});
 	$(".cancelarParticipar").click(function(){
 		var pkEvento = $(this).parents('tr').children('td:eq(0)').text();
 		var linha = $(this).parents('tr');
 		$.post("controleFuncoes.php",{
 			funcao: "cancelarParticipar",
 			idEvento: pkEvento,
 			meuId: eu 
 		}, function(){

 			linha.fadeOut(300);
 			console.log();
 		});
 		
 	});
 })
 	
 	
 </script> 
		<table border="1">
		<tr><td>MEU PERFIL: <?php echo $_SESSION['usuario']->nome ; echo $_SESSION['usuario']->usuarioPK ;echo $_SESSION['usuario']->email ;?></td></tr>	
			<a href="logout.php">Sair</a>
		</table>
		Outros Perfis
		<table border="1">
			<tr>
				<tr><th align="center" colspan="100%">Usuarios</th></tr>
				<tr><td>Pk usuario</td><td >Nome</td><td>Sexo</td><td>Fazer Amizade</td></tr>
			</tr>
			<?php
			$usuario = mysql_query("SELECT * from usuario where nivel = 0 ") or die(mysql_error());
			while($dado = mysql_fetch_assoc($usuario)){
				echo "<tr>
						<td>".$dado['usuarioPK']."</td>
						<td>".$dado['nome']."</td>
						<td>".$dado['sexo']."</td>
						<td><input type='button' class='fazerAmigo' value='Solicitar Amizade'></td>
					</tr>";
			}
			?>
		</table>
		Solicitação de Amizade
		<table border="1">
			<tr>
				<tr><th align="center" colspan="100%">Solicitações</th></tr>
				<tr><td>Pk usuario</td><td >Nome</td><td>Sexo</td><td>Solicitação</td></tr>
			</tr>
			<?php
			$amigo = mysql_query("SELECT * from usuarioeusuario where codAmigo = ".$_SESSION['usuario']->usuarioPK." AND statusAmizade = 1 ORDER BY codUsuario DESC") or die(mysql_error());
			while($dado = mysql_fetch_assoc($amigo)){
					$meuAmigo = mysql_query("Select * from usuario where usuarioPK = ".$dado['codUsuario']." ORDER BY usuarioPK DESC");
					while($meuamigo = mysql_fetch_object($meuAmigo)){
				echo "<tr>
						<td>".$meuamigo->usuarioPK."</td>
						<td>".$meuamigo->nome."</td>
						<td>".$meuamigo->sexo."</td>
						<td><input type='button' class='aceitarAmigo' value='Confirmar Amizade'></td>
					</tr>";
			}}
			?>	
		</table>
		
		
		Meus Amigos
		<table border="1">
			<tr>
				<tr><th align="center" colspan="100%">Meus Amigos</th></tr>
				<tr><td>Pk usuario</td><td >Nome</td><td>Sexo</td><td>Amizade</td></tr>
			</tr>
			<?php
			$amigo = mysql_query("SELECT * from usuarioeusuario where  (codAmigo = ".$_SESSION['usuario']->usuarioPK." OR codUsuario = ".$_SESSION['usuario']->usuarioPK.") AND statusAmizade = 2 ORDER BY codUsuario DESC") or die(mysql_error());
			$amigos = [];
			$count = 0;
			while($dado = mysql_fetch_assoc($amigo)){
				$amigos[$count] = $dado;
				
				if ($dado['codUsuario'] == $_SESSION['usuario']->usuarioPK){
					$amigos[$count]['id'] = $dado['codAmigo'];
	
				}
				else{
					$amigos[$count]['id'] = $dado['codUsuario'];
				}
				$count++;
			}	
			
			
			foreach($amigos as $dado){
					$meuAmigo = mysql_query("Select * from usuario where usuarioPK = ".$dado['id']." ORDER BY usuarioPK DESC");
					while($meuamigo = mysql_fetch_object($meuAmigo)){
				echo "<tr>
						<td>".$meuamigo->usuarioPK."</td>
						<td>".$meuamigo->nome."</td>
						<td>".$meuamigo->sexo."</td>
						<td><input type='button' class='desfazerAmigo' value='Desfazer Amizade'></td>
					</tr>";
			}}
			?>	
		</table>
		
Eventos
<table border="1">
	
	<table border="1" title="evento">
				<?php // ARRUMAR ESSE SQL - TRATAR DADOS	//
					$mostraEvento = mysql_query("SELECT E.cod_evento, E.nomeEvento, E.dataEvento, E.horario, E.atracao, E.preco, L.nomeLocal 
												FROM evento AS E usuarioevento AS UE 
												INNER JOIN local AS L on E.EidLocal = L.localPK
												WHERE UE.status < 1
												ORDER BY E.dataEvento DESC");
				?>
			<thead>
				<tr>
					<tr><th colspan="100%"> Eventos Cadastrados no Sistema</th></tr>
					<td>Codigo do Evento</td><td>Local Evento</td> <td> Nome </td> <td> Data</td><td>Participar</td>
				</tr>
			</thead>
				<tbody>
					<?php 
						while ( $rowsEvento = mysql_fetch_assoc($mostraEvento)) {
						$dataBanco = $rowsEvento['dataEvento'];
						$dataExibida = date("d-m-Y", strtotime($dataBanco));
					
					echo "
					<tr>
						
						<td>".$rowsEvento['cod_evento']."</td>
						<td>".$rowsEvento['nomeLocal']."</td>
						<td>".$rowsEvento['nomeEvento']."</td>
						<td>".$dataExibida."</td>
						<td><input type='button' class='participarEvento' value='Confirmar Presença'></td>
					</tr>
					";
					}
				?>
				</tbody>
			</table>
			<table border="1">
			<tr>
				<tr><th align="center" colspan="100%">Eventos em que confirmei presença</th></tr>
				<tr><td>CodEvento</td><td >Nome</td><td>Local</td><td>Paticipação</td></tr>
			</tr>
			<?php
			$evento = mysql_query("SELECT * from usuarioevento where usuarioPK = ".$_SESSION['usuario']->usuarioPK."  AND status = 1 ORDER BY usuarioPK DESC") or die(mysql_error());
			while($dado = mysql_fetch_assoc($evento)){
					$dadosEvento = mysql_query("Select * from evento where cod_evento = ".$dado['eventoPK']." ORDER BY cod_evento DESC");
					while($Evento = mysql_fetch_object($dadosEvento)){
						$local = mysql_query("Select nomeLocal from local where localPK = ".$Evento->EidLocal." ORDER BY localPK DESC");
							while ($nomeLocal = mysql_fetch_object($local)) {
								$nome = $nomeLocal->nomeLocal;
				echo "<tr>
						<td>".$dado['eventoPK']."</td>
						<td>".$Evento->nomeEvento."</td>
						<td>".$nome."</td>
						<td><input type='button' class='cancelarParticipar' value='Desfazer Participação'></td>
					</tr>";
			}}}
			?>	
		</table>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</table>