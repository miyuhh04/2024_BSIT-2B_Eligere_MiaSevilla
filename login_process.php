<?php
require_once "../database.php";

// Start session
session_start();

/**
 * Validate and sanitize input data
 * @param string $data
 * @return string
 */
function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * Login customer
 * @param string $username
 * @param string $password
 */
function loginCustomer($username, $user_password) {
    global $conn; // Access the global $conn variable

    $sql = "SELECT * FROM user_info WHERE username =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($user_password, $row['user_password'])) {
            // Login successful
            $_SESSION['username'] = $username;
            if ($row['user_type'] == 'A') {
                // Admin login, redirect to admin panel
                $_SESSION['admin_greeting'] = "Welcome, " . $username;
                header("Location:../admin.php");
                exit;
            } else {
                // Customer login, redirect to index page
                header("Location:../index.php");
                exit;
            }
        } else {
            // Password is incorrect
            throw new Exception("Password is incorrect");
        }
    } else {
        // Username not found
        throw new Exception("Username not found");
    }
}


try {
    $username = validateInput($_POST['username']);
    $user_password = validateInput($_POST['user_password']);
    loginCustomer($username, $user_password);
} catch (Exception $e) {
    echo "Error: ". $e->getMessage();
}


// Close database connection
$conn->close();