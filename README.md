# <p align="center"> <img src="https://readme-typing-svg.herokuapp.com?font=Poppins&weight=700&size=40&pause=1000&color=2DC76D&center=true&vCenter=true&width=600&lines=User+Management+System;Premium+UI+Experience;Fast+%26+Secure" alt="Typing SVG" /> </p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" />
  <img src="https://img.shields.io/badge/Lucide-Icons-2DC76D?style=for-the-badge" />
</p>

---

##  Overview
A professionally styled **User Management System** built with a focus on premium aesthetics, dark mode support, and seamless administrative workflows.

###  Key Features
- **Admin Dashboard**: Real-time stats for total users and admin accounts.
- **Dynamic Sidebar**: Unified navigation with Lucide icons.
- **Theme Toggle**: Instant Dark/Light mode switching with persistence.
- **Toast Notifications**: Interactive feedback for all user actions.
- **Responsive Design**: Mobile-first layout using Vanilla CSS.

---

## Tech Stack
| Component | Technology |
| :--- | :--- |
| **Backend** | PHP 8.x |
| **Database** | MySQL |
| **Frontend** | Vanilla CSS, HTML5 |
| **Icons** | Lucide Icons |
| **Typography** | Poppins (Google Fonts) |

---

##  Simple Code Snippets

### Database Connection
```php
$conn = new mysqli("localhost", "root", "3Bolga123", "your_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
```

### Theme Toggle (JS)
```javascript
themeToggle.addEventListener('click', () => {
    body.classList.toggle('dark');
    const isDark = body.classList.contains('dark');
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
});
```

---

## Installation
1. Clone the repository to your `htdocs` folder.
2. Import the database schema into MySQL.
3. Update `src/includes/db.php` with your credentials.
4. Open the project in your browser: `http://localhost/PHP%20PROJECT`

---

<p align="center"> Made for a Seamless User Experience </p>
