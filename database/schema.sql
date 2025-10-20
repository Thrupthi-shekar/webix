-- WebixApp Database Schema
-- MySQL Database Schema for User Authentication System

-- Create database (uncomment if needed)
-- CREATE DATABASE IF NOT EXISTS `webixapp` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- USE `webixapp`;

-- Users table for storing user registration and profile information
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL COMMENT 'Full name of the user',
    `username` VARCHAR(100) NOT NULL UNIQUE COMMENT 'Unique username for login',
    `mobile` VARCHAR(30) NOT NULL COMMENT 'Mobile phone number',
    `dob` DATE NOT NULL COMMENT 'Date of birth',
    `age` INT NOT NULL COMMENT 'Calculated age from date of birth',
    `email` VARCHAR(191) NOT NULL UNIQUE COMMENT 'Email address (191 chars for MySQL compatibility)',
    `password_hash` VARCHAR(255) NOT NULL COMMENT 'Hashed password using PHP password_hash()',
    `graduation` VARCHAR(100) NOT NULL COMMENT 'Graduation qualification',
    `masters_done` TINYINT(1) NOT NULL DEFAULT 0 COMMENT 'Whether user has completed masters (0=No, 1=Yes)',
    `masters_degree` VARCHAR(100) NULL COMMENT 'Masters degree if applicable',
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Account creation timestamp',
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Last update timestamp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='User accounts and profile information';

-- Create indexes for better performance
CREATE INDEX `idx_username` ON `users` (`username`);
CREATE INDEX `idx_email` ON `users` (`email`);
CREATE INDEX `idx_created_at` ON `users` (`created_at`);

-- Insert sample data (optional - for testing)
-- Note: Passwords are hashed using PHP password_hash() with PASSWORD_DEFAULT
-- Sample password for all test users: "TestPass123!"

INSERT INTO `users` (`name`, `username`, `mobile`, `dob`, `age`, `email`, `password_hash`, `graduation`, `masters_done`, `masters_degree`) VALUES
('John Doe', 'johndoe', '1234567890', '1990-05-15', 34, 'john.doe@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BS Computer Science', 1, 'MS Computer Science'),
('Jane Smith', 'janesmith', '0987654321', '1988-12-03', 35, 'jane.smith@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BS Information Technology', 0, NULL),
('Mike Johnson', 'mikej', '5555555555', '1995-08-22', 28, 'mike.johnson@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BBA', 1, 'MBA');

-- Show table structure
DESCRIBE `users`;

-- Show sample data
SELECT `id`, `name`, `username`, `email`, `graduation`, `masters_done`, `masters_degree`, `created_at` FROM `users` LIMIT 5;


