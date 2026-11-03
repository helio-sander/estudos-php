<?php

require_once 'Fornecedor.php';
require_once 'Hospede.php';
require_once 'Funcionario.php';

$fornecedor = new Fornecedor('jorge', '323232323', '21212122', 'empresa teste');

$hospede = new Hospede('Marcel', '5445454545', '777777', '1984-09-01');

$funcionario = new Funcionario('Juliano', '999999', '21212122', 'Assistente', 2344.90);

$pessoas = [$fornecedor, $hospede, $funcionario];
foreach ($pessoas as $pessoa) {
    echo $pessoa->apresentar() . "<br>";
}
