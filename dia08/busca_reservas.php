<?php


/*

Depois dos dois arquivos, crie o dia08/busca_reservas.php: um formulário em que o usuário digita parte do nome de um hóspede, e a página lista as reservas dele (com quarto, datas e status), usando uma consulta preparada com JOIN e LIKE.

Dica importante: o % do LIKE não vai dentro do SQL. Ele vai junto com o valor, no execute():

php
$consulta = $pdo->prepare("... WHERE h.nome LIKE :nome");
$consulta->execute(['nome' => "%{$nome}%"]);

Teste buscando “Marcos”, “de” (lembra da Amanda Fagundes?) e o ataque ' OR '1'='1. Me manda os prints dos testes, principalmente o do ataque na versão vulnerável e na segura! 💪


*/

?>

<form action="" method="GET">
    <input type='text' name='nome'><input type='submit' name='buscar' value='Buscar'>
</form>


<?php

require_once 'conexao.php';

$nome = $_GET['nome'] ?? '';

if (isset($_GET['buscar']) && $nome !== '') {

    $consulta = $pdo->prepare("SELECT hospedes.nome as hospedes_nome, quartos.numero as quartos_numero,reservas.entrada as reservas_entrada,
    reservas.saida as reservas_saida,reservas.status as reservas_status FROM reservas
    INNER JOIN hospedes ON reservas.hospede_id = hospedes.id INNER JOIN quartos ON reservas.quarto_id = quartos.id 
    WHERE hospedes.nome LIKE :nome");
    $consulta->execute(['nome' => '%' . $nome . '%']);
    $reservas = $consulta->fetchAll();

    if (count($reservas) === 0) {
        echo "<p>Não existe nenhuma correspondência</p>";
    } else {

?>

        <table border='1'>
            <tr>
                <th>Hóspede</th>
                <th>Quarto</th>
                <th>Data Entrada</th>
                <th>Data Saída</th>
                <th>Status</th>
            </tr>

    <?php
        foreach ($reservas as $reserva) {
            echo "<tr>
        <td>" . htmlspecialchars($reserva['hospedes_nome']) . "</td> 
        <td>" . htmlspecialchars($reserva['quartos_numero']) . "</td> 
        <td>" . date('d/m/Y', strtotime($reserva['reservas_entrada'])) . "</td>
        <td>" . date('d/m/Y', strtotime($reserva['reservas_saida'])) . "</td> 
        <td>" . htmlspecialchars($reserva['reservas_status']) . "</td>
         </tr>";
        }

        echo "</table>";
    }
}


    ?>