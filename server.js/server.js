// server.js
const express = require('express');
const cors = require('cors');
const app = express();
const authRoutes = require('./backend/auth');
const livrosRoutes = require('./backend/livros');

app.use(cors());
app.use(express.json());

// Rotas principais
app.use('/api/auth', authRoutes);
app.use('/api/livros', livrosRoutes);

// Porta
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Servidor rodando em http://localhost:${PORT}`);
});