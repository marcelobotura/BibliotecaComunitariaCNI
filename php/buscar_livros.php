<?php
include("conectar.php");

$titulo = $_GET['titulo'] ?? '';
$autor = $_GET['autor'] ?? '';
$genero = $_GET['genero'] ?? '';
$palavra = $_GET['palavra'] ?? '';

$sql = "SELECT * FROM livros WHERE 1=1";

if (!empty($titulo)) {
    $sql .= " AND titulo LIKE '%$titulo%'";
}
if (!empty($autor)) {
    $sql .= " AND autor LIKE '%$autor%'";
}
if (!empty($genero)) {
    $sql .= " AND genero LIKE '%$genero%'";
}
if (!empty($palavra)) {
    $sql .= " AND sinopse LIKE '%$palavra%'";
}

$result = $conn->query($sql);

echo "<h2>Resultados da Busca:</h2>";

if ($result->num_rows > 0) {
    while($livro = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #ccc; margin:10px; padding:10px'>";
        echo "<strong>" . htmlspecialchars($livro['titulo']) . "</strong><br>";
        echo "Autor: " . htmlspecialchars($livro['autor']) . "<br>";
        echo "Gênero: " . htmlspecialchars($livro['genero']) . "<br>";
        echo "<p>" . htmlspecialchars($livro['sinopse']) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>Nenhum livro encontrado.</p>";
}
?>
