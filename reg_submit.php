<?php
// Include the database connection
include 'connection.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture the form data, initializing with default values
$f_name = $_POST['f_name'] ?? '';
$l_name = $_POST['l_name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';  // Make sure to hash the password in production
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$b_group = $_POST['b_group'] ?? '';
$donated = $_POST['donated'] ?? '';

// Safely construct the SQL query with proper quoting
$sql = "INSERT INTO users (f_name, l_name, email, password, phone, gender, b_group, donated) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

// Bind parameters to the prepared statement
$stmt->bind_param('ssssssss', $f_name, $l_name, $email, $password, $phone, $gender, $b_group, $donated);

if ($stmt->execute()) {
    header("Location: login.php?success_message=Registered successfully.");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
