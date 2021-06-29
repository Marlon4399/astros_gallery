<?php

    include "conectar.php";

    $cod_obra = $_GET["cod_obra"];

    $dados = $sql -> query("SELECT conteudo FROM obras WHERE cod_obra = $cod_obra");

    while ($linha = mysqli_fetch_array($dados)){
        $conteudo = $linha["conteudo"];
    }

    mysqli_query($sql, "DELETE FROM obras WHERE cod_obra = '$cod_obra' ");
    unlink("./$conteudo");

    header("location: pagina_dados_obras.php");

?>