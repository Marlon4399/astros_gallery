<?php

    // Incluindo a conexão com banco de dados
    include "../conexao/conectar.php";

    $usuarios = filter_input(INPUT_POST, 'palavraTipo', FILTER_SANITIZE_STRING);

    // Pesquisar no banco de dados o nome do usuário referente a palavra digitada
    $result_usuario = ("SELECT * FROM usuario WHERE cod_tipo LIKE '%$usuarios%' LIMIT 20");
    $resultado_usuario = mysqli_query($sql, $result_usuario);

?>

    <table class="resultadoTipo">
        <tr>
            <th>Código do Usuário</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Data de Nascimento</th>
            <th>Avatar</th>
            <th>Tipo</th>
            <th colspan="2">Ação</th>
        </tr>

<?php

    if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
        while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
            echo "<tr>
                <td>" . $row_usuario['cod_usuario'] . "</td>
                <td>" . $row_usuario['nome'] . "</td>
                <td>" . $row_usuario['cpf'] . "</td>
                <td>" . $row_usuario['email'] . "</td>
                <td>" . $row_usuario['senha'] . "</td>
                <td>" . implode("/", array_reverse(explode("-", $row_usuario['dt_nasc']))) . "</td>
                <td><img src='../" . $row_usuario['avatar'] . "' id='img_avatar_usuario'></td>
                <td>" . $row_usuario['cod_tipo'] . "</td>
                <td><a href='pagina_alterar_dados_usuarios.php?cod_usuario=" . $row_usuario['cod_usuario'] . " '><i class='fa fa-edit' style='font-size:36px; color: black;'></i></a></td>
                <td><a href='excluir_dados_usuarios.php?cod_usuario=" . $row_usuario['cod_usuario'] . " '><i class='fa fa-trash' style='font-size:36px; color: black;'></i></a></td>
            </tr>";
        }
    }
    else{
        echo "<td colspan='9' id='msg_erro'>Nenhum usuário encontrado...</td>";
    }

?>