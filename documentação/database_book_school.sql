CREATE DATABASE bookSchool;
USE bookSchool;

CREATE TABLE escolas (
    id_escola INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cidade VARCHAR(255) NOT NULL,
    cnpj VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE bibliotecarios (
    id_bibliotecario INT AUTO_INCREMENT PRIMARY KEY,
    id_escola INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_escola) REFERENCES escolas(id_escola)
);

CREATE TABLE alunos (
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    id_escola INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    serie VARCHAR(255) NOT NULL,
    matricula INT(255) NOT NULL, 
    FOREIGN KEY (id_escola) REFERENCES escolas(id_escola)
);

CREATE TABLE livros (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    id_escola INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    ano_publicacao INT NOT NULL,
    genero VARCHAR(255) NOT NULL,
    editora VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_escola) REFERENCES escolas(id_escola)
);

CREATE TABLE emprestimos (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    id_livro INT NOT NULL,
    id_bibliotecario INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE NOT NULL,
    status ENUM('ativo', 'finalizado'),
    FOREIGN KEY (id_aluno) REFERENCES alunos(id_aluno),
    FOREIGN KEY (id_livro) REFERENCES livros(id_livro),
    FOREIGN KEY (id_bibliotecario) REFERENCES bibliotecarios(id_bibliotecario)
);

INSERT INTO escolas (NOME, CIDADE, CNPJ) VALUES ("EEEP", "Russas", 123);