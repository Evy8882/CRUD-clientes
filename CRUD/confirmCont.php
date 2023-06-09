<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes - Registre-se</title>
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Página de confirmação de E-mail -->
    <?php include('header.php') ?>
    <section class="pageContainer">
        <h1>Confirme seu E-mail para continuar</h1>
        <section class="cadContainer">
            <h3>Digite aqui o código que recebeu em sua caixa de entrada</h3>
            <form action="" method="post">
                <label for="confirm-code">Código de confirmação:</label>
                <input type="text" minlength="6" maxlength="6" pattern="[0-9]*" placeholder="000000" id="confirm-code" name="confirm_code" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                <button type="submit">Confirmar</button>
            </form>
        </section>
        <div class="error"><?php echo $login_error ?? ''?></div>
    </section>
</body>
</html>