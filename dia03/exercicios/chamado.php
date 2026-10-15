<?php

class Chamado

{
    public string $solicitante;
    public string $descricao;
    public int $reabertura = 0;
    public string $status = "Aberto";


    public function __construct(string $solicitante, string $descricao)
    {
        $this->solicitante = $solicitante;
        $this->descricao = $descricao;
    }

    public function atender(): void
    {
        if ($this->status === 'Aberto') {
            $this->status = 'Em atendimento';
            echo "<p>Status alterado para Em atendimento</p>";
        } else {
            echo "<p>Erro! Só é possível atender chamados Abertos! Status atual: {$this->status}</p>";
        }
    }

    public function resolver(): void
    {
        if ($this->status === 'Em atendimento') {
            $this->status = 'Resolvido';
            echo "<p>Status alterado para Resolvido!</p>";
        } else {
            echo "<p>Erro! Só é possível resolver chamados em atendimento! Status atual: {$this->status}</p>";
        }
    }

    public function reabrir(): void
    {

        if ($this->status === 'Resolvido') {
            $this->status = 'Aberto';
            $this->reabertura += 1;
            echo "<p>Status alterado para Aberto! Total acumulada de Reaberturas: {$this->reabertura}</p>";
        } else {
            echo "<p>Erro! Só é possível reabrir chamados resolvidos! Status atual: {$this->status}</p>";
        }
    }

    public function precisaAtencao(): bool
    {
        if ($this->reabertura >= 2) {
            return true;
        } else {
            return false;
        }
    }

    public function exibir(): void
    {
        echo "<p>Solicitante: {$this->solicitante} | Descrição: {$this->descricao} | Status: {$this->status} | Reaberturas: {$this->reabertura}</p>";
    }
}


$chamado = new Chamado('Marcelo', 'Suporte Geral');
$chamado->atender();
$chamado->exibir();
$chamado->resolver();
$chamado->exibir();
$chamado->reabrir();
$chamado->exibir();
$chamado->resolver();
$chamado->atender();
$chamado->exibir();
$chamado->resolver();
$chamado->exibir();
$chamado->reabrir();
$chamado->exibir();


if ($chamado->precisaAtencao()) {
    echo "<p>⚠️ Atenção: chamado reaberto várias vezes!</p>";
}
