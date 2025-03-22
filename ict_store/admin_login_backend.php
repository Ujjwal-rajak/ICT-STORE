<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ict_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // Retrieve admin from database
    $sql = "SELECT * FROM admin WHERE username = '$admin_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($admin_password, $row['password'])) {
            $_SESSION['admin'] = $admin_username; // Store session data
            
            header("Location: add_product.php");   // Redirect to add_product.php
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
}
$conn->close();
?>
