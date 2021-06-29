<!DOCTYPE html>
<html lag="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - endereço</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_endereco.css">
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

    <div id="conteudo">
    <div id="area_endereco">
        <form id="formulario">
    
            <h1 id="titulo_endereco">Digite seu Endereço</h1>

            <img src="../imgs/localizacao_endereco.jpg" id="localizacao_endereco"><br>

            <div id="dados_endereco">
                <div class="row">
                    <div class="column">
                        <label>CEP:</label><br>
                        <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" onblur="pesquisacep(this.value);"><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label>Rua:</label><br> 
                        <input name="rua" type="text" id="rua" size="60"><br><br>
                    </div>
                
                    <div class="column">
                        <label>Bairro:</label><br> 
                        <input name="bairro" type="text" id="bairro" size="40" ><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="column">
                        <label>Cidade:</label><br>
                        <input name="cidade" type="text" id="cidade" size="40"><br><br>
                    </div>

                    <div class="column">
                        <label>Estado:</label><br> 
                        <input name="uf" type="text" id="uf" size="2"><br><br>
                    </div>
                </div>
                
                <div class="row">
                    <div class="column">
                        <label>Complemento:</label><br>
                        <input type="text" name="complemento"><br><br>
                    </div>
                
                    <div class="column">
                        <label>Número:</label><br>
                        <input type="text" name="email"><br><br>
                    </div>
                </div>
            </div>
        
        </form>

        <div id="btns_proximo">
            <a href="pagina_finalizar_pagamento_credito.php">
                <button id="btn_proximo" class="btns">Próximo</button>
            </a>
        </div>
    </div>
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

        <script src="../bibliotecas/endereco.js"></script>
    </footer>

</body>
</html>