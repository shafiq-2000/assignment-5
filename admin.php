<!-- admin.php -->
<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] !== 'admin') {
    header("Location: index.php");
    exit();
}

echo "<h2>Welcome, Admin!</h2>";
echo "<p><a href='logout.php'>Logout</a></p>";

// Add role management functionality here
?>
