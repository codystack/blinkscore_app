<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/db.php'; // $pdo available

// ENV toggle: set to "production" on live server
$ENV = "test"; // "test" | "production"

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

    // Check if email exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["success" => false, "message" => "No account found with that email."]);
        exit;
    }

    // Generate secure reset token
    $token = bin2hex(random_bytes(32));
    $expires_at = date("Y-m-d H:i:s", strtotime("+1 hour"));

    // Store token in DB
    $insert = $pdo->prepare("
        INSERT INTO password_resets (user_id, token, expires_at) 
        VALUES (?, ?, ?)
        ON DUPLICATE KEY UPDATE token = VALUES(token), expires_at = VALUES(expires_at)
    ");
    $insert->execute([$user['id'], $token, $expires_at]);

    // Reset link
    $reset_link = "https://blinkscore.ng/reset-password?token=$token";

    if ($ENV === "production") {
        // === PRODUCTION: Send email with PHPMailer or mail() ===
        $subject = "Password Reset Request";
        $message = "Hello,\n\nClick the link below to reset your password:\n$reset_link\n\nThis link expires in 1 hour.";
        $headers = "From: no-reply@blinkscore.ng\r\n";

        // Use mail() (basic) or PHPMailer (recommended for reliability)
        if (mail($email, $subject, $message, $headers)) {
            echo json_encode([
                "success" => true,
                "message" => "We’ve sent a password reset link to your email."
            ]);
        } else {
            echo json_encode([
                "success" => false,
                "message" => "Could not send reset email. Please try again later."
            ]);
        }
    } else {
        // === TEST: Show reset link directly for debugging ===
        echo json_encode([
            "success" => true,
            "message" => "Test mode: password reset link generated.",
            "debug_link" => $reset_link
        ]);
    }

    exit;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Server error. Please try again later."
    ]);
    exit;
}