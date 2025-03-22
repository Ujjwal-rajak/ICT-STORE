<?php
// Start session
session_start();

// Include the database connection
$host = 'localhost'; // Database host
$user = 'root'; // Your MySQL username
$password = ''; // Your MySQL password (leave empty if using root)
$dbname = 'ict_store'; // Database name

// Create a new mysqli connection
$dbc = new mysqli($host, $user, $password, $dbname);

// Check the connection
if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
}

// Fetch all orders from the database
$orderSql = "SELECT order_id, email, product_id, quantity, delivery_address, order_date FROM orders";
$orderResult = $dbc->query($orderSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file for styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    
    <h1>All Orders</h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Email</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Delivery Address</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orderResult->num_rows > 0): ?>
                <?php while ($order = $orderResult->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                        <td><?php echo $order['email']; ?></td>
                        <td><?php echo $order['product_id']; ?></td>
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['delivery_address']; ?></td>
                        <td><?php echo $order['order_date']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <button><a href="add_product.php">Back</a></button>

    <?php
    // Close database connection
    $dbc->close();
    ?>
</body>
</html>