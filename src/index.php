<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

require 'vendor/autoload.php'; // Include PHPMailer and Dotenv autoloaders

// Load environment variables from .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Email configuration
$emailUsername = $_ENV['EMAIL_USERNAME'];
$emailPassword = $_ENV['EMAIL_PASSWORD'];
$emailHost = $_ENV['EMAIL_HOST'];

echo '123';
exit();

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = $emailHost;
    $mail->SMTPAuth = true;
    $mail->Username = $emailUsername;
    $mail->Password = $emailPassword;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom($emailUsername, 'Somebody Name');
    $mail->addAddress('toSomeOne@email.com', 'Recipient Name'); // Add a recipient
    
    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Testing PHPMailer';
    $mail->Body    = 'This is a test email sent using PHPMailer';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
