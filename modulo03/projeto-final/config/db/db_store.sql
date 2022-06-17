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

CREATE TABLE tb_product(
  id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  description VARCHAR(100) NOT NULL,
  photo VARCHAR(255),
  price FLOAT(5,2) NOT NULL,
  category_id INT(11) NOT NULL,
  quantity INT(5) NOT NULL,
  created_at DATETIME NOT NULL
);

