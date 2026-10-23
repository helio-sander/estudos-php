
TABELA: hospedes

coluna      | tipo          | obrigatória | observação
id          | INT           | sim         | chave primária, auto incremento
nome        | VARCHAR(100)  | sim         |
cpf         | VARCHAR(14)   | sim         | único
telefone    | VARCHAR(40)   | sim         |
endereco    | VARCHAR(200)  | sim         |
data_nascimento    | DATE  | sim         | verificar maioridade (hospedagem de menores exige responsável)

TABELA: quartos
coluna      | tipo          | obrigatória | observação
id          | INT           | sim         | chave primária, auto incremento
numero      | VARCHAR(100)  | sim         | único
valor_diaria| DECIMAL(10,2)   | sim         | 
tipo        | VARCHAR(60)   | sim         |
status       | VARCHAR(20) | sim         |



TABELA: reservas
coluna      | tipo          | obrigatória | observação
id          | INT           | sim         | chave primária, auto incremento
status      | VARCHAR(20)    | sim         |
entrada     | DATE             | sim         |
saida       | DATE             | sim         |
valor_diaria| DECIMAL(10,2)   | sim         | preço congelado no momento da reserva
hospede_id     | INT             | sim         |chave estrangeira → hospedes.id
quarto_id  | INT             | sim         | chave estrangeira → quartos.id
criado_em  | DATETIME             | sim         | saber quando cada uma foi feita.


