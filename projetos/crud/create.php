<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $informacoes_adicionais = $_POST['informacoes_adicionais'];

    $stmt = $pdo->prepare('INSERT INTO produtos (nome, preco, informacoes_adicionais) VALUES (?, ?, ?)');
    $stmt->execute([$nome, $preco, $informacoes_adicionais]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
</head>
<body>

<h1>Adicionar Produto</h1>

<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" required><br>

    <label for="preco">Preço:</label>
    <input type="number" name="preco" step="0.01" required><br>

    <label for="informacoes_adicionais">Informações Adicionais:</label>
    <textarea name="informacoes_adicionais"></textarea><br>

    <input type="submit" value="Adicionar Produto">
</form>

<a href="index.php">Voltar para Lista de Produtos</a>

</body>
</html>
