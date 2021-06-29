$(function(){

    // Todas áreas estarão escondidas, exceto a de compras que será a inicial
    $('#area_compras').show();
    $('#area_sobre').hide();
    $('#area_amigos').hide();
    $('#area_doar').hide();
    
    // Ao clicar serão apresentadas as respectivas areas de conteúdo
    $('#compras').click(function(){
        $('#area_compras').show();
        $('#area_sobre').hide();
        $('#area_amigos').hide();
        $('#area_doar').hide();
    });

    $('#sobre').click(function(){
        $('#area_compras').hide();
        $('#area_sobre').show();
        $('#area_amigos').hide();
        $('#area_doar').hide();
    });

    $('#amigos').click(function(){
        $('#area_compras').hide();
        $('#area_sobre').hide();
        $('#area_amigos').show();
        $('#area_doar').hide();
    });

    $('#doar').click(function(){
        $('#area_compras').hide();
        $('#area_sobre').hide();
        $('#area_amigos').hide();
        $('#area_doar').show();
    });

    // Todas as opções do menu de informações não estarão selecionadas, exceto a de compras
    $('#compras').css("background-color", "black");
    $('#sobre').css("background-color", "rgba(0, 0, 0, 0.5)");
    $('#amigos').css("background-color", "rgba(0, 0, 0, 0.5)");
    $('#doar').css("background-color", "rgba(0, 0, 0, 0.5)");

    // Ao clicar troca a cor de uma opção selecionada do menu de informações permanentemente
    $('#compras').click(function(){
        $('#compras').css("background-color", "black");
        $('#sobre').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#amigos').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#doar').css("background-color", "rgba(0, 0, 0, 0.5)");
    });

    $('#sobre').click(function(){
        $('#compras').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#sobre').css("background-color", "black");
        $('#amigos').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#doar').css("background-color", "rgba(0, 0, 0, 0.5)");
    });

    $('#amigos').click(function(){
        $('#compras').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#sobre').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#amigos').css("background-color", "black");
        $('#doar').css("background-color", "rgba(0, 0, 0, 0.5)");
    });

    $('#doar').click(function(){
        $('#compras').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#sobre').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#amigos').css("background-color", "rgba(0, 0, 0, 0.5)");
        $('#doar').css("background-color", "black");
    });

});

// Elaboração de modal para o adicionamento/cadastro de obras
const open_btn_cadastro_obras = document.querySelectorAll("#btn_addPost");
const close_btn_cadastro_obras = document.querySelectorAll("#btn_voltar");

// Abrindo modal ao clicar no botão de addObra que tem o atributo "data-target"
open_btn_cadastro_obras.forEach((btnAddObra) => {
    btnAddObra.addEventListener("click", () => {
        document.querySelector(btnAddObra.dataset.target).classList.add("modal_active");
        document.body.style.overflow = 'hidden';
    });
});

// Fechando modal ao clicar no botão "Voltar" que têm a classe que dá visibilidade na estilização
close_btn_cadastro_obras.forEach((btnAddObra) => {
    btnAddObra.addEventListener("click", () => {
        document.querySelector(btnAddObra.dataset.target).classList.remove("modal_active");
        document.body.style.overflow = 'auto';
    });
});



// Elaboração de modal para apresentação e visualização de obras e suas informações
const open_btn_posts = document.querySelectorAll("#btn_posts_modal");
const close_btn_posts = document.querySelectorAll("#btn_voltar_x");

// Abrindo modal ao clicar numa obra que tem o atributo "data-target"
open_btn_posts.forEach((btnVerObras) => {
    btnVerObras.addEventListener("click", () => {
        document.querySelector(btnVerObras.dataset.target).classList.add("posts_modal_active");
        document.body.style.overflow = 'hidden';
    });
});

// Fechando modal ao clicar no botão "X" (Voltar) que têm a classe que dá visibilidade na estilização
close_btn_posts.forEach((btnVerObras) => {
    btnVerObras.addEventListener("click", () => {
        document.querySelector(btnVerObras.dataset.target).classList.remove("posts_modal_active");
        document.body.style.overflow = 'auto';
    });
});