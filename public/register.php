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
            font-size: 3.4rem;
            font-weight: 900;
            background: linear-gradient(90deg, #005fa3 30%, #00c6fb 100%);
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            letter-spacing: 2.5px;
            margin-bottom: 0.7rem;
            font-family: 'Poppins', sans-serif;
            /* Contorno escuro */
            -webkit-text-stroke: 2px #222;
            text-stroke: 2px #222;
            /* Sombra reforçada */
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
        /* Reduza o gap entre os elementos do formulário */
        .login-left form {
            display: flex;
            flex-direction: column;
            gap: 0.7rem; /* era 1.2rem ou mais, agora menor */
            margin-top: 0.7rem;
        }

        /* Reduza o padding dos inputs e selects */
        input,
        select,
        #role,
        #school_id {
            padding: 0.6rem 0.8rem;
            border: 3px solid #007acc;
            border-radius: 8px;
            font-size: 1.05rem;
            background: #f7fafd;
            width: 100%;
            margin-bottom: 0.3rem; /* era 0.5rem */
            font-weight: 600;
            transition: border 0.2s;
        }

        /* Reduza o espaçamento do botão */
        button[type="submit"] {
            margin-top: 0.7rem;
            padding: 0.8rem 0;
            font-size: 1.05rem;
        }

        /* Ajuste o título do formulário */
        .login-left h2 {
            margin-bottom: 0.7rem;
            font-size: 1.5rem;
        }

        .login-right img {
            width: 80%;
            max-width: 320px;
            min-width: 180px;
            filter: drop-shadow(0 4px 16px rgba(0,0,0,0.12));
            border-radius: 18px; /* Cantos arredondados */
            background: #fff;
            padding: 1rem;
        }
    </style>
</head>
<body>
<div class="login-page">
    <h1 class="main-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</h1>
    <div class="main-subtitle">SECRETARIA DA EDUCAÇÃO DE ARARENDÁ</div>
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
