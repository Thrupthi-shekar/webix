<?php
declare(strict_types=1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function require_auth(): void {
    if (empty($_SESSION['user'])) {
        header('Location: /webixapp/pages/login.php');
        exit;
    }
}

function current_user(): ?array {
    return $_SESSION['user'] ?? null;
}




