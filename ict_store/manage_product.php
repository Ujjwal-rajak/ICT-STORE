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

// Remove a product
if (isset($_GET['delete_product'])) {
    $product_id = $_GET['delete_product'];
    $deleteStmt = $conn->prepare("DELETE FROM add_product WHERE id = ?");
    $deleteStmt->bind_param("i", $product_id);

    if ($deleteStmt->execute()) {
        echo "<script>alert('Product deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting product.');</script>";
    }
    $deleteStmt->close();
}

// Retrieve all products
$result = $conn->query("SELECT id, product_name, price, category, description, product_image FROM add_product");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Products</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f4f4f4; }
        form { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Manage Products</h1>

    <!-- Add Product Form -->
    <form method="POST" action="manage_products.php" enctype="multipart/form-data">
        <h3>Add a New Product</h3>
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="product_image">Product Image:</label>
        <input type="file" id="product_image" name="product_image" accept="image/*" required>
        <button type="submit">Add Product</button>
    </form>

    <!-- Display Products Table -->
    <h3>Existing Products</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Description</th>
                <th>Product Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['product_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['price']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($row['product_image']); ?>" alt="<?php echo htmlspecialchars($row['product_name']); ?>" width="50" height="50"></td>
                    <td>
                        <a href="manage_products.php?delete_product=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close();
?>
