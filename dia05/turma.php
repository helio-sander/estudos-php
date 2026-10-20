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


$alunos = [
    new Aluno('Jefrinho', 5, 10),
    new Aluno('Jilsa', 8, 9),
    new Aluno('Marcondes', 7, 8),
    new Aluno('Silva', 7, 9),
    new Aluno('Fernando', 4, 4),
    new Aluno('Gondes', 5, 6)
];

$alunos[] = new Aluno('Keit', 5, 5);
$alunos[] = new Aluno('Juel', 7, 7);

$somaMedias = 0;
$aprovados = 0;
$reprovados = 0;
$recuperacao = 0;


foreach ($alunos as $aluno) {
    $aluno->boletim();
    $somaMedias += $aluno->media();
    $situacao = $aluno->situacao();

    if ($situacao === "APROVADO") {
        $aprovados++;
    } elseif ($situacao === "EM RECUPERAÇÃO") {
        $recuperacao++;
    } else {
        $reprovados++;
    }
}


echo "<strong>Média geral</strong>: " . number_format($somaMedias / count($alunos), 2, ',', '.') . "<hr>";
echo "<strong>Aprovados</strong>: " . $aprovados . "<hr>";
echo "<strong>Reprovados</strong>: " . $reprovados . "<hr>";
echo "<strong>Em recuperação</strong>: " . $recuperacao . "<hr>";
