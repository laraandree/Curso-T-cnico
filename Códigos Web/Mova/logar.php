<?php
require 'conectDB.php';

?>

<!DOCTYPE html>
<html lang="br">
    <head>
        <title>Admin com PHP E JQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="css/estilos.css" rel="stylesheet" media="screen">

    </head>
    <body>

        <div class="container" style="margin-top: 50px;">
            <div class="login">
                <h2>Logar</h2><img src="mova.png" width="150px" height="50px" style="margin-top: -189px; margin-left:-21px;">
                
                <div class="retorno"></div>
                
                <form action="" class="form" method="post" name="form_login">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control input-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Senha</label>
                        <input type="password" name="senha" class="form-control input-lg" placeholder="Senha">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-user"></span> Logar</button>
                    <img src="carregando.gif" class="load" width="35px" height="25px" alt="Carregando" style="display: none"/>
                </form>
                <center><img src="carregando-login.gif" align="center" id="load" alt="carregando" style="display: none;" /></center>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="custom.js"></script>
    </body>
</html>
