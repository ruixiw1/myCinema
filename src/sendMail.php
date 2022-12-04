<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once './php/component.php';
require '../vendor/autoload.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
function sendPromotion(){
try {
    $dsn = 'mysql:host=localhost;dbname=mycinema';
    $username = 'root';
    $password = '';
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
$queryUsers = 'SELECT * FROM  `user_info` where `promotion` = 1 ';
$statement2 = $db->prepare($queryUsers);
$statement2->execute();
$subUsers = $statement2->fetchAll();
$statement2->closeCursor();
//Load Composer's autoloader
//Create an instance; passing `true` enables exceptions

if(isset($_POST['movie'])&&isset($_POST['message'])){
$movieID = htmlspecialchars($_POST['movie']);
$message = htmlspecialchars($_POST['message']);
}

$queryMovie = 'SELECT * FROM  `all_movie` where `id` = '.$movieID.' ';
$statement1 = $db->prepare($queryMovie);
$statement1->execute();
$movieName = $statement1->fetchAll();
$statement1->closeCursor();

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mycinema4050@gmail.com';                     //SMTP username
    $mail->Password   = 'vuyjjxqucqxfzjzk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mycinema4050@gmail.com', 'myCinema');
    foreach($subUsers as $user){
        $mail->addAddress($user['email']);
    }
    
    
    //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Upcoming:".$movieName[0]['movie_name'];
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "Sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

function sendVerifcation(){

}

function sendResetPassword($recipient){
    
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mycinema4050@gmail.com';                     //SMTP username
    $mail->Password   = 'vuyjjxqucqxfzjzk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mycinema4050@gmail.com', 'myCinema');
    $mail->addAddress($recipient);
    
    //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Reset Passwork Link";
    $mail->Body    = "reset password link <br/> http://localhost/test/mycinema/src/resetPassword.php?email=".encrypt_decrypt($recipient)."";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo "Sent";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>