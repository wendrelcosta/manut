CREATE DATABASE sistema_carga;

USE sistema_carga;

CREATE TABLE material_carga (
    id INT AUTO_INCREMENT PRIMARY KEY,
    qtd INT (100) NULL,
    bmp VARCHAR(50) NOT NULL,
    nome_carga VARCHAR(100) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    numero_serie VARCHAR(50),
    setor VARCHAR(50) NOT NULL,
    militar_responsavel VARCHAR(100),
    descarregado BOOLEAN DEFAULT FALSE,
    data_descarga DATETIME
);

CREATE TABLE transferencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    qtd INT NULL,
    nome_material VARCHAR(100) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    numero_serie VARCHAR(50),
    bmp VARCHAR(50) NULL,
    setor_origem VARCHAR(50) NOT NULL,
    setor_destino VARCHAR(50) NOT NULL,
    militar_responsavel VARCHAR(50),
    militar_de_destino VARCHAR(50),
    data_transferencia DATE NOT NULL
);