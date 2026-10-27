/*


1 Liste as reservas com o nome do hóspede (duas tabelas).
2 Liste as reservas com o nome do hóspede, o número e o tipo do quarto, a entrada, a saída e o status, ordenadas pela data de entrada.
3 A recepção quer ligar para os hóspedes com reserva Confirmada ou Hospedado. Liste o nome, o telefone e o número do quarto deles.
4 Liste todas as reservas do Marcos de Souza, com o número do quarto e o status. (Dica: o filtro é pelo nome, que está na tabela de hóspedes.)
JOIN x LEFT JOIN:
5 Cadastre um hóspede novo, sem nenhuma reserva.
6 Liste todos os hóspedes com o id e o status das reservas deles, primeiro com JOIN e depois com LEFT JOIN 
(FROM hospedes h LEFT JOIN reservas r ON ...).
7 Compare: o hóspede novo aparece nos dois? O que aparece nas colunas da reserva dele?
8 Desafio (opcional): o total da reserva no SQL

Lembra do calcularTotal() da sua classe? Dá para fazer a conta no próprio SQL. Duas funções novas:

DATEDIFF(saida, entrada): a diferença em dias entre duas datas, ou seja, o número de diárias
IF(condição, valor_se_sim, valor_se_não): o if do SQL, numa linha só


*/




SELECT hospedes.nome,reservas.id FROM reservas INNER JOIN hospedes ON reservas.hospedes_id = hospedes.id;

SELECT hospedes.nome,quartos.numero, tipo.quartos, reservas.entrada,reservas.saida,reservas.status FROM reservas INNER JOIN hospedes 
ON reservas.hospede_id = hospedes.id  INNER JOIN quartos ON quartos.id = reservas.quarto_id ORDER BY entrada;


SELECT hospedes.nome,hospedes.telefone,quartos.numero, reservas.id FROM reservas INNER JOIN hospedes ON reservas.hospede_id = hospedes.id 
INNER JOIN quartos ON
quartos.id = reservas.quarto_id;


SELECT hospedes.nome, quartos.numero,reservas.status FROM reservas INNER JOIN hospedes ON reservas.hospede_id = hospedes.id 
JOIN quartos ON reservas.quarto_id = quartos.id WHERE hospedes.nome = 'Marcos de Souza';

INSERT INTO hospedes (nome, cpf, telefone, endereco,data_nascimento) VALUES('Joel da Costa','323.332.233-09','(34)9-9987-3343','Rua Yajoules 544  - Ubatuba - SP','2000-09-12');

SELECT hospedes.nome, hospedes.id, reservas.status FROM reservas JOIN hospedes ON reservas.hospede_id = hospedes.id;

SELECT hospedes.nome,hospedes.id, reservas.status FROM hospedes LEFT JOIN reservas ON reservas.hospede_id = hospedes.id;

SELECT hospedes.nome,hospedes.id, reservas.status FROM hospedes JOIN reservas ON reservas.hospede_id = hospedes.id;

Compare: o hóspede novo aparece nos dois? O que aparece nas colunas da reserva dele? o novo hospede aparece apenas na query que tem a consulta com LEFT JOIN pois o LEFT JOIN
mostra todos os registros COM ou sem correspondência. já o join faz um filtro e mostra apenas os que tem correspondência e por isso não apresenta os hospedes sem status.


3 A recepção quer ligar para os hóspedes com reserva Confirmada ou Hospedado. Liste o nome, o telefone e o número do quarto deles.
SELECT hospedes.nome, hospedes.telefone, reservas.status, reservas.id,quartos.numero FROM reservas JOIN hospedes ON reservas.hospede_id = hospedes.id 
JOIN quartos
ON reservas.quarto_id = quartos.id WHERE reservas.status IN ('Confirmada','Hospedado');

/*
O enunciado

Monte uma consulta que mostre, para cada reserva:

O nome do hóspede
O número do quarto
O número de diárias
O valor da diária
O total da reserva, com 10% de desconto para estadias de 7 diárias ou mais
*/

SELECT hospedes.nome, quartos.numero,reservas.valor_diaria as valor,reservas.entrada, reservas.saida, 
DATEDIFF(reservas.saida, reservas.entrada) as Dias, IF ( DATEDIFF(reservas.saida, reservas.entrada) >= 7, ROUND (DATEDIFF (reservas.saida, reservas.entrada) * reservas.valor_diaria  * 0.9,2), ROUND( DATEDIFF (reservas.saida, reservas.entrada) * reservas.valor_diaria ,2) )  AS Total FROM reservas 
INNER JOIN quartos ON reservas.quarto_id = quartos.id INNER JOIN hospedes ON reservas.hospede_id = hospedes.id;

