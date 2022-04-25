<?php

if (isset($_POST["reset-request-submit"])) {
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/Shopster-main-main/src/create-new-passwword.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'connection.php'

    $userEmail = $_POST["email"]
} else {
    header("Location: ../forgotPassword.php");
}

?>