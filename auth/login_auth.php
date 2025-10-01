<?php
session_start();
header('Content-Type: application/json');

require_once __DIR__ . '/../config/db.php'; // $pdo is available

try {
    // Collect input
    $email    = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    // Validation
    if (!$email || !$password) {
        echo json_encode(["success" => false, "message" => "Email and password are required."]);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["success" => false, "message" => "Invalid email address."]);
        exit;
    }

    // Fetch user by email
    $stmt = $pdo->prepare("SELECT id, email, password, first_name, last_name, phone FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["success" => false, "message" => "No account found with that email."]);
        exit;
    }

    // Verify password
    if (!password_verify($password, $user['password'])) {
        echo json_encode(["success" => false, "message" => "Incorrect password."]);
        exit;
    }

    // If valid → start session
    $_SESSION['user_id']    = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_name']  = $user['first_name'] . ' ' . $user['last_name'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['user_phone'] = $user['phone'];

    echo json_encode([
        "success" => true,
        "message" => "Login successful! Redirecting..."
    ]);
    exit;

} catch (Exception $e) {
    // Catch unexpected errors safely
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Server error. Please try again later."
    ]);
    exit;
}