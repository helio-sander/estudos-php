<form method="get">
    <label>CPF dos hóspedes:</label>
    <input type="text" name="cpf">
    <button type="submit">Buscar</button>
</form>

<?php

$cpf = $_GET['cpf'] ?? '';
echo "<p>Você buscou {$cpf}</p>";


require_once "conexao.php";

if ($cpf !== '') {
    $sql = "SELECT nome,cpf,telefone,endereco FROM hospedes WHERE cpf = '$cpf'";
    echo "<p><small>SQL executado: {$sql}</small></p>";

    $resultado = $pdo->query($sql);
    foreach ($resultado->fetchAll() as $hospede) {
        echo "<p>{$hospede['nome']} | {$hospede['cpf']} | {$hospede['telefone']} | {$hospede['endereco']}</p>";
    }
}
?>