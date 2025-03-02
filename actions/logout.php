<?php
session_start(); // Inicia a sessão

// Destrói a sessão
session_destroy();

// Redireciona para a página de index.php
header('Location: /crud_php_procedural/index.php');
exit();
?>