<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: index.php');
    exit;
}
require_once '../config.php';
if (isset($_GET['delete_user'])) {
    $id = (int)$_GET['delete_user'];
    $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: admin.php');
    exit;
}
if (isset($_GET['delete_school'])) {
    $id = (int)$_GET['delete_school'];
    $stmt = $pdo->prepare('DELETE FROM schools WHERE id = ?');
    $stmt->execute([$id]);
    header('Location: admin.php');
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['school_name'])) {
    $name = trim($_POST['school_name']);
    if ($name !== '') {
        $stmt = $pdo->prepare('INSERT INTO schools (name) VALUES (?)');
        $stmt->execute([$name]);
    }
}
$schools = $pdo->query('SELECT * FROM schools')->fetchAll();
$users = $pdo->query('SELECT users.id, users.name, users.email, users.role, schools.name AS school FROM users LEFT JOIN schools ON users.school_id = schools.id')->fetchAll();
$reports = $pdo->query('SELECT reports.report_date, reports.report_type, reports.teacher_name, users.name AS coordinator, schools.name AS school FROM reports JOIN users ON reports.coordinator_id = users.id JOIN schools ON reports.school_id = schools.id ORDER BY reports.created_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Administração</title>
</head>
<body>
    <h1>Administração</h1>
    <p><a href="logout.php">Sair</a></p>
    <h2>Escolas</h2>
    <form method="post">
        <label>Nova escola: <input type="text" name="school_name" required></label>
        <button type="submit">Adicionar</button>
    </form>
    <ul>
<?php foreach ($schools as $school): ?>
        <li><?= htmlspecialchars($school['name']) ?>
            <a href="?delete_school=<?= $school['id'] ?>">Excluir</a>
        </li>
<?php endforeach; ?>
    </ul>

    <h2>Usuários</h2>
    <ul>
<?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user['name']) ?> (<?= $user['role'] ?>) - <?= htmlspecialchars($user['email']) ?> - <?= htmlspecialchars($user['school']) ?>
            <a href="?delete_user=<?= $user['id'] ?>">Excluir</a>
        </li>
<?php endforeach; ?>
    </ul>

    <h2>Relatórios</h2>
    <ul>
<?php foreach ($reports as $r): ?>
        <li><?= $r['report_date'] ?> - <?= htmlspecialchars($r['teacher_name']) ?> (<?= htmlspecialchars($r['report_type']) ?>) - <?= htmlspecialchars($r['coordinator']) ?> / <?= htmlspecialchars($r['school']) ?></li>
<?php endforeach; ?>
    </ul>
</body>
</html>
