<?php
session_start();
require_once 'db.php'; // Ensure the correct path to db.php

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to sanitize input
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Check that the user has filled in the data
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    // Prepare the SQL statement
    $query = "SELECT * FROM users WHERE username = ?";
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a user was found
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verify the password (plain text comparison)
            if ($password === $user['password']) {
                // Password is correct, start a session
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['login_success'] = true; // Set the session flag

                // Redirect to the dashboard page
                header("Location: ../dashboard.php"); // Ensure the correct path to dashboard.php
                exit();
            } else {
                // Invalid password
                $error_message = "Invalid username or password.";
            }
        } else {
            // No user found with that username
            $error_message = "Invalid username or password.";
        }

        $stmt->close();
    } else {
        $error_message = "Database error: Unable to prepare statement.";
    }

    $conn->close();
} else {
    $error_message = "Please fill in both the username and password.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Error</title>
</head>
<body>
    <h1>Login Error</h1>
    <p><?php echo isset($error_message) ? sanitize_input($error_message) : "An unknown error occurred."; ?></p>
    <a href="../login.html">Go back to login page</a>
</body>
</html>
