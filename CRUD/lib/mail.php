<?php
//Import PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 

function confirm_mail($to, $codigo){
    require_once 'vendor/autoload.php';
    
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug =   0; // (SMTP::DEBUG_SERVER) for debug
        $mail->CharSet = 'UTF-8';
        $mail->isSMTP();

        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ccadastro.mail@gmail.com';
        $mail->Password   = '[MINHA SENHA]'; // Colocar depois
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $mail->Port       = 465;

        //Recipients
        $mail->setFrom('ccadastro.mail@gmail.com', 'CCAD');
        $mail->addAddress("$to");

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmação de E-mail';
        //Mensagem com HTML:
        $mail->Body    = "
        <h1>Confirmação de E-mail</h1>

        Sua conta no \"CCADASTRO - clientes\" está quase pronta. Para ativá-la, por favor confirme o seu endereço de email. <br>
        Para confirmar o seu e-mail, por favor utilize o seguinte código de confirmação:<br><br>

        <h2> $codigo </h2>  <br><br>

        Por favor, copie o código acima e insira-o na página de confirmação de e-mail. 
        Sua conta não será ativada até que seu email seja confirmado. 
        Se você não solicitou a criação de uma conta conosco, por favor, ignore este e-mail.<br><br>

        CCADASTRO - clientes
        ";

        //Mensagem sem HTML:
        $mail->AltBody = "
        Confirmação de E-mail\n\n

        Sua conta no \"CCADASTRO - clientes\" está quase pronta. Para ativá-la, por favor confirme o seu endereço de email. \n
        Para confirmar o seu e-mail, por favor utilize o seguinte código de confirmação:\n\n

        $codigo  \n\n

        Por favor, copie o código acima e insira-o na página de confirmação de e-mail. 
        Sua conta não será ativada até que seu email seja confirmado. 
        Se você não solicitou a criação de uma conta conosco, por favor, ignore este e-mail. \n\n

        CCADASTRO - clientes
        ";

        //Send
        $mail->send();
        // echo 'Message has been sent';
        return true;
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}