<?php
include('common.php');
$email = $_SESSION['email'];
$sql = "SELECT `id`, `product_id`, `quantity`, `price`, `email`, `product_name` FROM `cart` WHERE `email` = '$email'";
$result = mysqli_query($dbc, $sql);
$totalPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - ICT STORE MANAGEMENT</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .total {
            font-size: 1.5em;
            text-align: right;
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

        input[type="number"] {
            width: 60px;
            padding: 5px;
        }

        button {
            padding: 5px 10px;
            color: white;
            background-color: red;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: darkred;
        }

        .buy-now {
            padding: 10px 20px;
            color: white;
            background-color: green;
            border: none;
            cursor: pointer;
            font-size: 1.2em;
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        .buy-now:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <?php require('navbar.php'); ?>
    <header>
        <h1>Your Cart</h1>
    </header>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        $total = $row["price"] * $row["quantity"];
                        $totalPrice += $total;

                        echo "<tr>";
                        echo "<td>" . $row["product_name"] . "</td>";
                        echo "<td>Rs " . number_format($row["price"]) . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>Rs " . number_format($total) . "</td>";
                        echo "<td><button onclick=\"location.href='remove_from_cart.php?product_id=" . $row['product_id'] . "'\">Remove</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                }
                $dbc->close();
                ?>
            </tbody>
        </table>
        <div class="total">Total: Rs <?php echo number_format($totalPrice); ?></div>
        <button class="buy-now" onclick="buyNow()">Buy Now</button>
    </div>
    <footer class="footer">
        <p>&copy; 2024 ICT Store. All rights reserved.</p>
    </footer>
    <?php

    ?>
    <script>
        function buyNow() {
            if (<?php echo $result->num_rows; ?> === 0) {
                alert("Your cart is empty!");
            } else {
                window.location.href = 'Delivery.php?useThis=false';
            }
        }
    </script>

</body>

</html>