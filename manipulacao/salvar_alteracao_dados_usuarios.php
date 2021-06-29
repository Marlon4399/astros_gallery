<?php

    include "conectar.php";

    $cod_usuario = $_POST["cod_usuario"];
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $dt_nasc = $_POST["dt_nasc"];
    $tipo = $_POST["tipo"];
    $uploaddir = "avatar/"; // Pasta
    $imagem = $_FILES["avatar"]["name"]; // Arquivo do FORM
     
    $separa = explode(".", $imagem);
    $separa2 = array_pop($separa); // Extrai um elemento do final do array
    $avatar = $nome . "." . $separa2;
    
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . $avatar)){
        $uploadfile = $uploaddir . $avatar;
    }
    else {
        echo "Não foi possível concluir o upload da imagem...";
    }

    $sql -> query("UPDATE usuario SET
        nome = '$nome',
        cpf = '$cpf', 
        email = '$email', 
        senha = '$senha', 
        dt_nasc = '$dt_nasc', 
        avatar = '$uploadfile', 
        cod_tipo = '$tipo'
        WHERE cod_usuario = $cod_usuario
    ");

    header("location: pagina_dados_usuarios.php");