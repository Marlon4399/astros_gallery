<!DOCTYPE html>
<html lag="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Astro's Gallery - pagamento</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="estilizacao_antiga_pagina_pagamento.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <header id="cabecalho">

        <div class="container">

			<div id="logo">
				<img src="novo_logo_astro.png">

                <img src="nome_logo.png" id="nome_logo">
			</div>

			<nav id="menu_h">
                <ul id="lista_h">
                    <li class="linha_h">
                        <a href="#" class="item_h">
                            <i class='fa fa-home' style='font-size:24px'></i> Home
                        </a>
                    </li>
                    <li class="linha_h"><a href="#" class="item_h">Quem somos</a></li>
                    <li class="linha_h"><a href="#" class="item_h">Serviços</a></li>
                    <li class="linha_h"><a href="#" class="item_h">Fale conosco</a></li>
                </ul>
            </nav>

		</div>

    </header>

    <div id="degrade_superior" class="container"></div>

    <div id="area_pagamento" class="container">

        <div id="obra">
            <div id="moldura">
                <img src="icone_arte.png" id="icone_obra">
            </div>

            <h3>Nome da Obra/Trabalho</h3>
            <p>Informações referentes a obra/trabalho...</p>
        </div>

        <div id="conteudo">
            <div id="informacoes_pagamento">
                <h2>$Preço_da_Obra (ou informação de que não está à venda)</h2>
                <p>em/ou até <strong>x(vezes)</strong> de <strong>$Preço_das_Parcelas</strong></p>
                
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

                <label>Tipo de Pagamento:</label><br>
                <select name="tipo">
                    <option>Selecione a Opção de Pagamento:</option>
                </select><br><br>

                <button type="button" id="btn_comprar">
                    <i class='fa fa-shopping-basket' style='font-size:24px'></i> Comprar
                </button>
            </div>
        </div>

    </div>

    <div id="degrade_inferior" class="container"></div>

    <footer id="rodape">
        <p>© Copyright 2021. Todos os direitos reservados.</p>
    </footer>

</body>
</html>