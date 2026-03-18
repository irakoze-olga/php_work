<?php
$current_page = basename($_SERVER['PHP_SELF']);
$view = $_GET['view'] ?? '';
$user_role = $_SESSION['user_role'] ?? 'user';
?>
<?php include __DIR__ . "/theme_toggle.php"; ?>

<aside class="sidebar">
    <div class="sidebar-title">User Management App</div>
    
    <p class="sidebar-label"><?= ($user_role == 'admin') ? 'Admin Menu' : 'User Menu' ?></p>
    
    <?php if ($user_role == 'admin'): ?>
        <a href="admin.php" class="nav-link <?= ($current_page == 'admin.php' && ($view == '' || $view == 'dashboard')) ? 'active' : '' ?>">
            <i data-lucide="layout-dashboard"></i> Dashboard
        </a>
        <a href="admin.php?view=list" class="nav-link <?= ($current_page == 'admin.php' && $view == 'list') ? 'active' : '' ?>">
            <i data-lucide="users"></i> User List
        </a>
        <a href="admin.php?view=add" class="nav-link <?= ($current_page == 'admin.php' && $view == 'add') ? 'active' : '' ?>">
            <i data-lucide="user-plus"></i> Create New User
        </a>
    <?php else: ?>
        <a href="dashboard.php" class="nav-link <?= ($current_page == 'dashboard.php') ? 'active' : '' ?>">
            <i data-lucide="layout-dashboard"></i> Dashboard
        </a>
        <a href="admin.php" class="nav-link <?= ($current_page == 'admin.php') ? 'active' : '' ?>">
            <i data-lucide="users"></i> User List
        </a>
    <?php endif; ?>
    
    <div style="margin-top: auto;">
        <a href="logout.php" class="nav-link danger">
            <i data-lucide="log-out"></i> Logout
        </a>
    </div>
</aside>

<script>
    // Initialize Lucide
    lucide.createIcons();

    // Theme Toggle Logic
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const body = document.body;

    // Load saved theme
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
        updateIcon('sun');
    }

    themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark');
        const isDark = body.classList.contains('dark');
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
        updateIcon(isDark ? 'sun' : 'moon');
    });

    function updateIcon(name) {
        themeIcon.setAttribute('data-lucide', name);
        lucide.createIcons();
    }
</script>