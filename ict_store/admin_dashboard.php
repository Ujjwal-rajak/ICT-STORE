<?php
/*
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ict_store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($admin_password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($admin_password, PASSWORD_DEFAULT);

        // Insert into the admin table
        $sql = "INSERT INTO admin (username, password) VALUES ('$admin_username', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // echo "New admin registered successfully!";
            echo "<script>window.location.href = 'admin_login.php';</script>";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();*/
?>

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

// Redirect if not logged in as admin
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    
    <!-- Link to Manage Users Page -->
    <nav>
        <a href="manage_user.php">Manage Users</a>
    </nav>
</body>
</html>

<?php
// Close the connection at the end of the page, not before HTML
$conn->close();
?>


