<?php
// PHP code to handle the registration process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
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

    // Get the form data
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // Insert the data into the users table
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $user, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You will be redirected to the login page.');</script>";
        // Redirect to the login page after a successful registration
        echo "<script>window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }

    // Close connection
    $stmt->close();
    $conn->close();
}
?>

