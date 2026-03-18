<?php
$conn = new mysqli("localhost", "root", "3Bolga...", "student_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Ensure password column is long enough for hashes
$conn->query("ALTER TABLE users MODIFY COLUMN password VARCHAR(255) NOT NULL");

// Ensure role column exists
$res = $conn->query("SHOW COLUMNS FROM users LIKE 'role'");
if ($res->num_rows === 0) {
    $conn->query("ALTER TABLE users ADD COLUMN role ENUM('admin','user') NOT NULL DEFAULT 'user'");
}

// Force admin role and set password for the specific email
$pw_admin = password_hash('3Bolga123', PASSWORD_DEFAULT);
$conn->query("UPDATE users SET role='admin', password='$pw_admin' WHERE email='irakozeolga490@gmail.com'");
?>
