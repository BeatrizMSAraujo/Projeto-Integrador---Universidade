<?php
include 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM produtos WHERE id = ?');
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $informacoes_adicionais = $_POST['informacoes_adicionais'];

    $stmt = $pdo->prepare('UPDATE produtos SET nome = ?, preco = ?, informacoes_adicionais = ? WHERE id = ?');
    $stmt->execute([$nome, $preco, $informacoes_adicionais, $id]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>

<h1>Editar Produto</h1>

<form method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" value="<?= $produto['nome'] ?>" required><br>

    <label for="preco">Preço:</label>
    <input type="number" name="preco" step="0.01" value="<?= $produto['preco'] ?>" required><br>

    <label for="informacoes_adicionais">Informações Adicionais:</label>
    <textarea name="informacoes_adicionais"><?= $produto['informacoes_adicionais'] ?></textarea><br>

    <input type="submit" value="Salvar Alterações">
</form>

<a href="index.php">Voltar para Lista de Produtos</a>

</body>
</html>
