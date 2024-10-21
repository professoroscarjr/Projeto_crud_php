<?php
//importa o arquivo banco
require 'banco.php';
//cria uma variável id
$id = 0;
//verifica se exte o campo codigo
if(!empty($_GET['codigo']))
{
    $id = $_REQUEST['codigo'];
}
//verifia se não está vazio
if(!empty($_POST))
{
    //passa o valor do campo (codigo ) para a variável
    $id = $_POST['codigo'];
    //conecta com o Banco
    $pdo = Banco::conectar();
    //verifica todos os caracteres
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //cria a script para deletar o registro
    $sql = "delete from tb_alunos where codigo = ?";
    //prepara a script para execução
    $q = $pdo->prepare($sql);
    //executa a script olhando para a ID
    $q->execute(array($id));
    //desconecta o banco
    Banco::desconectar();
    //chama a página index
    header("Location: index.php");
}
?>
 <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Deletar Contato</title>
    </head>

    <body>
        <div class="container">
            <div class="span10 offset1">
                <div class="row">
                    <h3 class="well">Excluir Contato</h3>
                </div>
                <form class="form-horizontal" action="delete.php" method="POST">
                    <input type="hidden" name="codigo" value="<?php echo $id;?>" />
                    <div class="alert alert-danger"> Deseja excluir o contato? </div>
                    <div class="form actions">
                        <button type="submit" class="btn btn-danger">Sim</button>
                        <a href="index.php" type="btn" class="btn btn-default">Não</a>
                    </div>
                </form>
            </div>
        </div>
       
    </body>

    </html>
