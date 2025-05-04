// Buscar dados do Google Books via ISBN
document.getElementById("buscarISBN").addEventListener("click", function () {
    const isbn = document.getElementById("isbn").value.trim();
    if (!isbn) return alert("Digite um ISBN válido!");
  
    fetch(`https://www.googleapis.com/books/v1/volumes?q=isbn:${isbn}`)
      .then(response => response.json())
      .then(data => {
        if (!data.items) {
          alert("Livro não encontrado.");
          return;
        }
  
        const book = data.items[0].volumeInfo;
  
        document.getElementById("titulo").value = book.title || "";
        document.getElementById("autor").value = (book.authors || []).join(", ");
        document.getElementById("editora").value = book.publisher || "";
        document.getElementById("ano").value = book.publishedDate ? book.publishedDate.substring(0, 4) : "";
        document.getElementById("sinopse").value = book.description || "";
      })
      .catch(() => alert("Erro ao buscar dados."));
  });
  