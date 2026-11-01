<?php
require_once "HospedeRepositorio.php";

try {
    require_once 'conexao.php';
    $repositorio = new HospedeRepositorio($pdo);
    $hospedes = $repositorio->listarTodos();
    foreach ($hospedes as $hospede) {
        echo "<p>Nome: " . htmlspecialchars($hospede['nome']) . " | Telefone: " . htmlspecialchars($hospede['telefone']) . "</p>";
    }
} catch (PDOException $e) {
    echo "<p>Não foi possível carregar a lista de hóspedes. Tente novamente mais tarde.</p>";
}
