<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema de Acompanhamento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #007acc, #003366);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .container {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
      padding: 2rem;
      max-width: 400px;
      width: 90%;
    }

    h2 {
      text-align: center;
      color: #003366;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
      color: #333;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 0.8rem;
      margin-bottom: 1.2rem;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 1rem;
    }

    button {
      width: 100%;
      padding: 0.8rem;
      background-color: #007acc;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 1rem;
      font-weight: bold;
      cursor: pointer;
    }

    button:hover {
      background-color: #005fa3;
    }

    .footer-text {
      text-align: center;
      margin-top: 1rem;
      font-size: 0.9rem;
      color: #555;
    }

    .error {
      color: red;
      text-align: center;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Login no Sistema</h2>

    <?php if (isset($_GET['error'])): ?>
      <div class="error">Usuário ou senha inválidos.</div>
    <?php endif; ?>

    <form action="login_process.php" method="POST">
      <label for="email">Email:</label>
      <input type="text" name="email" id="email" required>

      <label for="senha">Senha:</label>
      <input type="password" name="senha" id="senha" required>

      <button type="submit">Entrar</button>
    </form>

    <div class="footer-text">
      ©
