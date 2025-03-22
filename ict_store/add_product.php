<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT STORE MANAGEMENT</title>
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        nav {
            margin: 20px 0;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .product-form {
            margin-top: 30px;
        }
        .product-form input, .product-form select, .product-form textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        .submit-btn {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>ICT STORE MANAGEMENT</h1>
    </header>
    <nav>
        <a href="./aboutus.php">About Us</a>
        <a href="./contactus.php">Contact</a>
        <a href="./logout.php">Logout</a>
        <a href="./admin_orders.php">Orders</a>
        <a href="./manage_user.php">users</a>
        <a href="./manage_products.php">Products</a>
    </nav>
    <div class="container">
        <h2>Add New Product</h2>
        <form action="add_product_backend.php" method="POST" enctype="multipart/form-data" class="product-form">
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="Laptop">Laptop</option>
                <option value="Desktop">Desktop</option>
                <option value="Mouse">Mouse</option>
                <option value="Keyboard">Keyboard</option>
                <option value="CPU">CPU</option>
                <option value="Accessories">Accessories</option>
            </select>

            <label for="price">Price (INR):</label>
            <input type="number" id="price" name="price" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="product_image">Upload Product Image:</label>
            <input type="file" id="product_image" name="product_image" accept="image/*" required>

            <input type="submit" value="Add Product" class="submit-btn">
        </form>
    </div>
    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
</body>
</html>
