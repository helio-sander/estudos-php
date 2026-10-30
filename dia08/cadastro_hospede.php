<?php
    require_once 'conexao.php';
    require_once 'Hospede.php';

    $mensagem = '';
    $nome = $cpf = $telefone = $endereco = $dataNascimento = '';

    if(isset($_GET['sucesso'])){
        $mensagem = "Hóspede adicionado com sucesso! id: ".(int) $_GET['sucesso'];
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['nome'] ?? '';
        $cpf = $_POST['cpf'] ?? '';
        $endereco = $_POST['endereco'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $dataNascimento = $_POST['dataNascimento'] ?? '';

        try {
            $hospede = new Hospede($nome, $cpf, $telefone, $endereco, $dataNascimento);
            $inserir = $pdo->prepare("INSERT INTO hospedes (nome,cpf,telefone,endereco,data_nascimento) VALUES (:nome,:cpf,:telefone,:endereco,:dataNascimento)");
            $inserir->execute(['nome' => $hospede->getNome(), 'cpf' => $hospede->getCpf(), 'telefone' => $hospede->getTelefone(), 'endereco' => $hospede->getEndereco(), 'dataNascimento' => $hospede->getDataNascimento()]);
            $novoId = $pdo->lastInsertId();
            header("Location: cadastro_hospede.php?sucesso={$novoId}");
            exit;
        } catch (InvalidArgumentException $e) {
            $mensagem = "Erro: " . $e->getMessage();
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                $mensagem = "Já existe um hóspede cadastrado com esse CPF.";
            } else {
                $mensagem = "Não foi possível cadastrar. Tente novamente mais tarde.";
            }
        }
    }


    ?>

    <html>

<head>
    <meta charset="UTF-8">
</head>

<body>


    <form action="#" method="post">
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= htmlspecialchars($nome ?? ''); ?>">
        </div>

        <div>
            <label>CPF:</label>
            <input type="text" name="cpf" maxlength="14" value="<?= htmlspecialchars($cpf ?? ''); ?>">
        </div>

        <div>
            <label>Telefone:</label>
            <input type="tel" name="telefone" maxlength="15" value="<?= htmlspecialchars($telefone ?? ''); ?>">
        </div>

        <div>
            <label>Endereço:</label>
            <input type="text" name="endereco" value="<?= htmlspecialchars($endereco ?? ''); ?>">
        </div>

        <div>
            <label>Data de nascimento:</label>
            <input type="date" name="dataNascimento" value="<?= htmlspecialchars($dataNascimento ?? ''); ?>">
        </div>

        <button type="submit">Enviar</button>
    </form>

    <p>
        <strong>
            <?php
            if ($mensagem !== '') {
                echo htmlspecialchars($mensagem);
            }

            ?>
        </strong>
    </p>
</body>

</html>