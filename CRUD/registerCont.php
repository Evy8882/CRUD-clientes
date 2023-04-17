<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes - Registre-se</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Página de cadastro de usuario -->
    <?php include('header.php') ?>
    <section class="pageContainer">
        <h1>Cadastre-se para continuar</h1>
        <section class="cadContainer">
            <h3>Registre-se</h3>
            <form action="" method="post">
                <label for="nome">Nome:</label>
                <input type="text" placeholder="Informe seu nome completo" name="name" required>
                <label for="email">Email:</label>
                <input type="email" placeholder="email@example.com" name="email" required>
                <label for="pass">Senha:</label>
                <input type="password" placeholder="Password..." name="pass" required>
                <a href="login.php">Já possui uma conta? faça login clicando aqui</a>
                <button type="submit">Registrar</button>
            </form>
        </section>
        <div class="error"><?php echo $login_error ?? ''?></div>
    </section>
</body>
</html>