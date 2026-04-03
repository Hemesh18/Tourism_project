<?php
require 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Grab the inputs and trim whitespace
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Basic Validation
    if (empty($username) || empty($password) || empty($confirm_password)) {
        die("<script>alert('Please fill in all fields.'); window.history.back();</script>");
    }

    if ($password !== $confirm_password) {
        die("<script>alert('Passwords do not match. Please try again.'); window.history.back();</script>");
    }

    try {
        // 2. Check if the username already exists in the database
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        
        if ($stmt->rowCount() > 0) {
            // User already exists!
            die("<script>alert('Sorry, that username is already taken. Please choose another.'); window.history.back();</script>");
        }

        // 3. Hash the password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 4. Insert the new user into the database
        $insert_stmt = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (:username, :password_hash)");
        $insert_stmt->execute([
            ':username' => $username,
            ':password_hash' => $hashed_password
        ]);

        // 5. Success! Redirect them to the login page
        echo "<script>
                alert('Account created successfully! You can now log in.');
                window.location.href = 'login.php';
              </script>";

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    echo "Invalid request method.";
}
?>