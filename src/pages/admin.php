<?php
session_start(); include "../includes/db.php";
if (!isset($_SESSION["user_id"])) { header("Location: login.php"); exit(); }

$isAdmin = ($_SESSION["user_role"] === "admin");
$n = htmlspecialchars($_SESSION["user_name"]);
$v = $_GET["view"] ?? "dashboard";
$id = (int)($_GET["id"] ?? 0);

if ($_SERVER["REQUEST_METHOD"] === "POST" && $isAdmin) {
    if ($_POST["action"] === "del") {
        $conn->query("DELETE FROM users WHERE ID=". (int)$_POST["id"]);
        $_SESSION["msg"] = "User Deleted Successfully!";
    } else {
        $fn=$conn->real_escape_string($_POST["fn"]); $ln=$conn->real_escape_string($_POST["ln"]);
        $em=$conn->real_escape_string($_POST["em"]); $ge=$_POST["ge"]; $ro=$_POST["ro"];
        if ($_POST["action"] === "add") {
            $pw=password_hash($_POST["pw"], PASSWORD_DEFAULT);
            $conn->query("INSERT INTO users (fname,lname,email,password,gender,role) VALUES ('$fn','$ln','$em','$pw','$ge','$ro')");
            $_SESSION["msg"] = "User Created Successfully!";
        } elseif ($_POST["action"] === "edit") {
            $pw=$_POST["pw"]?", password='".password_hash($_POST["pw"], PASSWORD_DEFAULT)."'":"";
            $conn->query("UPDATE users SET fname='$fn',lname='$ln',email='$em',gender='$ge',role='$ro'$pw WHERE ID=$id");
            $_SESSION["msg"] = "User Updated Successfully!";
        }
    }
    header("Location: admin.php?view=".($_POST["action"]==="del"?"list":"list")); exit();
}

$msg = $_SESSION["msg"] ?? ""; unset($_SESSION["msg"]);
$stats = [
    'total' => $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0],
    'admins' => $conn->query("SELECT COUNT(*) FROM users WHERE role='admin'")->fetch_row()[0]
];
$users = $conn->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);
$u = ($v==="edit") ? $conn->query("SELECT * FROM users WHERE ID=$id")->fetch_assoc() : null;
?>
<!DOCTYPE html>
<html>
<head><title>Admin Panel</title><link rel="stylesheet" href="../styles/main.css"></head>
<body>
<?php include "../includes/sidebar.php"; ?>
<main class="main">
    <div class="main-header">
        <h1>Admin Control</h1>
        <p style="font-size:14px;color:var(--muted);">Logged in as <b style="color:var(--text);"><?= $n ?></b> <span class="chip chip-admin">Admin</span></p>
    </div>

    <?php if($msg): ?>
    <div class="toast-container"><div class="toast"><i data-lucide="check-circle"></i> <?= $msg ?></div></div>
    <script>setTimeout(()=>document.querySelector('.toast-container').remove(), 3000);</script>
    <?php endif; ?>

    <?php if ($v === "dashboard"): ?>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon" style="background:#e0f2fe; color:#0369a1;"><i data-lucide="users"></i></div>
                <div class="stat-info"><h2><?= $stats['total'] ?></h2><p>Total Registered</p></div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background:#dcfce7; color:#15803d;"><i data-lucide="user-check"></i></div>
                <div class="stat-info"><h2><?= $stats['admins'] ?></h2><p>Admin Accounts</p></div>
            </div>
        </div>
        <div class="card" style="display:flex; justify-content:space-between; align-items:center;">
            <div><h3>Quick Actions</h3><p style="color:var(--muted); font-size:14px; margin-top:5px;">Manage users and permissions.</p></div>
            <a href="admin.php?view=add" class="btn btn-primary"><i data-lucide="user-plus"></i> Create User</a>
        </div>

    <?php elseif ($v === "list"): ?>
        <div class="card">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:25px;">
                <h3>User Directory</h3>
                <a href="admin.php?view=add" class="btn btn-primary"><i data-lucide="user-plus"></i> Add New</a>
            </div>
            <table>
                <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><?php if($isAdmin): ?><th>Actions</th><?php endif; ?></tr></thead>
                <tbody>
                    <?php foreach($users as $usr): ?>
                    <tr>
                        <td><?= $usr["ID"] ?></td><td><?= $usr["fname"]." ".$usr["lname"] ?></td><td><?= $usr["email"] ?></td>
                        <td><span class="chip chip-<?= $usr["role"] ?>"><?= $usr["role"] ?></span></td>
                        <?php if($isAdmin): ?>
                        <td>
                            <a href="admin.php?view=edit&id=<?= $usr["ID"] ?>" class="btn" style="padding:8px; background:var(--green-soft); color:var(--green);"><i data-lucide="edit-3"></i></a>
                            <form method="POST" style="display:inline;"><input type="hidden" name="action" value="del"><input type="hidden" name="id" value="<?= $usr["ID"] ?>"><button type="submit" class="btn" style="padding:8px; background:#fef2f2; color:var(--red);"><i data-lucide="trash-2"></i></button></form>
                        </td><?php endif; ?>
                    </tr><?php endforeach; ?>
                </tbody>
            </table>
        </div>

    <?php elseif ($isAdmin): ?>
        <div class="card" style="max-width:600px;">
            <h3 style="margin-bottom:25px;"><?= ucfirst($v) ?> User Account</h3>
            <form method="POST"><input type="hidden" name="action" value="<?= $v ?>">
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div><label>First Name</label><input type="text" name="fn" value="<?= $u["fname"]??'' ?>" required></div>
                    <div><label>Last Name</label><input type="text" name="ln" value="<?= $u["lname"]??'' ?>" required></div>
                </div>
                <label>Email</label><input type="email" name="em" value="<?= $u["email"]??'' ?>" required>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                    <div><label>Gender</label><select name="ge"><option <?=($u["gender"]??'')==="Male"?"selected":""?>>Male</option><option <?=($u["gender"]??'')==="Female"?"selected":""?>>Female</option></select></div>
                    <div><label>Role</label><select name="ro"><option value="user" <?=($u["role"]??'')==="user"?"selected":""?>>User</option><option value="admin" <?=($u["role"]??'')==="admin"?"selected":""?>>Admin</option></select></div>
                </div>
                <label>Password <?= $v==="edit"?"(leave blank to keep)":"" ?></label><input type="password" name="pw" <?= $v==="add"?"required":"" ?>>
                <button type="submit" class="btn btn-primary"><i data-lucide="save"></i> <?= ucfirst($v) ?> Save</button>
                <a href="admin.php?view=list" class="btn" style="background:var(--border); color:var(--text); margin-left:10px;">Cancel</a>
            </form>
        </div><?php endif; ?>
</main>
<script>lucide.createIcons();</script>
</body></html>