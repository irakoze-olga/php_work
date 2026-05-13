<?php
session_start();
include "../includes/db.php";
include "../includes/admin_functions.php";
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$isAdmin = $_SESSION["user_role"] === "admin";
if ($isAdmin && $_SERVER["REQUEST_METHOD"] === "POST") handleAdminPost($conn);

$view = $_GET["view"] ?? "dashboard";
$message = $_SESSION["msg"] ?? "";
unset($_SESSION["msg"]);
$data = getAdminData($conn, $view, (int)($_GET["id"] ?? 0));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles/main.css">
</head>

<body>
    <?php include "../includes/sidebar.php"; ?>
    <main class="main">
        <div class="main-header">
            <h1>Admin Control</h1>
            <p>Welcome <?= htmlspecialchars($_SESSION["user_name"]) ?> <span class="chip chip-admin">Admin</span></p>
        </div>
        <?php if ($message): ?>
            <div class="toast"><?= $message ?>
                <script>
                    setTimeout(() => document.querySelector('.toast').remove(), 3000);
                </script>
            </div>
        <?php endif; ?>

        <?php if ($view === "dashboard"): ?>
            <div class="stats-grid">
                <div class="stat-card">
                    <h2><?= $data['total'] ?></h2>
                    <p>Users</p>
                </div>
                <div class="stat-card">
                    <h2><?= $data['admins'] ?></h2>
                    <p>Admins</p>
                </div>
            </div>
            <div class="card">
                <h3>Quick Actions</h3>
                <a href="admin.php?view=add" class="btn btn-primary">Create User</a>
            </div>

        <?php elseif ($view === "list"): ?>
            <?php include "admin_list.php"; ?>

        <?php elseif ($isAdmin): ?>
            <?php include "admin_form.php"; ?>

        <?php endif; ?>
    </main>
</body>

</html>