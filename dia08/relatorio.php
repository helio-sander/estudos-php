<?php


require_once "conexao.php";

/*
hospede,quarto,entrada, saida, diarias, status e subtotal
*/


$lista = $pdo->query("SELECT hospedes.nome as hospede_nome, quartos.numero as quartos_numero, reservas.status as reservas_status,
reservas.entrada as reservas_entrada,reservas.saida as reservas_saida,
DATEDIFF(reservas.saida,reservas.entrada) as numero_diarias,  
IF( DATEDIFF(reservas.saida,reservas.entrada) >= 7, ROUND(DATEDIFF(reservas.saida,reservas.entrada) * reservas.valor_diaria * 0.9,2), ROUND(DATEDIFF(reservas.saida,reservas.entrada) * reservas.valor_diaria,2) ) as valor_diarias_total FROM reservas 
INNER JOIN hospedes ON reservas.hospede_id = hospedes.id INNER JOIN quartos ON
reservas.quarto_id = quartos.id");
$dados = $lista->fetchAll();



?>



<table border='1'>
    <tr>
        <th>Hóspede</th>
        <th>Quarto</th>
        <th>Entrada</th>
        <th>Saída</th>
        <th>Diárias</th>
        <th>Status</th>
        <th>Total</th>
    </tr>


    <?php

    $faturamento = 0;

    foreach ($dados as $dado) {
        echo "<tr>";
        echo "<td>" . $dado['hospede_nome'] . "</td>";
        echo "<td>" . $dado['quartos_numero'] . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($dado['reservas_entrada'])) . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($dado['reservas_saida'])) . "</td>";
        echo "<td>" . $dado['numero_diarias'] . "</td>";
        echo "<td>" . $dado['reservas_status'] . "</td>";
        echo "<td> R$ " . number_format($dado['valor_diarias_total'], 2, ',', '.') . "</td>";
        echo "</tr>";

        if ($dado['reservas_status'] === 'Confirmada' || $dado['reservas_status'] === "Hospedado" || $dado['reservas_status'] === "Finalizada") {
            $faturamento += $dado['valor_diarias_total'];
        }
    }



    ?>


</table>


<hr>

<?php

echo "Faturamento (sem pendentes e canceladas): R$ " . number_format($faturamento, 2, ',', '.');

?>