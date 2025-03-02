<?php 
require_once __DIR__ . '/../config/bd.php';


/**
 * Função para verificar as credenciais do usuário.
 * @param string $login Login do usuário.
 * @param string $senha Senha do usuário.
 * @return array|false Retorna os dados do usuário se as credenciais estiverem corretas, ou false caso contrário.
 */

 function verificarCredenciais($login, $senha) {
    global $pdo; // Importa a variável $pdo definida no db.php para dentro da função.

    //Pepara a consulda da query SQL
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE login = :login");
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    //Obtendo o usuario do banco de dados
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    //Verifica se o Usuário existe e a senha está correta
    if($usuario && password_verify($senha, $usuario['senha'])) {
        return $usuario;

    }

    return false; //Retorna false caso as credenciais estejam incorretas
 }

 /**
  * Função para redirecionar o usuario de acordo com o tipo de usuário
  * @param  array $usuario dados do usuario autenticado $name
  */
  function redirecionarUsuario($usuario) {
    var_dump($usuario);
    switch($usuario['tipo_usuario_id']) {
        case 1:
            header('Location: /crud_php/views/dashboard_admin.php');
            break;
        case 2:
            header('Location: /views/professor/dashboard.php');
            break;
        case 3:
            header('Location: /views/aluno/dashboard.php');
            break;
        default:
            header('Location: /index.php');
            break;
    }
  }


//   /**
//  * Função para buscar todos os usuários ordenados por tipo (administrador, professor, aluno).
//  * @return array Retorna um array com os usuários ordenados.
//  */
// function getUsuarios() {
//     global $pdo;
//     $sql = "SELECT u.usuario_id, u.nome, u.email, u.login, u.data_criacao, u.data_atualizacao, u.status, t.tipo
//         FROM usuarios u
//         JOIN tipos_usuario t ON u.tipo_usuario_id = t.tipo_usuario_id
//         ORDER BY u.tipo_usuario_id ASC, u.nome ASC";
//     $stmt = $pdo->prepare($sql);
//     return $stmt->fetchAll(PDO::FETCH_ASSOC);
// }