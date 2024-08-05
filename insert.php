<?php
include 'db_connect.php';

$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$data_lancamento = $_POST['data_lancamento'];
$desenvolvedor = $_POST['desenvolvedor'];

$sql = "INSERT INTO jogos (titulo, genero, data_lancamento, desenvolvedor) VALUES ('$titulo', '$genero', '$data_lancamento', '$desenvolvedor')";

if ($conn->query($sql) === TRUE) {
    echo "Novo jogo adicionado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: index.php');
?>
