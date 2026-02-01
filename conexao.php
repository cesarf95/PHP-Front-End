<?php
/* =====================================================
   DADOS DE CONEXÃO COM O BANCO DE DADOS
   ===================================================== */

/* Endereço do servidor do banco de dados
   'localhost' significa que o banco está na mesma máquina */
$servidor = "localhost";

/* Usuário do banco de dados
   'root' é o padrão em ambientes locais (XAMPP/WAMP) */
$usuario = "root";

/* Senha do banco de dados
   Em ambiente local geralmente fica vazia */
$senha = "";

/* Nome do banco de dados que será utilizado */
$banco = "escola";


/* =====================================================
   CRIAÇÃO DA CONEXÃO
   ===================================================== */

/* Cria a conexão com o banco usando MySQLi */
$conn = mysqli_connect($servidor, $usuario, $senha, $banco);


/* =====================================================
   VERIFICAÇÃO DA CONEXÃO
   ===================================================== */

/* Se a conexão falhar, o script é interrompido
   e exibe a mensagem de erro */
if (!$conn) {
    die("A conexão falhou: " . mysqli_connect_error());
}