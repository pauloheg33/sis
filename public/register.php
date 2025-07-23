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
</head>
<body>
    <h1>Cadastrar usuário</h1>
    <form method="post">
        <label>Nome: <input type="text" name="name" required></label><br>
        <label>Email: <input type="email" name="email" required></label><br>
        <label>Senha: <input type="password" name="password" required></label><br>
        <label>Tipo:
            <select name="role">
                <option value="coordinator">Coordenador</option>
                <option value="superintendent">Superintendente</option>
                <option value="admin">Administrador</option>
            </select>
        </label><br>
        <label>Escola:
            <select name="school_id">
                <option value="">-- selecione --</option>
<?php foreach ($schools as $school): ?>
                <option value="<?= $school['id'] ?>"><?= $school['name'] ?></option>
<?php endforeach; ?>
            </select>
        </label><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
