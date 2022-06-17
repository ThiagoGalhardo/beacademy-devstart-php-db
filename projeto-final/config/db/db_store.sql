--  Para criar um banco de dados --
CREATE DATABASE db_store;

-- Selecionar o banco de dados --
USE db_store;

CREATE TABLE tb_category(
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(100) NOT NULL
);

INSERT INTO tb_category (name, description)
VALUES
('Informática', 'Produtos para informática e acessórios para computador'),
('Escritório', 'Canetas, cadernos, folhas e etc.'),
('Eletronicos', 'TVs, caixa de som, smartphone e etc.');