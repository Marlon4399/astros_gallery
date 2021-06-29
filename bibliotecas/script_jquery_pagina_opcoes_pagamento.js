// Elaboração de modais para as opções de pagamento de crédito e débito
const open_btns = document.querySelectorAll("[data-target]");
const close_btns = document.querySelectorAll(".btn_voltar_opcoes_pagamento");

// Abrindo modais ao clicar nos botões de opção de cartão que tem o atributo "data-target"
open_btns.forEach((btnsCreditoDebito) => {
    btnsCreditoDebito.addEventListener("click", () => {
        document.querySelector(btnsCreditoDebito.dataset.target).classList.add("modal_active");
        document.body.style.overflow = 'hidden';
    });
});

// Fechando modais ao clicar nos botões "Voltar" que têm a classe que dá visibilidade na estilização
close_btns.forEach((btnsCreditoDebito) => {
    btnsCreditoDebito.addEventListener("click", () => {
        document.querySelector(btnsCreditoDebito.dataset.target).classList.remove("modal_active");
        document.body.style.overflow = 'auto';
    });
});