<?php
    include("common.php");
    if(isset($_SESSION['email'])) {
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT STORE MANAGEMENT</title>
    <style>
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
        .product {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }
        .product img {
            max-width: 100%;
            height: auto;
        }
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .category-filter {
            text-align: center;
            margin-bottom: 20px;
        }
        .category-filter select {
            padding: 10px;
            font-size: 16px;
        }
        .cart-button {
            float:none;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
        }
        .cart-button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <h1>ICT STORE MANAGEMENT</h1>
    </header>
    <nav>
        <a href="./home.php">Home</a>
        <a href="./product.php">Products</a>
        <a href="./about_us.php">About Us</a>
        <a href="./contactus.php">Contact</a>
        <a href="./login.php">Login</a>
        <a href="./user_registration.php">New User</a>
        <a href="./cart.php">Cart</a>
        <a href="./profile.php">Profile</a>
        <a href="./admin_login.php">Admin Login</a>
        <a href="./admin_registration.php">Admin Registration</a>
    </nav>
    <div class="container" id="home">
        <div class="category-filter">
            <label for="category">Category:</label>
            <select id="category" name="category" onchange="window.location.href=this.value;">
                <option value="index.php">All</option>
                <option value="laptop.php">Laptops</option>
                <option value="desktop.php">Desktops</option>
                <option value="mouse.php">Mouse</option>
                <option value="wire.php">Wires</option>
                <option value="keyboard.php">Keyboard</option>
                <option value="router.php">Router</option>
                <option value="cpu.php">CPU</option>
                <option value="accessories.php">Accessories</option>
            </select>
        </div>
        
        <section id="products">
            <h2>Our Products</h2>
            <div class="product">
                <img src="./images/alex-knight-j4uuKnN43_M-unsplash.jpg" alt="Product Image">
                <h3>LAPTOPS</h3>
                <p>Starting from Rs 49,999.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="product">
                <img src="./images/oscar-ivan-esquivel-arteaga-ZtxED1cpB1E-unsplash.jpg" alt="Product Image">
                <h3>Mouses</h3>
                <p>Starting from Rs 499.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="product">
                <img src="./images/bryan-natanael-hR8l1s4u8QE-unsplash (1).jpg" alt="Product Image">
                <h3>Keyboards</h3>
                <p>Starting from 999</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </section>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Computer Store. All rights reserved.</p>
    </footer>
</body>
</html>
