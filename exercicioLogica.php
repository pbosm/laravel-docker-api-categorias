<?php

function casasQuePodemSerCompradas($xCasas, $casas, $orcamento) {
    // Calcula o preço médio de uma casa
    $precoMedio = $casas / $xCasas;
    
    // Calcula o número máximo de casas que podem ser compradas
    $numCasas = floor($orcamento / $precoMedio);
    
    // Calcula o valor total gasto
    $valorTotalGasto = $numCasas * $precoMedio;
    
    return array($numCasas, $valorTotalGasto);
}

$xCasas = 5; //Número total de casas à venda
$casas = 1; //Valor total das casas
$orcamento = 10; //Orçamento

list($numCasas, $valorTotalGasto) = casasQuePodemSerCompradas($xCasas, $casas, $orcamento);

echo "Quantidade de casas que podem ser compradas: " . $numCasas . "\n";
echo "Valor total gasto: " . number_format($valorTotalGasto, 2, ',', '.') . " reais\n";

// existem 5 casas a venda, custando 5 reais, logo, se eu tiver 1 real no bolso, eu consigo 5 casas

?>