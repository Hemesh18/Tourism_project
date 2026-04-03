<?php
session_start(); // Start a session to keep the user logged in
require 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        die("Please enter both username and password.");
    }

    try {
        // 1. Look for the user in the database
        $stmt = $pdo->prepare("SELECT id, username, password_hash FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        // 2. Verify if the user exists AND the password matches the hash
        if ($user && password_verify($password, $user['password_hash'])) {
            // Login Success!
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to a secure dashboard or the homepage
            echo "<script>
                    alert('Login successful! Welcome back, " . htmlspecialchars($username) . "');
                    window.location.href = 'index.php'; // Change to your desired page
                  </script>";
        } else {
          
            echo "<script>
                    alert('Invalid username or password!');
                    window.location.href = 'login.php';
                  </script>";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "Invalid request.";
}
?>