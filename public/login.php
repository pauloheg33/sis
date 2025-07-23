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
</head>
<body>

  <div class="container">
    <h2>Login no Sistema</h2>

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

</body>
</html>
