<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to eManage</title>
    <link rel="stylesheet" href="src/styles/main.css">
    <style>
        .landing-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            width: 100%;
            text-align: center;
            padding: 60px 20px;
        }
        .landing-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 30px;
            max-width: 800px;
            line-height: 1.3;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            max-width: 900px;
            margin-top: 60px;
            width: 100%;
        }
        .feature-card {
            background: var(--card-bg, #ffffff);
            border: 1px solid var(--border-color, #ede9e5);
            padding: 30px 20px;
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .feature-card h3 {
            font-size: 1.25rem;
            margin-bottom: 12px;
            color: var(--primary, #3da972);
        }
        .feature-card p {
            color: var(--secondary-text, #8a8a8a);
            font-size: 0.95rem;
            line-height: 1.5;
        }
        @media (max-width: 768px) {
            .landing-title {
                font-size: 2rem;
            }
            .features-grid {
                margin-top: 40px;
            }
        }
    </style>
</head>
<body>
    <div class="landing-container">
        <h1 class="landing-title">Welcome to eManage, control your users by a digitalized storage system</h1>
        <a href="src/pages/login.php" class="btn btn-primary" style="font-size: 1.2rem; padding: 15px 40px;">Get Started</a>
        
        <div class="features-grid">
            <div class="feature-card">
                <h3>Login or Create Account</h3>
                <p>Begin by logging in or creating your eManage account.</p>
            </div>
            <div class="feature-card">
                <h3>Navigate to Dashboard</h3>
                <p>Access your personalized dashboard to get an overview of your system and activities.</p>
            </div>
            <div class="feature-card">
                <h3>Manage Users Efficiently</h3>
                <p>Control every single registered user Efficiently.</p>
            </div>
        </div>
    </div>
</body>
</html>
