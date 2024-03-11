<!-- login.php -->
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userData = json_decode(file_get_contents('users.json'), true);

    // Check if the user exists
    if (!isset($userData[$email])) {
        die("User not found.");
    }

    // Verify password
    if (password_verify($password, $userData[$email]['password'])) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $userData[$email]['role'];

        // Redirect based on user role
        if ($_SESSION['role'] === 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: user.php");
        }
    } else {
        die("Incorrect password.");
    }
}
?>
