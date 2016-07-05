	<script type="text/javascript" src="jquery.js"></script> 
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
		//Função do menu fixo
				var  NavigationFixed = $.browser == 'msie6' && $.browser.version < 7;
		  
				  if (!NavigationFixed) {
					var top = $('#Navigation').offset().top - parseFloat($('#Navigation').css('margin-top').replace(/auto/, 0));
					$(window).scroll(function (event) {
					  // what the y position of the scroll is
					  var y = $(this).scrollTop();
					  
					  // whether that's below the form
					  if (y >= top) {
								$('#Navigation').addClass('fixed'),
								$('#Navigation').find('ul').removeClass('unfixed').addClass('fixed');
					  }
					  else {
								$('#Navigation').removeClass('fixed'),
								$('#Navigation').find('ul').removeClass('fixed').addClass('unfixed');
					  }

					});
				  }  
		});