<?php


require_once 'Funcionario.php';
require_once 'Hospede.php';

try {
    $hospede = new Hospede('Marcos', '434.443.554-09', '34-9-99884344', '1984-09-12');
    echo $hospede->apresentar() . "<br>";
    echo $hospede->getNome();
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<hr>";


try {
    $funcionario = new Funcionario('Jeferson', '334.554.545-09', '34-9-9988-4343', 'Assistente', 2434.54);
    echo $funcionario->apresentar() . "<br>";
    echo $funcionario->getCargo();
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<hr>";


try {
    $hospede2 = new Hospede('', '434.443.554-09', '34-9-99884344', '1984-09-12');
    echo $hospede2->apresentar() . "<br>";
    echo $hospede2->getNome();
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage();
}

echo "<hr>";


try {
    $funcionario2 = new Funcionario('Jeferson', '334.554.545-09', '34-9-9988-4343', 'Assistente', 0);
    echo $funcionario2->apresentar() . "<br>";
    echo $funcionario2->getCargo();
} catch (InvalidArgumentException $e) {
    echo "Erro: " . $e->getMessage();
}


echo "<hr>";



$pessoas = [$hospede, $funcionario];

foreach ($pessoas as $pessoa) {
    echo $pessoa->apresentar() . "<br>";
}
