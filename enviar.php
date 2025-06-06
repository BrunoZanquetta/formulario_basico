<?php
// Inclui o arquivo de conexão com o banco de dados
include 'conexao.php';

// Pega os dados do formulário usando o $_POST
// Criamos variáveis e salvamos os dados que o user inseriu nelas
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Protege os dados contra injeção de código malicioso
$email = $conexao->real_escape_string($email);
$mensagem = $conexao->real_escape_string($mensagem);

// Cria a SQL para inserir os dados na tabela
// Criamos uma variável que contém um comando SQL para inserir as variáveis em nosso banco de dados
$sql = "INSERT INTO mensagens (email, mensagem)
        VALUES ('$email','$mensagem')";

// Executa o nosso comando SQL e verifica se deu tudo certo
// Ele faz um query para salvar os comandos e as variáveis no banco de dados
// Se for verdadeiro, ele manda um script de alerta falando que deu certo e volta para a página normal index
// Se ele for falso, fala que deu erro e mostra o tipo de erro
if ($conexao->query($sql) === TRUE) {
    echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='index.html';</script>";
} else {
    echo "Erro ao enviar: ".$conexao->error;
}


?>