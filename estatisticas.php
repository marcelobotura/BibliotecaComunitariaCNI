<?php
include("php/conectar.php");

// Total de livros
$qtdLivros = $conn->query("SELECT COUNT(*) as total FROM livros")->fetch_assoc()['total'];

// Total de usuários
$qtdUsuarios = $conn->query("SELECT COUNT(*) as total FROM usuarios")->fetch_assoc()['total'];

// Total de empréstimos
$qtdEmprestimos = $conn->query("SELECT COUNT(*) as total FROM emprestimos")->fetch_assoc()['total'];

// Empréstimos pendentes
$pendentes = $conn->query("SELECT COUNT(*) as total FROM emprestimos WHERE devolvido = 0")->fetch_assoc()['total'];

// Livros mais emprestados
$rankingLivros = $conn->query("
    SELECT l.titulo, COUNT(e.id) as total
    FROM emprestimos e
    JOIN livros l ON l.id = e.id_livro
    GROUP BY e.id_livro
    ORDER BY total DESC
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>📊 Estatísticas da Biblioteca</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>📊 Estatísticas</h1>
  </header>

  <main style="max-width:600px;margin:auto;">
    <p><strong>Total de Livros:</strong> <?= $qtdLivros ?></p>
    <p><strong>Total de Leitores:</strong> <?= $qtdUsuarios ?></p>
    <p><strongTotal de Empréstimos:</strong> <?= $qtdEmprestimos ?></p>
    <p><strong>Empréstimos Pendentes:</strong> <?= $pendentes ?></p>

    <h2>📚 Top 5 Livros Mais Emprestados</h2>
    <ol>
      <?php while($livro = $rankingLivros->fetch_assoc()): ?>
        <li><?= htmlspecialchars($livro['titulo']) ?> – <?= $livro['total'] ?> empréstimos</li>
      <?php endwhile; ?>
    </ol>
  </main>
</body>
</html>
