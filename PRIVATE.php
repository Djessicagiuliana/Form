<?php
/*ini_set('display_errors', 1);
error_reporting(E_ALL);
print_r( $_FILES); */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'vendor/autoload.php';

/* Valores */
$nome = $_POST['nomedocredenciador'];
$email = $_POST['emailcredenciador'];
$nomeempresa = $_POST['NomedaEmpresa'];
$CodEmpresa = $_POST['CódigodaEmpresa'];
$PrazoDePag = $_POST['PrazodePagamento'];
$Bandeira = $_POST['Bandeira'];

$FoneEmpresa = $_POST['phone'];
$FoneEmpresa2 = $_POST['phone_2'];
$FoneEmpresa3 = $_POST['phone_3'];
$FoneEmpresa4 = $_POST['phone_4'];
$FoneEmpresa5 = $_POST['phone_5'];
$FoneEmpresa6 = $_POST['phone_6'];

$EnderecodaEmp = $_POST ['EnderecodaEmpresa'];
$EnderecodaEmp2 = $_POST ['enderecoempresa_2'];
$EnderecodaEmp3 = $_POST ['enderecoempresa_3'];
$EnderecodaEmp4 = $_POST ['enderecoempresa_4'];
$EnderecodaEmp5 = $_POST ['enderecoempresa_5'];
$EnderecodaEmp6 = $_POST ['enderecoempresa_6'];

$Responsavel = $_POST ['Responsavel'];
$contato = $_POST ['ContatoResponsavel'];
$EmailResponsavel = $_POST ['EmailResponsavel'];
$convencespecif = $_POST ['especif'];
$digitaisespecif = $_POST ['digitaisobs'];
$ConsideracFornecedor = $_POST ['consideraçõesdofornecedor'];

// material convencionais
    $MateriaisConvencionais = null;
     if(isset($_POST['MateriaisConven']))
      $MateriaisConvencionais = $_POST['MateriaisConven'];
       if($MateriaisConvencionais !==null){ 
       $valores="";
      for($i = 0; $i < count($MateriaisConvencionais); $i++){
      $valores .= " {$MateriaisConvencionais[$i]},"."";
      }
     }  
    $exibir="$valores";


// material digitais
    $MateriaisDigitais = null;
     if(isset($_POST['MateriaisDigitais']))
      $MateriaisDigitais = $_POST['MateriaisDigitais'];
       if($MateriaisDigitais !==null){ 
       $valores2="";
      for($i2 = 0; $i2 < count($MateriaisDigitais); $i2++){
      $valores2 .= " {$MateriaisDigitais[$i2]},"."";
      }
     }  
    $exibir2="$valores2";



$mail = new PHPMailer();
try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;                                         //Enable verbose debug output
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
   // $mail->addCC('luanmaciel@bonuscred.com.br ');
   // $mail->addCC('adriel@bonuscred.com.br ');
    //$mail->addCC('ronelio@bonuscred.com.br');
    //$mail->addBCC('');
 

    
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
    $mail->isHTML(true);//Set email format to HTML
    $mail->Subject = "$nomeempresa, $CodEmpresa" ;
    $mail->Body ="
    <html>
    <meta charset='utf-8'>
    <p><b><h1>Pedido de Private </h1></b></p>
    <p><b><h3>Referente ao Credenciador</h3> </b></p>
    <p><b>Nome: </b>$nome </p>
    <p><b>E-mail: </b>$email</p>
    <p><b><h3>Referente a Empresa </h3> </b></p>
    <p><b>Nome da Empresa: </b>$nomeempresa</p>
    <p><b>Código da Empresa: </b>$CodEmpresa</p>
    <p><b>Prazo de Pagamento: </b>$PrazoDePag</p>
     <p><b>Bandeira: </b>$Bandeira</p>
    <p><b>Telefone da empresa:<br></b>$FoneEmpresa<br>$FoneEmpresa2<br>$FoneEmpresa3<br>$FoneEmpresa4<br>$FoneEmpresa5<br>$FoneEmpresa6</p>
    <p><b>Endereço da empresa:<br></b>$EnderecodaEmp<br>$EnderecodaEmp2<br>$EnderecodaEmp3<br>$EnderecodaEmp4<br>$EnderecodaEmp5<br>$EnderecodaEmp6<br></p>	
    <p><b><h3>Referente ao Responsável</h3>  </b></p>
    <p><b>Responsável: </b>$Responsavel</p>
    <p><b>Contato: </b>$contato</p>	
    <p><b>Email: </b>$EmailResponsavel</p>	
    <p><b><h3>Informações Para Criação</h3>  </b></p>
    <p><b>Materiais Convencionais: </b>$exibir</p>
    <p><b>Especificações: </b>$convencespecif</p>
    <p><b>Materiais Digitais: </b> $exibir2</p>
    <p><b>Especificações: </b>$digitaisespecif</p>
    <p><b>Considerações do Fornecedor: </b>$ConsideracFornecedor</p>
    </html>
    ";

    
    $mail->send();
     echo "<meta http-equiv='refresh' content='10;URL=../OBRIGADO!.html'>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>