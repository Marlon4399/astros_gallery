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
    else if ($_SESSION["tipo_session"] != 2){
        session_destroy();
        header("location: erro_url.html");
    }

    $cod_usuario = $_SESSION["cod_usuario_session"];
    $nome = $_SESSION["nome_session"];
    $avatar = $_SESSION["avatar_session"];
    $cod_obra = $_SESSION["cod_obra_session"];
    $nome_obra = $_SESSION["nome_obra_session"];
    $conteudo = $_SESSION["conteudo_session"];
    $descricao_obra = $_SESSION["descricao_obra_session"];

    include "../conexao/conectar.php";

?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Astro's Gallery - perfil criador</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_perfil_criador.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../estilizacao/magnific-popup.css"><!-- Biblioteca Magnific Popup CSS -->
        <link rel="shortcut icon" type="image/x-icon" href="../imgs/favicon_novo_logo_astro.png">
    </head>
    <body>

        <div class="addObra_modal">
            <div class="conteudo_addObra_modal">

                <form id="form_addObra_modal" method="POST" action="../manipulacao/salvar_obras.php" enctype="multipart/form-data">

                    <div id="lado_dados">
                        <div id="titulo_cadastro_obras">
                            <h5>
                                <span>
                                    <h1>Cadastro de Obras</h1>
                                </span>
                            </h5>
                        </div>

                        <div id="dado_nome">
                            <label>Nome da Obra:</label><br>
                            <input type="text" name="nome_obra">
                        </div><br><br><br>
                        
                        <div id="dado_descricao">
                            <label>Descrição da Obra:</label><br>
                            <textarea name="descricao_obra" id="descricao_obra" cols="50" rows="5" placeholder="Deixe aqui sua descrição da obra"></textarea>
                        </div>

                        <button type="submit" id="btn_publicar">
                            Publicar
                        </button>
                    </div><br>

                    <div id="lado_obra">
                        <label for="obra" id="label_obra">
                            <i class="fa fa-file-picture-o"></i> Escolha uma Obra
                        </label><br><br>

                        <img src="../imgs/icone_obra2.png" class="obra" style="width: 300px; height: 300px; border-radius: 0px; padding: 10px; border: 10px ridge rgb(0, 0, 0); background-image: -webkit-linear-gradient(rgb(68, 0, 255), rgb(184, 35, 221), rgb(255, 255, 255)); margin-top: 125px;"><br>
                            
                        <input type="file" name="obras" id="obra" onchange="previewImagem()"><br><br>
                    </div>

                </form>

                <button id="btn_voltar" data-target=".addObra_modal">
                    Voltar
                </button>
            </div>
        </div>

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
                        <a href="../index.html" class="item_h">
                            Sair <i class='fa fa-sign-out' style='font-size:24px'></i>
                        </a>
                    </li>
                    </ul>
                </nav>

            </div>

        </header>
        
            <div id="area_perfil" class="container">

                <div id="degrade_superior" class="container"></div>

                <div id="conteudo">
                    <div class="areas_conteudo">

                        <section id="area_publicacoes">

                            <div id="btn_posts">
                                <button type="submit" id="btn_addPost" data-target=".addObra_modal">
                                    <i class='fa fa-plus-circle' style='font-size:24px'></i> Adicionar Obra
                                </button>
                            </div>

                            <div id="titulo_posts">
                                <h4>
                                    <span>
                                        <h2>Obras Postadas</h2>
                                    </span>
                                </h4>
                            </div>

                            <div id="posts">    
                                <?php
                                
                                    // Pegando dados tanto de usuários quanto de obras para apresentar no perfil
                                    $arrayUsuario = $sql -> query("SELECT * FROM usuario WHERE usuario.cod_usuario = $cod_usuario");
                                    
                                    while ($linha = mysqli_fetch_array($arrayUsuario)){
                                        $cod_usuario = $linha["cod_usuario"];
                                        $nome = $linha["nome"];
                                    
                                        $arrayObras = $sql -> query("SELECT * FROM obras WHERE obras.cod_usuario = $cod_usuario");

                                        while ($linha = mysqli_fetch_array($arrayObras)){
                                            $cod_obra = $linha["cod_obra"];
                                            $nome_obra = $linha["nome_obra"];
                                            $conteudo = $linha["conteudo"];
                                            $descricao_obra = $linha["descricao_obra"];

                                            echo "<div class='posted_works'>
                                                
                                                <div class='gallery'>

                                                    <button type='submit'>
                                                        <a title='".$descricao_obra."' href='../".$conteudo."'>
                                                            <img src='../".$conteudo."' class='moldura_obra' style='border-radius: 0px; width: 280px; height: 280px;'>
                                                        </a>
                                                        <h2 id='nome_obra'>$nome_obra</h2>
                                                    </button>
                                            
                                                </div>
                                            
                                            </div>";

                                        }
                                    }
                                ?>
                            </div>

                        </section>

                        <section id="area_sobre">
                            <div id="informacoes_usuario">
                                <p class="dados">
                                    <strong class="informacoes">
                                        <i class='fa fa-user' style='font-size:24px'></i> Nome de Usuário:
                                    </strong>
                                    <?php
                                        echo $nome;
                                    ?>
                                </p>

                                <p class="dados">
                                    <strong class="informacoes">
                                        <i class='fa fa-file-image-o' style='font-size:24px'></i> Publicações:
                                    </strong>

                                    <?php 

                                        $arrayObras = $sql -> query("SELECT * FROM obras
                                                                             WHERE obras.cod_usuario = $cod_usuario");
                                                    
                                        $qtd = mysqli_num_rows($arrayObras);

                                        echo $qtd;
                                        
                                    ?>
                                </p>

                                <p class="dados">
                                    <strong class="informacoes">
                                        <i class='fa fa-users' style='font-size:24px'></i> Seguidores:
                                    </strong>
                                </p>

                                <p class="dados">
                                    <strong class="informacoes">
                                        <i class='fa fa-birthday-cake' style='font-size:24px'></i> Idade:
                                    </strong>
                                </p>
                            </div>
                        </section>

                        <section id="area_amigos">
                            <div id="informacoes_amigos">

                                <div id="contatos_amigos">

                                    <div class="contatos_amigos">
                                        <div id="avatar_amigos">
                                            <img src="../imgs/icone_avatar.png" style="width: 70px; height: 70px; background-image: -webkit-linear-gradient(bottom, rgb(68, 0, 255), rgb(184, 35, 221), rgb(255, 255, 255)); padding: 5px; border-radius: 100%;">
                                            <p id="nome_amigos">Nome do Amigo</p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </section>

                        <section id="area_doar">
                            <div>
                                <div id="doacao">
                                    <div id="titulo_doar">Gostaria de me ajudar com uma doação?</div><br><br>
                                    <p>R$: <input type="text"></p><br><br>

                                    <button type="submit" id="btn_doar">
                                        Doar
                                    </button>
                                </div>

                                <div id="mais_sobre_mim">
                                    <h2 id="titulo_mais_sobre_mim">Você também pode me ajudar conhecendo mais do meu trabalho :)</h2><br><br>
                                    <p>Veja mais: <input type="text" id="input_veja_mais" readonly></p>
                                    <!--https://www.facebook.com/profile.php?id=100002703148716-->
                                </div>
                            </div>
                        </section>

                    </div>
                </div>

                <div id="avatar">
                    <?php 
                        echo "<img src='../$avatar' style='width: 250px; height: 250px; border-radius: 100%;'>";
                    ?>
                </div>

                <nav id="menu_informacoes">
                    <ul>
                        <li>
                            <a id="publicacoes">
                                Publicações <i class='fa fa-th' style='font-size:24px'></i>
                            </a>
                        </li>
                        <li>
                            <a id="sobre">
                                Sobre <i class='fa fa-info-circle' style='font-size:24px'></i>
                            </a>
                        </li>
                        <li>
                            <a id="amigos">
                                Amigos <i class='fa fa-users' style='font-size:24px'></i>
                            </a>
                        </li>
                        <li>
                            <a id="doar">
                                Doar <i class='fa fa-gift' style='font-size:24px'></i>
                            </a>
                        </li>
                    </ul>

                    <?php

                        $dados = $sql -> query("SELECT * FROM usuario WHERE cod_usuario = $cod_usuario");

                        while ($linha = mysqli_fetch_array($dados)){
                            $cod_usuario = $linha["cod_usuario"];
                                    
                            echo "<a href='../manipulacao/alterar.php?cod_usuario=$cod_usuario'>
                                <button class='fa fa-edit' id='btn_editar_perfil'> Editar Perfil</button>
                            </a>";
                        }
                    
                    ?>

                </nav>

                <div id="degrade_inferior" class="container"></div>

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

                <script src="../bibliotecas/jquery.js"></script> <!-- script com a biblioteca -->
                <script src="../bibliotecas/script_jquery_pagina_perfil_criador.js"></script> <!-- script de alterações/configurações com JQuery -->
                <script src="../bibliotecas/magnific-popup.js"></script><!-- Biblioteca Magnific Popup JS -->

                <script>
                    function previewImagem() {
                        var imagem = document.querySelector('input[name=obras]').files[0];
                        var preview = document.querySelector('img.obra');

                        var reader = new FileReader();

                        reader.onloadend = function(){
                            preview.src = reader.result;
                        }

                        if(imagem){
                            reader.readAsDataURL(imagem);
                        }
                        else{
                            preview.src = "";
                        }
                    }
                </script>

                <script>
                    $(document).ready(function() {

                        $('.gallery').magnificPopup({
                            delegate: 'a', // child items selector, by clicking on it popup will open
                            type: 'image',
                            gallery:{
                                enabled:true
                            }
                            // other options
                        });
                    });
                </script>
        
            </footer>

    </body>
    </html>