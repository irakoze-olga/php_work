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
    <title>Admin</title>
    <link rel="stylesheet" href="../styles/main_simple.css">
</head>

<body>
    <?php include "../includes/sidebar.php"; ?>
    <main class="main">
        <div class="main-header">
            <div>
                <h1><?= $isAdmin ? 'Admin Dashboard' : 'User Directory' ?></h1>
                <p>Welcome back, <?= htmlspecialchars($_SESSION["user_name"]) ?> <span class="chip <?= $isAdmin ? 'chip-admin' : 'chip-user' ?>"><?= $isAdmin ? 'Admin' : 'User' ?></span></p>
            </div>
            <?php if ($isAdmin): ?>
                <a href="admin.php?view=add" class="btn btn-primary">+ Create User</a>
            <?php endif; ?>
        </div>
        <?php if ($message): ?>
            <div class="toast"><?= $message ?></div>
            <script>
                setTimeout(() => document.querySelector('.toast').remove(), 3000);
            </script>
        <?php endif; ?>

        <?php if ($isAdmin): ?>
            <div class="stats-grid">
                <div class="stat-card" style="flex-direction: column; align-items: flex-start;">
                    <h2><?= $data['total'] ?></h2>
                    <p style="margin-bottom: 0;">Total Registered Users</p>
                </div>
                <div class="stat-card" style="flex-direction: column; align-items: flex-start;">
                    <h2><?= $data['admins'] ?></h2>
                    <p style="margin-bottom: 0;">Total Admins</p>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($isAdmin && ($view === "add" || $view === "edit")): ?>
            <div style="margin-bottom: 30px;">
                <?php include "admin_form.php"; ?>
            </div>
        <?php elseif ($isAdmin && $view === "view" && $data['edit']): ?>
            <div class="card" style="margin-bottom: 30px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
                    <h3 style="margin-bottom: 0;">User Details</h3>
                    <a href="admin.php" class="text-link">Close Details</a>
                </div>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 24px;">
                    <div>
                        <p style="color: #8a8a8a; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 4px;">Full Name</p>
                        <p style="font-weight: 500;"><?= htmlspecialchars($data['edit']['fname'] . " " . $data['edit']['lname']) ?></p>
                    </div>
                    <div>
                        <p style="color: #8a8a8a; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 4px;">Email Address</p>
                        <p style="font-weight: 500;"><?= htmlspecialchars($data['edit']['email']) ?></p>
                    </div>
                    <div>
                        <p style="color: #8a8a8a; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 4px;">Gender</p>
                        <p style="font-weight: 500;"><?= htmlspecialchars($data['edit']['gender']) ?></p>
                    </div>
                    <div>
                        <p style="color: #8a8a8a; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-bottom: 4px;">Account Role</p>
                        <span class="chip"><?= htmlspecialchars($data['edit']['role']) ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="card">
            <h3>User Directory</h3>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <?php if ($isAdmin): ?><th>Actions</th><?php endif; ?>
                </tr>
                <?php foreach ($data['users'] as $user): ?>
                    <tr>
                        <td><?= $user["ID"] ?></td>
                        <td><?= htmlspecialchars($user["fname"] . " " . $user["lname"]) ?></td>
                        <td><?= htmlspecialchars($user["email"]) ?></td>
                        <td><span class="chip"><?= htmlspecialchars($user["role"]) ?></span></td>
                        <?php if ($isAdmin): ?>
                            <td style="display: flex; gap: 8px;">
                                <a href="admin.php?view=view&id=<?= $user["ID"] ?>" class="btn" title="View">View</a>
                                <a href="admin.php?view=edit&id=<?= $user["ID"] ?>" class="btn" title="Edit">Edit</a>
                                <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <input type="hidden" name="action" value="del">
                                    <input type="hidden" name="id" value="<?= $user["ID"] ?>">
                                    <button type="submit" class="btn" title="Delete">Delete</button>
                                </form>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </main>
</body>

</html>