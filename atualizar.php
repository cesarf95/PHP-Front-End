<?php
/* =====================================================
   INCLUSÃO DA CONEXÃO COM O BANCO
   ===================================================== */

/* Inclui o arquivo de conexão com o MySQL */
include_once("conexao.php");


/* =====================================================
   RECEBIMENTO DOS DADOS DO FORMULÁRIO
   ===================================================== */

/* Recebe o ID do aluno (campo hidden do formulário) */
$id = $_POST['id'];

/* Recebe o nome digitado */
$nome = $_POST['nome'];

/* Recebe o e-mail digitado */
$email = $_POST['email'];


/* =====================================================
   COMANDO SQL DE ATUALIZAÇÃO
   ===================================================== */

/* Monta o comando SQL para atualizar os dados do aluno
   com base no ID */
$sql = "UPDATE alunos 
        SET nome = '$nome', email = '$email' 
        WHERE id = $id";


/* =====================================================
   EXECUÇÃO DO UPDATE
   ===================================================== */

/* Executa o comando no banco */
if (mysqli_query($conn, $sql)) {

    /* Se deu certo, redireciona para a lista de alunos */
    header("Location: lista.php");
} else {

    /* Se ocorrer erro, exibe mensagem */
    echo "Erro ao atualizar.";
}