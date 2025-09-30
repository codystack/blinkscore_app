<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php'; // Composer autoload

function sendMail($to, $subject, $bodyHtml, $bodyAlt = '') {
    $mail = new PHPMailer(true);

    try {
        // Detect environment
        $env = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? 'development' : 'production';

        $mail->isSMTP();

        if ($env === 'development') {
            // Gmail SMTP for testing
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'ebuzzadvert@gmail.com'; // your Gmail
            $mail->Password   = 'buzrjirnhbxlcuio';   // Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
        } else {
            // Production (custom domain SMTP)
            $mail->Host       = 'premium36.web-hosting.com'; // your mail server
            $mail->SMTPAuth   = true;
            $mail->Username   = 'no-reply@blinkscore.ng'; // your domain email
            $mail->Password   = '2{-*Xa]UaE,%';     // your domain email password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
        }

        // From / To
        $mail->setFrom('no-reply@blinkscore.ng', 'BlinksCore');
        $mail->addAddress($to);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $bodyHtml;
        $mail->AltBody = $bodyAlt ?: strip_tags($bodyHtml);

        $mail->send();
        return true;

    } catch (Exception $e) {
        error_log("Mailer Error: {$mail->ErrorInfo}");
        return false;
    }
}
