<?php
include("php/conectar.php");

$sql = "SELECT e.*, l.titulo, u.nome 
        FROM emprestimos e
        JOIN livros l ON l.id = e.id_livro
        JOIN usuarios u ON u.id = e.id_usuario
        ORDER BY e.data_emprestimo DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>📋 Empréstimos</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header><h1>📋 Lista de Empréstimos</h1></header>
  <main>

<?php while ($row = $result->fetch_assoc()): ?>
  <div class="card-livro">
    <p><strong>Livro:</strong> <?= htmlspecialchars($row['titulo']) ?></p>
    <p><strong>Leitor:</strong> <?= htmlspecialchars($row['nome']) ?></p>
    <p><strong>Data do Empréstimo:</strong> <?= $row['data_emprestimo'] ?></p>
    <p><strong>Devolução até:</strong> <?= $row['data_devolucao'] ?></p>
    <p><strong>Status:</strong> <?= $row['devolvido'] ? '✅ Devolvido' : '⏳ Pendente' ?></p>

    <?php if (!$row['devolvido']): ?>
      <form method="POST" action="php/devolver_livro.php">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <button type="submit">Marcar como Devolvido</button>
      </form>
    <?php endif; ?>
  </div>
<?php endwhile; ?>

  </main>
</body>
</html>
