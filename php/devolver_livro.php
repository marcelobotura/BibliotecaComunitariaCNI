<?php
include("conectar.php");

$id = $_POST['id'];
$sql = "UPDATE emprestimos SET devolvido = 1 WHERE id = $id";

if ($conn->query($sql)) {
  header("Location: ../listar_emprestimos.php");
  exit;
} else {
  echo "Erro ao atualizar devolução: " . $conn->error;
}
?>
