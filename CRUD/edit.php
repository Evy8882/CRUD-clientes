<?php
include("connect.php");
include("protect.php");

$id = intval($_GET['id']);
$query_client = $conn->query("SELECT * FROM `clientes` WHERE id = '$id';") or die($conn->error);
$client = $query_client->fetch_assoc();

if ($_SESSION['id'] != $client['user']){
    die("<link rel='stylesheet' href='css/crud_style.css'><div class='error'>!!Erro ao tentar acessar um cliente de outro usuário!!</div>");
}

$cad_error = false;
if (count($_POST) > 0) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = preg_replace("/[^0-9]/","", $_POST['tel']) ?? '';
    $cpf = preg_replace("/[^0-9]/","", $_POST['cpf']) ?? '';
    $date = $_POST['date'] ?? '';
    if (empty($nome)) {
        $cad_error = "Preencha o nome corretamente";
    }
    else if (!empty($email)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $cad_error = "Preencha o email corretamente";
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
    <title>Cadastro de clientes - Atualização de cliente</title>
    <link rel="icon" href="img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Página de cadastro -->
    <?php include('header.php') ?>
    
    <section class="pageContainer">
        <h1>Editar cliente</h1>
        <section class="cadContainer">
            <h3>Informações do cliente</h3>
            <form action="" method="POST">
                Nome:<br>
                <input value="<?php echo $client['nome'] ?>" type="text" placeholder="Nome do cliente" name="nome" required><br>
                Email:<br>
                <input value="<?php echo $client['email'] ?>" type="email" placeholder="Email" name="email"><br>
                Telefone:<br>
                <input value="<?php echo $client['telefone'] ?>" type="tel" placeholder="Telefone com ddd" name="tel"><br>
                CPF:<br>
                <input value="<?php echo $client['cpf'] ?>" type="text" placeholder="000.000.000-00" name="cpf"><br>
                Nascimento:<br>
                <input value="<?php echo $client['nascimento'] ?>" type="date" name="date" ><br>
                <button type="submit">Salvar</button>
            </form>
        </section>
        <a href="clientes.php">cancelar</a>
        <p class="error"><b>
            <?php
            if ($cad_error){
                echo "Ocorreu um erro: ".$cad_error;
            }else if (count($_POST) > 0){
                if ($_SESSION['id'] == $client['user']){ // Necessário para não conseguir editar o cliente de outro usuário pela URL
                    $sql_code = "UPDATE `clientes` SET  nome = '$nome', email = '$email', telefone = '$tel', cpf = '$cpf', nascimento = '$date' WHERE id = '$id';";
                    $conn->query($sql_code) or die($conn->error);
                    unset($_POST);
                    echo "<p class='sucesso'>cliente atualizado com sucesso</p>";
                    header("location: clientes.php");
                }  
            }
            ?>
        </b></p>
    </section>

</body>

</html>