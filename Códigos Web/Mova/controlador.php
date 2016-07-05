<?php
ob_start(); session_start();
require 'conectDB.php';
require 'login.php';
	//	O FILTRO DO PHP PARA TRATAR DADOS	//
	//	$var = declaraFiltro(tipo_dado, valor, tipodeFiltro)
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);

switch ($acao):
	case 'login' :
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
			$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
			
			//	PARA O LOGIN CORRETO (SENHA E EMAIL == TRUE)	//
			if(login($email, $senha)):
				$dados =  pegaLogin($email);
				if($dados->nivel >= 1): // Se o nivel for 0(Padrão)
					echo 'administrador'; // Para redirecionar para telaADM
					$_SESSION['administrador'] = pegaLogin($email);		
				endif;
				if($dados->nivel < 1):
					echo 'usuarioPadrao'; //Para redirecionar telaPadrao
					$_SESSION['usuario'] = pegaLogin($email);
					
				endif;
				
			else:	
					// Variavel armazena o FETCH_OBJ da função para verificar senha==email e mais	//
					$dados = pegaLogin($email);
					// Se não existir o $email
					if (empty($email) || empty($senha)):
						echo 'vazio'; //	Servirá no ajax
					elseif (!$dados):
						echo 'naoexiste'; 
					elseif($dados->senha != $senha)://	Se a senha do DB for diferente da senha digitada	//
						echo 'diferentesenha';
					elseif($dados->nivel < 1): // Se o nivel for 0(Padrão)
						echo 'nivel';
					endif; 
					
					
			endif;
			
		break;
		
		
	default:
		 echo 'erro';
		break;
endswitch;
ob_end_flush();