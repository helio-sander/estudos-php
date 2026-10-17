<?php

class ContaBancaria
{

    private string $titular;
    private float $saldo = 0.0;

    public function __construct(string $titular)
    {

        $this->titular = $titular;
    }

    public function setTitular(string $titular): void
    {
        if (trim($titular) === '') {
            echo "<p>Não pode nome do titular vazio!</p>";
        } else {
            $this->titular = $titular;
            echo "<p>Titular atualizado!</p>";
        }
    }

    public function getTitular(): string
    {
        return $this->titular;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            echo "<p><strong> ERRO! </strong> Não é possível depositar um valor negativo ou igual a zero</p>";
        } else {
            $this->saldo += $valor;
            echo "<p>Depósito de R$ " . number_format($valor, 2, ',', '.') . " realizado com sucesso!</p>";
        }
    }


    public function sacar(float $valor): void
    {
        if ($valor <= 0 || $valor > $this->saldo) {
            echo "<p><strong> ERRO! </strong> Não é possível sacar um valor negativo ou igual a zero, ou maior que o saldo disponível</p>";
        } else {
            $this->saldo -= $valor;
            echo "<p>Saque de R$ " . number_format($valor, 2, ',', '.') . " efetuado com sucesso!</p>";
        }
    }

    public function exibirSaldo(): string
    {
        return "<p>Saldo atual da conta de {$this->titular}: R$ " . number_format($this->saldo, 2, ',', '.') . "</p>";
    }
}


$conta = new ContaBancaria("Marcelo");
echo $conta->getTitular();
$conta->setTitular("Hélio");
echo $conta->getTitular();
$conta->setTitular('');
echo $conta->getSaldo();
$conta->depositar(50);
echo $conta->getSaldo();

echo $conta->exibirSaldo();

//$conta->saldo = 4000;

echo $conta->exibirSaldo();
