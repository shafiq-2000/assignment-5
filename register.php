<!-- register.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $userData = json_decode(file_get_contents('users.json'), true);

    // Check if the email is already registered
    if (isset($userData[$email])) {
        die("User with this email already exists.");
    }

    // Save new user data
    $userData[$email] = ['username' => $username, 'password' => $password, 'role' => 'user'];
    file_put_contents('users.json', json_encode($userData));

    echo "Registration successful. You can now <a href='index.php'>login</a>.";
}
?>
