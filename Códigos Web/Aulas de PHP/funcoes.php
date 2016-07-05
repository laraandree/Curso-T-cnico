
<?php

$v = isset($_GET["val"]) ? $_GET["val"]:0; //MAIS DE UMA EXIBIÇÃO USA ESTA VARIÁVEL
$op = isset($_GET["operacao"]) ? $_GET["operacao"]:0;

### OPERAÇÕES ###

switch ($op){ //NÃO É NECESSÁRIA A VERIFICAÇÃO PELA FUNCIONALIDADE DO DEFAULT(SWITCH)
/* 1:dobro 2:taboada 3:fatorial
       $a = 3;
       $b = "3";
       $r = ($a === $b)?"SIM":"NAO";
       echo "As variaveis A e B sao identicas? $r";

       echo "O preco do produto e R$ " . number_format($preco, 2);
       $preco += $preco*10/100;
       echo "<br/>E o novo preco com 10% de aumento sera R$ " . number_format($preco, 2);

        echo "<h2>Valores recebidos: $v1 e $v2</h2>";
        echo "O valor absoluto de $v2 e " . abs($v2);
        echo "<br/>O valor de $v2 arredondado e " . round($v2); // ceil floor
        echo "<br/>A parte inteira de $v2 e " . intval($v2);
        echo "<br/>O valor de $v1 em moeda e R$" . number_format($v1,2,",", ".");

*/
    case 1:
        echo "$v x 2 = ".$v * 2;
        break;
    case 2:
        echo "<h1>Calculando a taboada de $v</h1>";
        $c = 1;
        for($c=1; $c<=10; $c++){
            echo "</br>$v x $c = ".($v * $c);
        }
        break;
    case 3:
        echo "<h1>Calculando o fatorial de $v</h1>";
        $c = $v;
        $fat = 1;
        do{
            $fat = $fat * $c;
            $c--;
        }while($c>=1);
        echo "<h2>$v ! = $fat</h2>";
        break;
    case 4:
        echo "$v <sup>3</sup> = ".pow($v,3);
        break;
    case 5:
        echo "Raiz quadrada de $v e = ".number_format((sqrt($v)),2);
        break;
    case 6:
        $quant=0;
        echo "Os multiplos de $v sao: ";
        for ($c=1; $c<=$v; $c++){
            if (($v%$c) == 0) {
                $quant += 1;
                echo "$c ";
            }
        }
        if($quant>2){
            echo "</br>Portanto o numero $v NAO e primo";
        }else if ($quant<=2){
            echo "</br>Portanto o numero $v e primo";
        }

        break;
    default:
        break;
}

// CONTAGEM DE $V ATÉ 99 de 3 em 3

if(isset($_GET["contador"])){
    echo "</br>Contagem de 3 em 3";
    if ($v >= 99){
        while($v>=99){
            echo "<br/> $v" ;
            $contador =3;
            $v -= $contador;
        }
    }
    while ($v <= 99){
        //AQUI $V É ALTERADO
        $contador=0;
        echo "<br/> $v" ;
        $contador += 3;
        $v += $contador;
        if ($v >99){echo "<br/><span style='color:#999999'> $v </span>";}
    }
}

//

//CAMPO DINÂMICO
if (isset($_GET["v1"])) { //SE A VERIFICAÇÃO NÃO FOR FEITA O CAMPO SERÁ EXIBIDO DESNECESSARIAMENTE
    $i = 1;
    while ($i <= 5) {
        $v = "num" . $i;
        $urlvalor = "v" . $i;
        $$v = isset($_GET[$urlvalor]) ? $_GET[$urlvalor] : 0;
        $i++;
    }
    $i = 1;
    while ($i <= 5) {
        $v = "num" . $i;
        echo "Valor $i:" . $$v . "<br/>";
        $i++;
    }
}
//

###### ROTINAS COM PARÂMETROS DINÂMICOS (UTILIZANDO FUNÇÕES) #####
function soma(){
    $p = func_get_args(); // a variável $p será um vetor onde terá os argumentos passados ex: $p[0]
    $tot = func_num_args(); //retorna o numero de argumentos passados
    $s = 0;
    for ($i=0; $i < $tot; $i++){
        $s += $p[$i]; // $s = $s + $p[$i];
    }
    return $s; // com retorno
    // echo $s; // sem retorno
}

//Passagem por referência
function teste(&$x){
    $x += + 2;
    echo " O valor de X é $x";
}
#############################################

#######     FUNÇOES STRING  (MANIPULAÇÃO DE STRING)    ##########
function exibefuncaostring() {
//Função printf() - Permite exibir uma string com itens formatados. Substitui o number_format()
    $prod = "leite";
    $preco = 4.5;
    printf("printf() --  O %s está custando R$ %.2f", $prod, $preco);
    /* echo "O $p custa R$ ".numberformat($pr,2); dão na mesma
    %d decimal positivo e negativo -- %u decimal sem sinal -- %f real -- %s string
    */

//Função print_r() - Exibe coleções, objetos e variáveis compostas (vetores e matrizes) de maneira organizada.
    $x[0] = 4;
    $x[1] = 3;
    $x[2] = 8;
    echo "<br/> print_r() -- ";
    print_r($x); // Pode ser substituido por var_dump($x) ou var_export($x)

//Função wordwrap() - Cria quebras de linha ou divisões em uma string em um tamanho especificado.
    $t = "  <br/>wordwrap() -- Aqui temos um texto gigante criado pelo PHP e vai mostrar o funcionamento da funcao wordwrap.    ";
    $r = wordwrap($t, 60, "<br/>\n", true); //com 30 caracteres, sendo o br visual e \n para o servidor.
    //false gera a quebra por palavra se ela tiver menos de 5 letras. true quebra linha exatamente com 5 letras
    echo $r;

//Função strlen() - StringLength Permite verificar o tamanho de uma string, contando seus caracteres (inclusive espaços em branco).
    $tamanho = strlen($t);
    echo "<br/>strlen() -- ".$tamanho;

//Função trim() - Elimina espaços em branco antes e depois de uma string.
    $tamanho = trim($t);
    echo "<br/>trim() -- ".strlen($tamanho). ", elimina os espacos no final e inicio do texto.";
	
//Função ltrim() - Elimina espaços no início de uma string.
    $tamanho = ltrim($t);
    echo "<br/>ltrim() -- ".strlen($tamanho). ", elimina os espacos no inicio do texto.";
	
//Função rtrim() - Elimina espaços em branco no final de uma string.
    $tamanho = rtrim($t);
    echo "<br/>rtrim() -- ".strlen($tamanho). ", elimina os espacos no final do texto.";
	
//Função str_word_count() - Conta quantas palavras uma string possui.
    $tt = "Eu vou digitar um texto em PHP.";
    $cont = str_word_count($tt, 0);// 0 = QNT PALAVRAS
    echo "<br/>str_word_count() Parametro 0 -- ".$cont;

    $cont = str_word_count($tt, 1);
    echo "<br/>str_word_count() Parametro 1 -- "; // 1 = gera vetor e cada posição é uma palavra.
    print_r($cont);

    $cont = str_word_count($tt, 2);
    echo "<br/>str_word_count() Parametro 2 -- "; //vetor que mantem o posicionamento de cada palavra dentro da string
    print_r($cont);

//Função explode() - Quebra uma string e coloca os itens em um vetor.
    $tt = "Eu..vou.digitar um.texto em/PHP.";
    $vetor = explode(" ", $tt); // procura pelo caractere de separação, no caso espaço, e vetor, palavra = indice
    echo "<br/>explode() -- ";     print_r($vetor);

//Função str_split() - Coloca cada letra de uma string em uma posição de um vetor.
    $tt = "AndreLara"; $vetor = str_split($tt); //faz vetor com letra nos indices
    echo "<br/>str_split() -- ";   print_r($vetor);

//Função implode() - Transforma um vetor inteiro em uma string.
    $vet[0] = "Andre"; $vet[1] = "Fernandes"; $vet[2] = "Lara";
    $tt = implode("#", $vet); // join() funciona da mesma maneira
    echo "<br/> implode() -- ".$tt;
//Função chr() - Retorna um caractere de acordo com seu código ASCII passado como parâmetro.

//Função ord() - Retorna o código ASCII de um caractere passado como parâmetro.

//Função strtolower () - Transforma todos os caracteres de uma string para letras minúsculas.
    echo "<br/> strtolower() - ". strtolower("STRING TO LOweR");
	
//Função strtoupper () - Transforma todos os caracteres de uma string para letras maiúsculas.
    echo "<br/> strtoupper() - ". strtoupper("STRING TO uPPer");
	
//Função ucfirst () - Primeira letra de uma string para maiúscula. As demais serão mantidas da mesma maneira.
    echo "<br/> ucfirst() - ". ucfirst("andre lara"); /*UperCase */ echo "<br/> ucfirst() + strtolower - ". ucfirst(strtolower("STRING TO LOweR + ucFiRst"));

//Função ucwords () - Consegue identificar as palavras isoladas de uma string e coloca as primeiras letras de cada palavra para maiúsculas. As demais serão mantidas da mesma maneira.
    //echo "<br/> ucwords() - ".ucwords("andre lara"); /*UperCase*/ echo "<br/> strtolower() + ucwords() - ". ucwords(strtolower("sTRtoLower + UCWORDS"));

//Função strrev () - Inverte uma string, atribuindo desde a última até a primeira, no sentido contrário.

//Função strpos () - Indica a posição de ocorrência de uma substring dentro de uma string.

//Função stripos () - Mesma função desempenhada por strpos, apenas ignorando a caixa (maiúsculas e minúsculas não fazem diferença).
    echo("<br/>stripos() - Lara esta na posição: ".stripos($tt, "lara")." - ".$tt);
	
//Função substr_count () - Conta a quantidade de ocorrências de uma determinada substring dentro de uma string.
    //substr_count($frase, "Palavra");
	
//Função substr () - Extrai uma substring de dentro de uma string.
   //echo substr("Olá Marmouta", -7, 5); ou substr("Olá Marmouta", 6,5);
   
//Função str_pad () - Faz uma string caber em outra string maior, preenchendo os espaços vazios com caracteres.
    // $tt = "Andre Lara"; $confStr = str_pad($tt, 15, "*", STR_PAD_BOTH); echo ("<br/> strpad() - O futuro engenheiro de software $confStr é um gostoso!");
	
//Função str_repeat () - Preenche uma string através da repetição de uma outra.
   // echo "O texto gerado foi ".str_repeat("Pokoh ", 5); echo str_repeat("-",20);
   
//Função str_replace () - Substitui uma substring dentro de uma string por outra.
   //$frase = "<br/> str_ireplace() - PHP é a linguagem mais dificil. Por isso eu gosto de PHP"; $ahpara = str_replace("PHP", "JAVA", $frase); echo "$ahpara";

}
#######################################################
echo"<br/><a href=\"javascript:history.go(-1)\" class=\"botao\">Voltar</a>";
//echo"<br/><a href='javascript:history.go(-1)' class='botao'>Voltar</a>";
?>




