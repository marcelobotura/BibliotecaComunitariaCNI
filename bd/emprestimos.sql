CREATE TABLE emprestimos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_usuario INT,
  id_livro INT,
  data_emprestimo DATE,
  data_devolucao DATE,
  devolvido BOOLEAN DEFAULT FALSE
);

INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido)
VALUES (1, 1, '2025-04-27', '2025-05-04', 0);

INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido)
VALUES (2, 2, '2025-04-26', '2025-05-03', 1);

INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido)
VALUES (3, 3, '2025-04-29', '2025-05-06', 0);

INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido)
VALUES (4, 4, '2025-04-25', '2025-05-02', 1);

INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao, devolvido)
VALUES (5, 5, '2025-04-28', '2025-05-05', 0);
