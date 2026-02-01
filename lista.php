<?php
/* =====================================================
   INCLUSÃO DA CONEXÃO COM O BANCO DE DADOS
   ===================================================== */

/* Inclui o arquivo responsável pela conexão com o MySQL.
   include_once evita que o arquivo seja carregado mais de uma vez */
include_once("conexao.php");


/* =====================================================
   TRATAMENTO DA BUSCA (GET)
   ===================================================== */

/* Verifica se existe o parâmetro 'busca' vindo pela URL.
   Se existir, armazena o valor.
   Se não existir, define como vazio para evitar erros */
$valor_pesquisado = isset($_GET['busca']) ? $_GET['busca'] : '';

/* Monta o comando SQL.
   O LIKE com % permite buscar partes do nome */
$sql = "SELECT * FROM alunos WHERE nome LIKE '%$valor_pesquisado%'";

/* Executa a consulta no banco de dados.
   $conn vem do arquivo conexao.php */
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <!-- Define o padrão de caracteres (acentos corretamente) -->
    <meta charset="UTF-8">

    <!-- Ajusta a página para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Alunos</title>

    <!-- Importa o CSS -->
    <link rel="stylesheet" href="stylelist.css">
</head>

<body>
    <!-- Container principal -->
    <div class="container">

        <!-- Título da página -->
        <h2>Alunos Cadastrados</h2>


        <!-- =====================================================
             FORMULÁRIO DE BUSCA
             ===================================================== -->
        <!-- Envia os dados para a própria página usando GET -->
        <form action="lista.php" method="GET" class="busca-container">

            <!-- Campo de texto para busca -->
            <!-- O value mantém o texto digitado após a pesquisa -->
            <input type="text" name="busca" class="input-busca" placeholder="Digite um nome para buscar..."
                value="<?php echo $valor_pesquisado; ?>">

            <!-- Botão para enviar o formulário -->
            <button type="submit" class="btn-pesquisar">Pesquisar</button>

            <!-- Link para limpar a busca -->
            <a href="lista.php" class="btn-limpar">Limpar</a>
        </form>


        <!-- =====================================================
             TABELA DE RESULTADOS
             ===================================================== -->
        <table>
            <!-- Cabeçalho da tabela -->
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>

            <?php
            /* Verifica se a consulta retornou algum registro */
            if (mysqli_num_rows($resultado) > 0) {

                /* Enquanto existir linha no resultado */
                while ($linha = mysqli_fetch_assoc($resultado)) {
            ?>
            <!-- Linha da tabela com dados do banco -->
            <tr>
                <!-- Exibe o nome do aluno -->
                <td><?php echo $linha['nome']; ?></td>

                <!-- Exibe o e-mail do aluno -->
                <td><?php echo $linha['email']; ?></td>

                <!-- Coluna de ações -->
                <td>
                    <!-- Link para editar, passando o ID pela URL -->
                    <a href="editar.php?id=<?php echo $linha['id']; ?>" class="btn-editar">
                        Editar
                    </a>

                    <!-- Link para excluir, passando o ID pela URL -->
                    <a href="excluir.php?id=<?php echo $linha['id']; ?>" class="btn-excluir">
                        Excluir
                    </a>
                </td>
            </tr>
            <?php
                }
            } else {
                /* Caso não exista nenhum registro */
                echo "
                <tr>
                    <td colspan='3' style='text-align:center'>
                        Nenhum registro encontrado.
                    </td>
                </tr>";
            }
            ?>
        </table>


        <!-- =====================================================
             LINK PARA VOLTAR AO CADASTRO
             ===================================================== -->
        <a href="index.html" class="btn-voltar">
            <-- Cadastrar Novo Aluno </a>

    </div>
</body>

</html>