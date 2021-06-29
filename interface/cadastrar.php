<?php

    include "../conexao/conectar.php";
    
    $dados_tipo_usuario = $sql -> query("SELECT * FROM tipo_usuario");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Astro's Gallery - cadastrar</title>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_cadastrar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.min.js">
</head>
<body>

    <a href="../index.html">
        <button id="btn_voltar">
            Voltar
        </button>
    </a>

    <div id="area_cadastro">
        <div id="lado_tematico_formulario">
            <div id="conteudo_lado_tematico">
                <div id="dica_artes">
                    <h2 id="titulo_dica_artes">Instruções de Cadastro:</h2>
                    <p class="text_dica_artes">
                        Clique nas artes destacadas e distribuídas em determinadas 
                        páginas para obter mais informações sobre elas e do que se 
                        tratam. 
                    </p>
                    <p>
                        <strong style="color: rgb(131, 57, 200);">Exemplo:</strong> pressione a 
                        imagem abaixo, e caso queira ocultar a mensagem, basta
                        pressioná-la novamente.
                    </p>
                </div>

                <div class="popupCadastro" onclick="myFunctionCadastro()">
                    <img src="../imgs/novo_fundo_tematico_cadastro.png" style="width: 90%; height: 60%;">

                    <span class="popuptextCadastro" id="myPopupCadastro">
                        <div style="width: 100%; margin-bottom: 20px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221));">
                            <img src="novo_logo_astro.png" style="width: 100px; height: 100px; background-image: -webkit-linear-gradient( right, rgb(68, 0, 255), rgb(184, 35, 221)); border-radius: 100%; margin: 10px;">
                        </div>
                        <p class="text_popupCadastro">
                            Você tem duas opções para se cadastrar, havendo dois tipos de usuários distintos, são eles:
                        </p>
                        <p class="text_popupCadastro">
                            <strong style="color: rgb(131, 57, 200);">Criador:</strong> esse tipo de usuário é para os
                            artistas e designers, podendo publicar ou postar suas artes, obras ou trabalhos. Dessa forma,
                            querendo se divulgar e apresentar para o mercado, ou não, pretendendo somente demonstrar sua
                            arte compartilhando-a.
                        </p>
                        <p class="text_popupCadastro">
                            <strong style="color: rgb(131, 57, 200);">Comum:</strong> já esse tipo de usuário é 
                            destinado para aqueles que querem mais aproveitar, apreciar e desfrutar de obras artísticas.
                            Sendo considerados os clientes, podendo comprá-las e contribuir com o trabalho dos artistas
                            e designers.
                        </p>
                    </span>
                </div>
            </div>
        </div>

        <form id="formulario" method="POST" action="../manipulacao/salvar.php" enctype="multipart/form-data">

            <div id="parte_superior_formulario">
                <img src="../imgs/icone_avatar.png" id="icone_avatar" style="width: 256px; height: 256px;">

                <label for="avatar" id="label_avatar">
                    <i class="fa fa-camera"></i> Escolha o seu Avatar
                </label>
                <input type="file" name="avatar" id="avatar" onchange="previewImagem()"><br><br>
            </div>

            <div id="conteudo_formulario">

                <h1>Cadastro de Usuário</h1>

                <label>Nome:</label><br>
                <input type="text" name="nome"><br><br>

                <label>CPF:</label><br> 
                <input type="text" name="cpf" maxlength="11"><br><br>

                <label>Email:</label><br>
                <input type="email" name="email"><br><br>

                <label>Senha:</label><br>
                <input type="password" name="senha"><br><br>

                <label>Data de Nascimento:</label><br>
                <input type="date" name="dt_nasc"><br><br>
                
                <label>Tipo:</label><br>
                <select name="tipo">
                    <option>Selecione o Tipo de Usuário:</option>
                    <?php
                        while ($linha = mysqli_fetch_array($dados_tipo_usuario)){
                            $cod_tipo = $linha["cod_tipo"];
                            $nome_tipo = $linha["nome_tipo"];

                            if ($cod_tipo > 1){
                                echo "<option value=$cod_tipo>$nome_tipo</option>";
                            }
                        };
                    ?>
                </select><br>

                <div class="btns">
                    <input type="submit" value="Cadastrar" id="btn_cadastrar">
                    <input type="reset" value="Limpar" id="btn_clear">
                </div>

            </div>

        </form>
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

        <script>
            function previewImagem() {
                var imagem = document.querySelector('input[name=avatar]').files[0];
                var preview = document.querySelector('img#icone_avatar');

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

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            function sweetalertclick(){
                swal({
                    title: "Tudo Limpo",
                    text: "O formulário foi limpo com Sucesso",
                    icon: "success",
                    button: "continuar",
                });    
            }
        </script>

        <script>
            // Quando o usuário clicar na div, abrirá o popup de Instruções para Cadastro
            function myFunctionCadastro() {
                var popupCadastro = document.getElementById("myPopupCadastro");
                popupCadastro.classList.toggle("showCadastro");
            }
        </script>
    </footer>

</body>
</html>