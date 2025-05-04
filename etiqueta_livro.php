<?php
include("php/conectar.php");

$id = $_GET['id'] ?? 0;
$sql = "SELECT * FROM livros WHERE id = $id";
$livro = $conn->query($sql)->fetch_assoc();

if (!$livro) {
  echo "Livro não encontrado.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Etiqueta do Livro</title>
  <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/qrcodejs@1.0.0/qrcode.min.js"></script>
  <style>
    body { font-family: sans-serif; text-align: center; padding: 2rem; }
    .codigo { margin-top: 2rem; }
    .capa { max-height: 200px; margin-bottom: 1rem; }
  </style>
</head>
<body>
  <h1>📖 <?= htmlspecialchars($livro['titulo']) ?></h1>
  <p><strong>Autor:</strong> <?= htmlspecialchars($livro['autor']) ?></p>
  <img src="img/<?= $livro['capa'] ?>" class="capa" alt="Capa do livro">

  <div class="codigo">
    <h2>📷 QR Code</h2>
    <div id="qrcode"></div>

    <h2>📦 Código de Barras</h2>
    <svg id="barcode"></svg>
  </div>

  <script>
    // Gera QR Code com link ou ID
    new QRCode(document.getElementById("qrcode"), {
      text: "https://seusite.com/livro.php?id=<?= $livro['id'] ?>",
      width: 128,
      height: 128
    });

    // Gera Código de Barras com ISBN ou ID
    JsBarcode("#barcode", "<?= $livro['isbn'] ?: $livro['id'] ?>", {
      format: "CODE128",
      lineColor: "#000",
      width: 2,
      height: 60,
      displayValue: true
    });
  </script>
</body>
</html>

