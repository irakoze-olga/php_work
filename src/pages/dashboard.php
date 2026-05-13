<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION["user_role"] === "admin") {
    header("Location: admin.php");
    exit();
}

$userName = htmlspecialchars($_SESSION["user_name"]);
$userEmail = htmlspecialchars($_SESSION["user_email"] ?? "");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/main_simple.css">
</head>

<body>
    <?php include "../includes/sidebar.php"; ?>
    <main class="main">
        <div class="main-header">
            <h1>My Dashboard</h1>
            <p>Welcome <?= $userName ?> <span class="chip chip-user">User</span></p>
        </div>
        <div class="card">
            <h3>Account Information</h3>
            <p>Name: <b><?= $userName ?></b></p>
            <p>Email: <b><?= $userEmail ?></b></p>
        </div>
    </main>
</body>

</html>