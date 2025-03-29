<?php
// Database connection variables
$servername = "localhost";
$username = "root";
$password = "Parth@123";
$database = "emails_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
echo 'connection established';

// Get the email from the form
$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO email_subscriptions (email) VALUES (?)");
$stmt->bind_param("s", $email);

// Execute the statement
if ($stmt->execute()) {
    echo "Your email has been saved. You will recieve notifications about all the upcomming events !";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
