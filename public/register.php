<?php
require_once '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];
    $school_id = $_POST['school_id'] ?: null;
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password, role, school_id) VALUES (?,?,?,?,?)');
    if ($stmt->execute([$name, $email, $password, $role, $school_id])) {
        echo 'Cadastro realizado com sucesso. <a href="index.php">Fazer login</a>';
    } else {
        echo 'Erro ao cadastrar.';
    }
    exit;
}
$schools = $pdo->query('SELECT id, name FROM schools')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .main-title {
            text-align: center;
            font-size: 3.2rem;
            font-weight: 900;
            color: #003366;
            letter-spacing: 2.5px;
            margin-bottom: 2.5rem;
            text-shadow: 0 6px 32px rgba(0, 122, 204, 0.18), 0 2px 8px rgba(0,0,0,0.10);
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
<div class="login-page">
    <h1 class="main-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</h1>
    <div class="login-wrapper">
        <div class="login-left">
            <h2>Cadastro de Usuário</h2>
            <form method="post">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" required>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Senha:</label>
                <input type="password" name="password" id="password" required>
                <label for="role">Tipo:</label>
                <select name="role" id="role">
                    <option value="coordinator">Coordenador</option>
                    <option value="superintendent">Superintendente</option>
                    <option value="admin">Administrador</option>
                </select>
                <label for="school_id">Escola:</label>
                <select name="school_id" id="school_id">
                    <option value="">-- selecione --</option>
                    <?php foreach ($schools as $school): ?>
                        <option value="<?= $school['id'] ?>"><?= $school['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Cadastrar</button>
            </form>
            <div class="footer-text">
                Já possui conta? <a href="index.php">Fazer login</a>
            </div>
        </div>
        <div class="login-right">
            <img src="assets/logo.png" alt="Logo do Sistema">
        </div>
    </div>
</div>
</body>
</html>
