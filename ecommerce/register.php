<?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'my_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieving form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Note: You should hash the password before storing it in the database for security purposes
    $address = $_POST['address'];
    $phone = $_POST['number'];
    $gender = $_POST['gender'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (name, username, email, password, address, phone, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $name, $username, $email, $password, $address, $phone, $gender);

    if ($stmt->execute()) {
        // Redirect to welcome page with the user's name
        header("Location: welcome.php?name=" . urlencode($name));
        exit(); // Make sure to exit after redirecting
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User Registration - Ecommerce</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>
    <div class="container">
        <h1>New User Registration</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name"  name="name" placeholder="Enter Full Name" required>
                <div id="n" class="error"></div>
            </div>
            <div class="form-group">
                <label for="name">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter Full Name" required>
                <div id="n" class="error"></div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email"  placeholder="Enter Email" required>
                <div id="message3" class="error"></div>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="cpassword" placeholder="Confirm Password" required>
                <div id="password_match" class="error"></div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="number"  placeholder="Enter Phone Number" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
            </div>
            <button type="submit">Register</button>
        </form>
        <a href="index.html" class="back-link">Back to Home</a>
    </div>
</body>
</html>
