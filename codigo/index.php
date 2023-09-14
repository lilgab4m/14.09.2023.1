<?php

$num01 = filter_input(INPUT_POST, "txtNumero1");
$num02 = filter_input(INPUT_POST, "txtNumero2");
$opera = filter_input(INPUT_POST,"slOperacao");
$result = "";

if(isset($_POST['btnCalcular'])){ // Verifica se o formulário foi submetido
    if($num01 !== null && $num02 !== null){ // Verifica se os números foram fornecidos
        switch($opera){
            case "+":
                $result = ($num01 + $num02);
                break;
            case "-":
                $result = ($num01 - $num02);
                break;
            case "*":
                $result = ($num01 * $num02);
                break;
            case "/":
                if($num02 != 0) { // Verifica se o segundo número não é zero para evitar divisão por zero
                    $result = ($num01 / $num02);
                } else {
                    $result = "Erro: divisão por zero!";
                }
                break;
            default:
                $result = "Operação inválida";
        }
    } else {
        $result = "Por favor, forneça ambos os números";
    }
}

?>
<!DOCTYPE html>
<html Lang=en dir=>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Programa de operações</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        input,select{padding :10px; margin: 5px;}
    </style>
</head>
<body>
    <h1><?=$result;?></h1>
    <form method="post">
        <label>Número 1: <input type="text" name="txtNumero1"/></label>
        <label>Número 2: <input type="text" name="txtNumero2"/></label>
        <label>
            Operação
            <select name="slOperacao">
                <option value="+">Adição</option>
                <option value="-">Subtração</option>
                <option value="*">Multiplicação</option>
                <option value="/">Divisão</option>
            </select>
        </label><br>
        <input type="submit" name="btnCalcular" value="Calcular">
    </form>
</body>
</html>

