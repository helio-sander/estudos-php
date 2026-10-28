<?php

require_once "conexao.php";

$resultado = $pdo->query("SELECT nome, telefone FROM hospedes ORDER BY nome");
$hospedes = $resultado->fetchAll();


foreach($hospedes as $hospede){
    echo "<p>{$hospede['nome']} - {$hospede['telefone']}</p>";
}