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
      display: flex;
      min-height: 60vh;
      width: 900px;
      max-width: 98vw;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
      overflow: hidden;
      margin-top: 1.5rem;
    }
    .login-left {
      flex: 1;
      padding: 2.5rem 2rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: #fff;
    }
    .login-right {
      flex: 1;
      background: linear-gradient(135deg, #007acc 0%, #00c6fb 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-right img {
      width: 80%;
      max-width: 320px;
      min-width: 180px;
      filter: drop-shadow(0 4px 16px rgba(0,0,0,0.12));
      border-radius: 12px;
      background: #fff;
      padding: 1rem;
    }
    .login-title {
      text-align: center;
      color: #007acc;
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 1.2rem;
      letter-spacing: 1px;
      text-shadow: 0 2px 8px rgba(0,122,204,0.08);
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 0.7rem;
      margin-top: 0.7rem;
    }
    label {
      font-weight: 600;
      color: #333;
    }
    input, select {
      padding: 0.7rem 0.8rem;
      border: 2.5px solid #007acc;
      border-radius: 8px;
      font-size: 1.1rem;
      background: #f7fafd;
      width: 100%;
      font-weight: 600;
      transition: border 0.2s;
    }
    input:focus, select:focus {
      border-color: #005fa3;
      outline: none;
    }
    button[type="submit"] {
      margin-top: 0.7rem;
      padding: 0.9rem 0;
      font-size: 1.1rem;
      background: linear-gradient(90deg, #007acc 60%, #00c6fb 100%);
      color: #fff;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
      transition: background 0.3s, box-shadow 0.3s;
    }
    button[type="submit"]:hover {
      background: linear-gradient(90deg, #005fa3 60%, #00a6d6 100%);
      box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }
    .footer-text {
      margin-top: 1.2rem;
      text-align: center;
      font-size: 0.95rem;
      color: #888;
    }
    .error {
      color: #e53935;
      background: #ffeaea;
      border: 1px solid #e53935;
      border-radius: 6px;
      padding: 0.7rem 1rem;
      margin-bottom: 1rem;
      text-align: center;
    }
    @media (max-width: 900px) {
      .login-wrapper {
        flex-direction: column;
        width: 98vw;
        min-height: unset;
      }
      .login-right {
        display: none;
      }
      .login-left {
        padding: 2rem 1rem;
      }
    }
    @media (max-width: 500px) {
      .main-title { font-size: 2rem; }
      .login-wrapper { padding: 0; }
    }
  </style>
</head>
<body>
  <div class="login-page">
    <div class="main-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</div>
    <div class="main-subtitle">SECRETARIA DA EDUCAÇÃO DE ARARENDÁ</div>
    <div class="login-wrapper">
      <div class="login-left">
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
      <div class="login-right">
        <img src="assets/logo.png" alt="Logo do Sistema">
      </div>
    </div>
  </div>
</body>
</html>
