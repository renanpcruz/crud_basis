<?php
include 'db_connect.php';

$sql = "SELECT * FROM jogos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Jogos</title>
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
        <h2>Lista de Jogos</h2>
        <table class="table table-bordered table-hover table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Gênero</th>
                    <th>Data de Lançamento</th>
                    <th>Desenvolvedor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $data_formatada = date("d/m/Y", strtotime($row["data_lancamento"]));
                        echo "<tr>
                                <td>" . $row["id"]. "</td>
                                <td>" . $row["titulo"]. "</td>
                                <td>" . $row["genero"]. "</td>
                                <td>" . $data_formatada . "</td>
                                <td>" . $row["desenvolvedor"]. "</td>
                                <td>
                                    <a href='update.php?id=" . $row["id"]. "' class='btn btn-primary'>Editar</a>
                                    <a href='delete.php?id=" . $row["id"]. "' class='btn btn-danger'>Deletar</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum jogo encontrado</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
