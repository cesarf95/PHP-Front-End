<?php
include_once("conexao.php");
// Pegar dados do formulário

$nome = $_POST['nome'];
$email = $_POST['email'];

//comando para inserir no SQL
$sql = "insert into alunos (nome, email) values ('$nome', '$email')";

if (mysqli_query($conn, $sql)) {
    header("Location: lista.php");
    echo "<h1>Aluno Cadastrado com sucesso!</h1>";
    echo "<a href='index.html'>Voltar</a>";
} else {
    echo "Erro ao cadastrar";
}
?>

