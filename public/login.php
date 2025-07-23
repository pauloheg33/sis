<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
require 'includes/header.php';
?>

<div class="login-wrapper">
    <div class="login-left">
        <h2><i class="fas fa-user-lock"></i> Acessar o Sistema</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="error-msg">Usuário ou senha inválidos.</div>
        <?php endif; ?>

        <form action="login_process.php" method="POST">
            <label for="email">E-mail</label>
            <input type="text" name="email" id="email" placeholder="Digite seu e-mail" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

            <button type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>
        </form>

        <p class="footer-text">© <?php echo date("Y"); ?> Sistema de Acompanhamento Escolar</p>
    </div>

    <div class="login-right">
        <img src="assets/login-image.svg" alt="Acompanhamento Escolar">
    </div>
</div>

<?php require 'includes/footer.php'; ?>
