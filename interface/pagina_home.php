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
        header("location: interface/erro_url.html");
        exit;
    }
    // Bloquear página ao tentar ir pela url sem logar
    else if ($_SESSION["tipo_session"] != 2 AND $_SESSION["tipo_session"] != 3){
        session_destroy();
        header("location: interface/erro_url.html");
    }

    $cod_usuario = $_SESSION["cod_usuario_session"];
    $nome = $_SESSION["nome_session"];
    $avatar = $_SESSION["avatar_session"];

    include "../conexao/conectar.php";

?>

    <!DOCTYPE html>
    <html lag="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Astro's Gallery - home</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_home.css">
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
                            <a href="pagina_home.php" class="item_h">
                                <i class='fa fa-home' style='font-size:24px'></i> Home
                            </a>
                        </li>
                        <li class="linha_h"><a href="#quem_somos" class="item_h">Quem somos</a></li>
                        <li class="linha_h"><a href="#fale_conosco" class="item_h">Fale conosco</a></li>
                        <li class="linha_h">
                            <a href="../index.html" class="item_h" id="btn_sairSA">
                                Sair <i class='fa fa-sign-out' style='font-size:24px'></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>

        </header>

        <div id="fundo_tematico_home">
            <div class="popupHome" onclick="myFunctionHome()">
                <img src="../imgs/novo_logo_astro_sem_fundo.png" style="width: 600px; height: 325px; filter: drop-shadow(50px 20px 0px #000000);">
    
                <span class="popuptextHome" id="myPopupHome">
                    <div style="width: 100%; margin-bottom: 20px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); height: 120px;">
                        <img src="../imgs/novo_logo_astro.png" style="width: 100px; height: 100px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); border-radius: 100%; margin: 10px;">
                    </div>
                    <p class="text_popupHome">
                        Esta é a nossa página de entrada, <strong style="color: rgb(131, 57, 200);">Home</strong>.
                        A partir daqui você poderá navegar pela nossa galeria, podendo: mexer em seu perfil, 
                        pesquisar usuários, visualizar tanto suas obras quanto as de outros, comprá-las e também
                        visitar o perfil de outras pessoas.
                    </p>
                </span>
            </div>
        </div>

        <div class="container">

            <nav id="menu_f">
                <ul id="lista_f">
                    <li class="linha_f">
                        <a href="../manipulacao/perfis.php" class="item_f">
                            Perfil
                        </a>
                    </li>

                    <form method="POST" action="../manipulacao/pagina_pesquisa_usuarios.php" id="area_pesquisa">

                        <input type="text" name="nome" placeholder="Pesquisar usuários:" id="pesquisar"><i class='fa fa-search' style='font-size:25px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); border-radius: 0px 5px 5px 0px; padding: 13px 30px;'></i>
                    
                    </form>

                    <li class="linha_f">
                        <a href="#" class="item_f">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </li>
                </ul>
                
                <div id="degrade" class="container"></div>
            </nav>

        </div>

        <div id="conteudo" class="container">

            <section id="apresentacao_obras">

                <div id="posts">    
                    <?php 

                        // Pegando dados tanto de usuários quanto de obras para apresentar no perfil
                        $arrayUsuario = $sql -> query("SELECT * FROM usuario");
                                            
                        while ($linha = mysqli_fetch_array($arrayUsuario)){
                            $cod_usuario = $linha["cod_usuario"];
                            $nome = $linha["nome"];
                            $avatar = $linha["avatar"];
                                            
                            $arrayObras = $sql -> query("SELECT * FROM obras WHERE cod_usuario = $cod_usuario");
                                            
                            while ($linha = mysqli_fetch_array($arrayObras)){
                                $cod_obra = $linha["cod_obra"];
                                $nome_obra = $linha["nome_obra"];
                                $conteudo = $linha["conteudo"];
                                $descricao_obra = $linha["descricao_obra"];

                                    echo "<div class='posted_works'>

                                        <div id='area_artista_obra'>
                                            <div id='informacoes_artista'>
                                                <img src='../".$avatar."' style='width: 50px; height: 50px; margin-left: -2px; border-radius: 100%;'>
                                                <p id='nome_artista'>".$nome."</p>
                                            </div>

                                            <button type='submit' style='border: 10px solid #1c1c1c;'>
                                                <img src='../".$conteudo."' class='moldura_obra' style='width: 280px; height: 280px;'>
                                            </button>
                                        </div>

                                        <div id='like_comprar_visitar'>
                                            <i class='fa fa-thumbs-o-up' style='font-size: 30px; margin: 5px;'></i>

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!-- Espaço entre os Likes e Dislikes -->

                                            <i class='fa fa-thumbs-o-down' style='font-size: 30px; margin: 5px;'></i>
                                            
                                            <div class='btns'>
                                                <a href='pagina_pagamento.php?cod_obra=$cod_obra'>
                                                    <button class='btn_comprar'>Comprar</button>
                                                </a>
                                                <a href='pagina_visitando_perfis.php?cod_usuario=$cod_usuario'>
                                                    <button class='btn_visitarPerfil'>Visitar perfil</button>
                                                </a>
                                            </div>
                                        </div>
                                                        
                                    </div>";
                            }
                        }
                    ?>
                </div>
            </section>

        </div>

        <footer id="rodape">
            <div id="informacoes">
                <a name="quem_somos">
                    <div id="sobre">
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

            <script src="../bibliotecas/jquery.js"></script> <!-- script com a biblioteca -->
            <script src="../bibliotecas/script_jquery_pagina_home.js"></script> <!-- script de alterações/configurações com JQuery -->
        
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

            <script>
                $('#btn_sairSA').on('click', function(e) {
                    e.preventDefault();
                    const href = $(this).attr('href')

                    swal({
                        title: "Tem certeza que deseja sair?",
                        //text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: ["Não", "Sim"],
                        dangerMode: true,
                    })
                    .then((desejaSair) => {
                        if (desejaSair) {
                            window.location = "../index.html";
                        } 
                        else {
                            window.location = "pagina_home.php";
                        }
                    });
                })
            </script>

            <script>
                // Quando o usuário clicar na div, abrirá o popup de Instruções para Home
                function myFunctionHome() {
                    var popupHome = document.getElementById("myPopupHome");
                    popupHome.classList.toggle("showHome");
                }
            </script>
        </footer>

    </body>
    </html>