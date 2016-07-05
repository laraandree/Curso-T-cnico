$(document).ready(function(){
	
	$('form[name="form_login"]').submit(function(){ //	Quando der submit nesse form	//
		var forma = $(this);
		var botao = $(this).find(':button');

		$.ajax({
			url: "controlador.php",
			type: "POST",
			data: "acao=login&"+forma.serialize(),
			beforeSend: function(){
				botao.attr('disabled', true); // Desabilita o botao //
				$('.load').fadeIn('slow'); // Abre a classe do load //
			},
			success: function(retorno){
				//	Habilita o botao e deixa ele como estava antes	//
				$('.load').fadeOut('fast', function(){
					botao.attr('disabled', false);
				});
				
				
				//	Trata o erro vindo do php	//
				if (retorno === 'vazio'){
					msg('É preciso digitar o Login e Senha para continuar.', 'alerta');
				}else if (retorno === 'naoexiste'){
					msg('Este login não foi encontrado em nossos registros.', 'erro')
				}else if (retorno === 'diferentesenha'){
					msg('A senha digitada não corresponde este Login, verifique e tente novamente', 'info');
				}else if(retorno === 'nivel'){
					msg('Você não possui permissão para continuar', 'erro');
				}else{
					
					forma.fadeOut('fast', function(){
						msg('Login efetuado com sucesso, Aguarde...', 'sucesso') //Mensagem usando a função //
						$('#load').fadeIn('slow'); 
					});
					
					setTimeout(function(){
						if(retorno === 'administrador'){
							$(location).attr('href', 'telaAdministrador/telaAdministrador.php'); // Redireciona para a tela adm //
						}else if(retorno === 'usuarioPadrao' ){
							$(location).attr('href', 'telaUsuarioPadrao/perfil.php');
						}
					}, 3000);
					
				}				
			}
		});
	
		return false;	
	});
	
	// 	FUNÇÕES GERAL
	function msg(msg, tipo){
		var retorno = $('.retorno');
		var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('INFORME MENSAGEM DE SUCESSO, ALERTA, ERRO E INFO');
		
		retorno.empty().fadeOut('fast', function(){
			return $(this).html('<div class="alert alert-'+tipo+'">'+msg+'</div>').fadeIn('slow'); // Mostra a mensagem //
		});
		
		setTimeout(function(){
			retorno.fadeOut('slow').empty(); // Esconde mensagem e limpa //
		}, 5000);
		
	}
		
});
