<?php
include("connect.php");
if ($_POST ?? ''){
    if (isset($_POST['email']) && isset($_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $exe = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1;") or die($conn->error);

        $user = $exe->fetch_assoc();
        if (password_verify($pass ?? '', $user['pass'] ?? '')){
            if (!isset($_SESSION))
                session_start();
                $_SESSION['id'] = $user['id'];
                header("location: index.php");
        }else{
            $login_error = "Email ou senha inválidos";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes - Faça login para continuar</title>
    <link rel="stylesheet" href="css/crud_style.css">
</head>
<body>
    <!-- Página de login -->
    <?php include('header.html') ?>
    <section class="pageContainer">
        <h1>Faça login para continuar</h1>
        <section class="cadContainer">
            <h3>login</h3>
            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="email" placeholder="email@example.com" name="email" required>
                <label for="pass">Senha:</label>
                <input type="password" placeholder="Password..." name="pass" required>
                <a href="register.php">Não possui uma conta? Registre-se clicando aqui</a>
                <button type="submit">Entrar</button>
            </form>
        </section>
        <div class="error"><?php echo $login_error ?? ''?></div>
    </section>
</body>
</html>