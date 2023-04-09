<?php
include("connect.php");

$id = intval($_GET['id']);
$query_client = $conn->query("SELECT * FROM `clientes` WHERE id = '$id';") or die($conn->error);
$client = $query_client->fetch_assoc();

$cad_error = false;
if (count($_POST) > 0) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $tel = $_POST['tel'] ?? '';
    $date = $_POST['date'] ?? '';
    if (empty($nome)) {
        $cad_error = "Preencha o nome corretamente";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $cad_error = "Preencha o email corretamente";
    }else if (empty($date)) {
        $cad_error = "Preencha a data de nascimento corretamente";
    }
    
    if (empty($tel)) {
        $tel = "NONE";
    }
    
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
    <link rel="stylesheet" href="css/crud_style.css">
</head>

<body>
    <!-- Página de cadastro -->
    <header>
        <div>Cadastro</div>
        <a href="cadastro.php">CADASTRAR </a>
        <a href="clientes.php">CLIENTES / </a>
        <a href="index.php">HOME / </a>
    </header>
    <section class="pageContainer">
        <h1>Editar cliente</h1>
        <section class="cadContainer">
            <h3>Informações do cliente</h3>
            <form action="" method="POST">
                Nome:<br>
                <input value="<?php echo $client['nome'] ?>" type="text" placeholder="Nome do cliente" name="nome" required><br>
                Email:<br>
                <input value="<?php echo $client['email'] ?>" type="email" placeholder="Email" name="email" required><br>
                Telefone:<br>
                <input value="<?php echo $client['telefone'] ?>" type="tel" placeholder="Telefone com ddd" name="tel"><br>
                Nascimento:<br>
                <input value="<?php echo $client['nascimento'] ?>" type="date" name="date" required><br>
                <button type="submit">Salvar</button>
            </form>
        </section>
        <a href="clientes.php">cancelar</a>
        <p class="error"><b>
            <?php
            if ($cad_error){
                echo "Ocorreu um erro: ".$cad_error;
            }else if (count($_POST) > 0){
                $sql_code = "UPDATE `clientes` SET  nome = '$nome', email = '$email', telefone = '$tel', nascimento = '$date' WHERE id = '$id';";
                $conn->query($sql_code) or die($conn->error);
                unset($_POST);
                echo "<p class='sucesso'>cliente atualizado com sucesso</p>";
                header("location: clientes.php");
                
            }
            ?>
        </b></p>
    </section>

</body>

</html>