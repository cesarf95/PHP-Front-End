<?php include_once("conexao.php");

$valor_pesquisado = isset($_GET['busca']) ? $_GET['busca']
: '';

$sql = "select * from alunos where nome like '%$valor_pesquisado%'";

$resultado = mysqli_query($conn, $sql);
?> 
 
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="stylelist.css">
</head>
<body>
    <div class="container">
        <h2>Alunos Cadastrados</h2>
        <form action="lista.php" method="GET" class="busca-container">
        <input type="text" name="busca" class="input-busca" placeholder="Digite um nome para buscar..." value="<?php echo $valor_pesquisado; ?>">
        <button type="submit" class="btn-pesquisar">Pesquisar</button>
        <a href="lista.php" class="btn-limpar">Limpar</a>
    </form>

        <table>
            <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
            </tr>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                while($linha = mysqli_fetch_assoc($resultado)) {
                    ?>
                        <tr>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['email']; ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn-editar">Editar</a>
                            <a href="excluir.php?id=<?php echo $linha['id']; ?>" class="btn-excluir">Excluir</a>
                                 </td>
                                </tr>
                            <?php
                            }
                    }else {
                          echo "<tr><td colspan='3' style='text-align:center'>Nenhum registro encontrado.</td></tr>";
                    }   
                    ?>
            <!-- $sql = "select * from alunos";
            $resultado = mysqli_query($conn, $sql);
            while($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha['nome'] . "</td>";
                echo "<td>" . $linha['email'] . "</td>";
                echo "<td><a href='editar.php?id=" . $linha['id'] . "' class='btn-editar'>Editar</a></td>";
                echo "<td><a href='excluir.php?id=" . $linha['id'] ."' class= 'btn-excluir'>Excluir</a></td>";
                 echo "</tr>";
            } 
            ?> -->
        </table>
        <a href= "index.html" class = "btn-voltar"><-- Cadastrar Novo Aluno</a>
    </div>
</body>
</html>