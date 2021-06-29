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

    /*
    $separa = explode(".", $imagem);
    $separa = array_reverse($separa);
    $tipo = $separa[0];
    $avatar = $login . "." . $tipo;
    */
    
    $testar = $sql -> query("SELECT * FROM usuario WHERE cod_tipo = '$tipo' ");
    $check = mysqli_num_rows($testar);

    if ($check == 1){ // Se $testar for positivo
        echo "<h1>Usuário já Cadastrado!</h1>";
        //echo "<a href='alterar.php'>Voltar ao Cadastro</a>";
    }
    else{ // Caso negativo
        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . $avatar)){
            $uploadfile = $uploaddir . $avatar;
        }
        else {
            echo "Não foi possível concluir o upload da imagem...";
        }

        $sql -> query("UPDATE usuario SET
            nome = '$nome', 
            email = '$email', 
            senha = '$senha', 
            avatar = '$uploadfile'
            WHERE cod_usuario = $cod_usuario
        ");

    }

    header("location: pagina_perfil_criador.php");