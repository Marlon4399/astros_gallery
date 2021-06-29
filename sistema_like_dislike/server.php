<?php 
    
    /*session_start();

    // Não permite acessar a página principal pelo navegador
    // Senão existir a seção volta pela página de erro
    if (!isset($_SESSION["login_session"])       AND
        !isset($_SESSION["senha_session"])       AND
        !isset($_SESSION["cod_usuario_session"]) AND
        !isset($_SESSION["tipo_session"])
    ){
        header("location: erro_url.html");
        exit;
    }
    // Bloquear página ao tentar ir pela url sem logar
    else if ($_SESSION["tipo_session"] != 2 AND $_SESSION["tipo_session"] != 3){
        session_destroy();
        header("location: erro_url.html");
    }

    $cod_usuario_logado = $_SESSION["cod_usuario_session"];*/

    // conectar ao banco de dados
    $conn = mysqli_connect('localhost', 'root', '', 'galeria');

    // vamos assumir que um usuário está logado com id $ cod_usuario
    $cod_usuario = 28; //$cod_usuario_logado

    if (!$conn) {
        die("Error connecting to database: " . mysqli_connect_error($conn));
        exit();
    }

// se o usuário clicar no botão de gostar ou não gostar
if (isset($_POST['action'])) {
    $cod_obra = $_POST['cod_obra'];
    $action = $_POST['action'];

    switch ($action) {
        case 'like':
            $sql="INSERT INTO rating_info (cod_usuario, cod_obra, rating_action) 
                                VALUES ($cod_usuario, $cod_obra, '$action') 
                        ON DUPLICATE KEY UPDATE rating_action='like'";
            break;
        case 'dislike':
            $sql="INSERT INTO rating_info (cod_usuario, cod_obra, rating_action) 
                                VALUES ($cod_usuario, $cod_obra, '$action') 
                        ON DUPLICATE KEY UPDATE rating_action='dislike'";
            break;
        case 'unlike':
            $sql="DELETE FROM rating_info WHERE cod_usuario=$cod_usuario AND cod_obra=$cod_obra";
            break;
        case 'undislike':
            $sql="DELETE FROM rating_info WHERE cod_usuario=$cod_usuario AND cod_obra=$cod_obra";
            break;
        default:
            break;
    }

    // executa a consulta para efetuar mudanças no banco de dados ...
    mysqli_query($conn, $sql);
    echo getRating($cod_obra);
    exit(0);
}

// Obtenha o número total de curtidas para uma determinada postagem
function getLikes($id)
{
    global $conn;

    $sql = "SELECT COUNT(*) FROM rating_info 
                           WHERE cod_obra = $id AND rating_action='like'";

    $rs = mysqli_query($conn, $sql);

    $result = mysqli_fetch_array($rs);

    return $result[0];
}

// Obtenha o número total de não gostos de uma determinada postagem
function getDislikes($id)
{
    global $conn;

    $sql = "SELECT COUNT(*) FROM rating_info 
            WHERE cod_obra = $id AND rating_action='dislike'";

    $rs = mysqli_query($conn, $sql);

    $result = mysqli_fetch_array($rs);

    return $result[0];
}

// Obtenha o número total de gostos e não gostos de uma determinada postagem
function getRating($id)
{
    global $conn;
    $rating = array();

    $likes_query = "SELECT COUNT(*) FROM rating_info 
                                   WHERE cod_obra = $id AND rating_action='like'";

    $dislikes_query = "SELECT COUNT(*) FROM rating_info 
                                      WHERE cod_obra = $id AND rating_action='dislike'";

    $likes_rs = mysqli_query($conn, $likes_query);
    $dislikes_rs = mysqli_query($conn, $dislikes_query);

    $likes = mysqli_fetch_array($likes_rs);
    $dislikes = mysqli_fetch_array($dislikes_rs);

    $rating = [
        'likes' => $likes[0],
        'dislikes' => $dislikes[0]
    ];

    return json_encode($rating);
}

// Verifique se o usuário já gosta da postagem ou não
function userLiked($cod_obra)
{
    global $conn;
    global $cod_usuario;

    $sql = "SELECT * FROM rating_info WHERE cod_usuario=$cod_usuario 
            AND cod_obra=$cod_obra AND rating_action='like'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return true;
    }else{
        return false;
    }
}

// Verifique se o usuário já não gosta de postar ou não
function userDisliked($cod_obra)
{
    global $conn;
    global $cod_usuario;

    $sql = "SELECT * FROM rating_info WHERE cod_usuario=$cod_usuario 
            AND cod_obra=$cod_obra AND rating_action='dislike'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        return true;
    }else{
        return false;
    }
}

$sql = "SELECT * FROM posts";

$result = mysqli_query($conn, $sql);
// busca todas as postagens do banco de dados
// retorna-os como um array associativo chamado $ posts
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);