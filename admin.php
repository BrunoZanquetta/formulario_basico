<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel de Mensagens</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4">📬 Mensagens Recebidas</h2>
        <a href="index.html" class="btn btn-primary mb-3">← Voltar para o Formulário</a>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Mensagem</th>
                    <th>Recebido em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php //ele pega os dados salvos do banco de dados e mostra na tabela com um comando SQL
                      //na parte do resultado, ele verifica se a conexão de query está verdadeira com o banco
                $sql = "SELECT * FROM mensagens ORDER BY id DESC";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    // Ele vai repitir esse comando, até que todos os dados do banco sejam lidos e colocados
                    // Ele cria uma linha para cada user e coloca as suas variáveis salvas de acordo com o banco
                    // Caso não tenha nenhum dado, ele da um alerta que não encontrou nenhuma mensagem
                    while ($linha = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $linha['id'] . "</td>";
                        echo "<td>" . $linha['email'] . "</td>";
                        echo "<td>" . $linha['mensagem'] . "</td>";
                        echo "<td>" . $linha['data_envio'] . "</td>";
                        //Aqui terá um botão de excluir mensagens de usuários pela tabela
                        // Criamos um formulário apenas para o botão, puxando o php do modo de excluir
                        // Quando clicado, ele da um alerta de confirmação, caso confirmado, ele pega o ID da linha que voc~e quer excluir e exclui
                        // Embaixo temos a criação do botão de exclusão das linhas
                        echo "<td> 
                                <form method='POST' action='excluir.php' onsubmit=\"return confirm('Tem certeza que deseja excluir esta mensagem?');\">
                                    <input type='hidden' name='id' value='" . $linha['id'] . "'>
                                    <button type='submit' class='btn btn-danger btn-sm'>🗑️ Excluir</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhuma mensagem encontrada.</td></tr>";
                }

                $conexao->close();
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
