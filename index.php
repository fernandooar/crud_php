<?php 
session_start();
require_once __DIR__ . '/actions/auth.php';

//Verifica se o formulário de login foi enviado.
//var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    //Verificando as credenciais do usuário
    $usuario = verificarCredenciais($login, $senha);

    if ($usuario) {
        // armazena os dados do usuario na sessão
        $_SESSION['usuario'] = $usuario;
        //Redirecionando o usuario para o dashboard referente ao tipo de usuário
        redirecionarUsuario($usuario);
    } else {
        $erro =  "Login ou senha inválidos.";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola XYZ</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Escola XYZ</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cursos">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="index.html">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Primeira Sessão: Login e Descrição da Escola -->
    <section class="container-fluid py-5 bg-light mt-5">
        <div class="container d-flex justify-content-around">
            <!-- <div class="row"> -->
            <!-- Sessão de Descrição da Escola (Lado Esquerdo) -->
            <div class="col-md-6 p-4">
                <h2>Bem-vindo à Escola XYZ</h2>
                <p>
                    A Escola XYZ é referência em educação de qualidade, oferecendo um ambiente acolhedor e
                    propício para o desenvolvimento intelectual e social dos alunos. Nossa missão é formar
                    cidadãos críticos, criativos e preparados para os desafios do futuro.
                </p>
                <p>
                    Oferecemos uma variedade de cursos e atividades extracurriculares para complementar a
                    formação dos nossos estudantes. Venha nos conhecer!
                </p>
            </div>

            <!-- Sessão de Login (Lado Direito) -->
            <div class="col-md-4 p-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <?php if (isset($erro)){ ?>
                        <p style="color: red;"> <?= $erro; ?> </p>
                        <?php } ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" class="form-control" id="login" name="login"
                                    placeholder="Digite seu login">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha"
                                    placeholder="Digite sua senha">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>

    <!-- Segunda Sessão: Cards dos Cursos Ofertados -->
    <section class="container-fluid py-5 bg-white">
        <h2 class="text-center mb-4">Nossos Cursos</h2>
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/images/curso1.jpg" class="card-img-top" alt="Curso 1">
                    <div class="card-body">
                        <h5 class="card-title">Ensino Fundamental</h5>
                        <p class="card-text">
                            Curso completo do 1º ao 9º ano, com foco no desenvolvimento integral do aluno.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/images/curso2.jpg" class="card-img-top" alt="Curso 2">
                    <div class="card-body">
                        <h5 class="card-title">Ensino Médio</h5>
                        <p class="card-text">
                            Preparação para o vestibular e desenvolvimento de habilidades para a vida adulta.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="assets/images/curso3.jpg" class="card-img-top" alt="Curso 3">
                    <div class="card-body">
                        <h5 class="card-title">Cursos Técnicos</h5>
                        <p class="card-text">
                            Cursos técnicos em diversas áreas, integrados ao ensino médio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Terceira Sessão: Formulário de Contato -->
    <section class="container-fluid py-5 bg-light">
        <h2 class="text-center mb-4">Entre em Contato</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" placeholder="Digite seu nome">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Digite seu email">
                    </div>
                    <div class="mb-3">
                        <label for="mensagem" class="form-label">Mensagem</label>
                        <textarea class="form-control" id="mensagem" rows="5"
                            placeholder="Digite sua mensagem"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar</button>
                </form>
            </div>
        </div>
    </section>
    <footer class="bg-dark text-white mt-5">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-4">
                    <h5>Escola XYZ</h5>
                    <p>Educação de qualidade para um futuro brilhante.</p>
                </div>
                <div class="col-md-4">
                    <h5>Links Úteis</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-white">Início</a></li>
                        <li><a href="#cursos" class="text-white">Cursos</a></li>
                        <li><a href="#contato" class="text-white">Contato</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contato</h5>
                    <ul class="list-unstyled">
                        <li>Email: contato@escolaxyz.com</li>
                        <li>Telefone: (11) 1234-5678</li>
                        <li>Endereço: Rua da Escola, 123 - São Paulo, SP</li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>&copy; 2023 Escola XYZ. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS e dependências -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>