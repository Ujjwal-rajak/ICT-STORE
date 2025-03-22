
<?php
session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["email"])) {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - ICT STORE MANAGEMENT</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 0; 
            padding: 0; 
            color: #333; 
            background-color: #f4f4f4;
        }
        header { 
            background-color: #333; 
            color: #fff; 
            padding: 10px 20px; 
            text-align: center; 
            position: relative;
        }
        nav { 
            margin: 20px 0; 
            text-align: center; 
        }
        nav a { 
            margin: 0 15px; 
            text-decoration: none; 
            color: #fff; /* Changed from #333 to #fff for visibility */
            font-weight: bold; 
            transition: color 0.3s;
        }
        nav a:hover { 
            color: #ffcc00; /* Added hover effect for better UX */
        }
        .container { 
            width: 90%; 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 20px 0;
        }
        .home-section { 
            position: relative; 
            overflow: hidden; 
            margin-bottom: 40px; 
        }
        .slider { 
            display: flex; 
            transition: transform 0.5s ease-in-out; 
        }
        .slide { 
            min-width: 100%; 
            box-sizing: border-box; 
        }
        .slide img { 
            width: 100%; 
            height: auto; 
            display: block; 
        }
        .button-container {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 20px;
            box-sizing: border-box;
        }
        .button { 
            padding: 10px 20px; 
            color: #fff; 
            background-color: rgba(0, 0, 0, 0.5); 
            border: none; 
            cursor: pointer; 
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover { 
            background-color: rgba(0, 0, 0, 0.7); 
        }
        /* Products Section */
        .product-section {
            margin-top: 40px;
        }
        .product-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .products-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .product { 
            background-color: #fff;
            border: 1px solid #ddd; 
            padding: 15px; 
            margin: 10px; 
            text-align: center; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            width: 30%;
            box-sizing: border-box;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .product img { 
            max-width: 100%; 
            height: auto; 
            border-radius: 5px; 
        }
        .product h3 { 
            margin: 10px 0; 
            font-size: 1.2em;
        }
        .footer { 
            background-color: #333; 
            color: #fff; 
            text-align: center; 
            padding: 10px 0; 
            position: fixed; 
            width: 100%; 
            bottom: 0; 
            left: 0;
        }
        /* User Profile Section */
        .user-profile { 
            position: fixed; 
            top: 20px; 
            right: 20px; 
            background-color: #333; 
            color: #fff; 
            padding: 15px; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); 
            text-align: center; 
            z-index: 1000;
            width: 150px;
        }
        .user-profile img { 
            border-radius: 50%; 
            width: 60px; 
            height: 60px; 
            object-fit: cover; 
            margin-bottom: 10px;
        }
        .user-profile h3 { 
            margin: 5px 0; 
            font-size: 16px; 
            line-height: 1.2; 
        }
        .user-profile p { 
            margin: 5px 0; 
            font-size: 14px; 
        }
        .user-profile a { 
            display: inline-block; 
            margin-top: 10px; 
            padding: 5px 10px; 
            background-color: #ffcc00; 
            color: #333; 
            text-decoration: none; 
            border-radius: 3px; 
            transition: background-color 0.3s;
        }
        .user-profile a:hover {
            background-color: #e6b800;
        }
        /* Responsive Design */
        @media screen and (max-width: 992px) {
            .product {
                width: 45%;
            }
        }
        @media screen and (max-width: 600px) {
            .products-grid {
                flex-direction: column;
                align-items: center;
            }
            .product {
                width: 80%;
            }
            .user-profile {
                width: 120px;
                padding: 10px;
            }
            .user-profile img {
                width: 50px;
                height: 50px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to ICT Store</h1>
        <?php
            require('navbar.php');
        ?>
    </header>

    <div class="container">
        <div class="home-section">
            <div class="slider" id="slider">
                <div class="slide"><img src="./images/bryan-natanael-hR8l1s4u8QE-unsplash (1).jpg" alt="Slide 1"></div>
                <div class="slide"><img src="./images/alex-knight-j4uuKnN43_M-unsplash.jpg" alt="Slide 2"></div>
                <div class="slide"><img src="./images/oscar-ivan-esquivel-arteaga-ZtxED1cpB1E-unsplash.jpg" alt="Slide 3"></div>
            </div>
            <div class="button-container">
                <button class="button" onclick="prevSlide()">&#10094; Previous</button>
                <button class="button" onclick="nextSlide()">Next &#10095;</button>
            </div>
        </div>

        <!-- Products Section -->
        <div class="product-section">
            <h2>Featured Products</h2>
            <div class="products-grid">
                <div class="product">
                    <img src="./mouse_img/m4.webp" alt="Product Image 1">
                    <h3>Product Name 1</h3>
                    <p>$999.99</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <button class="button" onclick="addToCart('Product Name 1', 999.99)">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="./router_img/r8.webp" alt="Product Image 2">
                    <h3>Product Name 2</h3>
                    <p>$1199.99</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <button class="button" onclick="addToCart('Product Name 2', 1199.99)">Add to Cart</button>
                </div>
                <div class="product">
                    <img src="./keyboard_img/k9.webp" alt="Product Image 3">
                    <h3>Product Name 3</h3>
                    <p>$1399.99</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <button class="button" onclick="addToCart('Product Name 3', 1399.99)">Add to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>

    <!-- User Profile Section -->
    <div class="user-profile">
        <h3><?php echo htmlspecialchars($_SESSION["email"]); ?></h3>
        <p>User ID: <?php echo htmlspecialchars($_SESSION["id"]); ?></p>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Your existing JS scripts -->
</body>
</html>
