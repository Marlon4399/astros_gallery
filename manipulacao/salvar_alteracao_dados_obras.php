<?php

    include "conectar.php";

    $cod_obra = $_POST["cod_obra"];
    $nome_obra = $_POST["nome_obra"];
    $conteudo = $_POST["conteudo"];
    $decricao_obra = $_POST["decricao_obra"];
    $valor_obra = $_POST["valor_obra"];
    $cod_usuario = $_POST["cod_usuario"];
    $uploaddir = "obras/obras-$cod_usuario/"; // Pasta
    $imagem = $_FILES["obras"]["name"]; // Arquivo do FORM
     
    $separa = explode(".", $imagem);
    $separa2 = array_pop($separa); // Extrai um elemento do final do array
    $obras = $nome_obra . "." . $separa2;
    
    if (move_uploaded_file($_FILES['obras']['tmp_name'], $uploaddir . $obras)){
        $uploadfile = $uploaddir . $obras;
    }
    else {
        echo "Não foi possível concluir o upload da imagem...";
    }

    $sql -> query("UPDATE usuario SET
        nome_obra = '$nome_obra',
        conteudo = '$conteudo', 
        decricao_obra = '$decricao_obra', 
        valor_obra = '$valor_obra', 
        cod_usuario = '$cod_usuario'
        WHERE cod_obra = $cod_obra
    ");

    header("location: pagina_dados_obras.php");