<?php
include 'common.php';
if (!$dbc){
    die("Cannot Connect: ".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laptops - ICT STORE MANAGEMENT</title>
    <style>
        /* Your existing CSS styles */
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

        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .product {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            width: 30%;
            box-sizing: border-box;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }

        .product-buttons {
            margin-top: 10px;
        }

        .product-buttons a,
        .product-buttons button {
            text-decoration: none;
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .product-buttons a:hover,
        .product-buttons button:hover {
            background-color: #218838;
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

        @media screen and (max-width: 768px) {
            .product {
                width: 45%;
            }
        }

        @media screen and (max-width: 480px) {
            .product {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Laptops</h1>
    </header>
    <?php
        require("navbar.php");
    ?>
    <div class="container">
        <section id="products">
            <h2>Our Laptops</h2>
            <div class="product-grid">
                <?php
                if (isset($_GET['category'])) {
                    $category = mysqli_real_escape_string($dbc, $_GET['category']);

                    // Query to get laptops from the add_product table
                    $sql = "SELECT * FROM add_product WHERE category = '$category'";
                    $result = $dbc->query($sql);
                

                // Check if there are products
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>";
                        echo "<img src='./uploads/" . $row["product_image"] . "' alt='" . $row["product_name"] . "'>";
                        echo "<h3>" . $row["product_name"] . "</h3>";
                        echo "<p>Starting from Rs " . number_format($row["price"]) . ".</p>";
                        echo "<p>" . $row["description"] . "</p>";
                        echo "<div class='product-buttons'>";
                        echo "<button onclick=\"location.href='add_to_cart.php?product_id=" . $row['id'] . "&product_name=" . $row['product_name'] . "&quantity=1&price=" . $row['price'] . "&email=" . urlencode($_SESSION['email']) . "'\">Add to Cart</button>";
                        echo '<a href="./Delivery1.php?product_id=' . $row['id'] . '">Buy Now</a>';
                        echo "</div></div>";
                    }
                } else {
                    echo "<p>No products found in this category.</p>";
                }
            }

                // Close connection
                $dbc->close();
                ?>
            </div>
        </section>
    </div>
    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
</body>

</html>