<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><title>Sign Up</title>
    <link rel="stylesheet" href="../styles/main.css">
    <style>body{justify-content:center;align-items:center;padding:40px;} .card{width:100%;max-width:500px;}</style>
</head>
<body>
<?php include __DIR__ . "/../includes/theme_toggle.php"; ?>
<div class="card">
    <h2 style="text-align:center;margin-bottom:30px;font-weight:700;color:var(--text);">Create Account</h2>
    <form action="create.php" method="POST" autocomplete="on">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
            <div><label for="firstname">First Name</label><input type="text" id="firstname" name="firstname" placeholder="John" required autocomplete="given-name"></div>
            <div><label for="lastname">Last Name</label><input type="text" id="lastname" name="lastname" placeholder="Doe" required autocomplete="family-name"></div>
        </div>
        <label for="email">Email Address</label><input type="email" id="email" name="email" placeholder="john@example.com" required autocomplete="email">
        <label for="password">Password</label><input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="new-password">
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option>Male</option><option>Female</option><option>Other</option>
        </select>
        <button type="submit" name="submit" class="btn btn-primary" style="width:100%;margin-top:10px;">Sign Up</button>
    </form>
    <p style="text-align:center;margin-top:25px;font-size:14px;color:var(--muted);">
        Already have an account? <a href="login.php" style="color:var(--green);text-decoration:none;font-weight:600;">Sign In</a>
    </p>
</div>
</body>
</html>
