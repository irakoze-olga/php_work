<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade detection</title>
</head>
<body>

<h4>Enter your marks please</h4>

<form method="POST">
    Percentage <input type="number" name="percent" required><br><br>
    <input type="submit" name="submit" value="Display your Grade">
</form>

<?php
if (isset($_POST["submit"])) {
    $percent = $_POST["percent"];

    switch (true) {
        case ($percent <= 100 && $percent >= 90):
            echo "<h5>Grade: A</h5>";
            break;

        case ($percent <= 89 && $percent >= 80):
            echo "<h5>Grade: B</h5>";
            break;

        case ($percent <= 79 && $percent >= 70):
            echo "<h5>Grade: C</h5>";
            break;

        case ($percent <= 69 && $percent >= 60):
            echo "<h5>Grade: D</h5>";
            break;

        case ($percent <= 59 && $percent >= 50):
            echo "<h5>Grade: E</h5>";
            break;

        case ($percent <= 49 && $percent >= 40):
            echo "<h5>Grade: F</h5>";
            break;

        case ($percent <= 39 && $percent >= 30):
            echo "<h5>Grade: S</h5>";
            break;

        case ($percent < 30 && $percent >= 0):
            echo "<h5>Grade: U</h5>";
            break;

        default:
            echo "<h5>INVALID MARKS 🚨</h5>";
    }
}
?>

</body>
</html>
