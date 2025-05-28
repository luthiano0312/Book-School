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
    FOREIGN KEY (id_escola) REFERENCES escola(id_escola)
);

CREATE TABLE alunos (
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    id_escola INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    FOREIGN KEY (id_escola) REFERENCES escola(id_escola)
);

CREATE TABLE livro (
    id_livro INT AUTO_INCREMENT PRIMARY KEY,
    id_escola INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    genero VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (id_escola) REFERENCES escola(id_escola)
);

CREATE TABLE emprestimo (
    id_emprestimo INT AUTO_INCREMENT PRIMARY KEY,
    id_aluno INT NOT NULL,
    id_livro INT NOT NULL,
    id_bibliotecario INT NOT NULL,
    data_emprestimo DATE NOT NULL,
    data_devolucao DATE NOT NULL,
    status ENUM('ativo', 'finalizado'),
    FOREIGN KEY (id_aluno) REFERENCES aluno(id_aluno),
    FOREIGN KEY (id_livro) REFERENCES livro(id_livro),
    FOREIGN KEY (id_bibliotecario) REFERENCES bibliotecario(id_bibliotecario)
);