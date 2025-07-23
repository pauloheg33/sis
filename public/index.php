<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="login.php">
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Senha: <input type="password" name="password" required></label><br>
        <button type="submit">Entrar</button>
    </form>
    <p><a href="register.php">Cadastrar novo usuário</a></p>
</body>
</html>
