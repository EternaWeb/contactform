<?php
$host = "localhost";       // This should work in XAMPP
$username = "root";        // Default MySQL username for XAMPP
$password = "";            // Default password for MySQL in XAMPP is empty
$dbname = "formdata";      // Name of your database

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare SQL query to insert data
$sql = "INSERT INTO messages (email, message) VALUES (?, ?)";

// Prepare and bind
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $message);

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>





































