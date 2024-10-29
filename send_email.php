<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Sanitize and get inputs
$from_email = $_POST['from_email'];
$from_name = $_POST['from_name'];
$to = $_POST['to'];
$subject = $_POST['subject'];
$content = $_POST['content'];

// Initialize PHPMailer
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = SMTP::DEBUG_OFF; // Disable debug output
    $mail->isSMTP();
    $mail->Host = 'ssl://smtpdm.aliyun.com'; // SMTP server of Direct Mail
    $mail->Port = 465; // Port number
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'sender@demo.aliyun.com'; // Your SMTP username
    $mail->Password = '********'; // Your SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable encryption

    //Recipients
    $mail->setFrom('sender@demo.aliyun.com', $from_name); // Set sender's email and name
    $recipients = explode(',', $to); // Split comma-separated recipients into an array
    foreach ($recipients as $recipient) {
        $mail->addAddress(trim($recipient)); // Add each recipient from the array
    }

    //Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject; // Set email subject
    $mail->Body = $content; // Set email content

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>