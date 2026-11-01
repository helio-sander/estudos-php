<?php


class Hospede
{
    private string $nome;
    private string $cpf;
    private string $telefone;
    private string $endereco;
    private string $dataNascimento;


    public function __construct(string $nome, string $cpf, string $telefone, string $endereco, string $dataNascimento)
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException("O nome não pode ficar vazio!");
        }
        $this->nome = trim($nome);

        if (trim($cpf) === '') {
            throw new InvalidArgumentException("Não é possível CPF vazio");
        }

        $this->cpf = trim($cpf);

        if (trim($telefone) === '') {
            throw new InvalidArgumentException("Não é possível telefone vazio");
        }
        $this->telefone = trim($telefone);

        if (trim($endereco) === '') {
            throw new InvalidArgumentException("Não é possível endereço vazio");
        }
        $this->endereco = trim($endereco);

        if (trim($dataNascimento) === '') {
            throw new InvalidArgumentException("Não é possível data de nascimento vazia");
        }

        if (trim($dataNascimento) > date('Y-m-d')) {
            throw new InvalidArgumentException("Não é possível data de nascimento com data futura");
        }



        $this->dataNascimento = trim($dataNascimento);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }
}
