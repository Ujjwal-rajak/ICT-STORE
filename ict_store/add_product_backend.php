<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ict_store";

// Establish a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling product addition form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Handle image upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        // Define allowed image extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);

        // Check if the file extension is valid
        if (in_array(strtolower($file_extension), $allowed_extensions)) {
            // Generate a unique file name
            $image_name = time() . '.' . $file_extension;
            $upload_dir = 'uploads/';

            // Check if the upload directory exists, if not create it
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Define the upload path
            $upload_path = $upload_dir . $image_name;

            // Move the uploaded file to the desired directory
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $upload_path)) {
                // Image upload successful, insert data into the database
                $sql = "INSERT INTO add_product (product_name, price, category, description, product_image) 
                        VALUES ('$product_name', '$price', '$category', '$description', '$image_name')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('New product added successfully!');</script>";
                    echo "<script>window.location.href = 'add_product.php';</script>";
                } else {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Error uploading the image. Please try again.";
            }
        } else {
            echo "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
        }
    } else {
        echo "Please upload an image.";
    }
}

$conn->close();
?>