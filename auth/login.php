<?php
declare(strict_types=1);
header('Content-Type: application/json');

require_once __DIR__ . '/../includes/db.php';
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    echo json_encode(['success'=>false, 'message'=>'Invalid method']);
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = (string)($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    echo json_encode(['success'=>false, 'message'=>'Missing credentials']);
    exit;
}

try {
    $mysqli = dbi();
    $stmt = $mysqli->prepare('SELECT id, name, username, email, password_hash FROM users WHERE username = ?');
    if (!$stmt) { throw new RuntimeException('Prepare failed: '.$mysqli->error); }
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res ? $res->fetch_assoc() : null;
    if (!$user || !password_verify($password, $user['password_hash'])) {
        echo json_encode(['success'=>false, 'message'=>'Invalid credentials']);
        exit;
    }

    $_SESSION['user'] = [
        'id' => (int)$user['id'],
        'name' => $user['name'],
        'username' => $user['username'],
        'email' => $user['email']
    ];

    echo json_encode(['success'=>true]);
} catch (Throwable $e) {
    http_response_code(200);
    echo json_encode(['success'=>false, 'message'=>$e->getMessage()]);
}


