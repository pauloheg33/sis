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
  <link rel="stylesheet" href="style.css">
  <style>
    .main-title {
      text-align: center;
      font-size: 3.2rem;
      font-weight: 900;
      background: linear-gradient(90deg, #005fa3 30%, #00c6fb 100%);
      color: transparent;
      -webkit-background-clip: text;
      background-clip: text;
      letter-spacing: 2.5px;
      margin-bottom: 0.3rem;
      font-family: 'Poppins', sans-serif;
      -webkit-text-stroke: 2px #222;
      text-stroke: 2px #222;
      text-shadow:
        0 6px 32px rgba(0, 122, 204, 0.18),
        0 2px 8px rgba(0,0,0,0.10),
        1px 1px 2px #222,
        -1px -1px 2px #222;
    }
    .main-subtitle {
      text-align: center;
      font-size: 1.5rem;
      font-weight: 700;
      color: #e53935;
      letter-spacing: 1.5px;
      margin-bottom: 2.2rem;
      text-shadow: 0 2px 12px rgba(229,57,53,0.10);
      font-family: 'Poppins', sans-serif;
    }
    .login-page {
      width: 100vw;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #007acc 0%, #00c6fb 100%);
    }
    .login-wrapper {
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      padding: 2.5rem 2rem;
      min-width: 340px;
      max-width: 370px;
      width: 98vw;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .login-title {
      text-align: center;
      color: #007acc;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      letter-spacing: 1px;
      text-shadow: 0 2px 8px rgba(0,122,204,0.08);
    }
    .footer-text {
      margin-top: 2rem;
      text-align: center;
      font-size: 0.95rem;
      color: #888;
    }
    @media (max-width: 500px) {
      .login-wrapper {
        padding: 1.2rem 0.5rem;
        min-width: unset;
        max-width: 98vw;
      }
      .main-title {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-page">
    <div class="main-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</div>
    <div class="main-subtitle">SECRETARIA DA EDUCAÇÃO DE ARARENDÁ</div>
    <div class="login-wrapper">
      <div class="login-title">Login no Sistema</div>
      <?php if (isset($_GET['error'])): ?>
        <div class="error">Usuário ou senha inválidos.</div>
      <?php endif; ?>
      <form action="login_process.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required>
        <button type="submit">Entrar</button>
      </form>
      <div class="footer-text">
        © 2023 Sistema de Acompanhamento. Todos os direitos reservados.
      </div>
    </div>
  </div>
</body>
</html>
