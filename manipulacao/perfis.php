<?php

    if (!isset($_SESSION)){
        session_start();
    }

    if ($_SESSION["tipo_session"] == 2){
        // Vai liberar o acesso à página de usuario de tipo 2
        header("location: ../interface/pagina_perfil_criador.php");
    }
    else if ($_SESSION["tipo_session"] == 3){
        // Vai liberar o acesso à página de usuario de tipo 3
        header("location: ../interface/pagina_perfil_comum.php");
    }
    /*else{
        // Destruir seção (caso algo dê errado)
        echo "Usuário e página de redirecionamento incompatíveis... =(";
    }*/