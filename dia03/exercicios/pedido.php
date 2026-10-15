<?php


class Pedido
{
    public string $cliente;
    public float $total = 0;
    public string $status = "Aberto";


    public function __construct(string $cliente)
    {
        $this->cliente = $cliente;
    }

    public function adicionarItem(string $descricao, float $valor): void
    {
        if ($valor > 0 && $this->status === "Aberto") {
            $this->total += $valor;
            echo "<p>$descricao adicionado(a) no valor de R$ " . number_format($valor, 2, ',', '.') . "</p>";
        } else {
            echo "<p>Não é possível adicionar mais itens ou com valor negativo!</p>";
        }
    }

    public function aplicarDesconto(float $percentual): void
    {
        if ($percentual > 0 && $percentual < 51 && $this->status === "Aberto") {
            $this->total -= ($this->total * ($percentual / 100));
            echo "<p>Desconto de $percentual% aplicado! Novo total: R$ " . number_format($this->total, 2, ',', '.') . "</p>";
        } elseif ($this->status !== "Aberto") {
            echo "<p>O status deve estar aberto para permitir o desconto</p>";
        } elseif ($percentual > 50 || $percentual <= 0) {
            echo "<p>Percentual inválido: $percentual%. O percentual deve estar entre 1% e 50%.</p>";
        }
    }

    public function fechar(): void
    {
        if ($this->status === "Aberto" && $this->total > 0) {
            $this->status = "Fechado";
            echo "<p>Pedido fechado com sucesso! O valor final é de R$ " . number_format($this->total, 2, ',', '.') . "</p>";
        } else {
            echo "<p>Não é possível fechar pedido já fechado ou zerado</p>";
        }
    }

    public function resumo(): string
    {
        return "<p>Pedido de {$this->cliente} | Total: R$ " . number_format($this->total, 2, ',', '.') . " | Status: {$this->status}</p>";
    }
}


$pedido = new Pedido('Marcelo');
$pedido->fechar();
$pedido->adicionarItem('Teclado', 150);
$pedido->adicionarItem('Mouse', 150);
$pedido->adicionarItem('Pente', -20);
$pedido->aplicarDesconto(80);
$pedido->aplicarDesconto(20);
echo $pedido->resumo();
$pedido->resumo();
$pedido->fechar();
$pedido->aplicarDesconto(10);
$pedido->adicionarItem('manga', 100);
