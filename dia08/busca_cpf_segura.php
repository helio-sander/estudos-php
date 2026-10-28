<form method="get">
    <label>CPF dos hóspedes:</label>
    <input type="text" name="cpf">
    <button type="submit">Buscar</button>
</form>

<?php


$cpf = $_GET['cpf'] ?? '';
echo "<p>Você buscou " . htmlspecialchars($cpf) . "</p>";


require_once "conexao.php";

if ($cpf !== '') {
    $consulta = $pdo->prepare("SELECT nome,cpf,telefone,endereco FROM hospedes WHERE cpf = :cpf");
    $consulta->execute(['cpf' => $cpf]);
    $hospedes = $consulta->fetchAll();

    if (count($hospedes) === 0) {
        echo "<p>Nenhum hóspede encontrado!</p>";
    } else {
        foreach ($hospedes as $hospede) {

            echo "<p>" . htmlspecialchars($hospede['nome']) . " | " . htmlspecialchars($hospede['cpf']) . " | " . htmlspecialchars($hospede['telefone']) . " | " . htmlspecialchars($hospede['endereco']) . "</p>";
        }
    }
}
?>