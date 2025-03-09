<?php
// General MySQL server configuration
$host = 'birthday-mennovangils-3125.e.aivencloud.com'; // Replace with your MySQL server address
$db_name = 'defaultdb'; // Replace with your database name
$username = 'avnadmin'; // Replace with your MySQL username
$password = 'AVNS_f_Ps-8b6N-NSS87KQvw'; // Replace with your MySQL password

// Connect to the database
$conn = new mysqli($host, $username, $password, $db_name);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$guests = $_POST['guests'];
$dinner = $_POST['dinner'];
$comments = $_POST['comments'];

// Prepare and execute SQL query
$sql = "INSERT INTO rsvp (name, phone, guests, dinner, comments) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiss", $name, $phone, $guests, $dinner, $comments);

if ($stmt->execute()) {
    echo "RSVP submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
