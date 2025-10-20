<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/db.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid method']);
    exit;
}

// Get and sanitize input data
$name = trim($_POST['name'] ?? '');
$username = trim($_POST['username'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$dob = $_POST['dob'] ?? '';
$age = (int)($_POST['age'] ?? 0);
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$graduation = trim($_POST['graduation'] ?? '');
$masters_done = $_POST['masters_done'] ?? 'no';
$masters_degree = trim($_POST['masters_degree'] ?? '');

// Validation functions
function validateEmail(string $email): array {
    if (empty($email)) {
        return ['valid' => false, 'message' => 'Email is required'];
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ['valid' => false, 'message' => 'Please enter a valid email address'];
    }
    return ['valid' => true];
}

function validateMobile(string $mobile): array {
    if (empty($mobile)) {
        return ['valid' => false, 'message' => 'Mobile number is required'];
    }
    if (!preg_match('/^\d{10}$/', $mobile)) {
        return ['valid' => false, 'message' => 'Mobile number must be exactly 10 digits'];
    }
    return ['valid' => true];
}

function validatePassword(string $password): array {
    if (empty($password)) {
        return ['valid' => false, 'message' => 'Password is required'];
    }
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        return ['valid' => false, 'message' => 'Password must be at least 8 characters with uppercase, lowercase, number, and special character'];
    }
    return ['valid' => true];
}

function validateUsername(string $username): array {
    if (empty($username)) {
        return ['valid' => false, 'message' => 'Username is required'];
    }
    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        return ['valid' => false, 'message' => 'Username must be 3-20 characters (letters, numbers, underscore only)'];
    }
    return ['valid' => true];
}

function validateName(string $name): array {
    if (empty($name)) {
        return ['valid' => false, 'message' => 'Name is required'];
    }
    if (!preg_match('/^[a-zA-Z\s]{2,50}$/', $name)) {
        return ['valid' => false, 'message' => 'Name must be 2-50 characters (letters and spaces only)'];
    }
    return ['valid' => true];
}

function validateDOB(string $dob): array {
    if (empty($dob)) {
        return ['valid' => false, 'message' => 'Date of birth is required'];
    }
    
    $birthDate = new DateTime($dob);
    $today = new DateTime();
    
    if ($birthDate > $today) {
        return ['valid' => false, 'message' => 'Date of birth cannot be in the future'];
    }
    
    $age = $today->diff($birthDate)->y;
    if ($age > 120) {
        return ['valid' => false, 'message' => 'Please enter a valid date of birth'];
    }
    
    return ['valid' => true];
}

function validateAge(int $age): array {
    if ($age < 0 || $age > 120) {
        return ['valid' => false, 'message' => 'Age must be between 0 and 120'];
    }
    return ['valid' => true];
}

function validateGraduation(string $graduation): array {
    if (empty($graduation)) {
        return ['valid' => false, 'message' => 'Please select your graduation qualification'];
    }
    return ['valid' => true];
}

function validateMasters(string $masters_done, string $masters_degree): array {
    if ($masters_done === 'yes' && empty($masters_degree)) {
        return ['valid' => false, 'message' => 'Please select your masters degree'];
    }
    return ['valid' => true];
}

// Perform all validations
$errors = [];

$nameValidation = validateName($name);
if (!$nameValidation['valid']) $errors[] = $nameValidation['message'];

$usernameValidation = validateUsername($username);
if (!$usernameValidation['valid']) $errors[] = $usernameValidation['message'];

$mobileValidation = validateMobile($mobile);
if (!$mobileValidation['valid']) $errors[] = $mobileValidation['message'];

$dobValidation = validateDOB($dob);
if (!$dobValidation['valid']) $errors[] = $dobValidation['message'];

$ageValidation = validateAge($age);
if (!$ageValidation['valid']) $errors[] = $ageValidation['message'];

$emailValidation = validateEmail($email);
if (!$emailValidation['valid']) $errors[] = $emailValidation['message'];

$passwordValidation = validatePassword($password);
if (!$passwordValidation['valid']) $errors[] = $passwordValidation['message'];

$graduationValidation = validateGraduation($graduation);
if (!$graduationValidation['valid']) $errors[] = $graduationValidation['message'];

$mastersValidation = validateMasters($masters_done, $masters_degree);
if (!$mastersValidation['valid']) $errors[] = $mastersValidation['message'];

// If there are validation errors, return them
if (!empty($errors)) {
    echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
    exit;
}

try {
    $mysqli = dbi();
    
    // Check if username already exists
    $stmt = $mysqli->prepare('SELECT id FROM users WHERE username = ?');
    if (!$stmt) {
        throw new RuntimeException('Prepare failed: ' . $mysqli->error);
    }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already exists']);
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    if ($masters_done && $masters_degree === '') {
        echo json_encode(['success' => false, 'message' => 'Please select your masters degree']);
        exit;
    }
    $stmt->close();
    
    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Convert masters_done to boolean
    $masters_done_bool = ($masters_done === 'yes') ? 1 : 0;
    
    // Insert new user
    $stmt = $mysqli->prepare('INSERT INTO users (name, username, mobile, dob, age, email, password_hash, graduation, masters_done, masters_degree) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
    if (!$stmt) {
        throw new RuntimeException('Prepare failed: ' . $mysqli->error);
    }
    
    $stmt->bind_param('ssssisssis', $name, $username, $mobile, $dob, $age, $email, $password_hash, $graduation, $masters_done_bool, $masters_degree);
    
    if ($stmt->execute()) {
        // Get the new user ID
        $new_user_id = $mysqli->insert_id;
        
        // Automatically log in the user
        $_SESSION['user'] = [
            'id' => $new_user_id,
            'name' => $name,
            'username' => $username,
            'email' => $email
        ];
        
        echo json_encode(['success' => true, 'message' => 'Account created successfully']);
    } else {
        throw new RuntimeException('Insert failed: ' . $stmt->error);
    }
    
    $stmt->close();
    
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>