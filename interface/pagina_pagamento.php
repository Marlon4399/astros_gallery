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
    else if ($_SESSION["tipo_session"] != 2 AND $_SESSION["tipo_session"] != 3){
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
	<title>Astro's Gallery - pagamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_pagamento.css">
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
                        <a href="../index.html" class="item_h">
                            Sair <i class='fa fa-sign-out' style='font-size:24px'></i>
                        </a>
                    </li>
                </ul>
            </nav>

		</div>

    </header>

    <div id="fundo_tematico_pagamento">
        <div class="popupPagamento" onclick="myFunctionPagamento()">
            <img src="../imgs/fundo_tematico_pagamento.png" style="width: 600px; height: 300px; filter: drop-shadow(50px 25px 0px #000000);">

            <span class="popuptextPagamento" id="myPopupPagamento">
                <div style="width: 100%; margin-bottom: 20px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); height: 95px;">
                    <img src="../imgs/novo_logo_astro.png" style="width: 75px; height: 75px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); border-radius: 100%; margin: 10px;">
                </div>
                <p class="text_popupPagamento">
                    Esta é a área de pagamento, onde você irá passar por diferentes etapas preenchendo-as com
                    seus determinados dados até poder enfim efetuar sua compra. Sendo elas:
                </p>
                <p class="text_popupPagamento">
                    <strong style="color: rgb(131, 57, 200);">Opções de Pagamento:</strong> aqui se escolhe
                    a a forma ou tipo de pagamento e se insere as informações do cartão, podendo ser tanto de 
                    crédito quanto de débito.
                </p>
                <p class="text_popupPagamento">
                    <strong style="color: rgb(131, 57, 200);">Endereço:</strong> nessa etapa ocorre a inserção
                    dos dados de endereço, morada ou destino.
                </p>
                <p class="text_popupPagamento">
                    <strong style="color: rgb(131, 57, 200);">Finalizar Pagamento:</strong> já nessa é onde são
                    feitas as confirmações dos dados estabelecidos até então para finalização da compra.
                </p>
            </span>
        </div>
    </div>

    <div id="area_pagamento" class="container">

        <div id="chat_negociacao">
            <div id="chat_parte_superior">
                <h2 id="negociacao">
                    <i class='fa fa-handshake-o' style='font-size:24px'></i> Negociação
                    <i class='fa fa-window-close' style='font-size:36px; margin-left: 150px;'></i>
                </h2>
            </div>

            <div id="conteudo_chat_negociacao">
                <!--fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf
                fauihdsafui huyfdsw gdafhsdg afuhsd gafuysga fygasd fuygfd gayu fasdf-->
            </div>

            <div id="chat_parte_inferior">
                <input type="text" placeholder="Negocie por aqui" id="negociar">
                <i class='fa fa-send' style='font-size:24px' id="icone_enviar"></i>
            </div>
        </div>

            <?php 
                $cod_obra = $_GET["cod_obra"];

                    $arrayObras = $sql -> query("SELECT * FROM obras INNER JOIN usuario ON obras.cod_usuario = usuario.cod_usuario
                                                         WHERE cod_obra = $cod_obra");
                                    
                    while ($linha = mysqli_fetch_array($arrayObras)){
                        $cod_usuario = $linha["cod_usuario"];
                        $nome = $linha["nome"];
                        $avatar = $linha["avatar"];

                        $cod_obra = $linha["cod_obra"];
                        $nome_obra = $linha["nome_obra"];
                        $conteudo = $linha["conteudo"];
                        $descricao_obra = $linha["descricao_obra"];
                        $valor_obra = $linha["valor_obra"];
                        $cod_usuario = $linha["cod_usuario"];
                                    
                        echo "
                            <div id='obra'>
                                <div id='obra_parte_superior'>
                                    <div id='avatar'>
                                        <img src='../".$avatar."' style='width: 50px; height: 50px; border-radius: 100%;'>
                                        <p id='nome_usuario'>".$nome."</p>
                                    </div>
                                </div>
                    
                                <div id='conteudo_obra'>
                                    <div id='moldura'>
                                        <img src='../".$conteudo."' id='icone_obra'>
                                    </div>
                    
                                    <div id='informacoes_obra'>
                                        <h2 id='nome_obra'>".$nome_obra."</h2>
                                        
                                        <h1 id='preco_obra'>
                                            R$ ".$valor_obra."
                                        </h1>
                                        <p>ou até <strong>0x de $0,00</strong> sem juros 
                                            <a href='#' style='color: rgb(145, 25, 192); text-decoration: none;'>(ver parcelamento)</a>
                                        </p>
                                        
                                        <div id='comprando'>
                                            <a href='pagina_opcoes_pagamento.php'>
                                                <button type='button' id='btn_comprar'>
                                                    <i class='fa fa-shopping-basket' style='font-size:24px'></i> Comprar
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id='descricao_obra'>
                                <div id='descricao_parte_superior' class='container'>
                                    <h2 id='descricao'><i class='fa fa-list-alt' style='font-size:24px'></i> Descrição do Produto</h2>
                                </div>

                                <id id='conteudo_descricao'>
                                    <p id='informacoes_descricao'>
                                        <strong id='titulo_obra'>
                                            ".$nome_obra."
                                        </strong><br>
                                        ".$descricao_obra."
                                    </p>
                                </id>
                            </div>
                        ";
                    }
                
            ?>

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

        <script>
            // Quando o usuário clicar na div, abrirá o popup de Instruções para Pagamento
            function myFunctionPagamento() {
                var popupPagamento = document.getElementById("myPopupPagamento");
                popupPagamento.classList.toggle("showPagamento");
            }
        </script>
    </footer>

</body>
</html>