// config/db-config.js
const mysql = require('mysql2');

const db = mysql.createPool({
  host: 'localhost',
  user: 'root',
  password: 'sua_senha', // altere para sua senha
  database: 'biblioteca_cni'
});

module.exports = db;