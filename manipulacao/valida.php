<?php

    session_start();

    include "conectar.php";

    if ((isset($_POST['login'])) AND ((isset($_POST['senha']))){
        // Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $usuario = mysqli_real_escape_string($sql, $_POST['login']);
        $senha = mysqli_real_escape_string($sql, $_POST['senha']);
        //$senha = md5($senha);

        // Se o login do BD for igual ao login do FORM e senha igual a senha
        $conn = "SELECT * FROM usuario INNER JOIN obras ON usuario.cod_usuario = obras.cod_usuario 
                          WHERE email = '$usuario' AND senha = '$senha' LIMIT 1";

        $result = mysqli_query($sql, $conn);
        $resultado = mysqli_fetch_assoc($result);

        if (empty($resultado)){
            include "erro_login.html";
            header ("location: pagina_inicial.html");
        }
        else if (isset($resultado)){
            $_SESSION["login_session"] = $usuario["cod_usuario"];
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
            header ("location: home")
        }
        else{
            include "erro_login.html";
        }

    }
    else{
        include "erro_login.html";
    }

?>