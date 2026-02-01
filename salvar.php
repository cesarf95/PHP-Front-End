<?php
// Inclui o arquivo de conexão com o banco de dados.
// O include_once garante que esse arquivo será incluído apenas uma vez,
// evitando erro de conexão duplicada.
include_once("conexao.php");

// Recebe o valor do campo "nome" enviado pelo formulário via método POST
// Esse valor vem do input: <input name="nome">
$nome = $_POST['nome'];

// Recebe o valor do campo "email" enviado pelo formulário via método POST
// Esse valor vem do input: <input name="email">
$email = $_POST['email'];

// Monta o comando SQL para inserir os dados na tabela "alunos"
// Aqui estamos dizendo:
// insira na tabela alunos, nas colunas nome e email,
// os valores que vieram do formulário
$sql = "insert into alunos (nome, email) values ('$nome', '$email')";

// Executa o comando SQL no banco de dados
// mysqli_query retorna TRUE se funcionar ou FALSE se der erro
if (mysqli_query($conn, $sql)) {

    // Se o cadastro der certo, redireciona o usuário para a página lista.php
    // header é usado para redirecionamento
    header("Location: lista.php");

    // Exibe uma mensagem de sucesso (obs: essa mensagem não aparece
    // porque o header redireciona antes)
    echo "<h1>Aluno Cadastrado com sucesso!</h1>";

    // Exibe um link para voltar para a página inicial
    echo "<a href='index.html'>Voltar</a>";
} else {

    // Se ocorrer algum erro ao executar o SQL,
    // essa mensagem será exibida
    echo "Erro ao cadastrar";
}