<?php
if (!isset($_SESSION)) {
        session_start();
}
?>

<header class="nav-bar">
        <div class="cadastro">Cadastro</div>
        <div class="navegacao">
                <a href="index.php">HOME</i></a><span class="bar"> /</span>
                <a href="clientes.php">CLIENTES</a><span class="bar"> /</span>
                <a href="cadastro.php">CADASTRAR</a><span class="bar"> /</span>
                <a href="logout.php" class="logout">
                        <?php
                        if (isset($_SESSION['id'])) {
                                echo "SAIR";
                        } else {
                                echo "ENTRAR";
                        }
                        ?>
                </a>
        </div>
</header>
<style>
        .nav-bar {
                height: 40px;
                font-size: 18pt;
                background-color: rgb(236, 236, 236);
                width: 100vw;
                border-bottom: solid 1px rgb(139, 139, 139);
                padding: 30px 0px;
                display: flex;
                justify-content: space-between;
        }

        .nav-bar a {
                color: black;
                text-decoration: none;
        }

        .nav-bar a:hover {
                color: rgb(0, 170, 147);
        }

        .navegacao {
                margin-right: 20px;
                display: flex;
                flex-direction: row;
        }

        .cadastro {
                margin-left: 20px;
        }

        @media (max-width: 768px) {
                .nav-bar {
                        height: 200px;
                        flex-direction: column;
                        justify-content: left;

                }

                .navegacao {
                        display: flex;
                        flex-direction: column;
                        margin-bottom: 10px;
                        text-align: center;
                }

                .navegacao a {
                        margin-bottom: 15px;
                        margin-right: 0px;
                }
                .navegacao a::after{
                        content: "";
                        display: block;
                        border-bottom: 1px solid #00000050;
                }

                .cadastro::after {
                        content: "";
                        display: block;
                        border-bottom: 2px solid black;
                }
                .cadastro{
                        margin-bottom: 20px;
                        margin-right: 20px;
                }

                .bar {
                        visibility: hidden;
                        height: 0;
                }
        }
</style>