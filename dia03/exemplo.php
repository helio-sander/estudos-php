<?php


class Cliente{

    // Propriedades: o que o cliente TEM

    public string $nome;
    public string $email;

    // Construtor: roda automaticamente ao criar o cliente

    public function __construct(string $nome, string $email)
    {
        $this->nome = $nome;
        $this->email = $email;
    }

    // Métodos: o que o cliente FAZ

    public function apresentar():string
    {
        return "Cliente: {$this->nome} (E-mail: {$this->email})";
    }
}

// Criando objetos a partir da classe

$cliente1 = new Cliente("João Silva","joao@email.com");
$cliente2 = new Cliente("Maria Souza","maria@email.com");

echo "<p>" . $cliente1->apresentar() ."</p>";
echo "<p>" . $cliente2->apresentar() ."</p>";

$cliente1->nome = "João Pereira";
echo "<p>" . $cliente1->apresentar() ."</p>";

