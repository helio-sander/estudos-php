<form method="GET">
    <input type='text' name='cpf'>
    <button name='buscar' type='submit'>Buscar</button>
</form>

<?php

require_once 'HospedeRepositorio.php';

$cpf = $_GET['cpf'] ?? '';

if ($cpf !== '') {
    try {
        require_once 'conexao.php';
        $repositorio = new HospedeRepositorio($pdo);
        $hospede = $repositorio->buscarPorCpf($cpf);

        if ($hospede === null) {
            echo "Nenhum hóspede encontrado neste cpf";
        } else {
            echo "nome:" . htmlspecialchars($hospede["nome"]) . " | CPF: " . htmlspecialchars($hospede["cpf"]);
        }
    } catch (PDOException $e) {
        echo "Erro: Não foi possível realizar a busca. Tente novamente mais tarde.";
    }
}

?>