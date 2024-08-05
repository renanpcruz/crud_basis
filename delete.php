<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM jogos WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Jogo deletado com sucesso";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: index.php');
?>
