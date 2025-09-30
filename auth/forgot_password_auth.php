<?php
ini_set('display_errors', 0);   // hide errors from response
ini_set('log_errors', 1);       // log errors to server
error_reporting(E_ALL);

session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/db.php';   // $pdo
require_once __DIR__ . '/../utils/mailer.php'; // sendMail()

try {
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

    if (!$email) {
        echo json_encode(["success" => false, "message" => "Email is required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit;
    }

    // Check user
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["success" => false, "message" => "No account found with that email."]);
        exit;
    }

    // Generate token
    $token = bin2hex(random_bytes(32));
    $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Save token
    $insert = $pdo->prepare("
        INSERT INTO password_resets (user_id, token, expires_at) 
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE token = VALUES(token), expires_at = VALUES(expires_at)
    ");
    $insert->execute([$user['id'], $token, $expires_at]);

    // Environment
    $env = (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) ? 'development' : 'production';

    $reset_link = $env === 'development'
        ? "http://localhost/blinkscore_app/reset-password?token=$token"
        : "https://app.blinkscore.ng/reset-password?token=$token";

    // Email Template
    $subject = "Password Reset Request";

    $bodyHtml = "
    <table class='email-wraper' style='width:100%;background:#f5f6fa;font-family:Arial,sans-serif;padding:20px;'>
        <tbody>
            <tr>
                <td>
                    <table class='email-body' style='margin:0 auto;max-width:600px;background:#fff;'>
                        <tbody>
                            <tr>
                                <td style='text-align:center;padding-top:30px;'>
                                    <a href='https://blinkscore.ng'>
                                        <img class='email-logo' src='http://app.blinkscore.ng/assets/images/logo-dark.svg' alt='BlinksCore' width='200'>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td style='text-align:center;padding:30px 30px 20px 30px;'>
                                    <h2 class='email-heading' style='font-size:22px;color:#333;margin:0;'>Reset Password</h2>
                                </td>
                            </tr>
                            <tr>
                                <td style='text-align:center;padding:0 30px 30px 30px;'>
                                    <p style='font-size:14px;color:#666;margin:0 0 15px 0;'>Hello,</p>
                                    <p style='font-size:14px;color:#666;margin:0 0 25px 0;'>We received a request to reset your BlinksCore account password. If you made this request, please click the button or the link below to set a new password.</p>
                                    <a href='$reset_link' style='background:#0E423E;color:#fff;text-decoration:none;padding:12px 20px;border-radius:5px;font-size:14px;display:inline-block;'>Reset Password</a>
                                    <p><a href='$reset_link'>$reset_link</a></p>
                                </td>
                            </tr>
                            <tr>
                                <td style='text-align:center;padding:20px 30px 40px 30px;'>
                                    <p style='font-size:13px;color:#888;margin-bottom:15px;'>If you did not make this request, you can safely ignore this email.</p>
                                    <p style='font-size:12px;color:#aaa;'>This is an automatically generated email. Please do not reply. If you face issues, contact us at support@blinkscore.ng</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class='email-footer' style='margin:0 auto;max-width:600px;text-align:center;padding:20px;'>
                        <tbody>
                            <tr>
                                <td>
                                    <p style='font-size:12px;color:#aaa;margin:0;'>&copy; " . date('Y') . " BlinksCore. All rights reserved.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>";

    if (sendMail($email, $subject, $bodyHtml)) {
        $response = ["success" => true, "message" => "We’ve sent a password reset link to your email."];
        if ($env === 'development') {
            $response["debug_link"] = $reset_link; // for testing only
        }
        echo json_encode($response);
    } else {
        echo json_encode(["success" => false, "message" => "Email could not be sent. Please try again later."]);
    }

} catch (Exception $e) {
    error_log("Forgot password error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Server error. Please try again later."]);
}