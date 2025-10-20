<?php
declare(strict_types=1);

$dbError = '';

// MySQL (XAMPP defaults)
$MYSQL_HOST = getenv('MYSQL_HOST') ?: '127.0.0.1';
$MYSQL_PORT = (int)(getenv('MYSQL_PORT') ?: 3306);
$MYSQL_USER = getenv('MYSQL_USER') ?: 'root';
$MYSQL_PASS = getenv('MYSQL_PASSWORD') ?: '';
$MYSQL_DB   = getenv('MYSQL_DB') ?: 'webixapp';

function mysqli_server_connect(string $host, int $port, string $user, string $pass): ?mysqli {
    global $dbError;
    $socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
    mysqli_report(MYSQLI_REPORT_OFF);
    if (file_exists($socket)) {
        $link = @mysqli_init();
        if ($link && @$link->real_connect(null, $user, $pass, '', null, $socket)) {
            return $link;
        }
        $dbError = mysqli_connect_error();
    }
    $link = @mysqli_init();
    if ($link && @$link->real_connect($host, $user, $pass, '', $port, null)) {
        return $link;
    }
    $dbError = mysqli_connect_error();
    return null;
}

function mysqli_db_connect(string $host, int $port, string $user, string $pass, string $db): ?mysqli {
    global $dbError;
    $socket = '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock';
    mysqli_report(MYSQLI_REPORT_OFF);
    if (file_exists($socket)) {
        $link = @mysqli_init();
        if ($link && @$link->real_connect(null, $user, $pass, $db, null, $socket)) {
            return $link;
        }
        $dbError = mysqli_connect_error();
    }
    $link = @mysqli_init();
    if ($link && @$link->real_connect($host, $user, $pass, $db, $port, null)) {
        return $link;
    }
    $dbError = mysqli_connect_error();
    return null;
}

// Initialize database and schema
function initializeDatabase() {
    global $MYSQL_HOST, $MYSQL_PORT, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB;
    
    $__server = mysqli_server_connect($MYSQL_HOST, $MYSQL_PORT, $MYSQL_USER, $MYSQL_PASS);
    if (!$__server) {
        return null;
    }
    
    // Create database if it doesn't exist
    $query = "CREATE DATABASE IF NOT EXISTS `{$MYSQL_DB}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if (!$__server->query($query)) {
        error_log("Failed to create database: " . $__server->error);
    }
    $__server->close();
    
    // Connect to the database
    $conn = mysqli_db_connect($MYSQL_HOST, $MYSQL_PORT, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
    if ($conn) {
        // Create users table
        $createTable = "CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            username VARCHAR(100) NOT NULL UNIQUE,
            mobile VARCHAR(30) NOT NULL,
            dob DATE NOT NULL,
            age INT NOT NULL,
            email VARCHAR(191) NOT NULL UNIQUE,
            password_hash VARCHAR(255) NOT NULL,
            graduation VARCHAR(100) NOT NULL,
            masters_done TINYINT(1) NOT NULL DEFAULT 0,
            masters_degree VARCHAR(100) NULL,
            created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
        
        if (!$conn->query($createTable)) {
            error_log("Failed to create users table: " . $conn->error);
        }
        
        return $conn;
    }
    
    return null;
}

// Initialize database
$GLOBALS['__mysqli'] = initializeDatabase();

function dbi(): mysqli {
    global $dbError, $__mysqli, $MYSQL_HOST, $MYSQL_PORT, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB;
    
    if (!($__mysqli instanceof mysqli)) {
        $__mysqli = initializeDatabase();
        
        if (!($__mysqli instanceof mysqli)) {
            $__mysqli = mysqli_db_connect($MYSQL_HOST, $MYSQL_PORT, $MYSQL_USER, $MYSQL_PASS, $MYSQL_DB);
        }
    }
    
    if (!($__mysqli instanceof mysqli)) {
        throw new RuntimeException('Database not available. ' . ($dbError ?: 'Check MySQL server and credentials. Make sure XAMPP MySQL is running.'));
    }
    
    return $__mysqli;
}


