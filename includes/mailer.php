<?php
// includes/mailer.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../PHPMailer-master/src/Exception.php';
require __DIR__ . '/../PHPMailer-master/src/PHPMailer.php';
require __DIR__ . '/../PHPMailer-master/src/SMTP.php';

function sendMail($to, $subject, $message) {

    $mail = new PHPMailer(true);

    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        // YOUR GMAIL
        $mail->Username = 'shaifinchauhan72@gmail.com';

        // GOOGLE APP PASSWORD
        $mail->Password = 'vuvkajpvzwbtdqxg';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('shaifinchauhan72@gmail.com', 'Job Portal');

        $mail->addAddress($to);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();

        return true;

    } catch (Exception $e) {

        // Save error log
        file_put_contents(
            __DIR__ . '/../email_logs.txt',
            "MAIL ERROR: " . $mail->ErrorInfo . "\n",
            FILE_APPEND
        );

        return false;
    }
}
?>