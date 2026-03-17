<?php
include "connection.php";

if (isset($_POST["submit"])) {
    // 1. Sanitize input to prevent SQL errors/hacking
    $firstname = $conn->real_escape_string($_POST["firstname"]);
    $lastname  = $conn->real_escape_string($_POST["lastname"]);
    $email     = $conn->real_escape_string($_POST["email"]);
    $password  = $_POST["password"]; // Don't escape before hashing
    $gender    = $conn->real_escape_string($_POST["gender"]);
    $hashed_password = password_hash($password,  PASSWORD_DEFAULT);

    // 2. Your SQL query with hashed password
    $sql = "INSERT INTO users (fname, lname, email, password, gender) 
            VALUES ('$firstname', '$lastname', '$email', '$hashed_password', '$gender')";

    // 3. Execute and check if it worked
    if ($conn->query($sql) === TRUE) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign up Successful</title>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="create.css">
        </head>

        <body>
            <div class="container">
                <div class="checkmark">✓</div>
                <div class="success-message">Success!</div>
                <h1>Welcome !</h1>
                <div class="user-info">
                    <p><strong><?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></strong></p>
                    <p>Your account has been created successfully!</p>
                    <p style="margin-top: 12px; font-size: 14px;">✅ Profile activated</p>
                </div>
                <form action="signup.html" method="GET">
                    <button type="submit" href="signup.html">← Return to Sign Up</button>
                </form>
            </div>
        </body>

        </html>
    <?php
    } else {
    ?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Error</title>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link rel = "stylesheet" href = "error.css">
        </head>

        <body>
            <div class="container">
                <div class="error-icon">⚠️</div>
                <h1>Oops! Something Went Wrong</h1>
                <div class="error-message">
                    <strong>Error:</strong> <?php echo htmlspecialchars($conn->error); ?>
                </div>
                <button onclick="history.back()">← Go Back & Try Again</button>
                <p class="help-text">💡 Tip: Check your email address or try different credentials</p>
            </div>
        </body>

        </html>
<?php
    }

    // 4. Close connection
    $conn->close();
}
?>