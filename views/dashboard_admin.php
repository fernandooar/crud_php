<h1>Página do Administrador.</h1>

<?php 
session_start(); //Inicia a sessão


//Verifica se o usuário está autenticado e é um admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo_usuario_id'] !=1){
    echo "Você não tem permissão para acessar esta página. Faça login e tente novamente.";
    header('Location: ../index.php');
    exit();
}
require_once __DIR__ . '/../actions/auth.php';
require_once __DIR__ . '/../actions/actions.php';


$usuario = $_SESSION['usuario'];
$usuarios = getUsuarios();
var_dump($usuarios);
?>