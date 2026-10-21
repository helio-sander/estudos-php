<?php

require_once("ContaBancaria.php");


echo "<h3>1. Criando uma conta válida</h3>";

try {
    $conta = new ContaBancaria("Hélio");
    echo "<p>Conta de " . $conta->getTitular() . " criada com sucesso!</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}


echo "<h3>2. Depósito Válido</h3>";


try {
    $conta->depositar(500);
    echo "<p>Depósito realizado! Saldo: R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}


echo "<h3>3. Depósito de valor negativo</h3>";

try {
    $conta->depositar(-400);
    echo "<p>Depósito realizado! Saldo: R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}


echo "<h3>4. Saque Válido</h3>";

try {
    $conta->sacar(150);
    echo "<p>Saque realizado! Saldo: R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}


echo "<h3>5. Saque de valor zero</h3>";

try {
    $conta->sacar(0);
    echo "<p>Saque realizado! Saldo: R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}


echo "<h3>6. Saque maior que o saldo</h3>";

try {
    $conta->sacar(400);
    echo "<p>Saque realizado! Saldo: R$ " . number_format($conta->getSaldo(), 2, ',', '.') . "</p>";
} catch (InvalidArgumentException | DomainException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}



echo "<h3>7. Trocar o titular (sucesso) e tentar com nome vazio (erro)</h3>";

try {
    $conta->setTitular("Marcondes");
    echo "<p>Titular da conta atualizado: " . $conta->getTitular() . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}

echo "<h3>7.1 Trocar o titular colocando o nome vazio (erro)</h3>";

try {
    $conta->setTitular("");
    echo "<p>Titular da conta atualizado: " . $conta->getTitular() . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}

echo "<h3>8. conta com titular vazio</h3>";

try {
    $conta2 = new ContaBancaria("");
    echo "<p>Conta com titular vazio criada com sucesso! Nome do titular: " . $conta2->getTitular() . "</p>";
} catch (InvalidArgumentException $e) {
    echo "<p>ERRO!: " . $e->getMessage() . "</p>";
}

if (isset($conta2)) {
    echo "<p>Conta sem titular Criada!</p>";
} else {
    echo "<p>Não foi criada a conta sem titular!</p>";
}
