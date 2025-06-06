<?php
$servidor = "localhost"; // Pega a váriavel servidor e coloca onde está meu banco (localhost = seu próprio computador)
$usuario = "root"; // Pega a variável usuário e coloca o padrão do XAMPP
$senha = ""; // A senha do XAMPP por padrão é vazia, então deixei vazia também
$banco = "painel_contato"; // O nome do banco de dados que criei no XAMPP

// Fazendo a conexão
// Ele pega e faz a conexão com meu banco de dados usando esse primeiro comando e guiando com as variáveis para ligar
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificando se deu erro na conexão
// Se a variável conexão resultar no erro que não deu pra fazer a ligação, ele da um DIE (acabar aplicação) e mostra o erro que deu
if ($conexao->connect_error) {
    die("Falha na conexão: ". $conexao->connect_error);
}
?>