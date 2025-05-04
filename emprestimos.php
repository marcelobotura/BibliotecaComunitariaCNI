<?php
include("conectar.php");

$id_usuario = $_POST['id_usuario'];
$id_livro = $_POST['id_livro'];
$data_emprestimo = date("Y-m-d");
$data_devolucao = $_POST['data_devolucao'];

$sql = "INSERT INTO emprestimos (id_usuario, id_livro, data_emprestimo, data_devolucao)
        VALUES ('$id_usuario', '$id_livro', '$data_emprestimo', '$data_devolucao')";

if ($conn->query($sql)) {
  echo "✅ Empréstimo registrado com sucesso.";
} else {
  echo "❌ Erro ao registrar: " . $conn->error;
}
?>
