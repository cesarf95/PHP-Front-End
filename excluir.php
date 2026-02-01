<?php
/* =====================================================
   INCLUSÃO DA CONEXÃO COM O BANCO DE DADOS
   ===================================================== */

/* Inclui o arquivo de conexão com o MySQL
   include_once garante que não será incluído mais de uma vez */
include_once("conexao.php");


/* =====================================================
   CAPTURA DO ID DO REGISTRO
   ===================================================== */

/* Recupera o ID enviado pela URL (GET)
   Exemplo de URL:
   excluir.php?id=5 */
$id = $_GET['id'];


/* =====================================================
   COMANDO SQL DE EXCLUSÃO
   ===================================================== */

/* Monta o comando SQL para deletar o aluno
   cujo ID seja igual ao informado */
$sql = "DELETE FROM alunos WHERE id = $id";


/* =====================================================
   EXECUÇÃO DO DELETE
   ===================================================== */

/* Executa o comando SQL no banco */
if (mysqli_query($conn, $sql)) {

    /* Se deu certo, redireciona para a lista de alunos */
    header("Location: lista.php");
} else {

    /* Se deu erro, exibe mensagem */
    echo "Erro ao deletar aluno";
}