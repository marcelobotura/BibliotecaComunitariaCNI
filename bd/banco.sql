CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    genero VARCHAR(100),
    ano INT,
    editora VARCHAR(100),
    sinopse TEXT,
    capa VARCHAR(255),
    isbn VARCHAR(20),
    etiquetas VARCHAR(255)
);

INSERT INTO livros (titulo, autor, genero, ano, editora, sinopse, capa, isbn, etiquetas) VALUES
('Nostrum quisquam reprehenderit ad', 'Isabella Farias', 'Suspense', '1998', 'Palavra & Arte', 'Praesentium corporis nisi fuga fuga consequuntur itaque. Occaecati quaerat officia ipsum. Aliquam minus excepturi eaque inventore adipisci eaque.', 'capa1.jpg', '9781420537819', 'recusandae, cupiditate, quos'),
('Quia repellendus rem', 'Yuri Ribeiro', 'Drama', '1951', 'Leitura Viva', 'Dolor voluptates voluptatibus mollitia quam. Aut omnis occaecati error magni nam rem.', 'capa2.jpg', '9780047824906', 'illo, ut, labore'),
('Omnis aspernatur', 'Sra. Lorena Fogaça', 'Suspense', '1969', 'Editora Beta', 'Labore nihil totam sint. Odio harum provident. Temporibus veniam corporis tempora qui quisquam.', 'capa3.jpg', '9780677957975', 'eveniet, laudantium, voluptas'),
('Et mollitia', 'Lara Caldeira', 'Ficção', '1978', 'Editora Beta', 'Inventore minima et quos perferendis quidem. Ipsa impedit laborum minima.', 'capa4.jpg', '9780276336577', 'esse, expedita, vitae');
('Fugiat ducimus distinctio porro', 'João Gabriel Moreira', 'História', '1991', 'Nova Letra', 'Nesciunt dolorum iusto expedita eos architecto. Soluta illum rem magni asperiores. Culpa reiciendis suscipit iure. Minima soluta saepe occaecati adipisci laudantium sequi.', 'capa5.jpg', '9780418356920', 'commodi, quos, similique');




CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(255),
    tipo ENUM('leitor', 'admin') DEFAULT 'leitor'
);

CREATE TABLE emprestimos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_livro INT,
    data_emprestimo DATE,
    data_devolucao DATE,
    devolvido BOOLEAN DEFAULT FALSE
);


INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido) VALUES (2, 7, '2024-03-21', '2024-04-04', 1);
INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido) VALUES (5, 14, '2024-03-25', '2024-04-08', 0);
INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido) VALUES (1, 19, '2024-04-10', '2024-04-24', 1);
INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido) VALUES (9, 3, '2024-03-15', '2024-03-29', 0);
INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido) VALUES (4, 26, '2024-04-01', '2024-04-15', 1);


