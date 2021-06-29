// Processo de pesquisa de usuários por nome
$(function(){

    $("#pesquisar_nome").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaNome = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaNome != ""){
            var dadosNome = {
                palavraNome : pesquisaNome
            }

            $.post("../manipulacao/processa_pesquisa_usuarioNome.php", dadosNome, function(retornaNome){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoNome").html(retornaNome);
            });
        }

    });

});

// Processo de pesquisa de usuários por código
$(function(){

    $("#pesquisar_cod").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaCod = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaCod != ""){
            var dadosCod = {
                palavraCod : pesquisaCod
            }

            $.post("../manipulacao/processa_pesquisa_usuarioCod.php", dadosCod, function(retornaCod){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoCod").html(retornaCod);
            });
        }

    });

});

// Processo de pesquisa de usuários por tipo
$(function(){

    $("#pesquisar_tipo").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaTipo = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaTipo != ""){
            var dadosTipo = {
                palavraTipo : pesquisaTipo
            }

            $.post("../manipulacao/processa_pesquisa_usuarioTipo.php", dadosTipo, function(retornaTipo){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoTipo").html(retornaTipo);
            });
        }

    });

});





$(function(){

    // Todas áreas estarão escondidas, exceto a de pesquisa de usuário por nome que será a inicial
    $('#pesquisa_por_nome').show();
    $('#pesquisa_por_cod').hide();
    $('#pesquisa_por_tipo').hide();
    
    // Ao clicar serão apresentadas as respectivas areas de conteúdo
    $('#filtro_nome').click(function(){
        $('#pesquisa_por_nome').show();
        $('#pesquisa_por_cod').hide();
        $('#pesquisa_por_tipo').hide();
    });

    $('#filtro_cod').click(function(){
        $('#pesquisa_por_nome').hide();
        $('#pesquisa_por_cod').show();
        $('#pesquisa_por_tipo').hide();
    });

    $('#filtro_tipo').click(function(){
        $('#pesquisa_por_nome').hide();
        $('#pesquisa_por_cod').hide();
        $('#pesquisa_por_tipo').show();
    });

    // Todas as opções do menu de filtros não estarão selecionadas, exceto a de pesquisa de usuário por nome
        $('#filtro_nome').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_cod').css("background-color", "");
        $('#filtro_tipo').css("background-color", "");

    // Ao clicar troca a cor de uma opção selecionada do menu de filtros permanentemente
    $('#filtro_nome').click(function(){
        $('#filtro_nome').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_cod').css("background-color", "");
        $('#filtro_tipo').css("background-color", "");
    });

    $('#filtro_cod').click(function(){
        $('#filtro_nome').css("background-color", "");
        $('#filtro_cod').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_tipo').css("background-color", "");
    });

    $('#filtro_tipo').click(function(){
        $('#filtro_nome').css("background-color", "");
        $('#filtro_cod').css("background-color", "");
        $('#filtro_tipo').css("background-color", "rgba(0, 0, 0, 0.7)");
    });

});