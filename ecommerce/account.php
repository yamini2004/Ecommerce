<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// SQL query to check if username and password exist
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Username and password match found
    // Fetch user details
    $row = $result->fetch_assoc();
    $name = $row['name']; // Assuming 'name' is the column name for the user's name in your database

    // Redirect to welcome page with the user's name
    header("Location: welcome.php?name=" . urlencode($name)); // Redirect to welcome.php with the user's name
} else {
    // Username and password not found
    echo "Invalid username or password";
}

$conn->close();
?>
