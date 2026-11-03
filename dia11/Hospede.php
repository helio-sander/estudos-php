<?php

require_once 'Pessoa.php';

class Hospede extends Pessoa
{
    private string $dataNascimento;


    public function __construct(string $nome, string $cpf, string $telefone, string $dataNascimento)
    {
        parent::__construct($nome, $cpf, $telefone);

        if ($dataNascimento === '') {
            throw new InvalidArgumentException("Não é possível data de nascimento vazia!");
        }

        if ($dataNascimento > date('Y-m-d')) {
            throw new InvalidArgumentException("Não é possivel data de nascimento futura!");
        }

        $this->dataNascimento = $dataNascimento;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function apresentar(): string
    {
        return "Hóspede: " . $this->nome . ", nascido(a) em " . date('d/m/Y', strtotime($this->dataNascimento));
    }
}
