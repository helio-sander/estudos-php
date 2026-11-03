<?php

require_once 'Pessoa.php';


class Fornecedor extends Pessoa
{

    private string $empresa;


    public function __construct(string $nome, string $cpf, string $telefone, string $empresa)
    {
        parent::__construct($nome, $cpf, $telefone);

        if (trim($empresa) === '') {
            throw new InvalidArgumentException("Não é possível empresa vazia!");
        }

        $this->empresa = trim($empresa);
    }

    public function getEmpresa(): string
    {
        return $this->empresa;
    }



    public function apresentar(): string
    {
        return "Fornecedor(a): {$this->nome}, da empresa {$this->empresa}";
    }
}
