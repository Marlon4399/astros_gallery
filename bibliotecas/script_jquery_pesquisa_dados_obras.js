// Processo de pesquisa de obras por nome
$(function(){

    $("#pesquisar_nome").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaNome = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaNome != ""){
            var dadosNome = {
                palavraNome : pesquisaNome
            }

            $.post("../manipulacao/processa_pesquisa_obrasNome.php", dadosNome, function(retornaNome){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoNome").html(retornaNome);
            });
        }

    });

});

// Processo de pesquisa de obras por código
$(function(){

    $("#pesquisar_cod_obra").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaCodObra = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaCodObra != ""){
            var dadosCodObra = {
                palavraCodObra : pesquisaCodObra
            }

            $.post("../manipulacao/processa_pesquisa_obrasCodObra.php", dadosCodObra, function(retornaCodObra){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoCodObra").html(retornaCodObra);
            });
        }

    });

});

// Processo de pesquisa de obras por tipo
$(function(){

    $("#pesquisar_cod_usuario").keyup(function(){

        // Recuperar o valor do campo
        var pesquisaCodUsuario = $(this).val();

        // Verificar se há algo digitado
        if (pesquisaCodUsuario != ""){
            var dadosCodUsuario = {
                palavraCodUsuario : pesquisaCodUsuario
            }

            $.post("../manipulacao/processa_pesquisa_obrasCodUsuario.php", dadosCodUsuario, function(retornaCodUsuario){

                // Mostra dentro da table os resultados obtidos
                $(".resultadoCodUsuario").html(retornaCodUsuario);
            });
        }

    });

});





$(function(){

    // Todas áreas estarão escondidas, exceto a de pesquisa de obras por nome que será a inicial
    $('#pesquisa_por_nome').show();
    $('#pesquisa_por_cod_obra').hide();
    $('#pesquisa_por_cod_usuario').hide();
    
    // Ao clicar serão apresentadas as respectivas areas de conteúdo
    $('#filtro_nome').click(function(){
        $('#pesquisa_por_nome').show();
        $('#pesquisa_por_cod_obra').hide();
        $('#pesquisa_por_cod_usuario').hide();
    });

    $('#filtro_cod_obra').click(function(){
        $('#pesquisa_por_nome').hide();
        $('#pesquisa_por_cod_obra').show();
        $('#pesquisa_por_cod_usuario').hide();
    });

    $('#filtro_cod_usuario').click(function(){
        $('#pesquisa_por_nome').hide();
        $('#pesquisa_por_cod_obra').hide();
        $('#pesquisa_por_cod_usuario').show();
    });

    // Todas as opções do menu de filtros não estarão selecionadas, exceto a de pesquisa de obras por nome
        $('#filtro_nome').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_cod_obra').css("background-color", "");
        $('#filtro_cod_usuario').css("background-color", "");

    // Ao clicar troca a cor de uma opção selecionada do menu de filtros permanentemente
    $('#filtro_nome').click(function(){
        $('#filtro_nome').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_cod_obra').css("background-color", "");
        $('#filtro_cod_usuario').css("background-color", "");
    });

    $('#filtro_cod_obra').click(function(){
        $('#filtro_nome').css("background-color", "");
        $('#filtro_cod_obra').css("background-color", "rgba(0, 0, 0, 0.7)");
        $('#filtro_cod_usuario').css("background-color", "");
    });

    $('#filtro_cod_usuario').click(function(){
        $('#filtro_nome').css("background-color", "");
        $('#filtro_cod_obra').css("background-color", "");
        $('#filtro_cod_usuario').css("background-color", "rgba(0, 0, 0, 0.7)");
    });

});