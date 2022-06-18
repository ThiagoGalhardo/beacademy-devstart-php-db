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
('Eletrônicos', 'TVs, caixa de som, smartphone e etc.');

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


INSERT INTO tb_product (name, description, photo, price, category_id, quantity, created_at)
VALUES
('Calça', 'Calça jeans feminina', 'https://images.tcdn.com.br/img/img_prod/891360/calca_jeans_wide_leg_talita_jeans_claro_757_1_558d4b0f9cad2fd2fd453321fde75c30.jpg', 189.90, 1, 21, '2022-06-16 21:20:45'),
('Camisa', 'Camisa social', 'https://cf.shopee.com.br/file/71aa67ec03899e5d57ec2f9e23dfe344', 249.90, 2, 13, '2022-06-17 17:14:45');
