// script.js
document.getElementById('toggle-dark').addEventListener('click', function () {
    document.body.classList.toggle('dark-mode');
  });


  // Aplicar modo escuro salvo
const temaSalvo = localStorage.getItem("theme");
if (temaSalvo === "dark-mode") {
  document.body.classList.add("dark-mode");
}

// Alternar modo escuro
function toggleModoEscuro() {
  document.body.classList.toggle("dark-mode");
  const novoTema = document.body.classList.contains("dark-mode") ? "dark-mode" : "";
  localStorage.setItem("theme", novoTema);
}
