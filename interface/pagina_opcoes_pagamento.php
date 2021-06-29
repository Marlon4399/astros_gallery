<!DOCTYPE html>
<html lag="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - opções de pagamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_opcoes_pagamento.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../imgs/favicon_novo_logo_astro.png">
</head>
<body>

    <div class="opcao_pagamento_credito_modal">
        <div class="conteudo_credito_modal">

            <form id="form_credito_modal">
                <img src="../imgs/cartao_credito.png" class="img_cartoes"><br><br>
                
                <div class="row">
                    <div class="column">
                        <label>Código de Segurança:</label><br>
                        <input type="text" name="cod_seguranca"><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label>Número de Cartão:</label><br>
                        <input type="text" name="numero_cartao"><br><br>
                    </div>

                    <div class="column">
                        <label>CPF:</label><br>
                        <input type="text" name="cpf"><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label>Data de Validade:</label><br>
                        <input type="date" name="dt_validade"><br><br>
                    </div>

                    <div class="column">
                        <label>Nome Escrito no Cartão:</label><br>
                        <input type="text" name="nome_escrito_cartao"><br><br>
                    </div>
                </div>

                <a href="pagina_endereco_credito.php">
                    <button type="button" class="btn_continuar">
                        Continuar
                    </button>
                </a>
            
            </form>

            <button class="btn_voltar_opcoes_pagamento" data-target=".opcao_pagamento_credito_modal">
                Voltar
            </button>
            
        </div>
    </div>

    <div class="opcao_pagamento_debito_modal">
        <div class="conteudo_debito_modal">

            <form id="form_debito_modal">
                <img src="../imgs/cartao_debito.png" class="img_cartoes"><br><br>
                
                <div id="dados_debito">
                    <div class="row">
                        <div class="column">
                            <label>Código de Segurança:</label><br>
                            <input type="text" name="cod_seguranca"><br><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <label>Número de Cartão:</label><br>
                            <input type="text" name="numero_cartao"><br><br>
                        </div>

                        <div class="column">
                            <label>CPF:</label><br>
                            <input type="text" name="cpf"><br><br>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <label>Data de Validade:</label><br>
                            <input type="date" name="dt_validade"><br><br>
                        </div>

                        <div class="column">
                            <label>Nome Escrito no Cartão:</label><br>
                            <input type="text" name="nome_escrito_cartao"><br><br>
                        </div>
                    </div>
                </div>

                <a href="pagina_endereco_debito.php">
                    <button type="button" class="btn_continuar">
                        Continuar
                    </button>
                </a>
            </form>

            <button class="btn_voltar_opcoes_pagamento" data-target=".opcao_pagamento_debito_modal">
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

    <div id="area_pagamento" class="container">

        <div id="obra">
            <div id="degrade_superior" class="container"></div>

            <div id="moldura">
                <img src="../imgs/icone_obra2.png" id="icone_obra">
            </div>

            <h3>Nome da Obra/Trabalho</h3>
            <p>Informações referentes a obra/trabalho...</p>

            <div id="degrade_inferior" class="container"></div>
        </div>

        <div id="conteudo">

            <div id="informacoes_pagamento">
                <h1 id="titulo_opcoes_pagamento">Escolha uma das opções de pagamento:</h1>

                <img src="../imgs/cartao_credito_debito.png" id="img_opcoes_pagamento">

                <a id="btn_dados_cartao_credito">
                    <button class="btns" data-target=".opcao_pagamento_credito_modal">
                        Cartão de Crédito
                    </button>
                </a>
                <a id="btn_dados_cartao_debito">
                    <button class="btns" data-target=".opcao_pagamento_debito_modal">
                        Cartão de Débito
                    </button>
                </a>

            </div>
        </div>

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

                    <p class="contato_email">jhonhenrique428@gmail.com</p>
                    <p>jhon.oliveira@etec.sp.gov.br</p>

                    <p class="contato_email">gamasouza82@gmail.com</p>
                    <p>leonardo.souza395@etec.sp.gov.br</p>

                    <p class="contato_email">marlinhoda30@gmail.com</p>
                    <p>marlon.castor@etec.sp.gov.br</p>

                    <i class="fa fa-envelope" style="font-size: 84px; float: right; margin-top: -200px; color: rgb(131, 57, 200);"></i>
                </div>
            </a>
        </div>

        <p id="copyright">© Copyright 2021. Todos os direitos reservados.</p>

        <script src="../bibliotecas/jquery.js"></script> <!-- script com a biblioteca -->
        <script src="../bibliotecas/script_jquery_pagina_opcoes_pagamento.js"></script> <!-- script de alterações/configurações com JQuery -->
    </footer>

</body>
</html>