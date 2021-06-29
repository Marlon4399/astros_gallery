<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Astro's Gallery - alterar</title>
    <link rel="stylesheet" type="text/css" href="estilizacao_alterar_dados.css">
</head>

<?php

    include "conectar.php";

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

    <a href="pagina_dados_usuarios.php">
        <button id="btn_voltar">
            Voltar
        </button>
    </a>

    <div id="area_alterar_dados">
        <div id="lado_tematico_formulario">
            <img src="novo_fundo_tematico_cadastro.png" style="width: 90%; height: 90%;">
        </div>

        <form id="formulario" method="POST" action="salvar_alteracao_dados_usuarios.php" enctype="multipart/form-data">

            <div id="parte_superior_formulario">
                <img src="<?php echo "$avatar"; ?>" id="icone_avatar" style="width: 256px; height: 256px; border-radius: 100%;">

                <label for="avatar" id="label_avatar">
                    <i class="fa fa-camera"></i> Altere o seu Avatar
                </label>
                <input type="file" name="avatar" id="avatar" onchange="previewImagem()"><br><br>
            </div>

            <div id="conteudo_formulario" style="margin-top: 140px;">

                <h1>Alteração de Dados do Usuário</h1>

                <label>Código:</label><br>
                <input type="text" name="cod_usuario" value="<?php echo "$cod_usuario"; ?>" cod_usuario="cod_usuario"><br><br>

                <label>Nome:</label><br>
                <input type="text" name="nome" value="<?php echo "$nome"; ?>"><br><br>

                <label>CPF:</label><br> 
                <input type="text" name="cpf" value="<?php echo "$cpf"; ?>" maxlength="11"><br><br> 

                <label>Email:</label><br>
                <input type="email" name="email" value="<?php echo "$email"; ?>"><br><br>

                <label>Senha:</label><br> <!-- Falta por no BD -->
                <input type="password" name="senha" value="<?php echo "$senha"; ?>"><br><br>

                <label>Data de Nascimento:</label><br>
                <input type="date" name="dt_nasc" value="<?php echo "$dt_nasc"; ?>"><br><br>

                <label>Tipo:</label><br>
                <select name="tipo">
                    <option><?php echo $tipo; ?></option>
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

