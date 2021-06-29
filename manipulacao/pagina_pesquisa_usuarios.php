<?php

    if (!isset($_SESSION)){
        session_start();
    }

    // Não permite acessar a página principal pelo navegador
    // Senão existir a seção volta pela página de erro
    if (!isset($_SESSION["login_session"])       AND
        !isset($_SESSION["senha_session"])       AND
        !isset($_SESSION["cod_usuario_session"])
    ){
        header("location: ../interface/erro_url.html");
        exit;
    }
    // Bloquear página ao tentar ir pela url sem logar
    else if ($_SESSION["tipo_session"] != 2 AND $_SESSION["tipo_session"] != 3){
        session_destroy();
        header("location: ../interface/erro_url.html");
    }

    $cod_usuario_logado = $_SESSION["cod_usuario_session"];

    include "../conexao/conectar.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Astro's Gallery - home</title>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_pesquisa_usuarios.css">
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
                        <a href="../interface/pagina_home.php" class="item_h">
                            <i class='fa fa-home' style='font-size:24px'></i> Home
                        </a>
                    </li>
                    <li class="linha_h"><a href="#quem_somos" class="item_h">Quem somos</a></li>
                    <li class="linha_h"><a href="#fale_conosco" class="item_h">Fale conosco</a></li>
                    <li class="linha_h">
                    <a href="../index.html" class="item_h">
                        Sair <i class='fa fa-sign-out' style='font-size:24px'></i>
                    </a>
                </li>
                </ul>
            </nav>

        </div>

    </header>

    <div id="area_pesquisa_usuarios" class="container">
        <h1 id="resultado_pesquisa_usuarios">
            Resultado(s) para a pesquisa:
        </h1>

        <div id='informacoes_pesquisa_usuarios'>

        <?php

            $nome = $_POST["nome"];

            $dados = $sql -> query("SELECT * FROM usuario WHERE nome LIKE '$nome%' LIMIT 20");

            $dadosUsuarios = mysqli_num_rows($dados);

            if ($dadosUsuarios){
                while ($linha = mysqli_fetch_array($dados)){
                    $cod_usuario = $linha["cod_usuario"];
                    $nome = $linha["nome"];
                    $avatar = $linha["avatar"];
                    $tipo = $linha["cod_tipo"];

                    if ($tipo > 1 AND $cod_usuario != $cod_usuario_logado){
                        echo "
                            <div class='previa_pesquisa_usuarios'>
                                <a href='../interface/pagina_visitando_perfis.php?cod_usuario=$cod_usuario'>
                                    <div id='conteudo_pesquisa_usuarios'>
                                        <img src='../$avatar' style='width: 250px; height: 250px; background-image: -webkit-linear-gradient(bottom, rgb(68, 0, 255), rgb(184, 35, 221), rgb(255, 255, 255)); padding: 7px; border-radius: 100%;'>
                                        <p id='nome_usuario_pesquisado'>$nome</p>
                                    </div>   
                                </a>
                            </div>
                        ";
                    }
                }
            }
            /*else{
                echo "<tr>
                    <td colspan='2'>Nenhum usuário encontrado...</td>
                </tr>";
            }*/

        ?>

        </div>

        <div id="degrade_inferior"></div>
    </div>

    <footer id="rodape">
        <div id="informacoes">
            <a name="quem_somos">
                <div id="sobre_rodape">
                    <h2 class="titulo_informacoes">Quem somos?</h2>

                    <p class="sobre_informacoes">
                        A <strong style="color: rgb(131, 57, 200);">Astro's Gallery</strong> é uma plataforma que procura disponibilizar e 
                        fornecer serviços e, ao mesmo tempo, um espaço seguro e organizado para que artistas 
                        e designers possam interagir, consumir e partilhar suas artes, obras ou trabalhos.
                    </p>
                    <p class="sobre_informacoes">
                        Sendo um lugar para vender, apresentar e divulgar o artista autônomo. Além disso, 
                        propondo conhecimento e entretenimento através da arte digital.
                    </p>

                    <i class="fa fa-info" style="font-size: 84px; float: right; margin-top: -140px; color: rgb(131, 57, 200);"></i>
                </div>
            </a>

            <a name="fale_conosco">
                <div id="contatos">
                    <h2 class="titulo_informacoes">Fale Conosco:</h2>

                    <p>jhonhenrique428@gmail.com</p>
                    <p class="contato_email">jhon.oliveira@etec.sp.gov.br</p>

                    <p>gamasouza82@gmail.com</p>
                    <p class="contato_email">leonardo.souza395@etec.sp.gov.br</p>

                    <p>marlinhoda30@gmail.com</p>
                    <p>marlon.castor@etec.sp.gov.br</p>

                    <i class="fa fa-envelope" style="font-size: 84px; float: right; margin-top: -120px; color: rgb(131, 57, 200);"></i>
                </div>
            </a>
        </div>

        <p id="copyright">© Copyright 2021. Todos os direitos reservados.</p>
        
    </footer>

</body>
</html>