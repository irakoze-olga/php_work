<?php session_start(); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../styles/main_simple.css">
    <style>
        body {
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .card {
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Create Account</h2>
        <form action="create.php" method="POST">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px">
                <input type="text" name="firstname" placeholder="First Name" required>
                <input type="text" name="lastname" placeholder="Last Name" required>
            </div>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="gender">
                <option>Male</option>
                <option>Female</option>
            </select>
            <button type="submit" name="submit" class="btn" style="background: #6c757d; color: #ffffff; border-color: #6c757d;">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php" class="text-link">Sign In</a></p>
    </div>
</body>

</html>