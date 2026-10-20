<?php

require_once('Reserva.php');


$reservas = [
    new Reserva('João Paulo', "104", 5, 109.50),
    new Reserva('Maxual Venâncio', "32", 10, 90.50),
    new Reserva('Kiara Mendes', "17", 5, 95.65),
    new Reserva('Joaquim Bostino', "20B", 6, 90.10),
    new Reserva('Iago Gomes', "10", 10, 65.76)
];


$reservas[1]->confirmar();

$reservas[2]->confirmar();
$reservas[2]->fazerCheckin();

$reservas[3]->confirmar();
$reservas[3]->fazerCheckin();
$reservas[3]->fazerCheckout();


$reservas[4]->cancelar();



/*

Exercício 3: relatório da pousada:

Crie dia05/Reserva.php com só a classe Reserva (sem os testes) - ok
No dia05/relatorio.php, carregue a classe com require_once "Reserva.php" - ok
Crie um array com 5 reservas e deixe-as em status diferentes - ok
Com foreach, mostre: hóspede, quarto, status e total formatado.
No final: faturamento total (sem as canceladas) e quantas foram canceladas.

*/



/*

$faturamento: soma o total de cada reserva SEM PENDENTES E CANCELADAS.
$canceladas: conta quantas estão canceladas

*/

echo "<hr>";

$faturamento = 0;
$canceladas = 0;

foreach ($reservas as $reserva) {

    $status  = $reserva->getStatusReserva();

    if ($status  === "Cancelada") {
        $canceladas++;
    } elseif ($status !== "Pendente") {
        $faturamento += $reserva->calcularTotal();
    }

    echo "Hóspede: " . $reserva->getNomeHospede() . " | Quarto: " . $reserva->getQuarto() . " | Status: " . $status . " | Total: R$ " . number_format($reserva->calcularTotal(), 2, ',', '.') . "<br>";
}

echo "Canceladas: " . $canceladas;
echo "<hr>";
echo "Faturamento (sem pendentes e canceladas): R$ " . number_format($faturamento, 2, ',', '.');
