<?php


//include dependency
use PHPMailer\PHPMailer\PHPMailer;
require_once('../connection.php');
require_once('component.php');


$to = htmlspecialchars($_POST['email']);  // mail of reciever


$path = 'http://localhost/test/Shopster-main/src/resetPassword.php';//change path to match your local directory path of resetPassword.php
$encrypt_email= encrypt_decrypt($to,'encrypt');//encrypt_email
$subject = "ecinema activation";
$body = "activation link:\n $path?email=$encrypt_email";
$from = "ouyangzongxin@gmail.com";  // you mail
$password = "Oyzxnzs123";  // your mail password


//include dependency
require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";
$mail = new PHPMailer();

// To Here

//SMTP Settings
$mail->isSMTP();
// $mail->SMTPDebug = 3;  Keep It commented this is used for debugging                          
$mail->Host = "smtp.gmail.com"; // smtp address of your email
$mail->SMTPAuth = true;
$mail->Username = $from;
$mail->Password = $password;
$mail->Port = 587;  // port
$mail->SMTPSecure = "tls";  // tls or ssl
$mail->smtpConnect([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    ]
]);

//Email Settings
$mail->isHTML(true);
$mail->setFrom($from, $name);
$mail->addAddress($to); // enter email address whom you want to send
$mail->Subject = ("$subject");
$mail->Body = $body;
if ($mail->send()) {
    header("Location:../registerPage.php?msg=sent");
} else {
    header("Location:../registerPage.php?msg=fail");
}
