<?php

    if (!isset($_SESSION)){
        session_start();
    }

    // Não permite acessar a página principal pelo navegador
    // Senão existir a seção volta pela página de erro
    if (!isset($_SESSION["login_session"])       AND
        !isset($_SESSION["senha_session"])       AND
        !isset($_SESSION["cod_usuario_session"]) AND
        !isset($_SESSION["nome_session"])        AND
        !isset($_SESSION["cpf_session"])         AND
        !isset($_SESSION["dt_nasc_session"])     AND
        !isset($_SESSION["tipo_session"])        AND
        !isset($_SESSION["avatar_session"])
    ){
        header("location: erro_url.html");
        exit;
    }
    
    $cod_usuario = $_SESSION["cod_usuario_session"];

    include "conectar.php";

    $nome_obra = $_POST["nome_obra"];
    $descricao_obra = $_POST["descricao_obra"];
    $imagem = $_FILES["obras"]["name"]; // Arquivo do FORM
     
    $separa = explode(".", $imagem);
    $separa2 = array_pop($separa); // Extrai um elemento do final do array
    $obras = $nome_obra . "." . $separa2;

    $testar = $sql -> query("SELECT * FROM obras WHERE nome_obra = '$nome_obra' ");

    $check = mysqli_num_rows($testar);

    if ($check == 1){ // Se $testar for positivo
        echo "<h1>Obra já Cadastrada!</h1>";
        echo "<a href='pagina_perfil_criador.php'>Voltar ao Cadastro de Obra</a>";
    }
    else{ // Caso negativo
        $dados = $sql -> query("SELECT * FROM obras");
                                        
        while ($linha = mysqli_fetch_array($dados)){
            $cod_usuario = $linha["cod_usuario"];
        }

        // Movendo o arquivo para a pasta criada com o código do usuário
        $pasta_obras_usuario = "obras/obras-" . $cod_usuario . "/";

        if (move_uploaded_file($_FILES['obras']['tmp_name'], $pasta_obras_usuario . $obras)){
            $uploadfile = $pasta_obras_usuario . $obras;
        }
        else{
            echo "Não foi possível concluir o upload da obra...";
        }

        echo "<h1>Obra cadastrada com sucesso!</h1>";

        $sql -> query("INSERT INTO obras (cod_obra, nome_obra, conteudo, descricao_obra, cod_usuario)
                                  VALUES (NULL, '$nome_obra', '$uploadfile', '$descricao_obra', '$cod_usuario')");

        header ("location: pagina_perfil_criador.php");

        //$verificacao_obra = $sql -> query("SELECT MAX(cod_obra) FROM obras");

        //var_dump($verificacao_obra);

        //echo "<hr>";

        //$informacoes_obra_usuario = "dados_obra_usuario-" . $cod_usuario;

        //echo $informacoes_obra_usuario;

    }

?>