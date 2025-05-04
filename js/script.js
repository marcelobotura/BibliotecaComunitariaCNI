// script.js
function toggleModoEscuro() {
  document.body.classList.toggle("dark-mode");
  const novoTema = document.body.classList.contains("dark-mode") ? "dark-mode" : "";
  localStorage.setItem("theme", novoTema);
}

document.addEventListener("DOMContentLoaded", () => {
  const temaSalvo = localStorage.getItem("theme");
  if (temaSalvo === "dark-mode") {
    document.body.classList.add("dark-mode");
  }

  const botaoToggle = document.getElementById("toggle-dark");
  if (botaoToggle) {
    botaoToggle.addEventListener("click", toggleModoEscuro);
  }
});
