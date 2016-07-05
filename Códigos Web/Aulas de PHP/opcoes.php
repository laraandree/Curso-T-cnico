<!DOCTYPE html>
<?php

include "funcoes.php"; //INCLUI
//require "funcoes.php"; se há erro no arquivo requerido o algoritmo break

?>
<html>
<head>

	<style type="text/css">
		fieldset.fieldsetoperacoes {
			width: 200px;
			float:left;
			display: block;

			margin-right:px;
			padding-top: px;
			padding-bottom: em;
			padding-left: em;
			padding-right: em;
			border: 2px groove (internal value);*/
		}
		fieldset.fieldsetcampodinamico{
			float:left;
			width: 205px;
			margin-left: 20px;
		}
        fieldset.funcoes {
            clear: both;
            width: 290px;
            font-size: 12pt;
            margin-top: 30px;
        }
        fieldset.string{
            clear: both ;
            width: 850px;
            margin-tp: 30px;

        }
	</style>
    <link rel="stylesheet" href="_css/estilo.css"/>
    <meta charset="UTF-8"/>
    <title></title>
</head>
<body>
<div>
	<fieldset class="fieldsetoperacoes"><legend>Operacoes</legend>
		<form method="get" action="funcoes.php">
			Valor: <input type="number" name="val" min="1"  value="1"/></br>
				<input type="radio" name="operacao" id="dobro" value="1" checked/>
				<label for="dobro">Dobro</label></br>
				<input type="radio" name="operacao" id="taboada" value="2"/>
				<label for="taboada">Taboada</label></br>
				<input type="radio" name="operacao" id="fatorial" value="3"/>
				<label for="fatorial">Fatorial</label></br>
				<input type="radio" name="operacao" id="cubo" value="4"/>
				<label for="cubo">Ao cubo</label></br>
				<input type="radio" name="operacao" id="raiz" value="5"/>
				<label for="raiz">Raiz Quadrada</label></br>
				<input type="radio" name="operacao" id="primo" value="6"/>
				<label for="primo">Verificar numero primo</label></br>
			<input type="checkbox" name="contador" id="contador">
			<label for="contador">Fazer contagem ate 99</label>
			<input type="submit" value="Calcular"/>
		</form>
	</fieldset>

	<fieldset class="fieldsetcampodinamico"><legend>Campos dinamicos inteligentes</legend>
	<form method="get" action="funcoes.php">
		<?php
			for ($c=1; $c<=5; $c++) {
				echo "Valor $c: <input type='number' name='v$c' max='100' min='0' value='0'/></br>";
			}
		?>

		<input type="submit" value="Gerar caixa dinamica"/>
	</form>
	</fieldset>
	
	<fieldset class="funcoes"><legend>Utilizando funcao</legend>
		<?php

        $r = soma (3,4,5,6,7,8,9,0,1, 43);
        echo "F1: $r é a soma da funcao<br/>";
        $a = 9;
        echo "F2: $a é o valor de a<br/>";
        teste($a);
        echo " O valor de A depois da funcao e $a<br/>";

        ?>
	
	</fieldset>

    <fieldset class="string"><legend>Manipulação de String</legend>
        <?php exibefuncaostring(); ?>
    </fieldset>

</div>
</body>
</html>
 