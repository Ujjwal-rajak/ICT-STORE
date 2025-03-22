<?php
session_start(); // Start the session

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Retrieve user information from session
$id = $_SESSION['id'];
$email = $_SESSION['email'];

// Optionally, you can fetch more user details from the database if needed
// For example, if you want to fetch the username or other details based on user ID, uncomment below:

/*
$servername = "localhost";
$username = "root";  // Replace with your database username
$password = "";      // Replace with your database password
$dbname = "ict_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare a select statement to get user details
$sql = "SELECT username, member_since FROM users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("i", $param_id);
    
    // Set parameters
    $param_id = $id;
    
    // Attempt to execute the prepared statement
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($username, $member_since);
        if ($stmt->fetch()) {
            // You can now use $username and $member_since as needed
        }
    }
    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - ICT STORE MANAGEMENT</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; color: #333; }
        header { background-color: #333; color: #fff; padding: 10px 20px; text-align: center; }
        nav { margin: 20px 0; text-align: center; }
        nav a { margin: 0 15px; text-decoration: none; color: #333; font-weight: bold; }
        .container { width: 80%; margin: 0 auto; }
        .footer { background-color: #333; color: #fff; text-align: center; padding: 10px 0; position: fixed; width: 100%; bottom: 0; }
        .user-info { margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <h1>User Profile</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="products.php">Products</a>
            <a href="contact.php">Contact Us</a>
            <a href="login.php">Login</a>
            <a href="cart.php">Cart</a>
            <a href="profile.php">Profile</a>
        </nav>
    </header>
    <div class="container">
        <h2>Your Profile</h2>
        <div class="user-info">
            <p><strong>User ID:</strong> <?php echo htmlspecialchars($id); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <?php
            // Optionally display the username and member since if fetched from the database
            /*
            echo '<p><strong>Username:</strong> ' . htmlspecialchars($username) . '</p>';
            echo '<p><strong>Member Since:</strong> ' . htmlspecialchars($member_since) . '</p>';
            */
            ?>
        </div>
    </div>
    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
</body>
</html>
