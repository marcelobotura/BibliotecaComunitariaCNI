<?php
include("php/conectar.php");

$sql = "SELECT e.*, l.titulo, u.nome
        FROM emprestimos e
        JOIN livros l ON l.id = e.id_livro
        JOIN usuarios u ON u.id = e.id_usuario
        ORDER BY e.data_emprestimo DESC";

$result = $conn->query($sql);

echo "<h2>Lista de Empréstimos</h2>";

while ($row = $result->fetch_assoc()) {
  echo "<div class='card-livro'>";
  echo "<p><strong>Livro:</strong> " . htmlspecialchars($row['titulo']) . "</p>";
  echo "<p><strong>Leitor:</strong> " . htmlspecialchars($row['nome']) . "</p>";
  echo "<p><strong>Data do Empréstimo:</strong> " . $row['data_emprestimo'] . "</p>";
  echo "<p><strong>Devolução até:</strong> " . $row['data_devolucao'] . "</p>";
  echo "<p><strong>Status:</strong> " . ($row['devolvido'] ? '✅ Devolvido' : '⏳ Pendente') . "</p>";

  if (!$row['devolvido']) {
    echo "<form method='POST' action='php/devolver_livro.php'>
            <input type='hidden' name='id' value='{$row['id']}'>
            <button type='submit'>Marcar como Devolvido</button>
          </form>";
  }

  echo "</div><hr>";
}
?>
