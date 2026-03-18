<?php
include "../includes/db.php";
if (isset($_POST["submit"])) {
    $fn = $conn->real_escape_string($_POST["firstname"]);
    $ln = $conn->real_escape_string($_POST["lastname"]);
    $em = $conn->real_escape_string($_POST["email"]);
    $gen = $conn->real_escape_string($_POST["gender"]);
    $pw = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // Ensure password length is 255
    $conn->query("ALTER TABLE users MODIFY COLUMN password VARCHAR(255) NOT NULL");
    if ($conn->query("INSERT INTO users (fname,lname,email,password,gender) VALUES ('$fn','$ln','$em','$pw','$gen') 
                      ON DUPLICATE KEY UPDATE password='$pw', fname='$fn', lname='$ln', gender='$gen'")) {
?>
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Success</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"><link rel="stylesheet" href="../styles/main.css">
<style>
    body{justify-content:center;align-items:center;}
    .success-icon {
        width: 100px; height: 100px; background: var(--green);
        border-radius: 50%; margin: 0 auto 25px;
        display: flex; align-items: center; justify-content: center;
        box-shadow: 0 10px 20px var(--green-glow); color: #fff;
    }
    .success-icon b { font-size: 22px; letter-spacing: 1px; }
</style>
</head>
<body>
<div class="card" style="text-align:center;width:420px;padding:50px 40px;">
    <div class="success-icon"><b>DONE</b></div>
    <h2 style="margin-bottom:12px;font-size:24px;">Registration Successful!</h2>
    <p style="color:var(--muted);margin-bottom:30px;font-size:15px;line-height:1.6;">Welcome, <b><?= htmlspecialchars("$fn $ln") ?></b>!<br>Access your account now.</p>
    <a href="login.php?email=<?= urlencode($em) ?>" class="btn btn-primary" style="width:100%;padding:15px;font-size:16px;">Sign In Now</a>
</div>
</body></html>
<?php } else { echo "Error: " . $conn->error; } $conn->close(); } ?>
