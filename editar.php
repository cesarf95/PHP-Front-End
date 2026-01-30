<?php
include_once("conexao.php");

$id = $_GET['id']; // pega o metodo ID com GET
$sql = "select * from alunos where id = $id"; // Seleciona de alunos onde tem o ID
$resultado = mysqli_query($conn, $sql); //cria a variavel resultado, chamando a busca com a variavel $conm
$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="stylelist.css">
</head>
<body>
    <div class="container">
        <h1>Editar Aluno</h1>
        <form action="atualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome value=<?php echo $dados['nome']; ?>">

            <label for="email">E-mail</label>
            <input type="email" name="email" id="nome value=<?php echo $dados['email']; ?>">

            <button type="submit" style="background:#007bff">Salvar Alterações</button>

        </form>
        <a href="lista.php" class="btn-voltar>Cancelar</a>
    </div>
</body>
</html>