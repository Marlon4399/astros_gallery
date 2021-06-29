<?php

    include "conectar.php";

    $cod_usuario = $_GET["cod_usuario"];

    $dados = $sql -> query("SELECT avatar FROM usuario WHERE cod_usuario = $cod_usuario");

    while ($linha = mysqli_fetch_array($dados)){
        $avatar = $linha["avatar"];
    }

    mysqli_query($sql, "DELETE FROM usuario WHERE cod_usuario = '$cod_usuario' ");
    unlink("./$avatar");

    // Criando uma pasta de obras para o usuário, ao logar, e identificando-a com o seu código
    $pasta_obras_usuario = "obras/obras-" . $cod_usuario . "/";

    if(rmdir($pasta))
    {
        echo 'Pasta deletada com sucesso.';
    }
    else
    {
        echo 'A pasta não pode ser deletada.';
    }

    header("location: pagina_dados_usuarios.php");

?>