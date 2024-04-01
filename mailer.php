<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './assets/phpmailer/src/Exception.php';
require './assets/phpmailer/src/PHPMailer.php';
require './assets/phpmailer/src/SMTP.php';

try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = '#'; //enter email address
    $mail->Password = '#'; // create password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('#');  //enter email address
    $mail->addAddress('#');  //enter email address


    $mail->isHTML(true);

    $mail->Subject = "Contact Form Submission"; // Set a default subject or customize as needed
    $mail->Body = "fname: " . $_POST["fname"] . "\n" .
        "Email: " . $_POST["email"] . "\n" .
        "Number : " . $_POST["number"] . "\n" .
        "Message: " . $_POST["message"];




    $mail->send();

    echo "
        <script>
            alert('Mail sent successfully!');
            window.location.href = 'index.html';
        </script>
    ";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
