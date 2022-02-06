<?php
require_once '../vendor/autoload.php';
require '../config.php';

$subject = $_POST['subject'];
$to = $_POST['to'];
$body = $_POST['body'];

try {
    // Create the Transport
    $transport = (new Swift_SmtpTransport(MAIL_SERVER, MAIL_PORT, MAIL_ENCRYPTION))
        ->setUsername(MAIL_FROM)
        ->setPassword(MAIL_PASSWORD)
    ;

// Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

// Create a message
    $message = (new Swift_Message($subject))
        ->setFrom([MAIL_FROM])
        ->setTo([$to])
        ->setBody($body)
    ;

// Send the message
    $result = $mailer->send($message);
    var_dump($result);

} catch (Exception $e) {
    var_dump($e->getMessage());
}
