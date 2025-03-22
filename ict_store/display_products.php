<?php
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

// Get category from query string
$category = isset($_GET['category']) ? $_GET['category'] : 'Laptop';

// Fetch products for the selected category
$sql = "SELECT * FROM add_product WHERE category = '$category'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products - <?php echo htmlspecialchars($category); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($category); ?> Products</h1>
    </header>
    <nav>
        <a href="?category=Laptop">Laptop</a>
        <a href="?category=Desktop">Desktop</a>
        <a href="?category=Mouse">Mouse</a>
        <a href="?category=Keyboard">Keyboard</a>
        <a href="?category=CPU">CPU</a>
        <a href="?category=Accessories">Accessories</a>
    </nav>
    <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product'>";
                echo "<h2>" . htmlspecialchars($row['product_name']) . "</h2>";
                echo "<img src='uploads/" . htmlspecialchars($row['product_image']) . "' alt='" . htmlspecialchars($row['product_name']) . "'>";
                echo "<p>Price: INR " . htmlspecialchars($row['price']) . "</p>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No products found in this category.</p>";
        }
        ?>
    </div>
    <footer>
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
