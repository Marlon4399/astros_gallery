<?php

    $conexão = new PDO('mysql: host=localhost; dbname=galeria', "root", "");

    $select = $conexão->prepare("SELECT * FROM obras");
    $select->execute();
    $fetch = $select->fetchAll();

    foreach($fetch as $obra){
        echo 'Nome da Obra: '.$obra['nome_obra'].
        ',Imagem: '.$obra['conteudo'].
        ',Preço: R$ '.number_format($obra['valor_obra'],2,",",".").
        '<a href="carrinho.php?add=carrinho&cod_obra='.$obra['cod_obra'].'&cod_usuario='.$obra['cod_usuario'].'">Adicionar ao Carrinho</a><br>';
    }
?>