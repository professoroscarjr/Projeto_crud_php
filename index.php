<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Informações do Contato</title>
</head>
<title>Document</title>
</head>

<body>


    <div class="jumbotron">
        <!-- Cabeçalho da página -->
        <div class="row">
            <h2>AULA DE PBE - CRUD <span class="badge text-bg-secondary"> v 1.0.0 - SENAI</span></h2>
        </div>

    </div>
    <div class="container">
        <!-- Aqui o conteudo do Banco -->
        <div class="row">
            <p>
                <a class="btn btn-success" href="create.php">Add</a>
            </p>
            <!-- Aqui entra dados da tabela -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">ENDEREÇO</th>
                        <th scope="col">TELEFONE</th>
                        <th scope="col">E-MAIL</th>
                        <th scope="col">IDADE</th>
                        <th scope="col">AÇÃO</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    include 'banco.php';
                    $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM tb_alunos ORDER BY codigo DESC';

                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<th scope="row">' . $row['codigo'] . '</th>';
                        echo '<td>' . $row['nome'] . '</td>';
                        echo '<td>' . $row['endereco'] . '</td>';
                        echo '<td>' . $row['telefone'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['idade'] . '</td>';
                        echo '<td width=250>';
                        echo '<a class="btn btn-primary" href="read.php?codigo=' . $row['codigo'] . '">Info</a>';
                        echo ' ';
                        echo '<a class="btn btn-warning" href="update.php?codigo=' . $row['codigo'] . '">Atualizar</a>';
                        echo ' ';
                        echo '<a class="btn btn-danger" href="delete.php?codigo=' . $row['codigo'] . '">Excluir</a>';
                        echo '</td>';
                        echo '</tr>';
                    }
                    Banco::desconectar();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>