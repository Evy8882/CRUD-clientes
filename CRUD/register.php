<?php
include("connect.php");

if ($_POST ?? ''){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $exe = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1;");
        $user = $exe->fetch_assoc();
        if (!$user){
            $conn->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$pass')");
        }else{
            $login_error = "email já cadastrado";
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
    <title>Cadastro de clientes - Registre-se</title>
    <link rel="stylesheet" href="css/crud_style.css">
</head>
<body>
    <!-- Página de cadastro de usuario -->
    <?php include('header.html') ?>
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