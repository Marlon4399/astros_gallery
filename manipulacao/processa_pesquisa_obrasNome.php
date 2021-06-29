<?php

    // Incluindo a conexão com banco de dados
    include "../conexao/conectar.php";

    $obras = filter_input(INPUT_POST, 'palavraNome', FILTER_SANITIZE_STRING);

    // Pesquisar no banco de dados o nome do usuário referente a palavra digitada
    $result_obras = ("SELECT * FROM obras WHERE nome_obra LIKE '%$obras%' LIMIT 20");
    $resultado_obras = mysqli_query($sql, $result_obras);

?>

    <table class="resultadoNome">
        <tr>
            <th>Código da Obra</th>
            <th>Nome</th>
            <th>Conteúdo</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Código do Usuário</th>
            <th colspan="2">Ação</th>
        </tr>

<?php

    if (($resultado_obras) AND ($resultado_obras->num_rows != 0)){
        while ($row_obras = mysqli_fetch_assoc($resultado_obras)){
            echo "<tr>
                <td>" . $row_obras['cod_obra'] . "</td>
                <td>" . $row_obras['nome_obra'] . "</td>
                <td><img src='../" . $row_obras['conteudo'] . "' id='img_conteudo_obra'></td>
                <td>" . $row_obras['descricao_obra'] . "</td>
                <td>" . $row_obras['valor_obra'] . "</td>
                <td>" . $row_obras['cod_usuario'] . "</td>
                <td><a href='pagina_alterar_dados_obras.php?cod_obra=" . $row_obras['cod_obra'] . " '><i class='fa fa-edit' style='font-size:36px; color: black;'></i></a></td>
                <td><a href='excluir_dados_obras.php?cod_obra=" . $row_obras['cod_obra'] . " '><i class='fa fa-trash' style='font-size:36px; color: black;'></i></a></td>
            </tr>";
        }
    }
    else{
        echo "<td colspan='9' id='msg_erro'>Nenhuma obra encontrada...</td>";
    }

?>