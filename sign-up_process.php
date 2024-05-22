<?php
include_once "../database.php";

// Function to check if username already exists
function usernameExists($conn, $username) {
    $sql = "SELECT * FROM user_info WHERE username =?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}


session_start();

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$user_address = $_POST['user_address'];
$username = $_POST['username'];
$user_password = password_hash($_POST['user_password'], PASSWORD_DEFAULT);
$passwordRepeat = $_POST['passwordRepeat'];

$errors = array();

// validate email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($errors, "Email is not valid");
}

// verify if passwords are match
if (!password_verify($passwordRepeat, $user_password)) {
    array_push($errors, "Passwords do not match");
}

// Check if username already exists
if (usernameExists($conn, $username)) {
    array_push($errors, "Username already taken");
}

// If walang errors, insert the new customer into database
if (empty($errors)) {
    $sql = "INSERT INTO user_info (fullname, email, contact, user_address, user_password, username)
    VALUES ('$fullname', '$email', '$contact', '$user_address', '$user_password', '$username')";

    if ($conn->query($sql) === TRUE) {
        // if success ang sign up,redirect sa log in form
        echo "New record created successfully";
        header("Location: login_customer.php");
        exit;
    } else {
        echo "Error: ". $sql. "<br>". $conn->error;
    }
} else {
   
    echo "Error: ". implode("<br>", $errors);
}

// Close the database connection
$conn->close();
?>