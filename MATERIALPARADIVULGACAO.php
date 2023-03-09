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

$arquivo = $_FILES['arquivo'];
$nome = $_POST['nomedivulgação'];
$email = $_POST['credenciadoremail'];
$nomeempresa =$_POST['NomedaEmpresa'];
$CodEmpresa = $_POST['CódigodaEmpresa'];
$PrazoDePag = $_POST['PrazodePagamento'];
$PossuiPrivate = $_POST['PossuiPrivate'];
$Bandeira = $_POST['Bandeira'];
$DataInicioProm = $_POST ['Datainicio'];
$DataTerminoProm = $_POST ['Datatermino'];
$DataSorteio = $_POST ['datasorteio'];
$DataSorteio2 = $_POST ['datasorteio_2'];
$DataSorteio3 = $_POST ['datasorteio_3'];
$DataSorteio4 = $_POST ['datasorteio_4'];
$DataSorteio5 = $_POST ['datasorteio_5'];
$CidadesSorteadas = $_POST ['cidsorteadas'];
$CidadesSorteadas2 = $_POST ['cidsorteadas_2'];
$CidadesSorteadas3 = $_POST ['cidsorteadas_3'];
$CidadesSorteadas4 = $_POST ['cidsorteadas_4'];
$CidadesSorteadas5 = $_POST ['cidsorteadas_5'];
$EspecifiConven = $_POST['esp1'];
$EspecifDigitais = $_POST['esp2'];
$ConscDivulgação = $_POST['consideracoesdofornecedorparadivulgação'];


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
    
    //$mail->addCC('francisco@bonuscred.com.br ');
    //$mail->addCC('antoniorobson@bonuscred.com.br');
    //$mail->addCC('luanmaciel@bonuscred.com.br ');
    //$mail->addCC('adriel@bonuscred.com.br ');
    //$mail->addCC('suporte@bonuscred.com.br');
    //$mail->addCC('ronelio@bonuscred.com.br');
    //$mail->addCC('atendimentobonuscred2021@gmail.com');
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
    $mail->Subject ="$nomeempresa, $CodEmpresa" ;
    $mail->Body ="
    <html>
    <meta charset='utf-8'>
    <p><b><h1>Pedido de Material Para Divulgação</h1> </b></p>
    <p><b><h3> Referente ao Credenciador</h3> </b></p>
    <p><b>Nome: </b>$nome</p>
    <p><b>E-mail: </b>$email</p>
    <p><b><h3> Referente a Empresa </h3> </b></p>
    <p><b>Nome da Empresa: </b>$nomeempresa</p>
    <p><b>Código da Empresa: </b>$CodEmpresa</p>
    <p><b>Prazo de Pagamento: </b>$PrazoDePag</p>	
    <p><b>Possui Private?: </b>$PossuiPrivate</p>
    <p><b>Bandeira: </b>$Bandeira</p>
    <p><b><h3> Referente ao Material Para Divulgação</h3>  </b></p>
    <p><b><h3> Promoção</h3>  </b></p>
    <p><b>Data De Inicio: </b>$DataInicioProm</p>
    <p><b>Data de Término: </b>$DataTerminoProm</p>	
    <p><b>Data do Sorteio: </b>$DataSorteio, $DataSorteio2,  $DataSorteio3,  $DataSorteio4, $DataSorteio5</p>
    <p><b>Cidades Sorteadas: </b>$CidadesSorteadas,  $CidadesSorteadas2,  $CidadesSorteadas3,  $CidadesSorteadas4, $CidadesSorteadas5 </p>	
    <p><b>Materiais Convencionais: </b>$exibir</p>	
    <p><b>Especificações: </b>$EspecifiConven</p>
    <p><b>Materiais Digitais: </b>$exibir2</p>
    <p><b>Especificações: </b>$EspecifDigitais</p>
    <p><b>Considerações: </b>$ConscDivulgação</p>
    </html>
    ";

    
    $mail->send();
     echo "<meta http-equiv='refresh' content='10;URL=../OBRIGADO!.html'>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>