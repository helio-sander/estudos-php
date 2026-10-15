<?php

class Tarefa
{
    public string $titulo;
    public string $responsavel;
    public string $status = "Pendente";


    public function __construct(string $titulo, string $responsavel)
    {
        $this->titulo = $titulo;
        $this->responsavel = $responsavel;
    }


    public function iniciar(): void
    {
        if ($this->status === "Pendente") {
            $this->status = "Em andamento";
            echo "<p>Tarefa iniciada com sucesso!</p>";
        } else {
            echo "<p>❌ ERRO! Não é possível alterar. A tarefa encontra-se como {$this->status}</p>";
        }
    }

    public function concluir(): void
    {
        if ($this->status === "Em andamento") {
            $this->status = "Concluída";
            echo "<p>Tarefa concluída com sucesso!</p>";
        } else {
            echo "<p>❌ ERRO! Não é possível alterar. A tarefa encontra-se como {$this->status}</p>";
        }
    }

    public function exibirStatus(): void
    {
        echo "<p>Título: " . $this->titulo . " | Responsável: " . $this->responsavel . " | Status: " . $this->status . "</p>";
    }
}


$tarefa1 = new Tarefa("Criar tela de login", "Hélio Sander");
$tarefa1->exibirStatus();
$tarefa1->concluir();
$tarefa1->exibirStatus();
$tarefa1->iniciar();
$tarefa1->exibirStatus();
$tarefa1->concluir();
$tarefa1->exibirStatus();
$tarefa1->iniciar();
$tarefa1->exibirStatus();
