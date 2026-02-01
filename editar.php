<?php
/* =====================================================
   INCLUSÃO DA CONEXÃO COM O BANCO
   ===================================================== */

/* Inclui o arquivo de conexão com o MySQL */
include_once("conexao.php");


/* =====================================================
   CAPTURA DO ID DO ALUNO
   ===================================================== */

/* Recupera o ID enviado pela URL (GET)
   Exemplo: editar.php?id=3 */
$id = $_GET['id'];


/* =====================================================
   BUSCA DOS DADOS DO ALUNO
   ===================================================== */

/* Comando SQL para buscar o aluno pelo ID */
$sql = "SELECT * FROM alunos WHERE id = $id";

/* Executa a consulta no banco */
$resultado = mysqli_query($conn, $sql);

/* Converte o resultado em um array associativo */
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <!-- Define codificação de caracteres -->
    <meta charset="UTF-8">

    <!-- Responsividade para celular -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Aluno</title>

    <!-- CSS reutilizado -->
    <link rel="stylesheet" href="stylelist.css">
</head>

<body>
    <div class="container">

        <!-- Título da página -->
        <h1>Editar Aluno</h1>


        <!-- =====================================================
             FORMULÁRIO DE EDIÇÃO
             ===================================================== -->
        <!-- Envia os dados para atualizar.php usando POST -->
        <form action="atualizar.php" method="post">

            <!-- Campo oculto para enviar o ID do aluno -->
            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <!-- Campo nome -->
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>" required>

            <!-- Campo email -->
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo $dados['email']; ?>" required>

            <!-- Botão de salvar -->
            <button type="submit" style="background:#007bff">
                Salvar Alterações
            </button>
        </form>

        <!-- Link para cancelar edição -->
        <a href="lista.php" class="btn-voltar">
            Cancelar
        </a>

    </div>
</body>

</html>