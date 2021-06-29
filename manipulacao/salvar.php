<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - entre ou cadastre-se</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.min.js">
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php

    include "../conexao/conectar.php";

    if($_POST){
        if(empty($_POST["nome"]) || empty($_POST["cpf"]) || empty($_POST["email"]) || empty($_POST["senha"]) || empty($_POST["dt_nasc"]) || empty($_POST["tipo"])){
            echo '<script>swal({
                title: "Cadastro Não Pode ser finalizado",
                text: "Os Campos não foram Preenchidos com sucesso",
                icon: "warning",
                button: "Tentar Novamente",
                })</script>';
                include "../interface/cadastrar.php";
        }else{
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
            
            echo '<script>swal({
                title: "Cadastro Efetuado com Sucesso",
                text: "Agora Você faz partes dessa constelação artística :D",
                icon: "success",
                button: "Prossiga"
            }).then(function() {
                window.location = "../index.html";
            });</script>';

            include "../index.html";

        }
    }

    /*
    $separa = explode(".", $imagem);
    $separa = array_reverse($separa);
    $tipo = $separa[0];
    $avatar = $login . "." . $tipo;
    */
    
    $testar = $sql -> query("SELECT * FROM usuario WHERE nome = '$nome' ");
    $check = mysqli_num_rows($testar);

    if ($check == 1){ // Se $testar for positivo
        echo "<h1>Usuário já Cadastrado!</h1>";
        echo "<a href='../interface/cadastrar.php'>Voltar ao Cadastro</a>";
    }
    else{ // Caso negativo

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploaddir . $avatar)){
            $uploadfile = $uploaddir . $avatar;
        }
        else {
            echo "Não foi possível concluir o upload da imagem...";
        }

        echo "<h1>Usuário cadastrado com sucesso!</h1>";

        $sql -> query("INSERT INTO usuario (cod_usuario, nome, cpf, email, senha, dt_nasc, avatar, cod_tipo)
        VALUES (NULL, '$nome', '$cpf', '$email', '$senha', '$dt_nasc', '$uploadfile', '$tipo')");

    }

    $dados = $sql -> query("SELECT * FROM usuario");
                                        
    while ($linha = mysqli_fetch_array($dados)){
        $cod_usuario = $linha["cod_usuario"];
    }

    // Criando uma pasta de obras para o usuário, ao logar, e identificando-a com o seu código
    $pasta_obras_usuario = "../obras/obras-" . $cod_usuario . "/";

    if (!is_dir($pasta_obras_usuario)){
        mkdir($pasta_obras_usuario, 0777);
    }
    else{
        echo "O diretório " . $pasta_obras_usuario . " já existe...";
    }