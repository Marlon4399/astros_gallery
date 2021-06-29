<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Astro's Gallery - alterar</title>
    <link rel="stylesheet" type="text/css" href="estilizacao_alterar_dados.css">
</head>

<?php

    include "conectar.php";

    $cod_obra = $_GET["cod_obra"];

    $dados_usuario = $sql -> query("SELECT * FROM cod_usuario");

    $dados = $sql -> query("SELECT * FROM obras WHERE cod_obra = $cod_obra");

    while ($linha = mysqli_fetch_array($dados)){
        $cod_obra = $linha["cod_obra"];
        $nome_obra = $linha["nome_obra"];
        $conteudo = $linha["conteudo"];
        $descricao_obra = $linha["descricao_obra"];
        $valor_obra = $linha["valor_obra"];
        $cod_usuario = $linha["cod_usuario"];
    }

?>

<body>

    <a href="pagina_dados_obras.php">
        <button id="btn_voltar">
            Voltar
        </button>
    </a>

    <div id="area_alterar_dados">
        <div id="lado_tematico_formulario">
            <img src="novo_fundo_tematico_cadastro.png" style="width: 90%; height: 90%;">
        </div>

        <form id="formulario" method="POST" action="salvar_alteracao_dados_obras.php" enctype="multipart/form-data">

            <div id="conteudo_formulario" style="margin-top: 75px;">

                <h1 id="titulo_alteracao_dados_obras">Alteração de Dados da Obra</h1>

                <label>Código da Obra:</label><br>
                <input type="text" name="cod_obra" value="<?php echo "$cod_obra"; ?>" cod_obra="cod_obra"><br><br>

                <label>Nome:</label><br>
                <input type="text" name="nome" value="<?php echo "$nome_obra"; ?>"><br><br>

                <!--<label>Conteúdo:</label><br> 
                <input type="file" name="conteudo" value="<?php //echo "$conteudo"; ?>" id="conteudo" onchange="previewImagem()"><br><br>-->

                <img src="<?php echo "$conteudo"; ?>" id="icone_conteudo" style="width: 256px; height: 256px;">

                <label for="conteudo" id="label_conteudo">
                    <i class="fa fa-camera"></i> Altere o seu Conteúdo
                </label>
                <input type="file" name="conteudo" id="conteudo" onchange="previewImagem()"><br><br>

                <label>Descrição:</label><br>
                <input type="text" name="descricao" value="<?php echo "$descricao_obra"; ?>"><br><br>

                <label>Valor:</label><br>
                <input type="text" name="valor" value="<?php echo "$valor_obra"; ?>"><br><br>

                <label>Código do Usuário:</label><br>
                <?php 
                    echo "<input name='cod_usuario' value='$cod_usuario'; readonly><br><br>";
                ?>
                        
                <div class="btns">
                    <input type="submit" value="Alterar" id="btn_cadastrar">
                    <input type="reset" value="Limpar" id="btn_clear">
                </div>

            </div>

        </form>
    </div>

    <footer id="rodape">
        
        <p id="copyright">© Copyright 2021. Todos os direitos reservados.</p>

        <script>
            function previewImagem() {
                var imagem = document.querySelector('input[name=conteudo]').files[0];
                var preview = document.querySelector('img#icone_conteudo');

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

