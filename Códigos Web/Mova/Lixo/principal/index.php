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
		
		//Função do efeito Parallax
				$('div.parallax').each(function(){
					var $objParallax = $(this);
					
					$(window).scroll(function(){
						
						var positionY = -($(window).scrollTop() / $objParallax.data('speed'));
						var positionB = '50% '+ positionY + 'px';
						$objParallax.css('background-position',positionB);
					});
				});
				
	
	
     $("input:visible").focus();		
		//Função do menu fixo
				var  NavigationFixed = $.browser == 'msie6' && $.browser.version < 7;
		  
				  if (!NavigationFixed) {
					var top = $('#navigation').offset().top - parseFloat($('#navigation').css('margin-top').replace(/auto/, 0));
					$(window).scroll(function (event) {
					  // what the y position of the scroll is
					  var y = $(this).scrollTop();
					  // whether that's below the form
					  if (y >= top) {
								$('#navigation').addClass('fixed'),
								$('#navigation').find('ul').removeClass('unfixed').addClass('fixed');
								$('#navigation').find('img').removeClass('unfixed').addClass('fixed');
					  }
					  else {
								$('#navigation').removeClass('fixed'),
								$('#navigation').find('ul').removeClass('fixed').addClass('unfixed');
							
					  }

					});
				  }  
				 
		});
		$(".solicitaAmizade").click(function(){
			alert("foi");
		})
	</script>
	
</head>
<body>
<!-- NAVEGATION MENU-->

	<nav id="navigation">
			<div id="logo-menu"><img src="imagens/slogan-menu.png"  alt="Logo Mova" /></div>
			
		<ul>
            <li><a href="#container_tela_de_apresentacao" class="link-menu">Inicio</a></li>
            <li><a href="#galeria" class="link-menu">Fotos</a></li>
            <li><a href="#container_primario" class="link-menu">Eventos</a></li>
            <li><a href="#cadastro_usuario" class="link-menu">Cadastro</a></li>
			<li><a href="#rodape" class="link-menu">Contato</a></li>
			<li><a href="meuperfil.php" class="link-menu">Meu Perfil</a></li>
        </ul>
    </nav>
	


<!-- CONTAINER 1 - Tela_de_apresentacao -->

	<div id="container_tela_de_apresentacao" class="parallax" data-speed="1">
		
	<div id="conteudo-inicio">
			<img src="mova-slogan.png" />
			
			

		</div>
	</div>
	


<!-- CONTAINER 2 - Tela_de_eventos -->

	<div id="container_primario" class="parallax" data-speed="2">
		<div id="evento-conteudo-layout">
			
			<div class="data-evento" class="parallax" data-speed="1">
				<p>Dia<br><br><br><br>Julho</p>
				<h1>23</h1>
			</div>
			<div class="informacoes-evento" class="parallax" data-speed="1">
			<h1>Hardwell</h1>
				<div class="informacoes-evento-interior">
					<p>Ingressos -<a href="#"> www.ingressos.com</a><br><br>
					<h2>Naville Music Hall</h2><br>
					<p>jervazio correia 654 - Curitiba PR<br></p>
					<a href="#">www.navillemusichall.com.br</a></p>
				</div>
			</div>
				<div id="menu-presenca" class="parallax" data-speed="1">
					<ul class="menu-presenca">
				
					<li><a href="#">Confirmar Presença</a>
					<ul>
						  <li><a href="#">Confirmar Presença</a></li>
						  <li><a href="#">Não Sei</a></li>
						  <li><a href="#">Não Comparecerei</a></li>                    
					</ul>
					</li>
						              
					</ul>
				</div>
		</div>
	</div>
	

<!---->

			<div id="galeria">
			<iframe width='98%' height='590'  frameborder='0' src='spacegallery/index.html' SCROLLING="NO" ></iframe>
			</div>
		
	
	<div id="eventos" class="parallax" data-speed="3">
		
			<iframe width='100%' height='1040px' frameborder='0' src='eventos.html' frameborder="0"  SCROLLING="NO" style="margin: auto;"></iframe>
		
		
	</div>
<!---->
<!-- TELA CADASTRO -->




			<div id="rodape" class="parallax" data-speed = "1">
						<div id="rodape-conteudo"  data-speed="3">
								<div id="logo-rodape">
								<img src="imagens/mova-rodape.png" />
								</div>
								<div id="pesquisa"  data-speed="1">
								<div class="lupa-pesquisa">
								</div>
									<div id="input-busca">
										<input type="text" name="busca" style="height: 20px; background-color:#15aaca; border:0 #000; color: #fff;" placeholder="Busca" autocomplete="off"  value=""/>
									</div>
									<select name="busca" id="ano" class="">
										<option value="0" selected="1">Balada</option>
										<option value="2014">2014</option>
										<option value="2013">2013</option>
										<option value="2012">2012</option>
									</select>
								</div>
								<div id="informacoes">
									<div class="informacoes-mova">
									<p>Mova</p><br>
									<a href="#">Home</a><br>
									<a href="#">Meu Perfil</a><br>
									<a href="#">Login</a><br>
									<a href="#cadastro_usuario">Cadastre-se</a>
									</div>
									<div class="informacoes-contato">
									<p>Contato</p><br>
									<a href="#mensagem">Deixe sua Mensagem</a><br>
									<font style="font-size:19px"   face="Tw Cen MT Condensed">Fone: (41)4444-4444<br>
									mova@hotmail.com
									</font>
									</div>
									<div class="informacoes-servicos">
									<p>Serviços</p><br>
									<a href="#">Anuncie</a><br>
									<a href="#">Seu evento</a><br>
									<a href="#">Parcerias</a><br>
									
									</div>
									<div class="informacoes-empresa">
									<p>Empresa</p><br>
									<a href="#">MOVA</a><br>
									<a href="#">Quem somos</a><br>
									
									</div>
								</div>
								<div id="div-redes-sociais">
									<a href="https://www.facebook.com/pages/Mova/578591852255327?fref=ts" target="_blank">
										<div class="f-facebook">
										f
										</div>
										<div class="facebook">							
										Facebook
										</div>
									</a>
									<a href="" target="_blank">
										<div class="t-twitter">
										</div>
										<div class="twitter">							
										Twitter
										</div>
									</a>
									<a href="" target="_blank">
										<div class="i-instagram">
										</div>
										<div class="instagram">							
										Instagram
										</div>
									</a>
								</div>
						</div>
			</div>
</body>	
</html>