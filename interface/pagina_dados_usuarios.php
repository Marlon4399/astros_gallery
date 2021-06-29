<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Astro's Gallery - dados usuários</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_pagina_dados_usuarios.css">
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

            <div id="area_dadosUsuarios">
                <div id="conteudo_dadosUsuarios" class="container">

                    <div id="fundo_titulo">
                        <h1 id="titulo_dadosUsuarios">Dados Usuários</h1>
                    </div>

                    <nav id="menu_filtros">
                        <h2 id="titulo_filtros">Filtros de Pesquisa</h2>
                        <ul id="lista_filtros">
                            <li class="linha_filtros">
                                <a class="item_filtros" id="filtro_nome">
                                    Nome
                                </a>
                                <a class="item_filtros" id="filtro_cod">
                                    Código
                                </a>
                                <a class="item_filtros" id="filtro_tipo">
                                    Tipo
                                </a>
                            </li>
                        </ul>
                    </nav>

                    <div class="organizando_filtros">

                        <section id="pesquisa_por_nome">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_nome" id="pesquisar_nome" placeholder="Digite o nome do usuário:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoNome">
                                <tr>
                                    <th>Código do Usuário</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Data de Nascimento</th>
                                    <th>Avatar</th>
                                    <th>Tipo</th>
                                    <th colspan="2">Ação</th>
                                </tr>
                            </table>
                        </section>

                        <section id="pesquisa_por_cod">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_cod" id="pesquisar_cod" placeholder="Digite o código do usuário:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoCod">
                                <tr>
                                    <th>Código do Usuário</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Data de Nascimento</th>
                                    <th>Avatar</th>
                                    <th>Tipo</th>
                                    <th colspan="2">Ação</th>
                                </tr>
                            </table>
                        </section>

                        <section id="pesquisa_por_tipo">
                            <form method="POST" id="area_pesquisa" action="">

                                <input type="text" name="pesquisar_tipo" id="pesquisar_tipo" placeholder="Digite o tipo do usuário:">
                                <i class='fa fa-search' style='font-size:36px; margin: 10px;'></i>
                                            
                            </form>

                            <table class="resultadoTipo">
                                <tr>
                                    <th>Código do Usuário</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Senha</th>
                                    <th>Data de Nascimento</th>
                                    <th>Avatar</th>
                                    <th>Tipo</th>
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
            <script src="../bibliotecas/script_jquery_pesquisa_dados_usuarios.js"></script> <!-- script de alterações/configurações com JQuery -->
        </footer>

</body>
</html>