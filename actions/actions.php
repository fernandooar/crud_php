<?php 
require_once __DIR__ . '/../config/bd.php';


/**
 * Função para buscar todos os usuários ordenados por tipo (administrador, professor, aluno).
 * @return array Retorna um array com os usuários ordenados.
 */
function getUsuarios() {
    global $pdo; // Usa a conexão PDO definida no db.php

    // Consulta SQL para buscar todos os usuários ordenados por tipo_usuario_id
    $sql = "SELECT u.usuario_id, u.nome, u.email, u.login, t.tipo, u.ativo, u.data_criacao, u.data_atualizacao
            FROM usuarios u
            JOIN tipos_usuario t ON u.tipo_usuario_id = t.tipo_usuario_id
            ORDER BY u.tipo_usuario_id ASC, u.nome ASC";

    $stmt = $pdo->query($sql); // Executa a consulta
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os resultados como um array associativo
}
?>