<?php

class ContaBancaria
{

    private string $titular;
    private float $saldo = 0.0;

    public function __construct(string $titular)
    {
        if (trim($titular) === "") {
            throw new InvalidArgumentException("O titular não pode ficar vazio");
        }

        $this->titular = $titular;
    }

    public function setTitular(string $titular): void
    {
        if (trim($titular) === '') {
            throw new InvalidArgumentException("Não pode nome do titular vazio!");
        }
        $this->titular = $titular;
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
            throw new InvalidArgumentException("Não é possível depositar um valor negativo ou igual a zero");
        }
        $this->saldo += $valor;
    }


    public function sacar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException("O valor do saque deve ser maior que zero");
        }

        if ($valor > $this->saldo) {

            throw new DomainException("Saldo insuficiente. Disponível: R$ " . number_format($this->saldo, 2, ',', '.'));
        }
        $this->saldo -= $valor;
    }

    public function exibirSaldo(): string
    {
        return "<p>Saldo atual da conta de {$this->titular}: R$ " . number_format($this->saldo, 2, ',', '.') . "</p>";
    }
}
