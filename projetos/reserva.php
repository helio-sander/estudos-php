<?php


/*


PLANEJAMENTO: CLASSE RESERVA

1. FLUXO DE STATUS
Pendente --confirmar()--> Confirmada --fazerCheckin()--> Hospedado --fazerCheckout()--> Finalizada
Pendente e Confirmada --cancelar()--> Cancelada

2. PROPRIEDADES
- nomeHospede: string, private, 
- statusReserva: string, private, valor inicial "Pendente"
- quarto: string, private, 
- numeroDiarias: int, private, 
- valorDiaria: float, private, 


3. CONSTRUTOR
Recebe: o nome o hóspede, o quarto, numero de diárias, valor da diária. 

4. MÉTODOS DE AÇÃO (void)
- confirmar(): muda para Confirmada. Só se estiver Pendente.
- fazerCheckin(): muda para hospedado só se estiver confirmado.
- fazerCheckout(): muda para finalizada só se estiver hospedado.
- cancelar(): muda para cancelada. é void. só muda para cancelada se for pendente ou confirmado.


5. MÉTODOS QUE RESPONDEM
- calcularTotal(): float. Diárias × valor da diária, com 10% de desconto se diárias >= 7.
- podeCancelar(): bool. recebe true ou false.ou seja, 0 ou 1. verifica o status da reserva e se estiver pendente ou confirmada pode cancelar. 

6. GETTERS
- getStatusReserva() - exibe o status atual da reserva
- getNomeHospede() - exibe o nome atual do hóspede
- getQuarto()
- getNumeroDiarias()
- getValorDiaria()

7. SETTERS
- setNumeroDiarias(): só se Pendente. Valor maior que zero. altera o numero das diárias
- setNomeHospede(): só se confirmada ou pendente. altera o nome do hóspede
- NÃO EXISTE setValorDiaria(), porque pois o valor da diária é fixo definido no momento da reserva
- NÃO EXISTE setStatus(), porque o status é definido através dos métodos de ação

8. VALIDAÇÕES
- não pode numero de diarias negativas ou zeradas
- nao pode valor de diarias negativas ou zeradas
- nao pode numero do quarto vazio
- nao pode nome do hospede vazio

9. PERGUNTAS PARA O CLIENTE
- O sinal tem um valor fixo, como 50%?


Tenho uma pousada pequena e quero um sistema simples para controlar as reservas. Cada reserva tem o nome do hóspede, o número do quarto, a quantidade de diárias e o valor da diária.

Quando o cliente faz a reserva, ela fica pendente até ele pagar o sinal. Pago o sinal, a reserva fica confirmada. No dia da chegada, fazemos o check-in, e na saída, o check-out, que finaliza a reserva.

O cliente pode cancelar enquanto a reserva estiver pendente ou confirmada. Depois do check-in, não dá mais para cancelar.

Às vezes o cliente pede para mudar a quantidade de diárias, mas isso só pode ser feito antes de confirmar. O nome do hóspede pode ser corrigido até o check-in. O valor da diária a gente define na reserva e não muda depois.

O valor total é a quantidade de diárias vezes o valor da diária. Para estadias de 7 diárias ou mais, damos 10% de desconto.

Também preciso saber, a qualquer momento, se uma reserva ainda pode ser cancelada.



*/
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
            echo "<p>Não é possivel o nome do hóspede vazio!</p>";
            return;
        }
        $this->nomeHospede = trim($nomeHospede);

        if (trim($quarto) === "") {
            echo "<p>Não é possivel o quarto ficar vazio!</p>";
            return;
        }
        $this->quarto = trim($quarto);

        if ($numeroDiarias <= 0) {
            echo "<p>Não é possivel o número de diárias zerado ou negativo!</p>";
            return;
        }
        $this->numeroDiarias = $numeroDiarias;

        if ($valorDiaria <= 0) {
            echo "<p>Não é possivel o valor  da diárias zerado ou negativo!</p>";
            return;
        }

        $this->valorDiaria = $valorDiaria;


        echo "<p>Reserva para o sr(a) {$nomeHospede} efetuada com sucesso, quarto {$quarto}, sendo {$numeroDiarias} diárias com valor cada uma de R$ " . number_format($valorDiaria, 2, ',', '.') . "</p>";
    }


    public function confirmar(): void
    {
        if ($this->statusReserva === "Pendente") {
            $this->statusReserva = "Confirmada";
            echo "<p>Reserva confirmada com sucesso!</p>";
        } else {
            echo "<p>Não é possível confirmar a reserva neste momento! A Reserva está {$this->statusReserva}</p>";
        }
    }

    public function fazerCheckin(): void
    {
        if ($this->statusReserva === "Confirmada") {
            $this->statusReserva = "Hospedado";
            echo "<p>Check in realizado com sucesso!</p>";
        } else {
            echo "<p>Não é possível realizar o check in neste momento! A Reserva está {$this->statusReserva}</p>";
        }
    }

    public function fazerCheckout(): void
    {
        if ($this->statusReserva === "Hospedado") {
            $this->statusReserva = "Finalizada";
            echo "<p>Check out realizado com sucesso!</p>";
        } else {
            echo "<p>Não é possível realizar o check out neste momento! A Reserva está {$this->statusReserva}</p>";
        }
    }

    public function cancelar(): void
    {
        if ($this->podeCancelar()) {
            $this->statusReserva = "Cancelada";
            echo "<p>Reserva cancelada com sucesso!</p>";
        } else {
            echo "<p>Não é possível realizar o cancelamento neste momento! </p>";
        }
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
        if ($this->statusReserva === "Pendente") {
            if ($numeroDiarias > 0) {
                $this->numeroDiarias = $numeroDiarias;
                echo "<p>Número de diárias atualizado com sucesso!</p>";
            } else {
                echo "<p>Não é possível dias zerados ou negativos!</p>";
            }
        } else {
            echo "<p>Não é possível alterar o número de diárias mais!</p>";
        }
    }

    public function setNomeHospede(string $nomeHospede): void
    {
        if ($this->statusReserva === "Pendente"  || $this->statusReserva === "Confirmada") {
            if (trim($nomeHospede) !== "") {
                $this->nomeHospede = trim($nomeHospede);
                echo "<p>Hóspede atualizado com sucesso!</p>";
            } else {
                echo "<p>Não é possível atualizar o nome do hóspede vazio!</p>";
            }
        } else {
            echo "<p>Não é possível atualizar o nome do hóspede neste momento!</p>";
        }
    }
}


/*

Fluxo completo: criar → confirmar → check-in → check-out, mostrando o status a cada passo.
Pular etapas: check-in de reserva pendente, check-out de reserva confirmada.
Cancelamento: cancelar uma pendente (ok), e tentar cancelar uma hospedada (erro). Use o podeCancelar() antes de cada tentativa.
Desconto (limites): uma reserva com 6 diárias e outra com 7, mostrando o calcularTotal() formatado.
Setters: mudar as diárias de uma pendente (ok), de uma confirmada (erro) e para zero (erro). E o nome: ok, vazio (erro) e depois do check-in (erro).
Encapsulamento: tentar alterar uma propriedade privada direto, ler o erro e comentar a linha.

*/

$reserva = new Reserva("Marcos", "101", 7, 101.50);
$reserva->getStatusReserva();
$reserva->confirmar();
echo $reserva->getStatusReserva();
$reserva->fazerCheckin();
echo $reserva->getStatusReserva();
echo "<hr>";
echo "R$ " . number_format($reserva->calcularTotal(), 2, ',', '.');
$reserva->fazerCheckout();
echo $reserva->getStatusReserva();


echo "<hr>";


$reserva2 = new Reserva("Freitas", "20", 10, 98.50);
echo $reserva2->getStatusReserva();
$reserva2->fazerCheckin();
$reserva2->cancelar();
echo $reserva2->getStatusReserva();
$reserva2->setNomeHospede("");
echo "<hr>";




$reserva3 = new Reserva("Marcelo", "40", 6, 101.80);
echo $reserva3->getStatusReserva();
$reserva3->setNumeroDiarias(9);
echo $reserva3->getNumeroDiarias();
$reserva3->fazerCheckin();
echo $reserva3->getStatusReserva();
$reserva3->confirmar();
$reserva3->setNomeHospede("Pablo");

echo $reserva3->getNomeHospede();

if ($reserva->podeCancelar()) {
    echo "<p>A reserva poderá ser cancelada</p>";
} else {
    echo "<p>A reserva não poderá ser cancelada</p>";
}

//$reserva3->nomeHospede = "Joel";

//Fatal error: Uncaught Error: Cannot access private property Reserva::$nomeHospede in C:\laragon\www\estudos-php\projetos\reserva.php:292 Stack trace: #0 {main} thrown in C:\laragon\www\estudos-php\projetos\reserva.php on line 292
//não é possível alterar diretamente o nome da propriedade do tipo private fora da classe. por isso é necessário utilizar uma outra função pública (getters).
echo $reserva3->getStatusReserva();

$reserva3->fazerCheckout();

$reserva3->fazerCheckin();

echo $reserva3->getStatusReserva();

$reserva3->cancelar();


echo "<hr>";

$reserva4 = new Reserva("Jorge", "14", 6, 102.50);
$reserva4->confirmar();
echo $reserva4->getStatusReserva();
echo "<hr>";
echo "R$ " . number_format($reserva4->calcularTotal(), 2, ',', '.');
echo "<hr>";

echo $reserva4->getStatusReserva();
$reserva4->setNumeroDiarias(7);
echo "R$ " . number_format($reserva4->calcularTotal(), 2, ',', '.');
echo "<hr>";
$reserva4->fazerCheckin();
$reserva4->setNomeHospede("Uilson Ramos");

$reserva5 = new Reserva("Manu", "15", 0, 0);
echo "<hr>";


$reserva6 = new Reserva("", "32", 1, 50);
$reserva5->setNumeroDiarias(0);
$reserva6->setNomeHospede("");
