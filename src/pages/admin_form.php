<?php
$view = $_GET["view"] ?? "add";
$userId = (int)($_GET["id"] ?? 0);
$data = getAdminData($conn, $view, $userId);
?>
<div class="card">
    <h3><?= ucfirst($view) ?> User</h3>
    <form method="POST">
        <input type="hidden" name="action" value="<?= $view ?>">
        <input type="text" name="fn" placeholder="First Name" value="<?= $data['edit']['fname'] ?? '' ?>" required>
        <input type="text" name="ln" placeholder="Last Name" value="<?= $data['edit']['lname'] ?? '' ?>" required>
        <input type="email" name="em" placeholder="Email" value="<?= $data['edit']['email'] ?? '' ?>" required>
        <select name="ge">
            <option>Male</option>
            <option>Female</option>
        </select>
        <select name="ro">
            <option>user</option>
            <option>admin</option>
        </select>
        <input type="password" name="pw" placeholder="Password <?= $view === "edit" ? "(optional)" : "" ?>" <?= $view === "add" ? "required" : "" ?>>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="admin.php" class="btn">Cancel</a>
    </form>
</div>