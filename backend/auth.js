// backend/auth.js
const express = require('express');
const router = express.Router();
const db = require('../config/db-config');
const bcrypt = require('bcrypt');
const jwt = require('jsonwebtoken');

const SECRET = 'sua_chave_secreta_segura'; // guarde isso bem!

// Rota de login
router.post('/login', (req, res) => {
  const { usuario, senha } = req.body;

  db.query('SELECT * FROM usuarios WHERE email = ?', [usuario], (err, results) => {
    if (err) return res.status(500).json({ error: 'Erro interno no servidor' });

    if (results.length === 0) {
      return res.status(401).json({ error: 'Usuário não encontrado' });
    }

    const user = results[0];
    bcrypt.compare(senha, user.senha, (err, isMatch) => {
      if (!isMatch) {
        return res.status(401).json({ error: 'Senha incorreta' });
      }

      const token = jwt.sign({ id: user.id, tipo: user.tipo }, SECRET, { expiresIn: '1d' });
      res.json({ token, nome: user.nome, tipo: user.tipo });
    });
  });
});

module.exports = router;
