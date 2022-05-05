<?php


//include dependency
use PHPMailer\PHPMailer\PHPMailer;
require_once('../connection.php');
require_once('component.php');


$name = "Shopster";  // Name of your website or yours
$to = htmlspecialchars($_POST['email']);  // mail of reciever

$connection = DBConnection::get_instance()->get_connection();//connection instance
$sql = "SELECT * FROM user_info WHERE email = '". encrypt_decrypt($to) . "'";//query string

$result = mysqli_query($connection, $sql);//execute query

if ($result != false) {//error handling
    if ($result->num_rows < 1) {
        header("Location:../forgotPassword.php?msg=nofound");
        die();
    } 
} 
else{
    header("Location:../forgotPassword.php?msg=dbfail");
    die();
}
$path = 'http://localhost/test/Shopster-main/src/resetPassword.php';//change path to match your local directory path of resetPassword.php
$encrypt_email= encrypt_decrypt($to,'encrypt');//encrypt_email
$subject = "Shopster: Password Reset";
$body = "Shopster password reset link:\n $path?email=$encrypt_email";
$from = "csci4300grouphub@gmail.com";  // you mail
$password = "shopster1";  // your mail password


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
    header("Location:../forgotPassword.php?msg=success");
} else {
    header("Location:../forgotPassword.php?msg=fail");
}
