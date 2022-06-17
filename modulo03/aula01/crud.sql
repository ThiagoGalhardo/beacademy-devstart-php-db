USE db_escola;

-- Inserir 1 registro --
INSERT INTO tb_professor(nome, email, cpf)
VALUES('Zezim das Pamonhas', 'zepamonha@email.com', '42312312312');

-- Inserir mais de 1 registro --
INSERT INTO tb_professor(nome, email, cpf)
VALUES
('João do Pinhão', 'jopinhao@email.com', '45312312312'),
('Osvaldo dos Caldos', 'oscaldos@email.com', '48512312312'),
('Sonia da Sanfona', 'sosanfona@email.com', '42389312312');

-- Excluir 1 registro --
DROP FROM tb_professor WHERE id='2';

-- Excluir todos --
DROP FROM tb_professor;


-- Editar dados de 1 registro --
UPDATE tb_professor SET nome='Flavia das flautas' WHERE cpf='42389312312';

-- Editar dados de 1 registro com mais campos--
UPDATE tb_professor SET nome='Flavia das flautas', email='flaflautas@email.com' WHERE cpf='42389312312';


-- Selecionar dados de todos professores --
SELECT * FROM tb_professor;

-- Selecionar dados do professor de id=3 --
SELECT * FROM tb_professor WHERE id='3';

-- Selecionar alguns dados de todos os professores --
SELECT nome, cpf FROM tb_professor;