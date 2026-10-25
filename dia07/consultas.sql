-- =============================================
-- CONSULTAS (SELECT): podem ser executadas à vontade
-- =============================================

-- 1. Nome e telefone de todos os hóspedes, em ordem alfabética
SELECT nome, telefone FROM hospedes ORDER BY nome;

-- 2. Quartos disponíveis, do mais barato para o mais caro
-- (o WHERE vem antes do ORDER BY: primeiro filtra, depois ordena)
SELECT * FROM quartos WHERE status = 'Disponível' ORDER BY valor_diaria ASC;

-- 3. Reservas que ainda podem ser canceladas (mesma regra do podeCancelar)
SELECT * FROM reservas WHERE status IN ('Pendente', 'Confirmada');

-- 4. Hóspedes com "de" no nome
-- Atenção: '%de%' também encontra "de" no meio de palavras (Fagun-de-s).
-- Para buscar só a palavra "de": LIKE '% de %'
SELECT * FROM hospedes WHERE nome LIKE '%de%';

-- 5. Reservas com entrada em outubro de 2026
SELECT * FROM reservas WHERE entrada BETWEEN '2026-10-01' AND '2026-10-31';


-- =============================================
-- ALTERAÇÕES (UPDATE e DELETE): JÁ EXECUTADAS
-- Ficam comentadas para não serem repetidas sem querer.
-- Regra: sempre um SELECT com o mesmo WHERE antes!
-- =============================================

-- 6. Quarto 4 saiu da manutenção (tinha um hóspede nele)
-- UPDATE quartos SET status = 'Disponível' WHERE id = 4;

-- 7. Confirmar a reserva 1
-- UPDATE reservas SET status = 'Confirmada' WHERE id = 1;

-- 8. Reajuste de 10% no quarto 3 (de 129,33 para 142,26)
-- UPDATE quartos SET valor_diaria = valor_diaria * 1.10 WHERE id = 3;
-- Erro cometido: executado duas vezes (virou 156,49). Correção:
-- UPDATE quartos SET valor_diaria = 142.26 WHERE id = 3;
-- Resultado: a reserva 3 continuou com 129,33 (preço congelado na reserva).
SELECT * FROM reservas WHERE id = 3;

-- 9. Tentar apagar o hóspede 1 (Marcos, que tem reservas)
-- Erro 1451: Cannot delete or update a parent row (a chave estrangeira protege as reservas)
-- DELETE FROM hospedes WHERE id = 1;

-- 10. Quarto de teste: cadastrado e apagado
-- Funciona porque nenhuma reserva aponta para ele.
-- INSERT INTO quartos (numero, valor_diaria, tipo, status) VALUES ('99', 109.50, 'Simples', 'Disponível');
-- DELETE FROM quartos WHERE id = 7;