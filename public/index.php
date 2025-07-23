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
    <title>Sistema de Acompanhamento Escolar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .presentation-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #007acc 0%, #00c6fb 100%);
        }
        .presentation-wrapper {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            display: flex;
            align-items: center;
            max-width: 950px;
            width: 98vw;
            padding: 0;
            overflow: hidden;
        }
        .presentation-content {
            flex: 1;
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .presentation-title {
            font-size: 2.7rem;
            font-weight: 900;
            color: #007acc;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 24px rgba(0, 122, 204, 0.08);
            font-family: 'Poppins', sans-serif;
        }
        .presentation-desc {
            font-size: 1.15rem;
            color: #333;
            margin-bottom: 2.2rem;
            line-height: 1.6;
        }
        .presentation-buttons {
            display: flex;
            gap: 1.2rem;
        }
        .presentation-buttons a {
            padding: 1rem 2.2rem;
            background: linear-gradient(90deg, #007acc 60%, #00c6fb 100%);
            color: #fff;
            font-weight: bold;
            font-size: 1.1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .presentation-buttons a:hover {
            background: linear-gradient(90deg, #005fa3 60%, #00a6d6 100%);
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }
        .presentation-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #007acc 0%, #00c6fb 100%);
            min-height: 350px;
        }
        .presentation-image img {
            width: 80%;
            max-width: 340px;
            min-width: 220px;
            height: auto;
            filter: drop-shadow(0 4px 16px rgba(0,0,0,0.12));
        }
        @media (max-width: 900px) {
            .presentation-wrapper {
                flex-direction: column;
                max-width: 98vw;
            }
            .presentation-content {
                padding: 2rem 1rem;
            }
            .presentation-image {
                min-height: 180px;
                padding: 1.5rem 0;
            }
        }
    </style>
</head>
<body>
    <div class="presentation-page">
        <div class="presentation-wrapper">
            <div class="presentation-content">
                <div class="presentation-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</div>
                <div class="presentation-desc">
                    Gerencie relatórios pedagógicos de forma simples, segura e eficiente.<br>
                    <ul style="margin: 1rem 0 2rem 1.2rem; color: #007acc; font-weight: 500;">
                        <li>Cadastro de usuários com diferentes níveis de acesso</li>
                        <li>Envio e acompanhamento de relatórios pedagógicos</li>
                        <li>Upload seguro de documentos</li>
                        <li>Visualização de relatórios por escola e perfil</li>
                    </ul>
                    <span style="color:#333; font-size:1rem;">Acesse agora e otimize a gestão escolar!</span>
                </div>
                <div class="presentation-buttons">
                    <a href="login.php">Entrar</a>
                    <a href="register.php" style="background: #fff; color: #007acc; border: 2px solid #007acc;">Cadastrar</a>
                </div>
            </div>
            <div class="presentation-image">
                <img src="assets/login-image.svg" alt="Acompanhamento Escolar">
            </div>
        </div>
    </div>
</body>
</html>
