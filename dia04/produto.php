<?php

class Produto
{
    private string $nome;
    private float $preco;
    private int $estoque;


    public function __construct(string $nome, float $preco, int $estoque)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }


    //preco

    public function setPreco(float $preco): void
    {
        if ($preco <= 0) {
            echo "<p>Não é possível colocar preço menor negativo ou zerado</p>";
            return;
        }

        $this->preco = $preco;
        echo "<p>Preço atualizado com sucesso para ". number_format($this->preco,2,',','.')."</p>";
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    //nome


    public function setNome(string $nome): void
    {
        if (trim($nome) === "") {
            echo "<p>Não é possivel o nome ficar em branco!</p>";
            return;
        }

        $this->nome = $nome;
        echo "<p>Nome atualizado com sucesso para {$this->nome}</p>";
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    //estoque


    public function getEstoque(): int
    {
        return $this->estoque;
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


echo $produto1->getNome() . " | " . number_format($produto1->getPreco(), 2, ',', '.') . " | " . $produto1->getEstoque() . "<hr>";

$produto1->setPreco(101.90);
echo $produto1->getPreco() . "<hr>";
echo $produto1->valorEmEstoque() . "<hr>";

$produto1->setPreco(-90);
echo $produto1->getPreco() . "<hr>";


$produto1->setNome('Teclado Top');
echo $produto1->getNome() . "<hr>";


echo "<br>";

$produto1->setNome("");


echo "<br>";


$produto1->estoque = 9999;

//Fatal error: Uncaught Error: Cannot access private property Produto::$estoque in C:\laragon\www\estudos-php\dia04\produto.php:118 Stack trace: #0 {main} thrown in C:\laragon\www\estudos-php\dia04\produto.php on line 118
// não é possível acessar a propriedade estoque diretamente fora da classe. 

