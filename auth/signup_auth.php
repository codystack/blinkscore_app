<?php
session_start();
header('Content-Type: application/json');

// include PDO connection
require_once __DIR__ . '/../config/db.php'; // this defines $pdo

// Collect & sanitize input
$first_name = trim($_POST['first_name'] ?? '');
$last_name  = trim($_POST['last_name'] ?? '');
$email      = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
$phone      = trim($_POST['phone'] ?? '');
$password   = $_POST['password'] ?? '';

// Basic validation
if (!$first_name || !$last_name || !$email || !$phone || !$password) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "Invalid email address."]);
    exit;
}

if (!preg_match('/^\+?[0-9]{7,15}$/', $phone)) {
    echo json_encode(["success" => false, "message" => "Invalid phone number."]);
    exit;
}

if (strlen($password) < 8) {
    echo json_encode(["success" => false, "message" => "Password must be at least 8 characters long."]);
    exit;
}

// Check if email already exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);

if ($stmt->fetch()) {
    echo json_encode(["success" => false, "message" => "Email already registered."]);
    exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insert new user
$stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)");

try {
    $stmt->execute([$first_name, $last_name, $email, $phone, $hashed_password]);

    // optional: auto-login
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['user_email'] = $email;

    echo json_encode([
        "success" => true,
        "message" => "Account created successfully. Redirecting..."
    ]);
} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "message" => "Database error. Please try again later."
    ]);
}