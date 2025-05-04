<?php
include("php/conectar.php");

$sql = "SELECT * FROM livros ORDER BY titulo ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catálogo de Livros</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>📚 Catálogo da Biblioteca</h1>
  </header>

  <main class="catalogo">
    <?php
    if ($result->num_rows > 0) {
      while($livro = $result->fetch_assoc()) {
        echo "<div class='card-livro'>";
        if (!empty($livro['capa'])) {
          echo "<img src='img/" . htmlspecialchars($livro['capa']) . "' alt='Capa do livro'>";
        } else {
          echo "<div class='sem-capa'>Sem Capa</div>";
        }
        echo "<h3>" . htmlspecialchars($livro['titulo']) . "</h3>";
        echo "<p><strong>Autor:</strong> " . htmlspecialchars($livro['autor']) . "</p>";
        echo "<p><strong>Gênero:</strong> " . htmlspecialchars($livro['genero']) . "</p>";
        echo "</div>";
      }
    } else {
      echo "<p>Nenhum livro encontrado.</p>";
    }
    ?>
  </main>
</body>
</html>
