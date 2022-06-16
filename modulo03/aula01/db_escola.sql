--  Para criar um banco de dados --
CREATE DATABASE db_escola;

-- Selecionar o banco de dados --
USE db_escola;

-- Criar tabela --
CREATE TABLE tb_professor(
  nome VARCHAR(100) NOT NULL,
  cpf CHAR(11) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL
);

-- Inserir dados --
INSERT INTO tb_professor(nome, email, cpf)
VALUES(
  'Thiago', 'thi@email.com', '12312312312' 
);

INSERT INTO tb_professor(nome, email, cpf)
VALUES(
  'João', 'joao@email.com', '22312312312' 
);

-- Excluir tabela --
DROP TABLE tb_professor;


-- Selecionar dados --
SELECT * FROM tb_professor;

