<?php
$servername = "localhost";
$username = "root";
$password = "3Bolga..."; 
$dbname = "student_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// 1. Corrected Check: uses the connect_error property
if ($conn->connect_error) {
    die("❌ Failed to connect: " . $conn->connect_error);
}
// Optional: Only echo this while testing. 
// Remove it later so it doesn't mess up your other pages.
// echo "✅ Connected to the DB successfully"; 