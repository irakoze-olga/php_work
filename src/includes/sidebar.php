<?php
$currentPage = basename($_SERVER['PHP_SELF']);
$view = $_GET['view'] ?? '';
$userRole = $_SESSION['user_role'] ?? 'user';
$isAdmin = ($userRole === 'admin');
?>
<aside class="sidebar">
    <div class="sidebar-title">eManage</div>
    <p class="sidebar-label"><?= $isAdmin ? 'Admin Menu' : 'User Menu' ?></p>

    <?php if ($isAdmin): ?>
        <a href="admin.php" class="nav-link <?= ($currentPage === 'admin.php' && ($view === '' || $view === 'dashboard')) ? 'active' : '' ?>">
             Dashboard
        </a>
        <a href="admin.php?view=add" class="nav-link <?= ($currentPage === 'admin.php' && $view === 'add') ? 'active' : '' ?>">
             Create User
        </a>
    <?php else: ?>
        <a href="dashboard.php" class="nav-link <?= $currentPage === 'dashboard.php' ? 'active' : '' ?>">
            Dashboard
        </a>
        <a href="admin.php" class="nav-link <?= ($currentPage === 'admin.php') ? 'active' : '' ?>">
            User Directory
        </a>
    <?php endif; ?>

    <div style="margin-top: auto;">
        <a href="logout.php" class="nav-link danger">
            Logout
        </a>
    </div>
</aside>