<?php
include_once("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

// O comando para atualizar
$sql = "UPDATE alunos SET nome='$nome', email='$email' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    header("Location: lista.php");
} else {
    echo "Erro ao atualizar.";
}
?>