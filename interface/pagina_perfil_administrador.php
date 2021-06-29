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
        !isset($_SESSION["avatar_session"])      AND
        !isset($_SESSION["cod_obra_session"])    AND
        !isset($_SESSION["nome_obra_session"])   AND
        !isset($_SESSION["conteudo_session"])    AND
        !isset($_SESSION["descricao_obra_session"])
    ){
        header("location: erro_url.html");
        exit;
    }
    // Bloquear página ao tentar ir pela url sem logar
    else if ($_SESSION["tipo_session"] != 1){
        session_destroy();
        header("location: erro_url.html");
    }

?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Astro's Gallery - perfil administrador</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_perfil_administrador.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="shortcut icon" type="image/x-icon" href="../imgs/favicon_novo_logo_astro.png">
    </head>
    <body>

        <header id="cabecalho">

            <div class="container">

                <div id="logo">
                    <img src="../imgs/novo_logo_astro.png" style="border-radius: 100%;">

                    <img src="../imgs/nome_logo.png" id="nome_logo">
                </div>

                <nav id="menu_h">
                    <ul id="lista_h">
                        <li class="linha_h">
                            <a href="pagina_perfil_administrador.php" class="item_h">
                                <i class='fa fa-home' style='font-size:24px'></i> Início
                            </a>
                        </li>
                        <li class="linha_h">
                            <a href="../index.html" class="item_h">
                                Sair <i class='fa fa-sign-out' style='font-size:24px'></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </header>

        <div id="area_adm" class="container">

            <div id="conteudo_adm">

                <h1 id="titulo_adm">Área Administrativa</h1>

                <img src="../imgs/icone_adm.png" style="border-radius: 0px; width: 300px; height: 300px; padding: 10px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); border: 10px solid goldenrod;">

                <fieldset>
                    <legend>
                        <h2 id="subtitulo_adm">Gerenciamento e Monitoramento de Informações</h2>
                    </legend>

                    <div class="btns">
                        <a href="pagina_dados_usuarios.php">
                            <button id="btn_dadosUsuarios">Dados Usuários</button>
                        </a>

                        <a href="pagina_dados_obras.php">
                            <button id="btn_dadosObras">Dados Obras</button>
                        </a>
                    </div>
                </fieldset>

            </div>

        </div>

        <footer id="rodape">
            <p>© Copyright 2021. Todos os direitos reservados.</p>

            <script src="../bibliotecas/jquery.js"></script> <!-- script com a biblioteca -->
            <script src="../bibliotecas/script_jquery_pagina_perfil_criador.js"></script> <!-- script de alterações/configurações com JQuery -->
        </footer>

    </body>
    </html>