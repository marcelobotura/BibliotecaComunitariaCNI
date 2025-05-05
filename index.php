<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Biblioteca Comunitária CNI</title>
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
  <header>
    <h1>📚 Biblioteca Comunitária CNI</h1>
  </header>

  <main class="menu">
    <a href="catalogo.php">📖 Ver Catálogo</a>
    <a href="login.html">🔐 Login</a>
    <a href="busca.html">🔎 Buscar Livro</a>
    <a href="estatisticas.php">📊 Estatísticas</a>
    <a href="emprestar.html">📦 Registrar Empréstimo</a>
    <a href="listar_emprestimos.php">📋 Ver Empréstimos</a>
  </main>

  <footer>
    <p>&copy; <?= date('Y') ?> Biblioteca CNI</p>
    <button id="toggle-dark">🌓 Modo Escuro</button>
  </footer>

  <script>
    document.getElementById('toggle-dark').addEventListener('click', function () {
      document.body.classList.toggle('dark-mode');
    });
  </script>
</body>
</html>
