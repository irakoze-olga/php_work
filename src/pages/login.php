<?php
session_start();
include "../includes/db.php";
$error = "";

if (isset($_POST["login"])) {
    $email = $conn->real_escape_string(trim($_POST["email"]));
    $res = $conn->query("SELECT * FROM users WHERE email='$email' LIMIT 1");

    if ($res && $res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify(trim($_POST["password"]), $user["password"])) {
            $_SESSION["user_id"] = $user["ID"];
            $_SESSION["user_name"] = $user["fname"] . " " . $user["lname"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_role"] = $user["role"];
            header("Location: " . ($user["role"] === "admin" ? "admin.php" : "dashboard.php"));
            exit();
        } else $error = "Invalid password.";
    } else $error = "Account not found.";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="../styles/main_simple.css">
    <style>
        body {
            justify-content: center;
            align-items: center;
            padding: 20px
        }

        .card {
            width: 100%;
            max-width: 400px
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Sign In</h2>
        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn btn-primary">Sign In</button>
        </form>
        <p>Don't have an account? <a href="signup.php" style="color:#6c757d; text-decoration:none; font-weight:600;">Create an account</a></p>
    </div>
</body>

</html>