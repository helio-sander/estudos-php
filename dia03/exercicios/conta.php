<?php

class ContaBancaria
{

    public string $titular;
    public float $saldo = 0.0;

    public function __construct(string $titular)
    {

        $this->titular = $titular;
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


$conta1 = new ContaBancaria("Hélio");
$conta2 = new ContaBancaria("Ana");
$conta1->depositar(500); 
$conta2->depositar(200);

$conta1->sacar(150);
$conta2->sacar(300);

$conta1->depositar(-50);


echo $conta1->exibirSaldo();
echo $conta2->exibirSaldo();