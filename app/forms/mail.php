<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
//echo "<pre>"; print_r($_POST); exit();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP(true);                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'redfootbrasil@gmail.com';                 // SMTP username
$mail->Password = 'tocomfome123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

//$mail->setFrom($mail->Username, 'Redfoot Community');
$mail->From       = $mail->Username;
$mail->FromName   = "Redfoot Community";
$mail->addAddress('redfootbrasil@gmail.com', 'Redfoot Community');     // Add a recipient
//$mail->addAddress('contato@redfootbrasil.org', 'Redfoot Community');     // Add a recipient
//$mail->addAddress('thiago.zampieri@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);                                  // Set email format to HTML


$_body = array();
$_body[] = 'Nome: '.htmlspecialchars($_POST['name']);
$_body[] = 'E-mail: '.htmlspecialchars($_POST['email']);
$_body[] = 'Telefone: '.htmlspecialchars($_POST['phone']);
$_body[] = '=====================: ';
$_body[] = htmlspecialchars($_POST['message']);

$mail->Subject = 'Redfoot :: Novo contato landpage';
$mail->Body    = implode("<br/>", $_body);
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
    echo 'Mensagem não pode ser enviada.';
} else {
    echo 'Mensagem enviada com sucesso.';
}