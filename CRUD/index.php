<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes - Página inicial</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Página inicial -->
    <?php include('header.php') ?>
    <section class="home-section">
        <h1>Bem vindo</h1>
        <div>Cadastre seu clientes por aqui</div><br>
        <a href="clientes.php"><button>Entrar</button></a>
    </section>
    <main>
        <div class="main-text">
            <h2>Sobre</h2>
            A plataforma de cadastro de clientes é uma ferramenta online desenvolvida para ajudar empresas a gerenciar informações de seus clientes. É necessário criar uma conta e fazer login para começar a usar a ferramenta. <br> <br>

            Na plataforma, as informações dos clientes, como nome, e-mail, telefone, CPF, data de nascimento e data/hora de cadastro, são armazenadas em um banco de dados MySQL, garantindo a segurança e integridade dos dados. <br> <br>

            Para adicionar um novo cliente, é necessário preencher os campos necessários em um formulário na plataforma e salvar as informações no banco de dados. <br> <br>

            Para atualizar as informações de um cliente ou exclui-lo, a plataforma permite a edição dos campos necessários em um formulário na plataforma e atualiza as informações no banco de dados. <br> <br>
        </div>
    </main>
</body>

</html>