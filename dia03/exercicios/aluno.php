<?php

class Aluno
{

    public string $nome;
    public float $nota1;
    public float $nota2;


    public function __construct(string $nome, float $nota1, float $nota2)
    {
        $this->nome = $nome;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
    }


    public function media(): float
    {
        return ($this->nota1 + $this->nota2) / 2;
    }

    public function situacao(): string
    {
        if ($this->media() >= 7) {
            return "APROVADO";
        } elseif ($this->media() >= 5) {
            return "EM RECUPERAÇÃO";
        } else {
            return "REPROVADO";
        }
    }

    public function boletim(): void
    {
        echo "<p>{$this->nome}: média " . number_format($this->media(), 1, ',', '.') . " - " . $this->situacao() . "</p>";
    }
}


$aluno1 = new Aluno('Max',9,8);
$aluno2 = new Aluno('Jorge',6,5);
$aluno3 = new Aluno('Amanda',3,5);
$aluno4 = new Aluno('Keit',5,5);
$aluno5 = new Aluno('Juel',7,7);

$aluno1->boletim();
$aluno2->boletim();
$aluno3->boletim();
$aluno4->boletim();
$aluno5->boletim();