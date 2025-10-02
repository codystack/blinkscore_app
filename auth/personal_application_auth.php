<?php
// submit_application.php
include "../config/db.php"; // Your PDO connection
session_start();

header("Content-Type: application/json");

// Directory for uploads
$uploadDir = __DIR__ . "/../uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0775, true);
}

try {
    if (!isset($_SESSION['user_id'])) {
        echo json_encode(["success" => false, "message" => "Unauthorized. Please log in."]);
        exit;
    }

    $userId = $_SESSION['user_id'];

    // Helper function to handle file uploads
    function uploadFile($fileKey, $uploadDir) {
        if (!isset($_FILES[$fileKey]) || $_FILES[$fileKey]['error'] !== UPLOAD_ERR_OK) {
            return null; // File not uploaded
        }

        $fileTmp  = $_FILES[$fileKey]['tmp_name'];
        $fileName = time() . "_" . basename($_FILES[$fileKey]['name']);
        $filePath = $uploadDir . $fileName;

        // Validate file type (basic)
        $allowed = ['jpg','jpeg','png','pdf'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed)) {
            throw new Exception("Invalid file type for {$fileKey}. Allowed: jpg, jpeg, png, pdf");
        }

        if (!move_uploaded_file($fileTmp, $filePath)) {
            throw new Exception("Failed to upload {$fileKey}");
        }

        // Store relative path (for DB)
        return "uploads/" . $fileName;
    }

    // Upload files
    $means_identity   = uploadFile("means_of_identity", $uploadDir);
    $proof_of_travel  = uploadFile("proof_of_travel", $uploadDir);
    $utility_bill     = uploadFile("utility_bill", $uploadDir);
    $passport_photo   = uploadFile("passport_photo", $uploadDir);
    $signature_sample = uploadFile("signature_sample", $uploadDir);

    // Collect POST data
    $data = [
        "user_id"            => $userId,
        "first_name"         => trim($_POST['first_name'] ?? ''),
        "last_name"          => trim($_POST['last_name'] ?? ''),
        "other_names"        => trim($_POST['other_names'] ?? ''),
        "mothers_maiden_name"=> trim($_POST['mothers_maiden_name'] ?? ''),
        "email_address"      => trim($_POST['email_address'] ?? ''),
        "phone_number"       => trim($_POST['phone_number'] ?? ''),
        "date_of_birth"      => $_POST['date_of_birth'] ?? null,
        "place_of_birth"     => trim($_POST['place_of_birth'] ?? ''),
        "gender"             => trim($_POST['gender'] ?? ''),
        "nationality"        => trim($_POST['nationality'] ?? ''),
        "state_of_origin"    => trim($_POST['state_of_origin'] ?? ''),
        "lga"                => trim($_POST['lga'] ?? ''),
        "hometown"           => trim($_POST['hometown'] ?? ''),
        "marital_status"     => trim($_POST['marital_status'] ?? ''),
        "religion"           => trim($_POST['religion'] ?? ''),
        "occupation"         => trim($_POST['occupation'] ?? ''),
        "workplace"          => trim($_POST['workplace'] ?? ''),
        "workplace_address"  => trim($_POST['workplace_address'] ?? ''),

        // Next of kin
        "kin_first_name"     => trim($_POST['kin_first_name'] ?? ''),
        "kin_last_name"      => trim($_POST['kin_last_name'] ?? ''),
        "kin_email"          => trim($_POST['kin_email'] ?? ''),
        "kin_phone"          => trim($_POST['kin_phone'] ?? ''),
        "kin_date_of_birth"  => $_POST['kin_date_of_birth'] ?? null,
        "kin_gender"         => trim($_POST['kin_gender'] ?? ''),
        "kin_residential_address" => trim($_POST['kin_residential_address'] ?? ''),
        "kin_relationship"   => trim($_POST['kin_relationship'] ?? ''),

        // Loan details
        "loan_amount"        => $_POST['loan_amount'] ?? 0,
        "bank_type"          => trim($_POST['bank_type'] ?? ''),
        "loan_duration_months"=> $_POST['loan_duration_months'] ?? null,
        "loan_start_date"    => $_POST['loan_start_date'] ?? null,
        "loan_end_date"      => $_POST['loan_end_date'] ?? null,
        "purpose_of_fund"    => trim($_POST['purpose_of_fund'] ?? ''),

        // Identity
        "id_type"            => trim($_POST['id_type'] ?? ''),
        "means_of_identity"  => $means_identity,
        "id_number"          => trim($_POST['id_number'] ?? ''),
        "id_expiry_date"     => $_POST['id_expiry_date'] ?? null,
        "nin"                => trim($_POST['nin'] ?? ''),

        // Documents
        "proof_of_travel"    => $proof_of_travel,
        "utility_bill"       => $utility_bill,
        "passport_photo"     => $passport_photo,
        "signature_sample"   => $signature_sample,
    ];

    // Insert SQL
    $sql = "INSERT INTO personal_application (
                user_id, first_name, last_name, other_names, mothers_maiden_name,
                email_address, phone_number, date_of_birth, place_of_birth, gender,
                nationality, state_of_origin, lga, hometown, marital_status, religion,
                occupation, workplace, workplace_address,
                kin_first_name, kin_last_name, kin_email, kin_phone, kin_date_of_birth, 
                kin_gender, kin_residential_address, kin_relationship,
                loan_amount, bank_type, loan_duration_months, loan_start_date, loan_end_date, purpose_of_fund,
                id_type, means_of_identity, id_number, id_expiry_date, nin,
                proof_of_travel, utility_bill, passport_photo, signature_sample, status
            ) VALUES (
                :user_id, :first_name, :last_name, :other_names, :mothers_maiden_name,
                :email_address, :phone_number, :date_of_birth, :place_of_birth, :gender,
                :nationality, :state_of_origin, :lga, :hometown, :marital_status, :religion,
                :occupation, :workplace, :workplace_address,
                :kin_first_name, :kin_last_name, :kin_email, :kin_phone, :kin_date_of_birth,
                :kin_gender, :kin_residential_address, :kin_relationship,
                :loan_amount, :bank_type, :loan_duration_months, :loan_start_date, :loan_end_date, :purpose_of_fund,
                :id_type, :means_of_identity, :id_number, :id_expiry_date, :nin,
                :proof_of_travel, :utility_bill, :passport_photo, :signature_sample, 'pending'
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    echo json_encode(["success" => true, "message" => "Application submitted successfully."]);
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => $e->getMessage()]);
}