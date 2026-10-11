<?php

class Produto
{
    public string $nome;
    public float $preco;
    public int $estoque;


    public function __construct(string $nome, float $preco, int $estoque)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function vender(int $quantidade): void
    {
        if ($quantidade <= $this->estoque) {
            $this->estoque -= $quantidade;
            echo "<p>Venda de {$quantidade} unidades de {$this->nome} efetuada com sucesso!</p>";
        } else {
            echo "<p><strong>ERRO!</strong> Não há estoque suficiente!</p>";
        }
    }
}

$produto1 = new Produto("Teclado", 150, 10);
$produto1->vender(3);
$produto1->vender(20);
echo "<p>Estoque final: " . $produto1->estoque . "</p>";
