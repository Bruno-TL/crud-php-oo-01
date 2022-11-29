CREATE DATABASE db_escola;

USE db_escola;

-- TABLE ALUNOS

CREATE TABLE tb_alunos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    matricula VARCHAR(20) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    status TINYINT NOT NULL,
    genero VARCHAR(20) NOT NULL,
    dataNascimento DATETIME NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);

INSERT INTO tb_alunos (nome, matricula, email, status, genero, dataNascimento, cpf)
VALUES 
('Bruno','2021073', 'bruno@email.com', true, 'Masculino', '2001-02-06', '12323434534'),
('Thalia','2021456', 'thalia@email.com', true, 'Feminio', '2001-12-06', '12323433456'),
('Luke','2021078', 'luke@email.com', true, 'Masculino', '2012-02-06', '56783434534');

SELECT * FROM tb_alunos;

------------------------------------------------------------------------------------------
-- TABLE PROFESSORES
CREATE TABLE tb_professores (
    id INT PRIMARY KEY AUTO_INCREMENT,
    endereco VARCHAR(45) NOT NULL,
    formacao VARCHAR(45) NOT NULL,
    status TINYINT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(11) UNIQUE NOT NULL
);

INSERT INTO tb_professores (endereco,formacao,status,nome,cpf)
VALUES
('rua tal','HTML,CSS',true,'Gleidson','12345690321'),
('Rua Jose','PHP,Pedreiro',true,'Alê','09876543123'),
('Rua 2','JS,NEXT',true,'Allan','87612334526');

SELECT * FROM tb_professores;


------------------------------------------------------------------------------------------
-- TABLE CURSOS
CREATE TABLE tb_cursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cargaHoraria VARCHAR(50) NOT NULL,
    descricao VARCHAR(100) UNIQUE NOT NULL,
    status TINYINT NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES tb_categorias(id)
);

INSERT INTO tb_cursos
(nome, cargaHoraria, descricao, status, categoria_id)
VALUES
('Design','192','profissional de design',1,2);


SELECT * FROM tb_cursos;

-------------------------------------------------------- TABLE CATEGORIA
CREATE TABLE tb_categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL
);

INSERT INTO tb_categorias (nome)
VALUES ('Formação'),('Imersivo'),('Itensivo');

--A palavra- INNER JOINchave seleciona registros que possuem 
--valores correspondentes em ambas as tabelas.

SELECT * FROM tb_cursos INNER JOIN tb_categorias ON tb_cursos.categoria_id = tb_categorias.id;

-------------------------------------------------------- TABLE USER

CREATE TABLE tb_user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(50) NOT NULL
);

 INSERT INTO tb_user
 (nome,email,senha,perfil)
 VALUES
 ('Bruno','bruno@email.com','1234','br');