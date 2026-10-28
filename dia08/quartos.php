<?php

/*


Exercícios
Conexão: faça os Passos 1 a 3 e teste o erro de conexão.
Quartos disponíveis: crie o dia08/quartos.php, listando os quartos 
disponíveis, do mais barato ao mais caro, com o valor formatado em reais (number_format()!).
O relatório da pousada, agora de verdade: crie o dia08/relatorio.php, 
usando a consulta com JOIN e o cálculo do total do desafio de ontem. Mostre os dados numa tabela 
HTML (<table>, <tr>, <th>, <td>), com: hóspede, quarto, entrada, saída, diárias, status e total.

*/

require_once "conexao.php";

$listar = $pdo->query("SELECT * FROM quartos WHERE status = 'Disponível' ORDER BY valor_diaria ASC ");
$quartos = $listar->fetchAll();

foreach($quartos as $quarto){
    echo "<p>Número: {$quarto['numero']} - Tipo: {$quarto['tipo']} - {$quarto['status']} - Valor Diária: R$ ".number_format($quarto['valor_diaria'],2,',','.')."</p>";

}