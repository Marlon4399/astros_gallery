<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Astro's Gallery - alterar</title>
    <link rel="stylesheet" type="text/css" href="../estilizacao/estilizacao_cadastrar.css">
</head>

<?php

    include "../conexao/conectar.php";

    $cod_usuario = $_GET["cod_usuario"];

    $dados_tipo_usuario = $sql -> query("SELECT * FROM tipo_usuario");

    $dados = $sql -> query("SELECT * FROM usuario WHERE cod_usuario = $cod_usuario");

    while ($linha = mysqli_fetch_array($dados)){
        $cod_usuario = $linha["cod_usuario"];
        $nome = $linha["nome"];
        $cpf = $linha["cpf"];
        $email = $linha["email"];
        $senha = $linha["senha"];
        $dt_nasc = $linha["dt_nasc"];
        $avatar = $linha["avatar"];
        $tipo = $linha["cod_tipo"];
    }

?>

<body>

    <?php

        if ($tipo == 2){
            echo '
                <a href="../interface/pagina_perfil_criador.php">
                    <button id="btn_voltar">
                        Voltar
                    </button>
                </a>
            ';
        }
        else if ($tipo == 3){
            echo '
                <a href="../interface/pagina_perfil_comum.php">
                    <button id="btn_voltar">
                        Voltar
                    </button>
                </a>
            ';
        }

    ?>  

    <div id="area_cadastro">
        <div id="lado_tematico_formulario">
            <img src="../imgs/novo_fundo_tematico_cadastro.png" style="width: 90%; height: 90%;">
        </div>

        <form id="formulario" method="POST" action="salvar_alteracao.php" enctype="multipart/form-data">

            <div id="parte_superior_formulario">
                <img src="../<?php echo "$avatar"; ?>" id="icone_avatar" style="width: 256px; height: 256px;">

                <label for="avatar" id="label_avatar">
                    <i class="fa fa-camera"></i> Escolha o seu Avatar
                </label>
                <input type="file" name="avatar" id="avatar" onchange="previewImagem()"><br><br>
            </div>

            <div id="conteudo_formulario">

                <h1>Edição de Perfil</h1>

                <!--<label>Código:</label><br>
                <input type="text" name="cod_usuario" value="<?php //echo "$cod_usuario"; ?>" readonly cod_usuario="cod_usuario"><br><br>-->

                <label>Nome:</label><br>
                <input type="text" name="nome" value="<?php echo "$nome"; ?>"><br><br>

                <label>CPF:</label><br> 
                <input type="text" name="cpf" value="<?php echo "$cpf"; ?>" readonly><br><br> 

                <label>Email:</label><br>
                <input type="email" name="email" value="<?php echo "$email"; ?>"><br><br>

                <label>Senha:</label><br> <!-- Falta por no BD -->
                <input type="password" name="senha" value="<?php echo "$senha"; ?>"><br><br>

                <label>Data de Nascimento:</label><br>
                <input type="date" name="dt_nasc" value="<?php echo "$dt_nasc"; ?>" readonly><br><br>

                <label>Tipo:</label><br>
                <?php 
                    while ($linha = mysqli_fetch_array($dados_tipo_usuario)){
                        $cod_tipo = $linha["cod_tipo"];
                        $nome_tipo = $linha["nome_tipo"];
    
                        if ($cod_tipo > 1 AND $cod_tipo == $tipo){
                            echo "<input name='tipo' value='$nome_tipo'; readonly><br><br>";
                        }
                    };
                ?>

                <div class="btns">
                    <input type="submit" value="Alterar" id="btn_cadastrar">
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
    </footer>

</body>
</html>

