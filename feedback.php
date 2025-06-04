<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'feedback1';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $rating = $_POST["rating"];
    $feedback = $_POST["feedback"];

    // Insert feedback into database
    $sql = "INSERT INTO feedback1(name, email, rating, feedback) VALUES ('$name', '$email', '$rating', '$feedback')";
    $conn->query($sql);

    // Display success message
    echo "<p>Thank you for submitting your feedback! We appreciate your input.</p>";
} else {
    // Display form
    include 'feedbackform.html';
}

// Close connection
$conn->close();
?>