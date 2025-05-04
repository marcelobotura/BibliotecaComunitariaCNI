<?php
include("conectar.php");

$id = $_POST['id'];

$sql = "UPDATE emprestimos SET devolvido = 1 WHERE id = $id";
$conn->query($sql);

header("Location: ../listar_emprestimos.php");
exit;
?>
