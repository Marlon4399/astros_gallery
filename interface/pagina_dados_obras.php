<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Astro's Gallery - dados obras</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_dados_obras.css">
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

            <div id="area_dadosObras">
                <div id="conteudo_dadosObras" class="container">

                    <div id="fundo_titulo">
                        <h1 id="titulo_dadosObras">Dados Obras</h1>
                    </div>

                    <nav id="menu_filtros">
                        <h2 id="titulo_filtros">Filtros de Pesquisa</h2>
                        <ul id="lista_filtros">
                            <li class="linha_filtros">
                                <a class="item_filtros" id="filtro_nome">
                                    Nome
                                </a>
                                <a class="item_filtros" id="filtro_cod_obra">
                                    Código
                                </a>
                                <a class="item_filtros" id="filtro_cod_usuario">
                                    Cód. Usuário
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="organizando_filtros">

                        <section id="pesquisa_por_nome">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_nome" id="pesquisar_nome" placeholder="Digite o nome da obra:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoNome">
                                <tr>
                                    <th>Código da Obra</th>
                                    <th>Nome</th>
                                    <th>Conteúdo</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Código do Usuário</th>
                                    <th colspan="2">Ação</th>
                                </tr>
                            </table>
                        </section>

                        <section id="pesquisa_por_cod_obra">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_cod_obra" id="pesquisar_cod_obra" placeholder="Digite o código da obra:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoCodObra">
                                <tr>
                                    <th>Código da Obra</th>
                                    <th>Nome</th>
                                    <th>Conteúdo</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Código do Usuário</th>
                                    <th colspan="2">Ação</th>
                                </tr>
                            </table>
                        </section>

                        <section id="pesquisa_por_cod_usuario">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_cod_usuario" id="pesquisar_cod_usuario" placeholder="Digite o código do usuário a quem pertence a obra:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoCodUsuario">
                                <tr>
                                    <th>Código da Obra</th>
                                    <th>Nome</th>
                                    <th>Conteúdo</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Código do Usuário</th>
                                    <th colspan="2">Ação</th>
                                </tr>
                            </table>
                        </section>
                        
                    </div>

                </div>
            </div>

        <footer id="rodape">
            <p>© Copyright 2021. Todos os direitos reservados.</p>

            <script src="../bibliotecas/jquery.js"></script> <!-- script com a biblioteca -->
            <script src="../bibliotecas/script_jquery_pesquisa_dados_obras.js"></script> <!-- script de alterações/configurações com JQuery -->
        </footer>

</body>
</html>