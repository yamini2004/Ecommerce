<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body{
        background-color:lightgrey;
        }
     </style>   
</head>
 
<body>
    <?php
        // Get the user's name from the query parameter
        $name = $_GET['name'];
        echo "<center><h1>Welcome, $name!</h1></center>";
    ?>
    <!-- Your welcome page content here -->
    <a href="index.html" class="back-link">Back to Home</a>
</body>
</html>
