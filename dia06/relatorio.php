<?php

require_once('Reserva.php');

$dados = [
    ['nome' => 'João Paulo', 'quarto' => "104", 'diarias' => 0, 'valor' => 109.50],
    ['nome' => 'Maxual Venâncio', 'quarto' => "32", 'diarias' => 10, 'valor' => 90.50],
    ['nome' => 'Kiara Mendes', 'quarto' => "17", 'diarias' => 5, 'valor' => 95.65],
    ['nome' => 'Joaquim Bostino', 'quarto' => "20B", 'diarias' => 6, 'valor' => 90.10],
    ['nome' => 'Iago Gomes', 'quarto' => "10", 'diarias' => 10, 'valor' => 65.76]
];



$reservas = [];
$erros = [];

foreach ($dados as $dado) {
    try {
        $reservas[] = new Reserva($dado['nome'], $dado['quarto'], $dado['diarias'], $dado['valor']);
    } catch (DomainException | InvalidArgumentException $e) {
        $erros[] =  "<p>ERRO: Reserva de {$dado['nome']}: " . $e->getMessage() . "</p>";
    }
}



if (count($erros) > 0) {
    echo "<h3>Reserva com problemas!</h3>";
    foreach ($erros as $erro) {
        echo $erro;
    }
}

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
