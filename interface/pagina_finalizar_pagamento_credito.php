<!DOCTYPE html>
<html lag="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - finalizar pagamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_finalizar_pagamento.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.min.js">
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

    <h1 id="titulo_confirmacao_dados">Confirmação de Dados - Cartão de Crédito</h1>

    <div class="area_alteracao_pagamento">
        <div class="opcao_pagamento_credito">
            <img src="../imgs/cartao_na_maquininha.jpg" style="border-radius: 15px 0px 0px 15px; width: 600px; height: 100%; margin: 0px;">
        
            <form id="form_credito">
                <img src="../imgs/cartao_credito.png" style="border-radius: 0px; width: 250px; height: 200px; border: 10px solid goldenrod; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); padding: 10px;"><br>

                <label>Código de Segurança:</label><br>
                <input type="text" name="cod_seguranca"><br><br>

                <label>Número de Cartão:</label><br>
                <input type="text" name="numero_cartao"><br><br>
                        
                <label>CPF:</label><br>
                <input type="text" name="cpf"><br><br>

                <label>Data de Validade:</label><br>
                <input type="date" name="dt_validade"><br><br>
                    
                <label>Nome Escrito no Cartão:</label><br>
                <input type="text" name="nome_escrito_cartao"><br><br>
                        
            </form>
        </div>       
    </div>

    <h1 id="titulo_confirmacao_dados">Confirmação de Dados - Endereço</h1>

    <div class="area_alteracao_endereco">
        <div class="area_endereco">
                
            <form id="form_endereco" action="" method="POST" enctype="multipart/form-data">

                <img src="../imgs/localizacao_endereco.jpg" style="border-radius: 0px; width: 250px; height: 200px; border: 10px solid goldenrod; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); padding: 10px;"><br>

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
                            <label>Tipo de Endereço:</label><br>
                            <select name="tipo">
                                <option>Selecione o Tipo de Endereço:</option>
                                <?php
                                    while ($linha = mysqli_fetch_array($dados_tipo_endereco)){
                                        $cod_tipo_endereco = $linha["cod_tipo"];
                                        $casa = $linha["casa"];
                                        echo "<option value=$cod_tipo_endereco>$casa</option>";
                                    };
                                ?>
                            </select><br><br>
                        </div>
                    
                        <div class="column">
                            <label>Número:</label><br>
                            <input type="text" name="email"><br><br>
                        </div>
                    </div>
                </div>
            
            </form>

            <img src="../imgs/maps_navegacao.jpg" style="border-radius: 0px 15px 15px 0px; width: 600px; height: 100%; margin: 0px;">
        </div>
    </div>

    <div id="area_finalizacao">
        <a href="#">
            <button id="btn_finalizar" onclick="sweetalertclick()">Finalizar</button>
        </a>
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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function sweetalertclick(){
                swal({
                    title: "Compra Finalizada com Sucesso!!",
                    text: "Espere até a confirmação do pagamento e \n você poderá desfrutar de sua nova arte Sem Problemas",
                    icon: "success",
                    button: "Confirmar"
                })
                .then(function() {
                    window.location = "pagina_home.php";
                });
            }
        </script>
    </footer>

</body>
</html>