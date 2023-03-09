<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';

$arquivo = $_FILES['arquivo'];
$nome = $_POST['nomedoolicitante'];
$email = $_POST['emailsolitante'];
$descricao = $_POST['descriçõesInstitucional'];
$consideracoes = $_POST['consideraçõesInstitucional'];
date_default_timezone_set('America/Sao_Paulo');
$data= date('d/m/Y  H:i:s');

$mail = new PHPMailer();
try {
    //settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug =0;                                         //Enable verbose debug output
    $mail->isSMTP();                                              //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                     //Enable SMTP authentication
    $mail->Username   = 'djessica.giuliana@meuform.com.br';       //email e senha validos 
    $mail->Password   = 'Djessica123';    
    $mail->SMTPSecure = "ssl"; 
    $mail->Port       = 465;                                       

    //Recipients
    $mail->SetFrom('djessica.giuliana@meuform.com.br','Atendimento Marketing');
    $mail->addAddress('atendimentobonuscred2021@gmail.com'); 
    $mail->addReplyTo("$email"); 
    $mail->addReplyTo('suporte@bonuscred.com.br'); 
    $mail->addReplyTo('ilza@bonuscred.com.br'); 
    $mail->addCC("$email");
    $mail->addCC('suporte@bonuscred.com.br');
    $mail->addCC('ilza@bonuscred.com.br');
    //$mail->addCC('suporte@bonuscred.com.br');
    //$mail->addCC('francisco@bonuscred.com.br ');
    //$mail->addCC('antoniorobson@bonuscred.com.br');
    //$mail->addCC('luanmaciel@bonuscred.com.br ');
    //$mail->addCC('adriel@bonuscred.com.br ');
    //$mail->addCC('suporte@bonuscred.com.br');   //suporte@bonuscred.com.br
    //$mail->addCC('ronelio@bonuscred.com.br');
    //$mail->addBCC('atendimentobonuscred2021@gmail.com');

    
    if (isset($_FILES['arquivo']) &&
    $_FILES['arquivo']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['arquivo']['tmp_name'],
                         $_FILES['arquivo']['name']);}
    if (isset($_FILES['arquivo2']) &&
    $_FILES['arquivo2']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['arquivo2']['tmp_name'],
                         $_FILES['arquivo2']['name']);}
    if (isset($_FILES['arquivo3']) &&
    $_FILES['arquivo3']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['arquivo3']['tmp_name'],
                         $_FILES['arquivo3']['name']);}                     
    if (isset($_FILES['arquivo4']) &&
    $_FILES['arquivo4']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['arquivo4']['tmp_name'],
                         $_FILES['arquivo4']['name']);}
    if (isset($_FILES['arquivo5']) &&
    $_FILES['arquivo5']['error'] == UPLOAD_ERR_OK) {
    $mail->AddAttachment($_FILES['arquivo5']['tmp_name'],
                         $_FILES['arquivo5']['name']);}   
                         
    //Content
    $mail->isHTML(true);
    $mail->Subject = "$nome, $data";
    $mail->Body ="
    <html>
    <meta charset='utf-8'>
    <p><b><h1>Pedido de Material Institucional</h1></b></p>
    <p><b><h3>Referente ao Solicitante</h3> </b></p>
    <p><b>Nome: </b>$nome</p>
    <p><b>E-mail: </b>$email</p>
    <p><b><h3>Referente ao Material Institucioinal</h3> </b></p>
    <p><b>Descrição: </b>$descricao</p>
    <p><b>Considerações: </b>$consideracoes</p>	  
    </html>";

    
    $mail->send();
    echo "<meta http-equiv='refresh' content='10;URL=../OBRIGADO!.html'>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>