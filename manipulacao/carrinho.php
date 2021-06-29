<?php

    session_start();

    include "conectar.php";

    $dados = $sql -> query("SELECT * FROM usuario");

    while ($linha = mysqli_fetch_array($dados)){
        $cod_usuario = $linha["cod_usuario"];
    }

    if(!isset($_SESSION['itens'])){
        $_SESSION['itens'] = array();
    }

    if(isset($_GET['add']) && $_GET['add'] == "carrinho"){
        /* Adicionando itens ao carrinho*/
        $cod = $_GET['cod_obra'];
        //$valor = $_GET['valor_obra'];
        
        if(!isset($_SESSION['itens'] [$cod])){
            $_SESSION['itens'] [$cod] = 1;
        }else{
           echo 'Esse Item Já foi adicionado ao carrinho <br>';
        }
    }
    /* Ixibição dos Itens adicionados ao carrinhos*/
    if(count($_SESSION['itens']) == 0){
        echo 'Você Não possui Itens no Carrinho :( <br><a href="teste_carrinho.php">Adicionar Itens</a>';
    }else{
        $valores = array();
        $conexão = new PDO('mysql: host=localhost; dbname=galeria', "root", "");
        foreach($_SESSION['itens'] as $cod => $quantidade)
        {
        $select = $conexão->prepare("SELECT * FROM obras WHERE cod_obra=?");
        $select->bindParam(1,$cod);
        $select->execute();
        $obra = $select->fetchAll();
        $preco = $obra[0]['valor_obra'];
        $nome = $obra[0]['nome_obra'];
        //$total = $quantidade * $obra [0]['valor_obra'];
        //$total = "SELECT SUM(valor_obra) from obras";

        echo 
            'Nome:'.$nome.'<br>
            Preço:'.number_format($preco,2,",",".").'<br>
            Quantidade: '. $quantidade.'<br>
            <a href="remover.php?remover=carrinho&cod_obra='.$cod.'">Remover</a>
            <hr>';

            array_push($valores, $preco);
            $total = array_sum($valores)."\n";

        }

        $caminho = "obras-".$cod_usuario."/".$nome;

        print_r($valores);
        echo '<br><a href="teste_carrinho.php">Continuar Comprando</a>';
        echo '<a href="'.$caminho.'" download="download">';
        //$soma = $_SESSION['itens'];
        echo "<br>Total = ".$total;
    
    }