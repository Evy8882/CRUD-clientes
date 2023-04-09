<?php
include("connect.php");
$clientes = $conn->query("SELECT * FROM `clientes`") or die($conn->error);
$num_clientes = $clientes->num_rows;
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
    <!-- Página de clientes -->
    <header>
        <div>Cadastro</div>
        <a href="cadastro.php">CADASTRAR </a>
        <a href="clientes.php">CLIENTES / </a>
        <a href="index.php">HOME / </a>
    </header>
    <section class="pageContainer">
        <h1>Seus clientes</h1>
        <a href="cadastro.php">+ cadastrar um novo cliente</a><br><br>
        <section>
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Nascimento</th>
                    <th>Cadastro</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    if ($num_clientes == 0) { ?>
                        <tr>
                            <td colspan="7"><br><b>Não há clientes cadastrados</b></td>
                        </tr>
                        <?php
                    } else {
                        while ($cliente = $clientes->fetch_assoc()) {

                            $telefone = $cliente['telefone'];
                            if (strlen($cliente['telefone']) == 11){
                                $ddd = substr($telefone, 0, 2);
                                $part1 = substr($telefone, 2, 5);
                                $part2 = substr($telefone, 7);
                                $telefone = "($ddd) $part1-$part2";
                            }
                            $nascimento = implode('/', array_reverse(explode('-',$cliente['nascimento'])));
                        ?>
                            <tr>
                                <td><?php echo $cliente['id']?></td>
                                <td><?php echo $cliente['nome']?></td>
                                <td><?php echo $cliente['email']?></td>
                                <td><?php echo $telefone?></td>
                                <td><?php echo $nascimento?></td>
                                <td><?php echo $cliente['cadastro']?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $cliente['id'] ?>">edit</a>
                                    <a href="delete.php?id=<?php echo $cliente['id'] ?>">delete</a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </section>
    </section>

</body>

</html>