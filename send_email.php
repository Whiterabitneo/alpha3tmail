<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get inputs
    $from_name = htmlspecialchars($_POST['from_name']);
    $from_email = htmlspecialchars($_POST['from_email']);
    $to = htmlspecialchars($_POST['to']);
    $subject = htmlspecialchars($_POST['subject']);
    $content = htmlspecialchars($_POST['content']);

    // Set additional headers
    $headers = array(
        'From: ' . $from_name . ' <' . $from_email . '>',
        'Reply-To: ' . $from_email,
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=utf-8'
    );

    // Convert headers to string
    $headers_string = implode("\r\n", $headers);

    // Send email
    if (mail($to, $subject, $content, $headers_string)) {
        echo '<h2>Email sent successfully.</h2>';
    } else {
        echo '<h2>Failed to send email.</h2>';
    }
}

?>