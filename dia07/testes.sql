/* TESTES DE ERRO (não executar)
   Cada comando abaixo foi executado de propósito para provar uma proteção do banco.

-- UNIQUE: erro 1062 Duplicate entry (CPF já cadastrado para o Marcos)
INSERT INTO hospedes (nome, cpf, telefone, endereco, data_nascimento)
VALUES ('Guiuliar Moares', '094.443.344-90', '(34)0-00009-0099', 'Rua J 322', '2001-09-12');

-- FOREIGN KEY: erro 1452 foreign key constraint fails (não existe hóspede 99)
INSERT INTO reservas (status, entrada, saida, valor_diaria, hospede_id, quarto_id)
VALUES ('Pendente', '2026-01-20', '2026-01-23', 122, 99, 1);

-- NOT NULL: erro 1364 Field 'valor_diaria' doesn't have a default value
INSERT INTO quartos (numero, tipo, status) VALUES ('32', 'Simples', 'Disponível');

-- NOT NULL: erro 1364 Field 'nome' doesn't have a default value (coluna nome ausente)
INSERT INTO hospedes (cpf, telefone) VALUES ('34344444343', '(34)9-99990909');

-- TIPO: erro 1366 Incorrect decimal value (texto vazio não é número)
INSERT INTO reservas (status, entrada, saida, valor_diaria, hospede_id, quarto_id)
VALUES ('Pendente', '2026-01-20', '2026-01-23', '', 1, 1);

-- ATENÇÃO: nome vazio ('') é ACEITO pelo NOT NULL.
-- O erro abaixo foi do endereço ausente, e não do nome.
-- Para bloquear texto vazio: CHECK (TRIM(nome) <> '') ou validação no PHP.
INSERT INTO hospedes (nome, cpf, telefone) VALUES ('', '34344444343', '(34)9-99990909');
*/