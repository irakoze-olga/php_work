<!-- Lucide Icons CDN -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- Theme Toggle Button (Floating at top) -->
<button id="themeToggle" class="theme-toggle" title="Toggle Theme">
    <i data-lucide="moon" id="themeIcon"></i>
</button>

<script>
    // Theme Toggle Logic
    const themeToggle = document.getElementById('themeToggle');
    const themeIcon = document.getElementById('themeIcon');
    const body = document.body;

    // Load saved theme
    if (localStorage.getItem('theme') === 'dark') {
        body.classList.add('dark');
    }

    // Initial icon update
    document.addEventListener('DOMContentLoaded', () => {
        const isDark = body.classList.contains('dark');
        updateIcon(isDark ? 'sun' : 'moon');
    });

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
