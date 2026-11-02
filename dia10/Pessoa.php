<?php

class Pessoa
{

    protected string $nome;
    protected string $cpf;
    protected string $telefone;

    public function __construct(string $nome, string $cpf, string $telefone)
    {
        if (trim($nome) === '') {
            throw new InvalidArgumentException("O nome não pode ficar vazio!");
        }
        $this->nome = trim($nome);

        if (trim($cpf) === '') {
            throw new InvalidArgumentException("O cpf não pode ficar vazio!");
        }
        $this->cpf = trim($cpf);

        if (trim($telefone) === '') {
            throw new InvalidArgumentException("O telefone não pode ficar vazio!");
        }
        $this->telefone = trim($telefone);
    }


    public function apresentar(): string
    {
        return "Pessoa: " . $this->nome;
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
}
