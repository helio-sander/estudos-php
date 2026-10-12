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

    public function repor(int $quantidade): void
    {
        if ($quantidade <= 0) {
            echo "<p><strong>ERRO!</strong> A quantidade a ser reposta deve ser maior que zero!</p>";
        } else {
            $this->estoque += $quantidade;
            echo "<p>Reposição de {$quantidade} unidades de {$this->nome} efetuada com sucesso!</p>";
        }
    }

    public function valorEmEstoque(): float
    {
        return $this->preco * $this->estoque;
    }
}

$produto1 = new Produto("Teclado", 150, 10);
$produto1->vender(3);
$produto1->repor(5);
$produto1->repor(-2);
echo "<p>Valor em estoque final: R$ " . number_format($produto1->valorEmEstoque(), 2, ',', '.') . "</p>";
