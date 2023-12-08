
<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "vitrinevirtual";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processar dados do formulário
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$responsavel = $_POST['responsavel'];

// Inserir dados no banco de dados
$sql = "INSERT INTO cadastro (nome, telefone, responsavel) VALUES ('$nome', '$telefone', '$responsavel')";

if ($conn->query($sql) === TRUE) {
    echo "Formulário enviado com sucesso!";
} else {
    echo "Erro ao enviar o formulário: " . $conn->error;
}

// Fechar a conexão com o banco de dados
$conn->close();
?>