<?php

class Tarefa
{
    private string $titulo;
    private string $responsavel;
    private string $status = "Pendente";


    public function __construct(string $titulo, string $responsavel)
    {
        $this->titulo = $titulo;
        $this->responsavel = $responsavel;
    }

    //titulo

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        if ($this->status !== "Pendente") {
            echo "<p>Não é possível alterar títulos de tarefas já iniciadas!</p>";
            return;
        }

        if (trim($titulo) === "") {
            echo "<p>ERRO! O Título não pode estar vazio!</p>";
            return;
        }

        $this->titulo = $titulo;
        echo "<p>Título atualizado com sucesso para {$this->titulo}!</p>";
    }

    //responsavel

    public function getResponsavel(): string
    {
        return $this->responsavel;
    }

    public function setResponsavel(string $responsavel): void
    {
        if ($this->status !== "Pendente") {
            echo "<p>Não é possível alterar o responsável de tarefas já iniciadas!</p>";
            return;
        }

        if (trim($responsavel) === "") {
            echo "<p>Não é possível que o responsável fique vazio!</p>";
            return;
        }

        $this->responsavel = $responsavel;
        echo "<p>Responsável atualizado com sucesso!</p>";
    }



    //status

    public function getStatus(): string
    {
        return $this->status;
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

//echo $tarefa1->titulo;
$tarefa1->setTitulo('Fazer Tela de login');
echo $tarefa1->getTitulo();
echo "<br>";
echo $tarefa1->getStatus();
echo "<br>";



$tarefa2 = new Tarefa("Resolver Problemas", "Marcondes Mota");
echo $tarefa2->getTitulo();
echo "<br>";
$tarefa2->setTitulo("");
echo $tarefa2->getTitulo();

echo "<br>";

//echo $tarefa2->status = 'Concluída';

//Fatal error: Uncaught Error: Cannot access private property Tarefa::$status in C:\laragon\www\estudos-php\dia04\tarefa.php:110 Stack trace: #0 {main} thrown in C:\laragon\www\estudos-php\dia04\tarefa.php on line 110

//erro fatal - não é possivel acessar uma propriedade privada status fora da classe tarefas . a linha foi a 110. 

$tarefa2->setResponsavel("marlandroramos");
echo $tarefa2->getResponsavel();
echo "<br>";

$tarefa2->setResponsavel("");
echo $tarefa2->getResponsavel();
echo "<br>";



echo "Tarefa1: " . $tarefa1->getStatus() . "<br>";

$tarefa1->setTitulo("Sou um outro título");
echo $tarefa1->getTitulo() . "<br>";


echo "Tarefa2: " . $tarefa2->getStatus() . "<br>";
$tarefa2->setTitulo("Sou um outro e outro título");
echo $tarefa2->getTitulo();



$tarefa1->setResponsavel("Evandro Ramos");
