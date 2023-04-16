<?php
include("connect.php");
include("lib/mail.php");


//Iniciando uma sessão
if (!isset($_SESSION)){
    session_start();
}

// criando uma function que gere um código aleátorio de 6 digitos númericos
function generateCode() {
  $cd = '';
  for ($i = 0; $i < 6; $i++) {
    $cd .= rand(0, 9);
  }
  return $cd;
}


if (isset($_SESSION['crip_code'])){
        if (isset($_POST['confirm_code'])){
            $con_code = $_POST['confirm_code'];
            $crip_code = $_SESSION['crip_code'];
            if (password_verify($con_code,$crip_code)){
                $name = $_SESSION['name'];
                $email = $_SESSION['email'];
                $pass = $_SESSION['pass'];
                $conn->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$pass')");
                header('location: login.php');
            }else{
                $login_error = "Código inválido";
            }
        }
    }else if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['pass'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
        $exe = $conn->query("SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1;");
        $user = $exe->fetch_assoc();
        if (!$user){
            $code = generateCode();
            $_SESSION['crip_code'] = password_hash($code, PASSWORD_DEFAULT);
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['pass'] =  $pass;
            confirm_mail($email,$code);
        }else{
            $login_error = "email já cadastrado";
    }
}




if (!isset($_SESSION['crip_code'])){
    include('register.html');
}else{
    include('confirm.html');
}

