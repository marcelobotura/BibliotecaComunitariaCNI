<?php
$conn = new mysqli("localhost", "usuario", "senha", "biblioteca");
if ($conn->connect_error) {
    die("Erro: " . $conn->connect_error);
}
?>