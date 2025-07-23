<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
require_once '../config.php';
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
$school_id = $_SESSION['school_id'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - Sistema de Acompanhamento Escolar</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .dashboard-page {
            width: 100vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: none;
        }
        .dashboard-wrapper {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.18);
            max-width: 950px;
            width: 98vw;
            padding: 2.5rem 2rem;
            margin-top: 2rem;
        }
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .dashboard-title {
            font-size: 2.2rem;
            font-weight: 900;
            color: #007acc;
            letter-spacing: 2px;
            text-shadow: 0 4px 24px rgba(0, 122, 204, 0.08);
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-actions a {
            margin-left: 1rem;
            padding: 0.7rem 1.5rem;
            background: linear-gradient(90deg, #007acc 60%, #00c6fb 100%);
            color: #fff;
            font-weight: bold;
            font-size: 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: background 0.3s, box-shadow 0.3s;
        }
        .dashboard-actions a.logout {
            background: #fff;
            color: #007acc;
            border: 2px solid #007acc;
        }
        .dashboard-actions a.logout:hover {
            background: #e3f2fd;
        }
        .dashboard-actions a:hover {
            background: linear-gradient(90deg, #005fa3 60%, #00a6d6 100%);
            color: #fff;
        }
        .dashboard-section {
            margin-bottom: 2rem;
        }
        .dashboard-section h2 {
            color: #007acc;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
        .dashboard-list {
            list-style: none;
            padding: 0;
        }
        .dashboard-list li {
            background: #f7fafd;
            border-radius: 8px;
            margin-bottom: 0.7rem;
            padding: 1rem 1.2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .dashboard-list a {
            color: #007acc;
            text-decoration: underline;
            font-weight: 500;
        }
        @media (max-width: 900px) {
            .dashboard-wrapper {
                padding: 1.2rem 0.5rem;
            }
            .dashboard-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="dashboard-page">
    <h1 class="main-title">SISTEMA DE ACOMPANHAMENTO ESCOLAR</h1>
    <div class="dashboard-wrapper">
        <div class="dashboard-header">
            <span class="dashboard-title">Painel do Usuário</span>
            <div class="dashboard-actions">
                <?php if ($role === 'admin'): ?>
                    <a href="admin.php">Área Administrativa</a>
                <?php endif; ?>
                <a href="logout.php" class="logout">Sair</a>
            </div>
        </div>
        <?php if ($role === 'coordinator'): ?>
            <div class="dashboard-section">
                <a href="upload_report.php" class="dashboard-actions">+ Enviar relatório</a>
            </div>
            <div class="dashboard-section">
                <h2>Seus relatórios</h2>
                <ul class="dashboard-list">
                <?php
                    $stmt = $pdo->prepare('SELECT report_date, report_type, teacher_name, notes, file_path FROM reports WHERE coordinator_id = ? ORDER BY created_at DESC');
                    $stmt->execute([$user_id]);
                    foreach ($stmt as $report) {
                        echo '<li><span>' . $report['report_date'] . ' - <strong>' . htmlspecialchars($report['teacher_name']) . '</strong> (' . htmlspecialchars($report['report_type']) . ')</span> <a href="../' . $report['file_path'] . '" target="_blank">Ver arquivo</a></li>';
                    }
                ?>
                </ul>
            </div>
        <?php elseif ($role === 'superintendent'): ?>
            <div class="dashboard-section">
                <h2>Relatórios da escola</h2>
                <ul class="dashboard-list">
                <?php
                    $stmt = $pdo->prepare('SELECT report_date, report_type, teacher_name, notes, file_path FROM reports WHERE school_id = ? ORDER BY created_at DESC');
                    $stmt->execute([$school_id]);
                    foreach ($stmt as $report) {
                        echo '<li><span>' . $report['report_date'] . ' - <strong>' . htmlspecialchars($report['teacher_name']) . '</strong> (' . htmlspecialchars($report['report_type']) . ')</span> <a href="../' . $report['file_path'] . '" target="_blank">Ver arquivo</a></li>';
                    }
                ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
