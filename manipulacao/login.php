<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - entre ou cadastre-se</title>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_inicial.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.min.js">
</head>
<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php

    include "../conexao/conectar.php";

    if ($_POST){
        if (empty($_POST["login"]) || empty($_POST["senha"])){
            echo '<script>swal({
                title: "Login não foi Efetuado com Sucesso",
                text: "Algo está errado",
                icon: "warning",
                button: "Tente Novamente"
            }).then(function() {
                window.location = "../index.html";
            });</script>';
            include "../index.html";    

        }
        else{
            $login = $_POST["login"]; // $login = $email (usuário)
            $senha = $_POST["senha"];
        }
    }

    // Se o login do BD for igual ao login do FORM e senha igual a senha
    $logar = $sql -> query("SELECT * FROM usuario LEFT JOIN obras ON usuario.cod_usuario = obras.cod_usuario 
                                    WHERE email = '$login' AND senha = '$senha' ");

    while ($linha = mysqli_fetch_array($logar)){
        $cod_usuario = $linha["cod_usuario"];
        $nome = $linha["nome"];
        $cpf = $linha["cpf"];
        $dt_nasc = $dtnasc = implode("/", array_reverse(explode("-", $linha["dt_nasc"])));
        $tipo = $linha["cod_tipo"];
        $avatar = $linha["avatar"];
        $cod_obra = $linha["cod_obra"];
        $nome_obra = $linha["nome_obra"];
        $conteudo = $linha["conteudo"];
        $descricao_obra = $linha["descricao_obra"];
    }

    // Se existir um login e senha com os mesmos dados vai criar um acesso
    // O IF vai contar se existe um registro
    $contagem = mysqli_num_rows($logar);

    if ($contagem >= 0 AND $tipo == 2){
        $_SESSION["login_session"] = $login;
        $_SESSION["senha_session"] = $senha;
        $_SESSION["cod_usuario_session"] = $cod_usuario;
        $_SESSION["nome_session"] = $nome;
        $_SESSION["cpf_session"] = $cpf;
        $_SESSION["dt_nasc_session"] = $dt_nasc;
        $_SESSION["tipo_session"] = $tipo;
        $_SESSION["avatar_session"] = $avatar;
        $_SESSION["cod_obra_session"] = $cod_obra;
        $_SESSION["nome_obra_session"] = $nome_obra;
        $_SESSION["conteudo_session"] = $conteudo;
        $_SESSION["descricao_obra_session"] = $descricao_obra;

        // Vai liberar o acesso à página de adm
        header("location: ../interface/pagina_home.php");
    }
    else if ($contagem == 1 AND $tipo == 1){
        $_SESSION["login_session"] = $login;
        $_SESSION["senha_session"] = $senha;
        $_SESSION["cod_usuario_session"] = $cod_usuario;
        $_SESSION["nome_session"] = $nome;
        $_SESSION["cpf_session"] = $cpf;
        $_SESSION["dt_nasc_session"] = $dt_nasc;
        $_SESSION["tipo_session"] = $tipo;
        $_SESSION["avatar_session"] = $avatar;
        
        // Vai liberar o acesso à página de entrada
        header("location: ../interface/pagina_perfil_administrador.php");
    }
    else if ($contagem == 1 AND $tipo == 3){
        $_SESSION["login_session"] = $login;
        $_SESSION["senha_session"] = $senha;
        $_SESSION["cod_usuario_session"] = $cod_usuario;
        $_SESSION["nome_session"] = $nome;
        $_SESSION["cpf_session"] = $cpf;
        $_SESSION["dt_nasc_session"] = $dt_nasc;
        $_SESSION["tipo_session"] = $tipo;
        $_SESSION["avatar_session"] = $avatar;
        $_SESSION["cod_obra_session"] = $cod_obra;
        $_SESSION["nome_obra_session"] = $nome_obra;
        $_SESSION["conteudo_session"] = $conteudo;
        $_SESSION["descricao_obra_session"] = $descricao_obra;

        // Vai liberar o acesso à página principal 3
        header("location: ../interface/pagina_home.php");
    }
    else{
        // Destruir seção (caso algo dê errado)

        unset($_SESSION["login_session"]);
        unset($_SESSION["senha_session"]);
        unset($_SESSION["cod_usuario_session"]);
        unset($_SESSION["nome_session"]);
        unset($_SESSION["cpf_session"]);
        unset($_SESSION["dt_nasc_session"]);
        unset($_SESSION["tipo_session"]);
        unset($_SESSION["avatar_session"]);
        unset($_SESSION["cod_obra_session"]);
        unset($_SESSION["nome_obra_session"]);
        unset($_SESSION["conteudo_session"]);
        unset($_SESSION["descricao_obra_session"]);

        include "../index.html";
    }