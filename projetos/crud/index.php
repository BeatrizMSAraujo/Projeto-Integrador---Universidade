<?php
include 'db.php';

$stmt = $pdo->prepare('SELECT * FROM produtos');
$stmt->execute();
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>

<h1>Lista de Produtos</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Informações Adicionais</th>
        <th>Ações</th>
    </tr>

    <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= $produto['nome'] ?></td>
            <td>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></td>
            <td><?= $produto['informacoes_adicionais'] ?></td>
            <td>
                <a href="edit.php?id=<?= $produto['id'] ?>">Editar</a>
                <a href="delete.php?id=<?= $produto['id'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="create.php">Adicionar Produto</a>

</body>
</html>
