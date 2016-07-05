<script type="text/javascript">
function loginsuccessfully()
{
	setTimeout("window.location='index.php'",1000); /* Quando Logar */
}
function loginfailed()
{
	setTimeout("window.location='login_usuario.php'", 1000); /* Não Logar */
}
</script>
<?php	include ('config.php');
		 //inicia a sessão
		
		
		
	if (@$_REQUEST ['botao'] == "Entrar"){
		$usuario=$_POST ['usuario'];
		$senha=md5($_POST ['senha']);
		
		$logar = "SELECT * FROM usuario WHERE login = '$usuario' AND senha = '$senha' ";
		$result = mysql_query($logar);
		$row = mysql_num_rows($result);
		if($row >0)
		{
			
			session_start();
			@$_SESSION['email'] = $_POST['usuario'];
			@$_SESSION['senha'] = $_POST['senha'];
			?>
			<script type="text/javascript">
			alert ('Você foi autentificado com sucesso');
			</script>
			<?php
			echo"<script>loginsuccessfully()</script>";
		}
			else
		{
			?>
			<script type="text/javascript">
			alert ('Nome de usuario ou senha incorreto');
			</script>
			<?php
			echo "<script>loginfailed()</script>"; 
			
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/login_usuario.css" rel="stylesheet" type="text/css"/>
<title>Login - A Brasileira</title>


</head>

<body>
	<div id="topo"></div>
	
	<div id="inteiro">
	
   		<div id="logo"><img src="imagens/logo.png"/></div>
        <form action=# method=POST>
			<div id="formulario"><img src="imagens/contorno.png"/>
			<div class="login"><img src="imagens/login.png"/></div>
				
				<ul name="text">
					<li>Usuario:</li><br>
					<li>Senha:</li>
				</ul>
				<ul>
					<li><input type="text" name="usuario" placeholder="email@email.com" value=""/></li>
					<li><input type="password" name="senha" placeholder="*****" value=""/></li>
				</ul>
				<input type="submit" name="botao" value="Entrar"/>
			
			</div>
		</form>
    </div>
   
</body>
</html>
