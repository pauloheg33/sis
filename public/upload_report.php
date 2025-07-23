<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'coordinator') {
    header('Location: index.php');
    exit;
}
require_once '../config.php';
$user_id = $_SESSION['user_id'];
$school_id = $_SESSION['school_id'];
$uploadDir = '../uploads/' . $school_id;
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['report'])) {
    $teacher = $_POST['teacher'];
    $report_date = $_POST['report_date'];
    $report_type = $_POST['report_type'];
    $notes = $_POST['notes'];
    $fileName = basename($_FILES['report']['name']);
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!in_array($ext, ['pdf', 'doc', 'docx'])) {
        echo 'Formato de arquivo inválido.';
        exit;
    }
    $targetPath = $uploadDir . '/' . time() . '_' . $fileName;
    if (move_uploaded_file($_FILES['report']['tmp_name'], $targetPath)) {
        $relativePath = ltrim(str_replace('..', '', $targetPath), '/');
        $stmt = $pdo->prepare('INSERT INTO reports (coordinator_id, school_id, report_date, report_type, teacher_name, notes, file_path) VALUES (?,?,?,?,?,?,?)');
        $stmt->execute([$user_id, $school_id, $report_date, $report_type, $teacher, $notes, $relativePath]);
        echo 'Relatório enviado com sucesso. <a href="dashboard.php">Voltar</a>';
    } else {
        echo 'Falha no envio do arquivo.';
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Enviar relatório</title>
</head>
<body>
    <h1>Enviar relatório de aula</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Data: <input type="date" name="report_date" required></label><br>
        <label>Tipo de relatório: <input type="text" name="report_type"></label><br>
        <label>Professor: <input type="text" name="teacher" required></label><br>
        <label>Observações:<br>
            <textarea name="notes" rows="4" cols="40"></textarea>
        </label><br>
        <label>Arquivo (PDF ou DOCX): <input type="file" name="report" required></label><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
