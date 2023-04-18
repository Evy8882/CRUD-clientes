<?php
include("connect.php");
include("protect.php");
$user = $_SESSION['id'];
$nome = $_POST["search"] ?? '';
$clientes = $conn->query("SELECT * FROM `clientes` WHERE `user`=$user AND `nome` LIKE '%$nome%'") or die($conn->error);
$num_clientes = $clientes->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes - Lista de clientes</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Página de clientes -->
    <?php include('header.php') ?>
    
    <section class="pageContainer">
        <h1>Seus clientes</h1>
        <a href="cadastro.php">+ cadastrar um novo cliente</a><br><br>

            <form action="" method="POST">
            <input type="text" name="search" style="width: 300px; max-width: 90%;" placeholder="Procure o cliente digitando o nome dele aqui..." value="<?php echo $nome ?>">
            <button type="submit">Buscar</button>
            </form>
        
        
        <section class="table-container">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Nascimento</th>
                    <th>Cadastro</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    if ($num_clientes == 0) { ?>
                        <tr>
                            <td colspan="8"><br><b>Você ainda não cadastrou nenhum cliente</b></td>
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
                            $cpf = $cliente['cpf'];
                            if (strlen($cliente['cpf']) == 11){
                                $par1 = substr($cpf, 0, 3);
                                $par2 = substr($cpf, 3, 3);
                                $par3 = substr($cpf, 6,3);
                                $par4 = substr($cpf, 9);
                                $cpf = "$par1.$par2.$par3-$par4";
                            }
                            $nascimento = implode('/', array_reverse(explode('-',$cliente['nascimento'])));
                        ?>
                            <tr>
                                <td><?php echo $cliente['id']?></td>
                                <td><?php echo $cliente['nome']?></td>
                                <td><?php echo $cliente['email']?></td>
                                <td><?php echo $telefone?></td>
                                <td><?php echo $cpf?></td>
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