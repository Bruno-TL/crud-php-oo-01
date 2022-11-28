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

INSERT INTO tb_professores
(nome,endereco,formacao,status,cpf)
VALUES
('Gleidson','rua tal','HTML,CSS',true,'12345690321'),
('Alê','Rua Jose','PHP,Pedreiro',true,'09876543123'),
('Allan','Rua 2','JS,NEXT',true,'87612334526');

SELECT * FROM tb_professores;


------------------------------------------------------------------------------------------
-- TABLE CURSOS
CREATE TABLE tb_cursos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cargaHoraria VARCHAR(40) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    status TINYINT NOT NULL,
    idCategoria INT NOT NULL,
    FOREIGN KEY (idCategoria) REFERENCES tb_categorias(id)
);

INSERT INTO tb_cursos
(nome, cargaHoraria, descricao, status, idCategoria) VALUES
('Desenvolvedor Full Stack','360hr','Curso para desenvolver softwares',true,1),
('Data Analytucs','190hr','Curso para se tornar um Analista de Dados',true,1),
('Marketing Digital','190hr','Curso para virar um profissional no Marketing',true,2),
('Design e Criaão','190hr','Fazer uns desenhos com um profissional',true,2);

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

SELECT * FROM tb_cursos INNER JOIN tb_categorias ON tb_cursos.idCategoria = tb_categorias.id;

-------------------------------------------------------- TABLE USER

 CREATE TABLE tb_user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(50) NOT NULL
 );

 INSERT INTO tb_user
 ()