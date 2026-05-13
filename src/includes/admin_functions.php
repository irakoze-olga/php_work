<?php
function handleAdminPost(mysqli $conn): void
{
    if ($_SERVER["REQUEST_METHOD"] !== "POST") return;

    $action = $_POST["action"];
    $userId = (int)($_POST["id"] ?? 0);
    $firstName = $conn->real_escape_string($_POST["fn"] ?? "");
    $lastName = $conn->real_escape_string($_POST["ln"] ?? "");
    $email = $conn->real_escape_string($_POST["em"] ?? "");
    $gender = $_POST["ge"] ?? "Male";
    $role = $_POST["ro"] ?? "user";
    $password = $_POST["pw"] ?? "";

    if ($action === "del") {
        $conn->query("DELETE FROM users WHERE ID=$userId");
    } elseif ($action === "add") {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $conn->query("INSERT INTO users (fname,lname,email,password,gender,role) VALUES ('$firstName','$lastName','$email','$hashedPassword','$gender','$role')");
    } elseif ($action === "edit") {
        $passwordPart = $password ? ", password='" . password_hash($password, PASSWORD_DEFAULT) . "'" : "";
        $conn->query("UPDATE users SET fname='$firstName',lname='$lastName',email='$email',gender='$gender',role='$role'$passwordPart WHERE ID=$userId");
    }

    $_SESSION["msg"] = ucfirst($action) . " successful!";
    header("Location: admin.php");
    exit();
}

function getAdminData(mysqli $conn, string $view, int $id): array
{
    return [
        'total' => $conn->query("SELECT COUNT(*) FROM users")->fetch_row()[0],
        'admins' => $conn->query("SELECT COUNT(*) FROM users WHERE role='admin'")->fetch_row()[0],
        'users' => $conn->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC),
        'edit' => ($view === "edit" || $view === "view") ? $conn->query("SELECT * FROM users WHERE ID=$id")->fetch_assoc() : null
    ];
}
