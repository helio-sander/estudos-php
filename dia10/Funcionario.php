<?php

require_once 'Pessoa.php';

class Funcionario extends Pessoa
{

    private string $cargo;
    private float $salario;

    public function __construct(string $nome, string $cpf, string $telefone, string $cargo, float $salario)
    {
        parent::__construct($nome, $cpf, $telefone);

        if (trim($cargo) === '') {
            throw new InvalidArgumentException("Não é possível cargo vazio!");
        }

        $this->cargo = trim($cargo);

        if ($salario <= 0) {
            throw new InvalidArgumentException("Não é possível salário ser igual ou menor que zero!");
        }

        $this->salario = $salario;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }


    public function getSalario(): float
    {
        return $this->salario;
    }


    public function apresentar(): string
    {
        return "Funcionário(a): " . $this->nome . " (" . $this->cargo . ")";
    }
}
