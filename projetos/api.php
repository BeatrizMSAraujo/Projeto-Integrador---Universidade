<?php
header('Content-Type: application/json');

// Configurações do banco de dados
$host = '127.0.0.1';
$db = 'vitrinevirtual';
$user = 'root';
$pass = '';

// Conectar ao banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    exit('Erro na conexão com o banco de dados: ' . $e->getMessage());
}

// Rota para obter produtos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'getProducts') {
    $stmt = $pdo->query('SELECT * FROM produtos');
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($produtos);
}

// Adicione outras rotas conforme necessário (por exemplo, adicionar ao carrinho, finalizar compra, etc.)
?>
