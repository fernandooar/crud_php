<?php

$host = 'localhost';
$dbname = 'gestao_escolar';
$username = 'root';
$password = '';


//Conexão com o banco de dados
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Habilita exceções para erros
} catch (PDOException $e) {
    die("Erro ao conectar ao banco de dados: " . $e->getMessage()); //Exibe a mensagem de erro
}