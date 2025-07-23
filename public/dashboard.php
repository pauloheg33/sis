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
    <title>Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Bem-vindo</h1>
    <p><a href="logout.php">Sair</a></p>
<?php if ($role === 'admin'): ?>
    <p><a href="admin.php">Área administrativa</a></p>
<?php endif; ?>
<?php if ($role === 'coordinator'): ?>
    <p><a href="upload_report.php">Enviar relatório</a></p>
    <h2>Seus relatórios</h2>
    <ul>
<?php
    $stmt = $pdo->prepare('SELECT report_date, report_type, teacher_name, notes, file_path FROM reports WHERE coordinator_id = ? ORDER BY created_at DESC');
    $stmt->execute([$user_id]);
    foreach ($stmt as $report) {
        echo '<li>' . $report['report_date'] . ' - ' . htmlspecialchars($report['teacher_name']) . ' (' . htmlspecialchars($report['report_type']) . ') - <a href="../' . $report['file_path'] . '">arquivo</a></li>';
    }
?>
    </ul>
<?php endif; ?>
<?php if ($role === 'superintendent'): ?>
    <h2>Relatórios da escola</h2>
    <ul>
<?php
    $stmt = $pdo->prepare('SELECT report_date, report_type, teacher_name, notes, file_path FROM reports WHERE school_id = ? ORDER BY created_at DESC');
    $stmt->execute([$school_id]);
    foreach ($stmt as $report) {
        echo '<li>' . $report['report_date'] . ' - ' . htmlspecialchars($report['teacher_name']) . ' (' . htmlspecialchars($report['report_type']) . ') - <a href="../' . $report['file_path'] . '">arquivo</a></li>';
    }
?>
    </ul>
<?php endif; ?>
</body>
</html>
