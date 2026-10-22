<?php

require_once("Reserva.php");

echo "<h3>1. Fluxo Completo</h3>";


try {
    $reserva  = new Reserva("Marcos", "101", 7, 101.50);
    echo "<p>Reserva criada com sucesso!</p>";


    $reserva->confirmar();
    echo "<p>Reserva confirmada com sucesso!</p>";

    $reserva->fazerCheckin();
    echo "<p>Check-in realizado com sucesso!</p>";


    $reserva->fazerCheckout();
    echo "<p>Check-out realizado com sucesso!</p>";

    $total = $reserva->calcularTotal();
    echo "<p>Total geral: R$ " . number_format($total, 2, ',', '.') . "</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}



echo "<h3>2. Pulando etapas</h3>";


try {
    $reserva2 = new Reserva("Hélio Sander", "30", 8, 101.90);
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


try {
    $reserva2->fazerCheckin();
    echo "Check in realizado com sucesso!";
} catch (DomainException $e) {
    echo "Erro: " . $e->getMessage();
}

echo  "<hr>";

try {
    $reserva2->confirmar();
    echo "<p>Reserva confirmada!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva2->fazerCheckout();
    echo "Check out realizado com sucesso!";
} catch (DomainException $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<h3>3. Cancelamento: pendente (ok) e hospedada (erro)</h3>";

try {
    $reserva->cancelar();
    echo "<p>Reserva cancelada com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

echo "<hr>";
try {
    $reserva3 = new Reserva("Wilgor", "12", 6, 100);
    echo "<p>Reserva criada com sucesso!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


try {
    $reserva3->confirmar();
    echo "<p>Confirmação realizada com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva3->fazerCheckin();
    echo "<p>Check in realizado com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva3->cancelar();
    echo "<p>Cancelamento realizado com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


try {
    $reserva4 = new Reserva("Proteus", "32", 7, 100);
    echo "<p>Reserva criada com sucesso!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


try {
    $reserva4->cancelar();
    echo "<p>Cancelamento realizado com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


echo "<h3>4. Desconto: 6 diárias e 7 diárias</h3>";


$total = $reserva3->calcularTotal();
echo "<p>O valor total das diárias é : R$ " . number_format($total, 2, ',', '.') . "</p>";

$total = $reserva4->calcularTotal();
echo "<p>O valor total das diárias é : R$ " . number_format($total, 2, ',', '.') . "</p>";

echo "<h3>5. Setters: diárias e nome, com sucesso e com erro</h3>";

try {
    $reserva4->setNomeHospede("Marcelo Alves");
    echo "<p>Nome do hóspede alterado com sucesso!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


try {
    $reserva7 = new Reserva("Joulander", "32", 7, 109.54);
    echo "<p>Reserva criada com sucesso!</p>";
} catch (InvalidArgumentException | DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva7->setNomeHospede("");
    echo "<p>Nome do Hóspede atualizado com sucesso!</p>";
} catch (InvalidArgumentException | DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva7->setNumeroDiarias(9);
    echo "<p>Quantidade de diárias atualizado com sucesso! Quantidade atual: {$reserva7->getNumeroDiarias()}</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva7->setNumeroDiarias(0);
    echo "<p>Quantidade de diárias atualizado com sucesso! Quantidade atual: {$reserva7->getNumeroDiarias()}</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva7->confirmar();
    echo "<p>Reserva confirmada com sucesso!</p>";
} catch (DomainException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva7->setNumeroDiarias(5);
    echo "<p>Número de diárias alterada!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva5 = new Reserva("Emanuela", "9", 10, 101);
    echo "<p>Reserva feita com sucesso!</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}

try {
    $reserva5->setNomeHospede("Objaildo");
    echo "<p>Nome do Hóspede atualizado com sucesso!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "ERRO: " . $e->getMessage() . "</p>";
}

echo "<h3>6. Construtor inválido, provando com isset() que a reserva não foi criada</h3>";

try {
    $reserva6 = new Reserva("", 23, 9, 103.80);
    echo "<p>Reserva criada com sucesso!</p>";
} catch (DomainException | InvalidArgumentException $e) {
    echo "<p>ERRO: " . $e->getMessage() . "</p>";
}


if (isset($reserva6)) {
    echo "<p>A reserva 6 foi criada com sucesso!</p>";
} else {
    echo "<p>A reserva 6 não foi criada pois é inválida!</p>";
}
