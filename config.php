<?php
$host = 'localhost';
$db   = 'sis';      // Troque pelo nome do seu banco de dados
$user = 'root';     // Troque se seu usuário for diferente
$pass = '';         // Troque se sua senha não for vazia
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexão bem-sucedida!"; // Descomente para testar
} catch (\PDOException $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}
?>
