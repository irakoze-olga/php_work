<?php
session_start(); include "../includes/db.php";
$error = "";
if (isset($_POST["login"])) {
    $email = $conn->real_escape_string(trim($_POST["email"]));
    $res = $conn->query("SELECT * FROM users WHERE email='$email' LIMIT 1");
    if ($res && $res->num_rows === 1) {
        $u = $res->fetch_assoc();
        // Trim password for verification safety
        $pw_input = trim($_POST["password"]);
        if (password_verify($pw_input, $u["password"])) {
            $_SESSION["user_id"] = $u["ID"];
            $_SESSION["user_name"] = $u["fname"] . " " . $u["lname"];
            $_SESSION["user_email"] = $u["email"]; // and email
            $_SESSION["user_role"] = $u["role"];
            header("Location: " . ($u["role"] === "admin" ? "admin.php" : "dashboard.php"));
            exit();
        } else $error = "Invalid password.";
    } else $error = "Account not found.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Login</title>
    <link rel="stylesheet" href="../styles/main.css">
    <style>body{justify-content:center;align-items:center;padding:40px;} .card{width:100%;max-width:400px;}</style>
</head>
<body>
<?php include __DIR__ . "/../includes/theme_toggle.php"; ?>
<div class="card">
    <h2 style="text-align:center;margin-bottom:30px;font-weight:700;color:var(--text);">Sign In</h2>
    <?php if($error): ?><div style="color:var(--red);background:#fef2f2;padding:12px;border-radius:10px;margin-bottom:20px;text-align:center;font-size:14px;border:1px solid #fee2e2;"><?= $error ?></div><?php endif; ?>
    <form method="POST" autocomplete="on">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($_GET['email'] ?? '') ?>" placeholder="Enter your email" required autocomplete="email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
        <button type="submit" name="login" class="btn btn-primary" style="width:100%;margin-top:10px;">Sign In</button>
    </form>
    <p style="text-align:center;margin-top:25px;font-size:14px;color:var(--muted);">
        New here? <a href="signup.php" style="color:var(--green);text-decoration:none;font-weight:600;">Create an account</a>
    </p>
</div>
</body>
</html>