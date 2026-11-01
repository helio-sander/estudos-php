<?php
require_once 'Hospede.php';
class HospedeRepositorio

{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function salvar(Hospede $hospede): int
    {

        $consulta = $this->pdo->prepare("INSERT INTO hospedes(nome,cpf,telefone,endereco,data_nascimento) 
        VALUES(:nome,:cpf,:telefone,:endereco,:data_nascimento)");

        $consulta->execute([
            'nome' => $hospede->getNome(),
            'cpf' => $hospede->getCpf(),
            'telefone' => $hospede->getTelefone(),
            'endereco' => $hospede->getEndereco(),
            'data_nascimento' => $hospede->getDataNascimento()
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function buscarPorCpf(string $cpf): ?array
    {
        $consulta = $this->pdo->prepare("SELECT * FROM hospedes WHERE cpf = :cpf");
        $consulta->execute([
            'cpf' => $cpf
        ]);

        $hospede = $consulta->fetch();

        if ($hospede === false) {
            return NULL;
        }
        return $hospede;
    }

    public function listarTodos(): array
    {
        $consulta = $this->pdo->prepare("SELECT * FROM hospedes ORDER BY nome ASC");
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
