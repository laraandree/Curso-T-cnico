<?php
require ('funcoes.php');
session_start();
?>
<html lang="pt-br">
<head>
</head>
	<body>
		<p>Usuario Padrão <?php echo $_SESSION['administrador']->nome;?></p>
	</body>
</html>