/* 5 hóspedes, com dados variados. ok
6 quartos, de tipos diferentes (por exemplo: Simples, Casal, Suíte), com números e valores variados. Use os status que fizerem sentido para os quartos, como “Disponível” e “Manutenção”.
6 reservas, ligando hóspedes e quartos, com:
status variados (Pendente, Confirmada, Hospedado, Finalizada, Cancelada)
pelo menos um hóspede com duas reservas (o relacionamento 1 para N!)
pelo menos uma reserva com 7 diárias ou mais, para o desconto aparecer depois
o valor_diaria copiado do quarto reservado (o preço “congelado”)  */


INSERT INTO hospedes (nome,cpf,telefone,endereco,data_nascimento) VALUES
('Marcos de Souza','094.443.344-90','(34)9-9998-9009','Rua Jorge da Cunha 323 - Bairro Xtech - Ribeirão Preto - SP','1980-09-11'),
('Fernando de Melo','094.333.233-09','(11)9-9887-0988','Rua Almeirando Barbosa 321 - Bairro Xinossi - Uberlândia - MG','1974-09-09'),
('Joana Freitas','877.332.233-09','(21)9-9888-0971','Rua do Amor 432 - Bairro Alcolumbre - Rio de Janeiro - RJ','1985-03-30'),
('Jefersson de Aquilo Barbosa','323.333.233-09','(11)9-9874-0988','Rua de Felicidade 434 - Bairro Arborinho - Guarujá - SP','1965-09-21'),
('Amanda Fagundes', '233.333.665-09','(11)9-9443-0988','Rua da Coceira 987 0 Bairro Ferdinando - Rio das Ostras - RJ','1993-09-23');



INSERT INTO quartos (numero,valor_diaria,tipo,status)VALUES
('20',109.33,'Simples','Disponível'),
('21',199.33,'Suíte','“Manutenção”')
('22',129.33,'Casal','Disponível')
('23',149.33,'Simples','“Manutenção”')
('24',119.33,'Casal','Disponível')
('25',169.33,'Suíte','Disponível')



INSERT INTO reservas(status,entrada,saida,valor_diaria,hospede_id,quarto_id)VALUES
('Pendente','2025-09-01','2025-09-10',101.50,1,1),
('Pendente','2026-08-11','2026-08-18',102.50,2,2),
('Pendente','2025-09-10','2025-09-19',121.50,3,3),
('Pendente','2023-09-01','2025-09-10',101.50,4,5),
('Pendente','2022-09-01','2025-09-10',107.50,1,1),
('Pendente','2021-09-01','2025-09-10',154.50,5,4)

