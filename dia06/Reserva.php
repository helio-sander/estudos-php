<?php

class Reserva
{

    private string $nomeHospede;
    private string $quarto;
    private int $numeroDiarias;
    private float $valorDiaria;
    private string $statusReserva = "Pendente";


    public function __construct(string $nomeHospede, string $quarto, int $numeroDiarias, float $valorDiaria)
    {
        if (trim($nomeHospede) === "") {
            throw new InvalidArgumentException("Não é possível o nome do hóspede vazio!");
        }
        $this->nomeHospede = trim($nomeHospede);

        if (trim($quarto) === "") {
            throw new InvalidArgumentException("Não é possível o quarto ficar vazio!");
        }
        $this->quarto = trim($quarto);

        if ($numeroDiarias <= 0) {
            throw new InvalidArgumentException("Não é possível o número de diárias zerado ou negativo");
        }
        $this->numeroDiarias = $numeroDiarias;

        if ($valorDiaria <= 0) {
            throw new InvalidArgumentException("Não é possível o valor da diária zerado ou negativo!");
        }

        $this->valorDiaria = $valorDiaria;
    }


    public function confirmar(): void
    {
        if ($this->statusReserva !== "Pendente") {
            throw new DomainException("Não é possível confirmar pois a reserva está {$this->statusReserva}");
        }
        $this->statusReserva = "Confirmada";
    }

    public function fazerCheckin(): void
    {
        if ($this->statusReserva !== "Confirmada") {
            throw new DomainException("Não é possível fazer o check in pois a reserva está {$this->statusReserva}");
        }
        $this->statusReserva = "Hospedado";
    }

    public function fazerCheckout(): void
    {
        if ($this->statusReserva !== "Hospedado") {
            throw new DomainException("Não é possível fazer o check out pois a reserva está {$this->statusReserva}");
        }
        $this->statusReserva = "Finalizada";
    }

    public function cancelar(): void
    {
        if (!$this->podeCancelar()) {
            throw new DomainException("Não é possível cancelar pois a reserva está com status {$this->statusReserva}");
        }
        $this->statusReserva = "Cancelada";
    }


    public function calcularTotal(): float
    {
        $total = $this->numeroDiarias * $this->valorDiaria;

        if ($this->numeroDiarias >= 7) {
            $total *= 0.9;
        }

        return $total;
    }

    public function podeCancelar(): bool
    {
        if ($this->statusReserva === "Pendente" || $this->statusReserva === "Confirmada") {
            return true;
        } else {
            return false;
        }
    }


    public function getStatusReserva(): string
    {
        return $this->statusReserva;
    }


    public function getNomeHospede(): string
    {
        return $this->nomeHospede;
    }


    public function getQuarto(): string
    {
        return $this->quarto;
    }

    public function getNumeroDiarias(): int
    {
        return $this->numeroDiarias;
    }

    public function getValorDiaria(): float
    {
        return $this->valorDiaria;
    }



    public function setNumeroDiarias(int $numeroDiarias): void
    {
        if ($this->statusReserva !== "Pendente") {
            throw new DomainException("Não é possível alterar o número de diárias pois o status da reserva é {$this->statusReserva}");
        }

        if ($numeroDiarias <= 0) {
            throw new InvalidArgumentException("Não é possível colocar número de diárias menores ou iguais a zero");
        }

        $this->numeroDiarias = $numeroDiarias;
    }


    public function setNomeHospede(string $nomeHospede): void
    {
        if ($this->statusReserva !== "Pendente"  && $this->statusReserva !== "Confirmada") {
            throw new DomainException("Não é possível alterar o nome do hóspede pois o status da reserva está {$this->statusReserva}");
        }

        if (trim($nomeHospede) === "") {
            throw new InvalidArgumentException("Não é possível colocar nome de hóspede vazio!");
        }
        $this->nomeHospede = trim($nomeHospede);
    }
}
