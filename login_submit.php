<?php
session_start();

// Include the database connection
include 'connection.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture the form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Retrieve user data from the database
$sql = "SELECT * FROM users WHERE email = ? OR email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $email, $email);
$stmt->execute();
$result = $stmt->get_result();

// Validate the user
if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
        header("Location: list.php?success_message=Logged in successfully");
        exit(); // Important to stop further script execution
} else {
    header("Location: login.php?success_message=User not found..");
}

$stmt->close();
$conn->close();
?>
