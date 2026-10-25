SELECT nome, telefone, FROM hospedes WHERE data_nascimento > '1980-01-01' ORDER BY nome;


UPDATE reservas set status = 'Confirmada' WHERE id = 1;



DELETE from quartos WHERE id = 7;


/*

Nome e telefone de todos os hóspedes, em ordem alfabética.
Os quartos disponíveis, do mais barato para o mais caro.
As reservas que ainda podem ser canceladas (lembra da regra do podeCancelar()? Use o IN).
Os hóspedes que têm “de” no nome.
As reservas com entrada em outubro de 2026.

Alterações (UPDATE):

A reserva 6 está “Hospedado” num quarto em “Manutenção” (o quarto 4), lembra? Corrija o status do quarto para “Disponível”.
Confirme a reserva 1.
O teste do preço congelado: a pousada vai reajustar o quarto 3 em 10%. Atualize o valor da diária dele:
sql
   UPDATE quartos SET valor_diaria = valor_diaria * 1.10 WHERE id = 3;

Depois, consulte a reserva 3, que é desse quarto. O valor dela mudou? Por quê? 😉

Exclusões (DELETE):

Tente apagar o hóspede 1 (o Marcos, que tem reservas). O que acontece? Leia a mensagem.
Cadastre um quarto de teste (número '99') e depois apague-o. Por que este funciona e o do Marcos não?


*/


SELECT nome, telefone FROM hospedes ORDER BY nome;

SELECT * FROM quartos ORDER BY valor_diaria ASC WHERE status = 'Disponível';

SELECT * FROM reservas WHERE status IN ('Pendente','Confirmada');

SELECT * FROM hospedes WHERE nome LIKE '%de%';

SELECT * FROM reservas WHERE entrada BETWEEN '2026-10-01' and '2026-10-31';

UPDATE reservas SET quarto_id = 4 WHERE id = 6;

UPDATE reservas SET status = 'Confirmada' WHERE id = 1;

UPDATE quartos SET valor_diaria = valor_diaria * 1.10 WHERE id = 3;

SELECT * FROM reservas WHERE id = 3;

DELETE FROM hospedes WHERE id = 1;

INSERT INTO quartos (numero,valor_diaria,tipo,status) VALUES('99',109.50,'Simples','Disponível');

DELETE FROM quartos WHERE id = 7;

UPDATE quartos SET STATUS = 'Disponível' WHERE id = 4;