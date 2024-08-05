<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM jogos WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Jogo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-dark.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">CRUD de Jogos</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="create.php">Adicionar Jogo</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Editar Jogo</h2>
        <form action="update_process.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control bg-dark text-light" id="titulo" name="titulo" value="<?php echo $row['titulo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <input type="text" class="form-control bg-dark text-light" id="genero" name="genero" value="<?php echo $row['genero']; ?>">
            </div>
            <div class="form-group">
                <label for="data_lancamento">Data de Lançamento:</label>
                <input type="date" class="form-control bg-dark text-light" id="data_lancamento" name="data_lancamento" value="<?php echo $row['data_lancamento']; ?>">
            </div>
            <div class="form-group">
                <label for="desenvolvedor">Desenvolvedor:</label>
                <input type="text" class="form-control bg-dark text-light" id="desenvolvedor" name="desenvolvedor" value="<?php echo $row['desenvolvedor']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Jogo</button>
        </form>
    </div>
</body>
</html>
