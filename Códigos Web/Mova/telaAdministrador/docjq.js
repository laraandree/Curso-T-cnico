$(document).ready(function(){
		//	Variavel armazenando a localização do select dos tipos de locais.	//
		var tipoLocal = $(".tipoLocal");
		var localEvento = $(".localEvento");
		//	Mascara de dado	//
		$(".fone").mask("(99) 9999-9999");
		$(".data").mask("99-99-9999");
		$(".hora").mask("99:99");
		$("tr:odd td").css('background', '#eee'); // EFEITO ZEBRA JQUERY
			 $('#slideshowHolder').jqFancyTransitions({ width: 400, height: 300,
				effect: 'waze', // wave, zipper, curtain
				//width: 500, // width of panel
				//height: 332, // height of panel
				//strips: 20, // number of strips
				//delay: 5000, // delay between images in ms
				//stripDelay: 50, // delay beetwen strips in ms
				//titleOpacity: 0.7, // opacity of title
				//titleSpeed: 1000, // speed of title appereance in ms
				//position: 'alternate', // top, bottom, alternate, curtain
				//direction: 'fountainAlternate', // left, right, alternate, random, fountain, fountainAlternate
				navigation: true, // prev and next navigation buttons
				links: false // show images as links

			 });
		
		//	Funções botões do CRUD	//
		
		//	Deletar	//
		$(".deletar").click(function(){		
			//alert("A função deletar aqui no ajax está com 'barra'");
			if ($(this).parents('tr').children('td:eq(10)').text() == "Moderador"){
				alert("Não é possível excluir categoria Moderador ou Administrador.");
			}
			else{				
				var linhaApagada = $(this).parents('tr');
				$.ajax({
						type: "POST",
						url: "controladorFuncoes.php",					
						data: {
								funcao: 'deletar', 
								tabela: $(this).parents('table').attr('title'),
								campoID: $(this).parents('tr').children('td:eq(2)').attr('title'),
								id: $(this).parents('tr').children("td:eq( 2 )").text()
							},
							success: function(retorno){
								linhaApagada.fadeOut( 300);	
								alert("gay"+retorno);
							}
					});
			}
		})	
		
		//	Editar	//
		$(".editar").click(function(a){				
			
			$('.editar').css("color", "black"); //Altera para black color inputEditar//
			$('.editar').parents('tr').children('td.editavel').css("color","black"); //Altera para black color td.editavel //
			
			
			//$(this).parents('tr').children('td').removeClass('editavel'); // Remove a classe Editavel	//
			//$('tr').children('td#confirmaEditavel').addClass('editavel');	//	Adiciona classe Editavel em td#confirmaEditavel	//
			
			$(this).css("color","red");		//	Deixa o inputEditar com "color vermelho"	//
			$(this).parents('tr').children('td.editavel').css("color","blue"); // Muda o color do editaveis	//
			
		
			

			

			$(this).parents('tr').children('td.editavel').dblclick(function(){
				var nomeTabela = $(this).parents('table').attr('title');
				var conteudoOriginal = $(this).text();
				var novoElemento = $('<input/>', {type:'text', placeholder: 'Editar', value:conteudoOriginal});
				var tituloTD = $(this).attr('title');
				
				
				//	Não deixa ter 2 inputs	//
				if ($('td#confirmaEditavel > input').length > 0){	//	Se o numero de input na td#confirmaEditavel for maior que 0	//
					return false; 
				}
				if ($('td#confirmaEditavel > select').length > 0){	//	Se o numero de select na td#confirmaEditavel for maior que 0	//
					return false; 
				}
				
				if(tituloTD == "outroTipodeLocal" && $(this).parents('tr').children('td:eq(3)').text() != 'outro'){ // Se o nome da td for "" e o tipo do local não for 'Outro' {
					$(this).parents('tr').children('td:eq(9)').text('Edição não permitida.').css("color","red") //	} não edita a propriedade extra da tabela
					$(this).parents('tr').children('td:eq(9)').removeClass('td.editavel')
					//Bloqueia o conteudo em switch(tituloTD) > case'outroTipodeLocal' 
				}
				
				
				switch (tituloTD) {
					case 'sexo':  //	Faz input de select para Masculino ou Feminino	//
						novoElemento = $('<select title="sexo"><option selected></option><option value="1">Masculino</option><option value="2">Feminino</option></select>')
					break;
					case 'data_nasc' :  //	Faz mascara de Data	//
						novoElemento.mask('99-99-9999')
					break;
					case 'dataEvento' :  //	Faz mascara de Data	//
						novoElemento.mask('99-99-9999')
					break;
					case 'telefone' :  //	Faz mascara de Telefone	//
						novoElemento.mask('(99) 9999-9999')
					break;
					
					case 'horario' :  //	Faz mascara de Telefone	//
						novoElemento.mask('99h99')
					break;
					case 'LtipoLocal' : 
						novoElemento = tipoLocal //	Recebe a variavel que armazenou o select	//
					break;
					case 'EidLocal':
						novoElemento = localEvento
					break;
					case 'outroTipodeLocal':
						if($(this).parents('tr').children('td:eq(3)').text() != 'outro'){
						novoElemento = ""; //Edição Não permitida
						}
					break;
				}				
					
					
				$(this).html(novoElemento.bind('blur keydown', function(e){
					var keyCode = e.which; 
					var conteudoNovo = $(this).val();
					//var conteudoSelect = $("select option:selected").text().slice(54);					
						
						if (keyCode == 13 && conteudoOriginal != conteudoNovo && conteudoNovo != ''){
							var tdAlterada =  $(this);		 			
							var campoAlterado = $(this).parent().attr('title');
							switch(nomeTabela){
								
								case 'usuario':
									$.post( "controladorFuncoes.php", { 
										funcao: "alterar",
										tabela: nomeTabela,
										campoID: $(this).parents('tr').children('td:eq(2)').attr('title'), 
										id: $(this).parents('tr').children('td:eq(2)').text(), //	Pega a id que está na td 2	//
										campoAlterado: campoAlterado, //	Pega a title da td	//
										valor: conteudoNovo
									},function(result){
										 //	Pega o text do selected	//
										if (campoAlterado == "sexo"){conteudoNovo = $("select option:selected").text().slice(58)}
										tdAlterada.parent().html(conteudoNovo);		
										
									});
								break;
								
								case 'local' :
									$.post( "controladorFuncoes.php", {
										funcao:"alterar",
										tabela: nomeTabela,
										campoID: $(this).parents('tr').children('td:eq(2)').attr('title'),
										id: $(this).parents('tr').children('td:eq(2)').text(),										 
										campoAlterado: campoAlterado,
										valor: conteudoNovo
									},function(result){
											if (campoAlterado == "LtipoLocal"){conteudoNovo = $("select option:selected").text().slice(32)}

										tdAlterada.parent().html(conteudoNovo);
										$('body').append(result);
									});
								break;
								
								case 'evento':
									$.post("controladorFuncoes.php",{
										funcao: 'alterar',
										tabela: nomeTabela,
										campoID: $(this).parents('tr').children('td:eq(2)').attr('title'),
										id: $(this).parents('tr').children('td:eq(2)').text(),
										campoAlterado: campoAlterado,
										valor: conteudoNovo									
									},function(){
										//	Faz meio que um "str(54) na opção selecionada e assim como no php ele vai pulando as strings. É isso o que acontece aqui *-* (foi foda)	//
										if (campoAlterado == "EidLocal"){conteudoNovo = $("select option:selected").text().slice(54)}
										
										tdAlterada.parent().html(conteudoNovo);
									});
								break;
							}
						}
						
						if ( keyCode == 27 || e.type == "blur"){
							$(this).parent().html(conteudoOriginal);
						}				
				}));
				$(this).children().select();
			});
			
			
		})
		
// EFEITOS GERAIS	
		
		//EFEITO QUE EXIBE IMAGEM PELO LIGHTBOX
		$(".exibeFoto").each(function(){ //	Para cadastros e sua imagem	//
			var a = $(this).attr('name'); 
			if (a == ""){$(this).parent().text("Não possui foto");}	
		})	

		
		$(".exibeFoto").click(function(){
			
			$('.background, .box').animate({'opacity': '.90'}, 500, 'linear');
			$('.box').animate({'opacity':'1.00'}, 300, 'linear');
			$('.background, .box').css('display', 'block');
			//var nomeTabela = $(this).parents('table').attr('title');		
			var b = $(this).parents('tr').children('td:eq(4)').text();
			 var a = $('span[name="nomeUsuario"]').text(b);
			 
			  $.post("controladorFuncoes.php",{
					funcao: 'apresentaImagem',
					idUsuario: $(this).parents('tr').children('td:eq(2)').text()
				},function(retorno){
					var img = $('img[name="imagem"]');
					img.css('display', 'block');
					img.attr('src', 'carregando.gif');
					
					setTimeout(function(){
						console.log(retorno)
						$('#foto').attr('src', retorno);
					},2000);
				});
		
		});		
		$('.close').dblclick(function(){
			$('.background, .box').animate({'opacity':'0'}, 500, 'linear');
			$('.background, .box').css('display', 'none');
			
			

		});
		$('.background').dblclick(function(){
			$('.background, .box').animate({'opacity':'0'}, 500, 'linear');
			$('.background, .box').css('display', 'none');

			
		});	
	
		
		
			$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").hide();
				$(".cadastrarUsuarios").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
					$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
					$("#Cadastro_UsuarioHidden").fadeIn(300);
				});
				$(".cadastrarEventos").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
					$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
					$("#Cadastro_EventoHidden").fadeIn(300);
				});
				$(".cadastrarLocais").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
					$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
					$("#Cadastro_LocalHidden").fadeIn(300);
				});
			
			

			$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").hide();
			$(".mostrarUsuarios").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
				$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
				$("#MostrarTudo_HiddenUsuario").fadeIn(300);
			});
			$(".mostrarEventos").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
				$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
				$("#MostrarTudo_HiddenEvento").fadeIn(300);
			});
			$(".mostrarLocais").click(function(){
				$("#MostrarTudo_HiddenUsuario, #MostrarTudo_HiddenLocal, #MostrarTudo_HiddenEvento").fadeOut(300);
				$("#Cadastro_UsuarioHidden, #Cadastro_LocalHidden, #Cadastro_EventoHidden").fadeOut(300);
				$("#MostrarTudo_HiddenLocal").fadeIn(300);
			});
			

	})