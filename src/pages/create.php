<?php
include "../includes/db.php";

if (isset($_POST["submit"])) {
    $firstName = $conn->real_escape_string($_POST["firstname"]);
    $lastName = $conn->real_escape_string($_POST["lastname"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $gender = $conn->real_escape_string($_POST["gender"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $conn->query("ALTER TABLE users MODIFY COLUMN password VARCHAR(255) NOT NULL");

    $query = "INSERT INTO users (fname, lname, email, password, gender) 
              VALUES ('$firstName', '$lastName', '$email', '$password', '$gender') 
              ON DUPLICATE KEY UPDATE password='$password', fname='$firstName', lname='$lastName', gender='$gender'";

    if ($conn->query($query)) {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <title>Success</title>
            <link rel="stylesheet" href="../styles/main_simple.css">
            <style>
                body {
                    justify-content: center;
                    align-items: center;
                    padding: 20px
                }

                .success-box {
                    text-align: center
                }

                .success-icon {
                    width: 100px;
                    height: 100px;
                    background: var(--green);
                    border-radius: 50%;
                    margin: 0 auto 25px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 40px
                }
            </style>
        </head>

        <body>
            <div class="card success-box">
                <div class="success-icon"></div>
                <h2>Registration Successful!</h2>
                <p>Welcome <?= htmlspecialchars("$firstName $lastName") ?>!<br>Your account is ready.</p>
                <a href="login.php?email=<?= urlencode($email) ?>" class="btn btn-primary">Sign In Now</a>
            </div>
        </body>

        </html>
<?php
    } else echo "Error: " . $conn->error;
    $conn->close();
}
?>