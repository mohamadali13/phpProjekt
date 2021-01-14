<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require ('crediantial.php');

?>



<?php

$mail = new PHPMailer(true);

try
{
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = EMAIL; // SMTP username
    $mail->Password = PASS; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    //Recipients
    $mail->setFrom(EMAIL, 'Localhost Mohamad');
    $mail->addAddress($emailAdresse, $name); // Add a recipient
    // $mail->addAddress('ellen@example.com');               // Name is optional
    //  $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    //   $mail->addBCC('bcc@example.com');
    // Attachments
    //   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //   $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Registration Confirmation';
    $mail->Body = $message;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    header("Location: http://localhost/Praktikum-Aufgaben/Aufgabe01/hidden/willkommenPage.php");
    exit();

    //echo 'Message has been sent';
    
}
catch(Exception $e)
{
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
