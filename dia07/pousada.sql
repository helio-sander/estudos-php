CREATE DATABASE pousada
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE pousada;

CREATE TABLE hospedes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14) NOT NULL UNIQUE,
    telefone VARCHAR(40) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    data_nascimento DATE NOT NULL
);



CREATE TABLE quartos(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    numero VARCHAR(10) NOT NULL UNIQUE, 
    valor_diaria DECIMAL(10,2) NOT NULL, 
    tipo VARCHAR(60) NOT NULL,
    status VARCHAR(20) NOT NULL
);


CREATE TABLE reservas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(20) DEFAULT 'Pendente' NOT NULL,
    entrada DATE NOT NULL,
    saida DATE NOT NULL,
    valor_diaria DECIMAL (10,2) NOT NULL,
    hospede_id INT NOT NULL,
    quarto_id INT NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL,
    FOREIGN KEY(hospede_id) REFERENCES hospedes(id),
    FOREIGN KEY(quarto_id) REFERENCES quartos(id)
);