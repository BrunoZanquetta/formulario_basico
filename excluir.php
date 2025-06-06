<?php
// Incluir a conexao do banco
include 'conexao.php';

// Verifica se o ID foi enviado (se ele realmente existe no banco)
// Se for verdadeiro, ele deleta a linha selecionada
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);

    // Deleta a mensagem com o ID recebido
    $sql = "DELETE FROM mensagens WHERE id = $id";

    // Se a conexão for verdadeira, ele da um alerta de sucesso da exclusão da linha
    // Caso for falso, ele mostra um alerta do erro ao excluir a linha
    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Mensagem excluída com sucesso!'); window.location.href='admin.php';</script>";
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }

// Se ele não achar o ID selecionado, ele da um alerta mostrando que não achou
} else {
    echo "ID inválido!";
}



?>